<?php
  include('inc/pdo.php');
  include('inc/fonction.php');
  include('inc/request.php');
?>
<?php include('newsletter.php') ?>
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
                <div class="clear"></div>
                <p class="desc-vaccin"><?= $vaccin['description']; ?></p>
                <?php if ($vaccin['importance'] == 'facultatif'){ ?>
                  <abbr title="Facultatif"><div class="importance-vaccin vac-fac"><p>Facultatif</p></div></abbr>

                <?php } ?>
                <?php if ($vaccin['importance'] == 'recommandé'){ ?>
                  <abbr title="Recommandé"><div class="importance-vaccin vac-rec"><p>Recommandé</p></div></abbr>
                <?php } ?>
                <?php if ($vaccin['importance'] == 'obligatoire'){ ?>
                  <abbr title="Obligatoire"><div class="importance-vaccin vac-obl"><p>Obligatoire</p></div></abbr>
                <?php } ?>
                <div class="clear">
              </div>
            </div>

          <?php }
          } ?>
        </div>
      </section>

  <?php include('inc/footer.php'); ?>
