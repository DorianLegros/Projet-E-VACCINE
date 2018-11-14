<?php include('inc/pdo.php') ?>
<?php include('inc/fonction.php') ?>

<?php
$error=array();

if (!empty($_GET['email']) && !empty($_GET['token'])) {
    $email = urldecode($_GET['email']);
    $token = urldecode($_GET['token']);

    // requete

    $sql = "SELECT * FROM v2_user WHERE token=:token AND email=:email";
          $query = $pdo -> prepare($sql);
          $query -> bindValue(':email', $email, pdo::PARAM_STR);
          $query -> bindValue(':token', $token, pdo::PARAM_STR);
          $query -> execute();
          $user = $query->fetch();

          if(!empty($user)) {
            //soumission Formulaire
            if(!empty($_POST['submitted'])) {
              // failles XSS
              $mdp = trim(strip_tags($_POST['mdp']));
              $mdp2 = trim(strip_tags($_POST['mdp2']));

                if(!empty($mdp) && !empty ($mdp2)) {
                  if($mdp != $mdp2) {
                    $error['mdp'] = 'Vos mots de passe sont differents.';
                  }elseif (strlen($mdp) < 5) {
                    $error['mdp'] = 'Votre mot de passe est trop court.';
                   }
                }else {
                  $error['mdp'] = 'Veuillez renseigner un mot de passe.';
                }

                if (count($error) == 0) {
                  $hash = password_hash($mdp,PASSWORD_DEFAULT);
                  $token = generateRandomString(120);
                  $sql = "UPDATE v2_user SET mdp=:mdp, token=:token WHERE id=:id";
                        $query = $pdo -> prepare($sql);
                        $query -> bindValue(':mdp',$hash,PDO::PARAM_STR);
                        $query -> bindValue(':token', $token, pdo::PARAM_STR);
                        $query -> bindValue(':id', $user ['id'], pdo::PARAM_STR);
                        $query -> execute();

                        // redirection
                        header('Location: connexion.php');
                }
            }
          } else {
            header('Location: 404.php');
          }
}
  else{
    header('Location: 404.php');
  }

 ?>

 <?php include('inc/header.php'); ?>

<form class="new_password" action="" method="post">
  <label for="">Nouveau mot de passe *</label>
  <input type="password" name="mdp" value="">

  <label for="">Confirmer votre nouveau mot de passe *</label>
  <input type="password" name="mdp2" value="">

  <input type="submit" name="submitted" value="Confirmer">
</form>

<?php include('inc/footer.php'); ?>
