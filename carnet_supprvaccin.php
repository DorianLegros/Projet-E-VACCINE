<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php include('inc/request.php'); ?>
<?php include('newsletter.php'); ?>

<?php

$idUser = $_SESSION['user']['id'];
$verifIdUser = getVerifIdUser();

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $verifId = getVerifId();
    if (!empty($verifId)) {
      if ($verifIdUser['id_user'] != $idUser) {
        header('Location: 403.php');
      }
      if (!empty($_POST['submitted'])) {
        DeleteVaccin();
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
              <div class="center">


              <p><span class="error">Attention</span> ! Etes-vous bien sûr de vouloir supprimer ce vaccin de votre carnet ? (ce choix est irréversible)</p>
              </div>
              <div class="containerBtn">


              <input class="btnConfirm" type="submit" name="submitted" value="OUI">
              <input class="btnConfirm" type="submit" name="cancel" value="NON">
                </div>
            </form>
          <?php } ?>
</div>

<?php include('inc/footer.php');
