<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php
$error=array();

// soumission formulaire
if(!empty($_POST['submitted'])) {

  //faille xss
  $email    = trim(strip_tags($_POST['email']));
  $password = trim(strip_tags($_POST['password']));

  //verification login/password existant

  $sql = "SELECT * FROM  WHERE  email= :email OR password = :password";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':email', $email, PDO::PARAM_STR);
        $query -> execute();
  $user = $query -> fetch();

  if(!empty($user)) {
    if(!password_verify($password,$user['password'])) {
    $error ['password'] = 'Mot de passe incorrect';
    }
  }else{
  $error['login'] = 'Veuillez vous inscrire';
  }

  if(count($error) == 0) {
    $_SESSION['user'] = array(
      'id' => $user['id'],
      'pseudo' => $user['pseudo'],
      'email' => $user['email'],
      'role' => $user['role'],
      'ip' => $_SERVER['REMOTE_ADDR']
    );
    // print_r($_SESSION);
    header('Location:index.php');
  }

}

?>



<?php include('inc/header.php'); ?>
<div class="clear"></div>
<!-- formulaire de connexion -->
<div class="wrap">
<form action="">
  <h2 >Connexion</h2>
  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="exemple@gmail.com" name="email" value="">

    <label for="mdp"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer votre mot de passe" name="mdp" >

    <input type="submit" name ="submitted">Se connecter</input>

  </div>

</form>
</div>

<?php include('inc/footer.php'); ?>
