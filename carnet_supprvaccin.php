<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>

<?php

$idUser = $_SESSION['user']['id'];
$id = $_GET['id'];

$sql = "SELECT * FROM v2_carnets WHERE id = '$id'";
$query = $pdo -> prepare($sql);
$query -> execute();
$verifIdUser = $query -> fetch();

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $sql = "SELECT id FROM v2_carnets WHERE id = $id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $verifId = $query -> fetch();
    if (!empty($verifId)) {
      if ($verifIdUser['id_user'] != $idUser) {
        header('Location: 403.php');
      }
      if (!empty($_POST['submitted'])) {
        $sql = "DELETE FROM v2_carnets WHERE id = $id";
        $query = $pdo -> prepare($sql);
        $query -> execute();
        header('Location: carnet.php');
      }
      if (!empty($_POST['cancel'])) {
        header('Location: carnet.php');
      }
    }
    else {
      header('Location: 404.php');
    }
}
else {
  header('Location: 404.php');
}
?>

<?php include('inc/header.php'); ?>
<div class="wrap">
          <?php if (empty($_POST['submitted'])) { ?>
            <form class="" action="" method="post">
              <p><span class="error">Attention</span> ! Etes-vous bien sûr de vouloir supprimer ce vaccin de votre carnet ? (ce choix est irréversible)</p>
              <input class="btnConfirm" type="submit" name="submitted" value="OUI">
              <input class="btnConfirm" type="submit" name="cancel" value="NON">
            </form>
          <?php } ?>
</div>

<?php include('inc/footer.php');
