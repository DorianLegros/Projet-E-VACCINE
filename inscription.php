<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('newsletter.php') ?>
<?php
$error = array();
$success = false;
 // soumission du formulaire
if (!empty($_POST['submitted'])) {
  // Faille XSS
  $login    = trim(strip_tags($_POST['login']));
  $email    = trim(strip_tags($_POST['email']));
  $mdp    = trim(strip_tags($_POST['mdp']));
  $mdp2    = trim(strip_tags($_POST['mdp2']));

  // validation des champs
  //login
  if(!empty($login)){
    if(strlen($login)<3){
      $error['login']='Votre identifiant est trop court (3 car. minimum).';

    }elseif (strlen($login)>30) {
      $error['login']='Votre identifiant est trop long (30 car. maximum).';
    }else {
      //requete sql
      $sql = "SELECT login FROM v2_user WHERE login = :login";
      $query = $pdo->prepare($sql);
      $query->bindValue(':login',$login,PDO::PARAM_STR);
      $query->execute();
      $userLogin = $query->fetch();
      if(!empty($userLogin)) {
        $error['login'] = 'Cet identifiant existe déjà';
      }

    }
  }else {
    $error['login']='Veuillez renseigner ce champ';
  }

  //Email
  if (!empty($email)) {
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

    } else {
      // la requete sql
      $sql = "SELECT email FROM v2_user WHERE email = :email";
      $query = $pdo->prepare($sql);
      $query->bindValue(':email',$email,PDO::PARAM_STR);
      $query->execute();
      $userEmail = $query->fetch();
      if(!empty($userEmail)) {
          $error['email'] = 'Adresse email déjà utilisé';
      }
    }
} else {
  $error['email'] = 'Veuillez renseigner un email';
}

// mot de passe
if(!empty($mdp) && !empty($mdp2)) {
      if($mdp != $mdp2) {
        $error['mdp'] = 'Vos mot de passe sont différents.';
      } elseif(strlen($mdp) < 5 ) {
        $error['mdp'] = 'Votre mot de passe est trop court (5 car. minimum).';
      } elseif(strlen($mdp) > 255 ) {
        $error['mdp'] = 'Votre mot de passe est trop court (255 car. maximum).';
      }
} else {
  $error['mdp'] = 'Veuillez renseigner un mot de passe.';
}

//vérification si la case est cochée
if(empty($_POST['check'])){
    $error['check'] = 'Vous n\'avez pas coché la case.';}



// Si pas d'erreur j'insert dans la base de donnée
if(count($error) == 0) {
  $success = true;
  $hash = password_hash($mdp,PASSWORD_DEFAULT);
  $token = generateRandomString(120);
  // insert into

  $sql = "INSERT INTO v2_user (login,email,mdp,status,token,created_at)
          VALUES (:login,:email,:mdp,'user','$token', NOW())";
  $query = $pdo->prepare($sql);
  $query->bindValue(':login',$login,PDO::PARAM_STR);
  $query->bindValue(':email',$email,PDO::PARAM_STR);
  $query->bindValue(':mdp',$hash,PDO::PARAM_STR);
  $query->execute();
  header('Location: index.php');

  }
}

?>

<?php include('inc/header.php'); ?>

<!-- formulaire d'inscription -->
<div class="wrap">
<form action="" method="post">
  <div class="container">
    <h2>Inscription</h2>

    <label for="login">Identifiant</label>
    <span class="error"><?php if(!empty($error['login'])) {echo $error['login']; }  ?></span>
    <input type="text" placeholder="Entrez votre identifiant" name="login" value="<?php if(!empty($_POST['login'])) { echo $_POST['login']; } ?>" >

    <label for="email">Email</label>
    <span class="error"><?php if(!empty($error['email'])) {echo $error['email']; }  ?></span>
    <input type="text" placeholder="exemple@gmail.com" name="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">

    <label for="mdp">Mot de passe</label>
    <span class="error"><?php if(!empty($error['mdp'])) {echo $error['mdp']; }  ?></span>
    <input type="password" placeholder="Entrer votre mot de passe" name="mdp" value="" >

    <label for="mdp2">Confirmer le mot de passe</label>
    <input type="password" placeholder="Confirmer votre mot de passe" name="mdp2" value="" >

    <span class="error"><?php if(!empty($error['check'])) {echo $error['check']; }  ?></span>
    <input type="checkbox" name="check">J'ai lu et j'accepte les <a href="term.php" target="_blank">Terms & Conditions</a>.</input>

      <div class="containerBtn">
        <input class="btnConfirm" type="submit" name="submitted" class="connexion" value="S'inscrire"></input>

      </div>

  </div>
</form>
    <div class="containerBtn">

      <a href="connexion.php"><input class="btnConfirm" type="submit" name="submit" class="sinscrire" value="Se connecter"></input></a>
    </div>
</div>

<?php include('inc/footer.php'); ?>
