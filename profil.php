<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php include('inc/request.php'); ?>
<?php

if (isLogged()){
 //faire appel à la fonction getUser
 $user =getUser();
}else{
  header('Location: 404.php');
}
 ?>
<?php include('inc/header.php'); ?>
<div class="wrap">
  <table>
    <tr>
      <td>Paramètres du compte</td>
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
      <td>Age:</td>
      <td><?php if($user['age'] == 0){echo 'Age non renseigner'; }else{echo $user['age']; }; ?></td>
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
 <a href="modification.php">Modifier mon mot de passe</a>
</div>

<?php include('inc/footer.php'); ?>
