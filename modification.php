<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('inc/request.php'); ?>
<?php include('newsletter.php') ?>
<?php $error=array();


if(isLogged()) {
 // soumission formulaire
  if(!empty($_POST['submitted'])) {

      //faille xss Processor
      $mdp = trim(strip_tags($_POST['mdp']));
      $newmdp = trim(strip_tags($_POST['newmdp']));
      $newmdp2 = trim(strip_tags($_POST['newmdp2']));
      //faire appel à la fonction getUser
      $user = getUser();

        if(!empty($user)) {
          if(!password_verify($mdp,$user['mdp'])) {
            $error ['mdp'] = 'Mot de passe inccorect';
          }  else {

              if(!empty($newmdp) && !empty($newmdp2)) {
                if($newmdp != $newmdp2) {
                  $error['newmdp'] = 'Vos mots de passe sont differents';
                }elseif (strlen($newmdp) < 5) {
                  $error['newmdp'] = 'Votre mot de passe est trop court';
                }
              }else {
                $error['newmdp'] = 'Veuillez renseigner un mot de passe';
              }

              if (count($error) == 0){
                $hash = password_hash($newmdp, PASSWORD_DEFAULT);
                $sql = "UPDATE v2_user SET mdp = :mdp WHERE id = :id";
                $query = $pdo -> prepare($sql);
                $query -> bindValue(':mdp',$hash,PDO::PARAM_STR);
                // $query -> bindValue(':newmdp', $newmdp, PDO::PARAM_STR);
                $query -> bindValue(':id', $user ['id'], pdo::PARAM_INT);

                $query -> execute();

                // redirection
                header('Location: carnet.php');
              }

           }
        }

  }
} else {
header('Location: 403.php');
}

?>


<?php include('inc/header.php'); ?>


<form class="wrap" action="" method="post">
  <label for="">Votre ancien mot de passe</label>
  <span class="error"><?php if(!empty($error['mdp'])) {echo $error['mdp']; } ?></span>
  <input type="password" name="mdp" value="">

  <label for="">Nouveau mot de passe</label>
  <span class="error"><?php if(!empty($error['newmdp'])) {echo $error['newmdp']; } ?></span>
  <input type="password" name="newmdp" value="">

  <label for="">Confirmer votre nouveau mot de passe</label>
  <span class="error"><?php if(!empty($error['newmdp'])) {echo $error['newmdp']; } ?></span>
  <input type="password" name="newmdp2" value="">

  <input class="btnConfirm" type="submit" name="submitted" value="Confirmer">
</form>

<?php



include('inc/footer.php'); ?>
