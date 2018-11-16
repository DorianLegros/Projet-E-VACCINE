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

        $sql="SELECT email, token FROM v2_user WHERE email= :email";
            $query = $pdo -> prepare($sql);
            $query -> bindValue('email', $email, PDO::PARAM_STR);
            $query -> execute();
            $user = $query -> fetch();
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
<div class="wrap">
<form class="forgotten_pass" action="" method="post">


    <div class="numlotemail">


    <label for="Email">Email</label>
    <span class="error"><?php if(!empty($error['email'])) {echo $error['email']; } ?></span>
    <input type="text" name="email" placeholder="Email *" class="" value="<?php if(!empty($_POST['email'])) {echo $_POST['email']; } ?>">

      <div class="containerBtn">
        <input class="btnConfirm" type="submit" name="submitted" value="Modifier votre mot de passe">
      </div>
    </div>
</form>
</div>



<?php include('inc/footer.php'); ?>
