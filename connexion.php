
  <?php include('inc/pdo.php'); ?>
  <?php include('inc/fonction.php'); ?>
  <?php

  $error=array();

  // soumission formulaire
  if(!empty($_POST['submitted'])) {

    //faille xss
    $login    = trim(strip_tags($_POST['login']));
    $mdp      = trim(strip_tags($_POST['mdp']));

    //verification login/password existant

    $sql = "SELECT * FROM v2_user WHERE  login = :login OR email = :login";
          $query = $pdo -> prepare($sql);
          $query -> bindValue(':login', $login, PDO :: PARAM_STR);
          $query -> execute();
    $user = $query -> fetch();

    if(!empty($user)) {
      if(!password_verify($mdp,$user['mdp'])) {
      $error ['mdp'] = 'Mot de passe incorrect';
      }
    }else{
    $error['login'] = 'Veuillez vous inscrire';
    }
            // cookie

if(!empty($_POST['remember'])) {
  setcookie('auth', $user['id'] . '-----' . sha1($user['login'] . $user['mdp']), time() + 3600 * 24 * 3, '/', 'localhost', false, true);
}

    if(count($error) == 0) {
      $_SESSION['user'] = array(
        'id' => $user['id'],
        'login' => $user['login'],
        'email' => $user['email'],
        'status' => $user['status'],
        'ip' => $_SERVER['REMOTE_ADDR']
      );
      // print_r($_SESSION);
      header('Location: index.php');
    }

  }
  // debug($error);
  ?>

  <?php include('inc/header.php'); ?>
  <div class="clear"></div>
  <!-- formulaire de connexion -->
  <div class="wrap">
  <form action="" class="connexion" method="post">
    <h2 >Connexion</h2>
    <div class="container">

      <label for="login"><b>Login</b></label>
      <span class="error"><?php if(!empty($error['login'])) {echo $error['login']; } ?></span>
      <input type="text" placeholder="Pseudo ou mail *" value="<?php if(!empty($_POST['login'])) { echo $_POST['login'] ;} ?>" name="login">

      <label for="mdp"><b>Mot de passe</b></label>
      <span class="error"><?php if(!empty($error['mdp'])) {echo $error['mdp']; } ?></span>
      <input type="password" placeholder="Entrer votre mot de passe" name="mdp" >

      <div class="container">
        <label><input type="checkbox" name="remember" value="yes">Se souvenir de moi<br></label>
       <input type="submit" name="submitted" class="connexion" value="Se connecter"></input>

       <span class="psw"><a href="forgotten_pass.php">Mot de passe oublié?</a></span>
     </div>
    </div>
  </form>
      <a href="inscription.php"><input type="submit" name"submit" class="sinscrire" value="S'inscrire"></input></a>
  </div>

  <?php include('inc/footer.php'); ?>
