<?php include('inc/pdo.php') ?>
<?php include('inc/fonction.php') ?>
<?php include('inc/request.php') ?>
<?php include('newsletter.php') ?>

<?php
$error=array();

if (!empty($_GET['email']) && !empty($_GET['token'])) {
    //faire appel à la fonction getModifPass()
          $user = getModifPass();
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
                  //faire appel à la fonction pour modifier le mot de passe
                  getUpdate();
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

<form class="wrap new_password" action="" method="post">
  <label for="">Nouveau mot de passe *</label>
  <input type="password" name="mdp" value="">

  <label for="">Confirmer votre nouveau mot de passe *</label>
  <input type="password" name="mdp2" value="">

  <input class="btnConfirm" type="submit" name="submitted" value="Confirmer">
</form>

<?php include('inc/footer.php'); ?>
