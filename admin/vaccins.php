<?php include('../inc/pdo.php') ?>
<?php include('../inc/fonction.php') ?>
<?php include('../inc/request.php') ?>

<?php
$tableVaccins = getAllvaccins();
 ?>

 <?php include('header_back.php') ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liste des vaccins</h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table panel panel-default">
              <tr>
                <th>Nom du vaccin</th>
                <th>Description</th>
                <th>Importance</th>
                <th>Ajouté le</th>
                <th><a href="addvaccin.php">Ajouter</a></th>
              </tr>
            <?php
            foreach ($tableVaccins as $tableVaccin) { ?>
              <tr>
                <td><?= $tableVaccin['nomvaccin']; ?></td>
                <td><?= $tableVaccin['description']; ?></td>
                <td><?= $tableVaccin['importance'] ?></td>
                <td><?= $tableVaccin['created_at'] ?></td>
                <td><a href="modifvaccin.php?id=<?= $tableVaccin['id']; ?>">Modifier</a></td>
                <td><a href="supprvaccin.php?id=<?= $tableVaccin['id']; ?>">Supprimer</a></td>
              </tr>
            <?php } ?>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<?php include('footer_back.php') ?>
