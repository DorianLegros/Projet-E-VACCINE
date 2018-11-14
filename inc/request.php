<?php
// get all vaccins
function getAllvaccins()
{
  global $pdo;
  $sql = "SELECT * FROM v2_vaccins";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $tableVaccins = $query -> fetchAll();
  return $tableVaccins;
}

//fonction pour récupérer les données du carnet
function getCarnet()
{
  global $pdo;
  $sql = "SELECT * FROM v2_vaccins
        LEFT JOIN v2_carnets ON v2_carnets.id_vaccins = v2_vaccins.id
        WHERE v2_carnets.id_user = :id ORDER BY datevaccin ASC";
   $query = $pdo -> prepare($sql);
   $query->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_INT);
   $query -> execute();
   $carnets = $query -> fetchAll();
   return $carnets;
}
// fonction pour récupérer les données du user
function getUser()
{global $pdo;
$sql = "SELECT * FROM v2_user WHERE id =:id ";
      $query = $pdo -> prepare($sql);
      $query -> bindValue(':id', $_SESSION['user']['id'], PDO::PARAM_STR);
      $query -> execute();
      $user = $query -> fetch();
      return $user;
}
//fonction pour récupérer l'utilisateur d'un email
function getModifPass(){
  global $pdo;
  $sql = "SELECT * FROM v2_user WHERE token=:token AND email=:email";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':email', urldecode($_GET['email']), pdo::PARAM_STR);
        $query -> bindValue(':token', urldecode($_GET['token']), pdo::PARAM_STR);
        $query -> execute();
        $user = $query->fetch();
        return $user;
}
//fonction pour modifier le mot de passe
function getUpdate(){
  global $pdo;
  $hash = password_hash(trim(strip_tags($_POST['mdp'])),PASSWORD_DEFAULT);
  $token = generateRandomString(120);
  $sql = "UPDATE v2_user SET mdp=:mdp, token=:token WHERE id=:id";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':mdp',$hash,PDO::PARAM_STR);
        $query -> bindValue(':token', $token, pdo::PARAM_STR);
        $query -> bindValue(':id', $user ['id'], pdo::PARAM_STR);
        $query -> execute();
}
//fonction de connexion
function getConnexion(){
  global $pdo;
  $login    = trim(strip_tags($_POST['login']));
  $sql = "SELECT * FROM v2_user WHERE  login = :login OR email = :login";
        $query = $pdo -> prepare($sql);
        $query -> bindValue(':login', $login, PDO :: PARAM_STR);
        $query -> execute();
  $user = $query -> fetch();
  return $user;
}
//fonction pour le mot de passe oublié
function getForgotten(){
  global $pdo;
  $email = trim(strip_tags($_POST['email']));
  $sql="SELECT email, token FROM v2_user WHERE email= :email";
      $query = $pdo -> prepare($sql);
      $query -> bindValue('email', $email, PDO::PARAM_STR);
      $query -> execute();
      $user = $query -> fetch();
      return $user;
}
//fonction pour récupérer id user
function getVerifIdUser()
{
  global $pdo;
  $id = $_GET['id'];
  $sql = "SELECT * FROM v2_carnets WHERE id = '$id'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $verifIdUser = $query -> fetch();
  return $verifIdUser;
}
//fonction pour récupérer id
function getVerifId(){
 global $pdo;
$sql = "SELECT id FROM v2_carnets WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$verifId = $query -> fetch();
return $verifId;
}
//fonction de suppression 
 function DeleteVaccin(){
   global $pdo;
$sql = "DELETE FROM v2_carnets WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
 }
//
// function (){
//   global $pdo;
//
// }
