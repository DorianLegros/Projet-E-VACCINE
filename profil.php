<?php include('inc/pdo.php'); ?>
<?php include('inc/fonction.php'); ?>
<?php

$error = array();


if (isLogged()){
 $id = $_SESSION['user']['id'];
 if (!empty($_POST['submitted'])) {
    // securite XSS
    $age = trim(strip_tags($_POST['age']));
   //verif age
    $sql = "SELECT age FROM v2_user WHERE id=:id";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $user = $query -> fetch();

      if(count($error) == 0){
        $sql = "INSERT INTO v2_user (age, updated_at) VALUES ('$age', NOW())";
              $query = $pdo->prepare($sql);
              $query->bindValue(':login',$age,PDO::PARAM_STR);
              $query->execute();
      }
  }
}

if (isLogged()){
   $id = $_SESSION['user']['id'];
 //requette pour récupérer les Informations de l'utilisateur
   $sql = "SELECT * FROM v2_user WHERE id = :id ";
   $query = $pdo -> prepare($sql);
   $query->bindValue(':id',$id,PDO::PARAM_STR);
   $query -> execute();
   $user = $query -> fetch();

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
      <td>Age:
        <input type="text" class="age" name="" placeholder="Renseigner votre age" value="">
        <input type="submit" name="submited" value="Confirmer"></td>

      <td><?php if($user['age'] == 0){echo $user['age']; }else{echo $user['age']; }; ?></td>
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
