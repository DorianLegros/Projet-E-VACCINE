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
    if(!empty($_SESSION['user']) && !empty($_SESSION['user']['id']) && !empty($_SESSION['user']['login']) && !empty($_SESSION['user']['email']) && !empty($_SESSION['user']['status'])  &&
    !empty($_SESSION['user']['ip']))  {
      if($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
        return true;
      }
    }
   return false;
}

function isLoggedD($nomSession, $aSession, $bSession, $cSession, $dSession, $eSession)
{
  if (!empty($_SESSION[$nomSession][$aSession])) {
    if (!empty($_SESSION[$nomSession][$bSession])) {
      if (!empty($_SESSION[$nomSession][$cSession])) {
        if (!empty($_SESSION[$nomSession][$dSession])) {
          if (!empty($_SESSION[$nomSession][$eSession])) {
            return TRUE;
          }
        }
      }
    }
  }
  return FALSE;
}

function isAdminD($nomSession, $aSession, $bSession, $cSession, $dSession, $eSession)
{
  if (isLoggedD($nomSession, $aSession, $bSession, $cSession, $dSession, $eSession)) {
    if ($_SESSION[$nomSession][$dSession] == 'admin') {
      return TRUE;
    }
  }
  return FALSE;
}

function verifTexteFormulaire($errors, $champ, $min, $max, $key) {

  //validation du formulaire (auteur)
  if(!empty($champ)) {
    $nbCharChamp = strlen($champ);
    if ($nbCharChamp >= $min && $nbCharChamp <= $max) {
      // code...
    }
    elseif ($nbCharChamp < $min) {
      $errors[$key] = 'Veuillez écrire au moins ' . $min . ' caractères.';
    }
    elseif ($nbCharChamp > $max) {
      $errors[$key] = 'Veuillez écrire moins de ' . $max . ' caractères.';
    }
  }
  else {
    $errors[$key] = 'Veuillez renseigner ce champ.';
  }

  return $errors;
}
