<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>






<?php include('inc/header.php'); ?>
<!--  formulaire pour avoir un carnet -->
<div class="wrap">
  <form action="" method="post">
    <div class="container">
      <h2>Formulaire du carnet de vaccination</h2>

      <label for="login">Prénom ou pseudo</label>
      <input type="text" placeholder="Entrer votre identifiant" name="login" value="<?php if(!empty($_POST['login'])) { echo $_POST['login']; } ?>" >

      <label for="email">Age</label>
      <input type="text" placeholder="exemple@gmail.com" name="email" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>">

      <label for="mdp">Genre</label>
      <input type="password" placeholder="Entrer votre mot de passe" name="mdp" value="" >



      <div class="container">
       <input type="submit" name="submitted" class="signup" value="Valider"></input>

     </div>
    </div>
  </form>
</div>
<a href="admin/dashboard.php">Admin</a>

<?php include('inc/footer.php'); ?>
