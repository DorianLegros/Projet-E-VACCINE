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
 $id = $_GET['id'];
$sql = "SELECT id FROM v2_carnets WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
$verifId = $query -> fetch();
return $verifId;
}
//fonction de suppression
 function DeleteVaccin(){
   global $pdo;
   $id = $_GET['id'];
$sql = "DELETE FROM v2_carnets WHERE id = $id";
$query = $pdo -> prepare($sql);
$query -> execute();
 }
//
function getVaccin(){
  global $pdo;
  $sql = "SELECT nomvaccin FROM v2_vaccins";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $listeVaccins = $query -> fetchAll();
  return $listeVaccins;
}
//fonction update vaccin
 function UpdateVaccin(){
   global $pdo;
   $id = $_GET['id'];

   $sql = "UPDATE v2_carnets SET datevaccin='$datevaccin', rappelvaccin='$rappelvaccin', etat='$etatvaccin', num_lot=:Numlot, updated_at=NOW()
   WHERE id='$id'";
   $query = $pdo -> prepare($sql);
   $query -> bindValue(':Numlot', $numeroLot, PDO::PARAM_STR);
   $query -> execute();
 }

 function Carnet()
 {
   global $pdo;
   $idCarnet = trim(strip_tags($_GET['id']));
   $sql = "SELECT * FROM v2_carnets WHERE id = '$idCarnet'";
   $query = $pdo -> prepare($sql);
   $query -> execute();
   $carnet = $query -> fetch();
   return $carnet;
 }

 function getIdVaccin()
 {
   global $pdo;
   $nomVaccin = $_POST['nom'];
   $sql = "SELECT id FROM v2_vaccins WHERE nomvaccin='$nomVaccin'";
   $query = $pdo -> prepare($sql);
   $query -> execute();
   $idVaccins = $query -> fetch();
   return $idVaccins;
 }


  function updateCarnet()
  {
    global $pdo;
    $datevaccin = trim(strip_tags($_POST['date']));
    $numeroLot = trim(strip_tags($_POST['numlot']));
    $rappelvaccin = $_POST['rappel'];
    $etatvaccin = $_POST['etat'];
    $id = $_GET['id'];

    $sql = "UPDATE v2_carnets SET datevaccin='$datevaccin', rappelvaccin='$rappelvaccin', etat='$etatvaccin', num_lot=:Numlot, updated_at=NOW()
    WHERE id='$id'";
    $query = $pdo -> prepare($sql);
    $query -> bindValue(':Numlot', $numeroLot, PDO::PARAM_STR);
    $query -> execute();
  }

  function addVaccin()
  {
    global $pdo;
    $numeroLot = trim(strip_tags($_POST['numlot']));
    $datevaccin = trim(strip_tags($_POST['date']));
    $rappelvaccin = $_POST['rappel'];
    $iduser = $_SESSION['user']['id'];
    $idVaccins = getIdVaccin();
    $idvaccin = $idVaccins['id'];

    $sql = "INSERT INTO v2_carnets (datevaccin, rappelvaccin, etat, id_user, id_vaccins, num_lot, created_at)
    VALUES ('$datevaccin', '$rappelvaccin', 'pasfait', '$iduser', '$idvaccin', :Numlot, NOW())";
    $query = $pdo -> prepare($sql);
    $query -> bindValue(':Numlot', $numeroLot, PDO::PARAM_STR);
    $query -> execute();
  }
