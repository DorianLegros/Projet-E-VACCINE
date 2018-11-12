<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-VACCINE</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
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
        <nav class="menu">
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="vaccins.php">Vaccins</a></li>
            <li><a href="#">Informations</a></li>

            <?php if(isLogged()) {?>
            <li><a href="deconnexion.php" class="dernierlien">Deconnexion</a></li>
            <li class="messageAcceuil">Bonjour <?= $_SESSION['user']['login']; ?></span></li>
          <?php } else { ?>
            <li><a href="inscription.php" class="dernierlien">Connexion</a></li> <?php } ?>

          </ul>
        </nav>
      </div>
      <div class="clear"></div>

    </header>
