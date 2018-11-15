<?php
  include '../inc/fonction.php';
  include '../inc/pdo.php';
  include 'header_back.php';
?>
<?php
  $errors = array();

  if (!empty($_POST['submitted'])) {
    //faille XSS
    $nomVaccin = trim(strip_tags($_POST['nomvac']));
    $descriptionVaccin = trim(strip_tags($_POST['descvac']));
    $importanceVaccin = $_POST['importancevac'];

    $errors=verifTexteFormulaire($errors, $nomVaccin, 3, 255, 'nomvac');
    $errors=verifTexteFormulaire($errors, $descriptionVaccin, 3, 5000, 'descvac');

    $sql = "SELECT * FROM v2_vaccins WHERE nomvaccin = '$nomVaccin'";
    $query = $pdo -> prepare($sql);
    $query -> execute();
    $verifNomVaccin = $query -> fetch();
    if(!empty($verifNomVaccin)){
      $errors['nomvac'] = "Veuillez ne pas utiliser un nom de vaccin déjà existant.";
    }


    if(count($errors) == 0) {
      $sql = "INSERT INTO v2_vaccins (nomvaccin, description, importance, created_at) VALUES (:Nom, :Description, '$importanceVaccin', NOW())";
      $query = $pdo -> prepare($sql);
      $query -> bindValue(':Nom', $nomVaccin, pdo::PARAM_STR);
      $query -> bindValue(':Description', $descriptionVaccin, pdo::PARAM_STR);
      $query -> execute();
    }
  }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
          <?php if (!empty($_POST['submitted']) && count($errors) == 0) { ?>
            <p class="text-success">Votre vaccin a bien été ajouté à la liste</p>
          <?php } ?>

          <form class="" action="" method="post">
            <ul>
              <li><label for="nomvac">Nom: </label><input class="form-control" type="text" name="nomvac" value="<?php if(!empty($_POST['nomvac'])){echo $_POST['nomvac'];} ?>"> <div class="text-danger"><?php if (!empty($errors['nomvac'])) { echo $errors['nomvac']; } ?> </div></li>
              <li><label for="descvac">Description: </label><textarea class="form-control" name="descvac" rows="8" cols="80"><?php if(!empty($_POST['descvac'])){echo $_POST['descvac'];} ?></textarea> <div class="text-danger"><?php if (!empty($errors['descvac'])) { echo $errors['descvac']; } ?></div></li>
              <li><label for="importancevac">Importance</label><select class="form-control" name="importancevac">
                <option value="facultatif">Facultatif</option>
                <option value="recommandé">Recommandé</option>
                <option value="obligatoire">Obligatoire</option>
              </select>
              <li><input class="btn btn-primary" type="submit" name="submitted" value="Valider"> </li>
            </ul>
          </form>
        </div>
    </div>
</div>

<?php
  include 'footer_back.php';
?>
