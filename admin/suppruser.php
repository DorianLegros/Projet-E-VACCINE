<?php include('../inc/fonction.php'); ?>
<?php include('../inc/pdo.php'); ?>

<?php
if (!empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] != 2) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM v2_user WHERE id = $id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $verifId = $query -> fetch();
    if (!empty($verifId)) {
      if (!empty($_POST['submitted'])) {
        $sql = "DELETE FROM v2_user WHERE id = $id";
        $query = $pdo -> prepare($sql);
        $query -> execute();
      }
      if (!empty($_POST['cancel'])){
        header('Location: utilisateurs.php');
      }
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
          <?php if (empty($_POST['submitted'])) { ?>
            <form class="" action="" method="post">
              <p class="alert alert-info">Utilisateur: <?= $verifId['login']; ?> </p>
              <p class="text-danger">Etes-vous bien sûr de vouloir supprimer cet utilisateur ? (ce choix est irréversible)</p>
              <input class="btn btn-primary" type="submit" name="submitted" value="OUI">
              <input class="btn btn-danger" type="submit" name="cancel" value="NON">
            </form>
          <?php } ?>
          <?php if (!empty($_POST['submitted'])) { ?>
            <h5 class="text-success">Vous avez supprimé cet utilisateur, il n'apparaitra donc plus.</h1>
          <?php } ?>
        </div>
    </div>
</div>

<?php include('footer_back.php');
