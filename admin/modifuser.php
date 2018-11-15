<?php
  include '../inc/fonction.php';
  include '../inc/pdo.php';
?>
<?php
$errors = array();

if (!empty($_GET['id'] && is_numeric($_GET['id'])) && $_GET['id'] != 2) {
  $id = $_GET['id'];
  $idVaccin = trim(strip_tags($_GET['id']));
  $sql = "SELECT * FROM v2_user WHERE id = $id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $verifId = $query -> fetch();
  if (!empty($verifId)) {


    $sql = "SELECT * FROM v2_user WHERE id=$idVaccin";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $vaccin = $query -> fetch();

    if (!empty($_POST['submitted'])) {
      $roleUser = $_POST['role'];

      if(count($errors) == 0) {
        $requet = $vaccin['id'];
        $sql = "UPDATE v2_user SET status= '$roleUser', updated_at=NOW() WHERE id=$requet";
        $query = $pdo -> prepare($sql);
        $query -> execute();
      }
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

<?php include 'header_back.php'; ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php if (!empty($_POST['submitted']) && count($errors) == 0) { ?>
            <p class="text-success">Votre utilisateur a bien été modifié ! </p>
          <?php } ?>
          <form class="" action="" method="post">
            <ul>
              <p class="alert alert-info">Utilisateur: <?= $verifId['login']; ?> </p>
              <select class="form-control" name="role">
                <option value="admin">Admin</option>
                <option value="user" selected="selected">User</option>
              </select>
              <p class="text-danger">Attention ! n'attribuez pas le rôle admin à n'importe qui !</p>
              <li><input class="btn btn-primary" type="submit" name="submitted" value="Valider"></li>
            </ul>
          </form>
        </div>
      </div>
  </div>

<?php
  include 'footer_back.php';
?>
