<?php
  include('inc/pdo.php');
  include('inc/fonction.php');
?>

<?php
  $sql = "SELECT nomvaccin FROM v2_vaccins WHERE 1=1";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $listeVaccins = $query -> fetchAll();
 ?>

<?php

  if(isLogged()) {
      $iduser = $_SESSION['user']['id'];
      if (!empty($_POST['submitted'])) {
        //sécurité XSS
        $numeroLot = trim(strip_tags($_POST['numlot']));
        $datevaccin = trim(strip_tags($_POST['date']));

        $rappelvaccin = $_POST['rappel'];
        $nomVaccin = $_POST['nom'];

        $sql = "SELECT id FROM v2_vaccins WHERE nomvaccin='$nomVaccin'";
        $query = $pdo -> prepare($sql);
        $query -> execute();
        $idVaccins = $query -> fetch();
        $idvaccin = $idVaccins['id'];

        $errors = array();

        if (!empty($datevaccin)) {
        } else {
          $errors['date'] = 'Veulliez remplir ce champ.';
        }

        if (!empty($numeroLot)) {
          if (strlen($numeroLot) > 20) {
            $errors['numlot'] = 'Ce que vous avez saisi et trop long, un n° de lot ne peut avoir plus de 20 caractères.';
          }
        }

        if (count($errors) == 0) {
          $sql = "INSERT INTO v2_carnets (datevaccin, rappelvaccin, etat, id_user, id_vaccins, num_lot, created_at)
          VALUES ('$datevaccin', '$rappelvaccin', 'pasfait', '$iduser', '$idvaccin', :Numlot, NOW())";
          $query = $pdo -> prepare($sql);
          $query -> bindValue(':Numlot', $numeroLot, PDO::PARAM_STR);
          $query -> execute();
          header('Location: carnet.php');
        }
      }

      include('inc/header.php');
?>

<section id="contenu">
  <form class="" action="" method="post">
    <label for="nom">Nom du vaccin</label><select class="" name="nom">
      <?php foreach ($listeVaccins as $listeVaccin) { ?>
        <option value="<?= $listeVaccin['nomvaccin']; ?>"><?= $listeVaccin['nomvaccin']; ?></option>
      <?php } ?>
    </select>
    <label for="numlot">Numéro du lot</label><input type="text" name="numlot" value="" placeholder="ex: H25994"><?php if(!empty($errors['numlot'])) { echo '<p class="error">' . $errors['numlot'] . '</p>'; } ?>
    <label for="date">Date du vaccin</label><input type="date" name="date" value="" placeholder="ex: 2018-11-13"><?php if(!empty($errors['date'])) { echo '<p class="error">' . $errors['date'] . '</p>'; } ?>
    <label for="rappel">Rappel dans</label><select class="" name="rappel">
      <option value="3 mois">3 mois</option>
      <option value="6 mois">6 mois</option>
      <option value="9 mois">9 mois</option>
      <option value="1 an">1 an</option>
      <option value="2 ans">2 ans</option>
      <option value="3 ans">3 ans</option>
      <option value="plusieurs années">plusieurs années</option>
    </select>
    <input type="submit" name="submitted" value="Ajouter">
  </form>
</section>

<?php
  } else {
  header('Location: 403.php');
  }

  include('inc/footer.php');
