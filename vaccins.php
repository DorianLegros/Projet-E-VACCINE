<?php
  include('inc/pdo.php');
  include('inc/fonction.php');
?>
<?php
    //requete sql
    $sql = "SELECT * FROM v2_vaccins";
    $query = $pdo->prepare($sql);
    $query->execute();
    $vaccins= $query->fetchAll();


 ?>
      <?php include('inc/header.php'); ?>

      <section id ="contenu">
      <div class="wrap">
        <table class="table"  style="text-align:center">
            <tr class="">
                <th>Nom de vaccin</th>
                <th>Description</th>
                <th>importance</th>
            </tr>
            <?php if (!empty($vaccins)){
                foreach($vaccins as $vaccin )  { ?>
            <tr>
                <td><?php echo $vaccin['nomvaccin']; ?></td>
                <td><?php echo $vaccin['description']; ?></td>
                <td><?php if ($vaccin['importance']=='facutatif'){ ?>
                  <div class="barre1"></div>
                <?php } elseif($vaccin['importance'] =='recommandé'){ ?>
                  <div class="barre2"></div><?php }
                                elseif($vaccin['importance']== 'obligatoire'){ ?>
                                  <div class="barre3"></div>
                        <?php }; ?></td>
            </tr>
          <?php }
        }?>
        </table>

      </div>
    </section>

  <?php include('inc/footer.php'); ?>
