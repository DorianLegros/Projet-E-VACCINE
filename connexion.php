
  <?php include('inc/pdo.php'); ?>
  <?php include('inc/fonction.php'); ?>
  <?php include('inc/request.php'); ?>
  <?php include('newsletter.php'); ?>
  <?php

  $error=array();

  // soumission formulaire
  if(!empty($_POST['submitted'])) {
    //faille xss
    $mdp      = trim(strip_tags($_POST['mdp']));
    //verification login/password existant
   $user = getConnexion();

    if(!empty($user)) {
      if(!password_verify($mdp,$user['mdp'])) {
      $error ['mdp'] = 'Mot de passe incorrect';
      }
    }else{
    $error['login'] = 'Veuillez vous inscrire';
    }

    if(count($error) == 0) {
      $_SESSION['user'] = array(
        'id' => $user['id'],
        'login' => $user['login'],
        'email' => $user['email'],
        'status' => $user['status'],
        'ip' => $_SERVER['REMOTE_ADDR']
      );
      header('Location: index.php');
    }

  }
  ?>

  <?php include('inc/header.php'); ?>
  <div class="clear"></div>
  <!-- formulaire de connexion -->
  <div class="wrap">

  <form action="" class="connexion" method="post">
    <div class="container">


    <h2>Connexion</h2>
    <div class="container">

      <label for="login"><b>Login</b></label>
      <span class="error"><?php if(!empty($error['login'])) {echo $error['login']; } ?></span>
      <input type="text" placeholder="Pseudo ou email" value="<?php if(!empty($_POST['login'])) { echo $_POST['login'] ;} ?>" name="login">

      <label for="mdp"><b>Mot de passe</b></label>
      <span class="error"><?php if(!empty($error['mdp'])) {echo $error['mdp']; } ?></span>
      <input type="password" placeholder="Saisissez votre mot de passe" name="mdp" >

      <div class="container">
        <div class="containerBtn">
          <input class="btnConfirm" type="submit" name="submitted"  value="Se connecter"></input>
        </div>

       <span class="pswfrg"><a href="forgotten_pass.php">Mot de passe oublié?</a></span>
     </div>
    </div>
    </div>
  </form>

    <div class="containerBtn">
      <a href="inscription.php"><input class="btnInsc" type="submit" name"submit" class="sinscrire" value="S'inscrire"></input></a>
    </div>
  </div>

  <?php include('inc/footer.php'); ?>
