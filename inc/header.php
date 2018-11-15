<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-VACCINE</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="asset/slicknav/slicknav.css" />
    <link rel="icon" href="asset/img/logo.png" />
  </head>
  <body>
    <header id="header">
      <div class="wrap">
        <div class="logo">
          <a href="index.php"><img src="asset/img/logo.png" alt="Logo E-VACCINE"></a>

        </div>
        <div class="titre">
          <h1>Parce que votre santé</h1>
          <h2>c'est notre priorité</h2>
        </div>
        <div class="clear"></div>
        <nav class="menunav">
          <ul id="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="vaccins.php">Vaccins</a></li>
            <li><a href="infos.php">Contact</a></li>


            <?php if(isLogged() && !isAdminD('user', 'id', 'login', 'email', 'status', 'ip')) {?>
            <li><abbr title="Se déconnecter"><a href="deconnexion.php" class="dernierlien liendeco"> <i class="fa fa-sign-out fa-fw"></i> </a></abbr></li>
            <li><a href="carnet.php" class="dernierlien">Mon Compte</a></li>
          <?php }
          elseif (isAdminD('user', 'id', 'login', 'email', 'status', 'ip')) { ?>

            <li><abbr title="Se déconnecter"><a href="deconnexion.php" class="dernierlien liendeco"> <i class="fa fa-sign-out fa-fw"></i> </a></abbr></li>
            <li><abbr title="Interface Administrateur"><a href="admin/dashboard.php" class="dernierlien liendeco "> <i class= "fa fa-wrench fa-fw"></i></a></abbr> </li>
            <li><a href="carnet.php" class="dernierlien">Mon Compte</a></li>
          <?php }
          else { ?>
            <li><a href="connexion.php" class="dernierlien">Connexion</a></li> <?php } ?>

          </ul>
        </nav>
      </div>
      <div class="clear"></div>

    </header>
