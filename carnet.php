<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('inc/request.php'); ?>
<?php include('newsletter.php'); ?>
<?php
if(isLogged()){
  $id = $_SESSION['user']['id'];
// fonction pour récupérer les informations du carnet
  $carnets = getCarnet();

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
  <div class="liens-paramcompte">
    <a class="lien-paracompte" href="carnet.php">Carnet</a>
    <a class="lien-paracompte" href="profil.php">Paramètres</a>
  </div>
  <div class="clear">

  </div>

  <form class="sans-margin" action="" method="post">
    <div class="container">
      <input class="btnConfirm" type="submit" name="submitted" value="Ajouter un vaccin">
      <table class="table">
        <tr>
          <th>Nom du vaccin</th>
          <th>Date du vaccin</th>
          <th>Rappel du vaccin</th>
          <th>N°de lot</th>
          <th>Effectué ?</th>
        </tr>

          <?php foreach ($carnets as $carnet){ ?>
        <tr>
            <td><?=  $carnet['nomvaccin']; ?></td>
            <td><?=  $carnet['datevaccin'] ?></td>
            <td><?=  $carnet['rappelvaccin'] ?></td>
            <td><?=  $carnet['num_lot'] ?></td>

            <?php if ($carnet['etat'] == 'fait'){?>
              <td><p class="vaccinfait">X</p></td>
            <?php }
            else { ?>
              <td></td>
            <?php } ?>
            <td><a href="carnet_modifvaccin.php?id=<?= $carnet['id']; ?>">Modifier</a></td>
            <td><a href="carnet_supprvaccin.php?id=<?= $carnet['id']; ?>">Supprimer</a></td>


       </tr>
       <?php } ?>
     </table>

    </div>
  </form>
</div>

<?php include('inc/footer.php'); ?>
