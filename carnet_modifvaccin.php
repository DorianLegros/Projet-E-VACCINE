<?php
  include('inc/pdo.php');
  include('inc/fonction.php');
  include('inc/request.php');
  include('newsletter.php');
?>

<?php
  $listeVaccins = getVaccin();
  if(isLogged()) {

    if (!empty($_GET['id'] && is_numeric($_GET['id']))) {
      $verifId = getVerifId();
      if (!empty($verifId)) {

        $carnet = Carnet();

        if (!empty($_POST['submitted'])) {
          //sécurité XSS
          $numeroLot = trim(strip_tags($_POST['numlot']));
          $datevaccin = trim(strip_tags($_POST['date']));

          $idVaccins = getIdVaccin();
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
            updateCarnet();
            header('Location: carnet.php');
          }
        }
      }
      else {
        header('Location: 404.php');
      }
    } else {
      header('Location: 404.php');
    }


    include('inc/header.php'); ?>

<section id="contenu">
  <form class="wrap" action="" method="post">
    <label for="numlot" class="numlot">Numéro du lot</label><input class="numlot1" type="text" name="numlot" value="<?php if(!empty($_POST['numlot'])) {echo $_POST['numlot']; } else { echo $carnet['num_lot']; } ?>" placeholder="ex: H25994"><?php if(!empty($errors['numlot'])) { echo '<p class="error">' . $errors['numlot'] . '</p>'; } ?>
    <label for="date" class="numlot">Date du vaccin</label><input class="numlot" type="date" name="date" value="<?php if(!empty($_POST['date'])) {echo $_POST['date']; } else { echo $carnet['datevaccin']; } ?>" placeholder="ex: 2018-11-13"><?php if(!empty($errors['date'])) { echo '<p class="error">' . $errors['date'] . '</p>'; } ?>
    <label for="rappel" class="numlot">Rappel dans</label>

    <?php $rappppel = array(
      'pas de rappel' => 'Pas de rappel',
      '3 mois'  => '3 mois',
      '6 mois'  => '6 mois',
      '9 mois'  => '9 mois',
      '1 an'  => '1 an',
      '2 ans'  => '2 ans',
      '3 ans'  => '3 ans',
      'plusieurs années' => 'plusieurs années'
    );

    $valeurduselect = $carnet['rappelvaccin'];
    ?>

    <select class="" name="rappel">
      <?php  foreach ($rappppel as $key => $value) { ?>
        <?php $s = '';
        if($key == $valeurduselect) {
          $s = 'selected="selected" ';
        }  ?>
              <option <?php echo $s; ?>value="<?php echo $key; ?>"><?php echo $value; ?></option>
      <?php } ?>
    </select>

    <label for="etat">Avez-vous effectué ce vaccin ?</label>
    <?php $etttat = array(
      'pasfait'  => 'Pas encore fait',
      'fait'  => 'Fait'
    );

    $valeurduselect2 = $carnet['etat'];
    ?>

    <select class="" name="etat">

      <?php  foreach ($etttat as $key => $value) { ?>
        <?php $s2 = '';
        if($key == $valeurduselect2) {
          $s2 = 'selected="selected" ';
        }  ?>
              <option <?php echo $s2; ?>value="<?php echo $key; ?>"><?php echo $value; ?></option>
      <?php } ?>
    </select>
    <input class="btnConfirm" type="submit" name="submitted" value="Modifier">
  </form>
</section>

<?php
  } else {
  header('Location: 403.php');
  }

  include('inc/footer.php');
