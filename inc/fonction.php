<?php
function br() {
echo '<br>';
}

function debug($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}


//fonction pour generer un token
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//fonction pour etre connecté
function isLogged()
{
    if(!empty($_SESSION['user']) && !empty($_SESSION['user']['id']) && !empty($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['email']) && !empty($_SESSION['user']['role'])  &&
    !empty($_SESSION['user']['ip']))  {
      if($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
        return true;
      }
    }
   return false;
}

function isAdmin($nomSession, $aSession, $bSession, $cSession, $dSession, $eSession)
{
  if (isLogged()) {
    if ($_SESSION[$nomSession][$dSession] == 'admin') {
      return TRUE;
    }
  }
  return FALSE;
}  ?>
