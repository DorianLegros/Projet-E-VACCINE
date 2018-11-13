<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php
if(isLogged()){
  $id = $_SESSION['user']['id'];

  //requette pour récupérer les données du carnet
  $sql = "SELECT * FROM v2_carnets
          LEFT JOIN v2_vaccins ON v2_carnets.id_vaccins = v2_vaccins.id
          WHERE v2_carnets.id_user = :id";
  $query = $pdo -> prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query -> execute();
  $carnets = $query -> fetchAll();

  if (!empty($_POST['submitted'])) {
    header('Location: carnet_addvaccin.php');
  }

}else{
  header('Location: 404.php');
}

?>

<?php include('inc/header.php'); ?>
<!--  affichage du carnet-->
<div class="wrap">
  <form action="" method="post">
    <div class="container">
      <input type="submit" name="submitted" value="Ajouter un vaccin">
      <table class="table">
        <tr>
          <th>Nom du vaccin</th>
          <th>Date du vaccin</th>
          <th>Rappel du vaccin</th>
          <th>N°de lot</th>
        </tr>

          <?php foreach ($carnets as $carnet){ ?>
        <tr>
            <td><?=  $carnet['nomvaccin']; ?></td>
            <td><?=  $carnet['datevaccin'] ?></td>
            <td><?=  $carnet['rappelvaccin'] ?></td>
            <td><?=  $carnet['num_lot'] ?></td>
            <td><a href="carnet_modifvaccin.php?id=<?php $_SESSION['user']['id'];?>">Modifier</a></td>

       </tr>
       <?php } ?>
     </table>

    </div>
  </form>
</div>

<?php include('inc/footer.php'); ?>
