<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('inc/request.php'); ?>
<?php include('newsletter.php'); ?>



<?php

$error = array();

if(!empty($_POST['submitted'])) {

   //faille XSS
   $email = trim(strip_tags($_POST['email']));
   //validation Email
   if (!empty($email)) {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error['email'] = 'Veuillez saisir un email valide.';
      } else{
        $user = getForgotten();
        if(!empty($user)) {
          //envoi d'un mail avec reinitialisation du mdp
          echo '<p>Veuillez cliquer sur le lien ci-dessous</p>';
          //urlencode devra etre decoder pour le new_pass
          echo '<a href="new_pass.php?email=' . $user['email'] . '&token=' . urlencode($user['token']) . '">Ici</a>';
        } else{
          $error['email'] = 'Cet email n\'existe pas';
          }
        }
    }
}
?>


<?php include('inc/header.php'); ?>

<form class="forgotten_pass" action="" method="post">
    <span class="error"><?php if(!empty($error['email'])) {echo $error['email']; } ?></span>
    <input type="text" name="email" placeholder="email *" value="<?php if(!empty($_POST['email'])) {echo $_POST['email']; } ?>">

    <div class="containerBtn">
      <input class="btnConfirm" type="submit" name="submitted" value="Modifier votre mot de passe">
    </div>
</form>



<?php include('inc/footer.php'); ?>
