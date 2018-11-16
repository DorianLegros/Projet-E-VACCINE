<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('inc/request.php'); ?>
<?php include('newsletter.php'); ?>
<?php


if (isLogged()){
  //fonction pour récupérer les informations de l'utilisateurs
  $user = getUser();

}else{
  header('Location: 404.php');
}
 ?>
<?php include('inc/header.php'); ?>
<div class="wrap">
  <div class="liens-paramcompte">
    <a class="lien-paracompte" href="carnet.php">Carnet</a>
    <a class="lien-paracompte" href="profil.php">Paramètres</a>
  </div>
  <div class="clear">

  </div>
  <form class="sans-margin" action="" method="post">
  <table>
    <tr>
      <td class="maj">Paramètres du compte</td>
    </tr>

    <tr>
      <td>Login:</td>
      <td><?php echo $user['login']; ?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $user['email']; ?></td>
    </tr>
    <tr>
      <td>Mot de passe: </td>
      <td>&bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull; &bull;</td>
    </tr>
    <tr>
      <td>Date de création:</td>
      <td><?php echo $user['created_at']; ?></td>
    </tr>
    <tr>
      <td>Dernière modification:</td>
      <td><?php echo $user['updated_at']; ?></td>
    </tr>
  </table>
 <a href="modification.php" class="modifmdp">Modifier mon mot de passe</a>
</div>

<?php include('inc/footer.php'); ?>
