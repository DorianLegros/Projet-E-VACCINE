<?php
  include('inc/pdo.php');
  include('inc/fonction.php');

  $errors = array();

  if (!empty($_POST['submitted'])) {



    if (!filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
      $errors['mail'] = 'Veuillez saisir un email valide.';
    }

    if (strlen($_POST['texte']) < 10) {
      $errors['texte'] = 'Texte trop court ! (10 car. minimum)';
    }
    if (strlen($_POST['texte']) > 5000) {
      $errors['texte'] = 'Texte trop court ! (5000 car. maximum)';
    }
  }

  include('inc/header.php');
?>

<section id="contenu">
  <div class="wrap">
    <h3>Qu'est ce que E-VACCINE ?</h3>
    <div class="articles">
      <p class="text-article">E-Vaccine zhfhzfhzfhzfzrkhzrfrkfgzgfrfz</p>
    </div>
    <h3>Maybe une autre catégorie ?</h3>

    <h3 ="text-form">Nous contacter</h3>
    <hr>
    <form class="" action="" method="post">
      <label for="mail">Votre email</label><input type="text" name="mail" value="<?php if(!empty($_POST['mail'])){ echo $_POST['mail']; } ?>"><?php if(!empty($errors['mail'])) { echo '<p class="error">' . $errors['mail'] . '</p>'; } ?>
      <label for="texte">Votre texte</label><textarea name="texte" rows="8" cols="80"><?php if(!empty($_POST['texte'])){echo $_POST['texte'];} ?></textarea><?php if(!empty($errors['texte'])) { echo '<p class="error">' . $errors['texte'] . '</p>'; } ?>
      <input type="submit" name="submitted" value="Envoyer">
    </form>
    <?php if (!empty($_POST['submitted']) && count($errors) == 0) {
      echo '<p class="success">Votre message a bien été envoyé !</p>';
    } ?>
  </div>
</section>

<?php
    include('inc/footer.php');
