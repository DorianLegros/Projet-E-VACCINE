<?php include('../inc/fonction.php'); ?>
<?php include('../inc/pdo.php'); ?>

<?php
if (!empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] != 2) {
    $id = $_GET['id'];
    $sql = "SELECT id FROM v2_user WHERE id = $id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $verifId = $query -> fetch();
    if (!empty($verifId)) {
      if (!empty($_POST['submitted'])) {
        $sql = "DELETE FROM v2_user WHERE id = $id";
        $query = $pdo -> prepare($sql);
        $query -> execute();
      }
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
          <?php if (empty($_POST['submitted'])) { ?>
            <form class="" action="" method="post">
              <p>Etes-vous bien sûr de vouloir supprimer cet utilisateur ? (ce choix est irréversible)</p>
              <input type="submit" name="submitted" value="OUI">
            </form>
          <?php } ?>
          <?php if (!empty($_POST['submitted'])) { ?>
            <h5 class="ajout-valide">Vous avez supprimé cet utilisateur, il n'apparaitra donc plus.</h1>
          <?php } ?>
        </div>
    </div>
</div>

<?php include('footer_back.php');
