<?php
  include('inc/pdo.php');
  include('inc/fonction.php');
  include('inc/request.php');
?>
<?php
    // faire appel à la fonction getAllvaccins()
    $vaccins= getAllvaccins()
 ?>
      <?php include('inc/header.php'); ?>

      <section id ="contenu">

        <div class="wrap">
          <?php if (!empty($vaccins)) {
            foreach($vaccins as $vaccin )  { ?>
              <div class="case-vaccin">
                <h3 class="nom-vaccin"><?= $vaccin['nomvaccin']; ?></h3>
                <p class="desc-vaccin"><?= $vaccin['description']; ?></p>
                <?php if ($vaccin['importance'] == 'facultatif'){ ?>
                  <abbr title="Facultatif"><div class="importance-vaccin vac-fac"></div></abbr>
                <?php } ?>
                <?php if ($vaccin['importance'] == 'recommandé'){ ?>
                  <abbr title="Recommandé"><div class="importance-vaccin vac-rec"></div></abbr>
                <?php } ?>
                <?php if ($vaccin['importance'] == 'obligatoire'){ ?>
                  <abbr title="Obligatoire"><div class="importance-vaccin vac-obl"></div></abbr>
                <?php } ?>
                <div class="clear">
              </div>
            </div>

          <?php }
          } ?>
        </div>
      </section>

  <?php include('inc/footer.php'); ?>
