<?php include('../inc/fonction.php'); ?>
<?php include('../inc/pdo.php'); ?>

<?php
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT id FROM v2_vaccins WHERE id = $id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $verifId = $query -> fetch();
    if (!empty($verifId)) {
      $sql = "DELETE FROM v2_vaccins WHERE id = $id";
      $query = $pdo -> prepare($sql);
      $query -> execute();
      //header('Location: index_back.php');      //retourne à la page d'accueil
    }
    else {
      header('Location: ../404.php');
    }
}
else {
  header('Location: ../404.php');
}
?>

<?php include('header_back.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <h5 class="text-success">Vous avez supprimé ce vaccin, il n'apparaitra donc plus.</h1>
        </div>
    </div>
</div>

<?php include('footer_back.php');
