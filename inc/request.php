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

function getIdUser()
{
  global $pdo;
  $sql = "SELECT * FROM v2_carnets WHERE id = '$id'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $verifIdUser = $query -> fetch();
  return $verifIdUser;
}
