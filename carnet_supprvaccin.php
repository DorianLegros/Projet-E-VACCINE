<?php include('inc/fonction.php'); ?>
<?php include('inc/pdo.php'); ?>
<?php include('inc/request.php'); ?>

<?php

$idUser = $_SESSION['user']['id'];
$id = $_GET['id'];


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
              <p><span class="error">Attention</span> ! Etes-vous bien sûr de vouloir supprimer ce vaccin de votre carnet ? (ce choix est irréversible)</p>
              <input type="submit" name="submitted" value="OUI">
              <input type="submit" name="cancel" value="NON">
            </form>
          <?php } ?>
</div>

<?php include('inc/footer.php');
