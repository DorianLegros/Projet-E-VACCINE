<?php include('../inc/pdo.php') ?>
<?php include('../inc/fonction.php') ?>

<?php include('header_back.php') ?>

<?php
$sql = "SELECT * FROM v2_user LIMIT 20";
$query = $pdo -> prepare($sql);
$query -> execute();
$tableUsers = $query -> fetchAll();

$sql = "SELECT * FROM v2_vaccins LIMIT 20";
$query = $pdo -> prepare($sql);
$query -> execute();
$tableVaccins = $query -> fetchAll();

 ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Utilisateurs</h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table panel panel-default">
              <tr>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Membre depuis</th>
              </tr>
            <?php
            foreach ($tableUsers as $tableUser) {
              if($tableUser['id'] != 2){ ?>
              <tr>
                <td><?= $tableUser['login']; ?></td>
                <td><?= $tableUser['email']; ?></td>
                <td><?= $tableUser['status'] ?></td>
                <td><?= $tableUser['created_at'] ?></td>
              </tr>
            <?php }
              } ?>
            </table>
            <div class="col-lg-12">
                <h2 class="page-header">Vaccins</h1>
            </div>
            <table class="table panel panel-default">
              <tr>
                <th>Nom du vaccin</th>
                <th>Description</th>
                <th>Importance</th>
                <th>Ajouté le</th>
              </tr>
            <?php
            foreach ($tableVaccins as $tableVaccin) { ?>
              <tr>
                <td><?= $tableVaccin['nomvaccin']; ?></td>
                <td><?= $tableVaccin['description']; ?></td>
                <td><?= $tableVaccin['importance']; ?></td>
                <td><?= $tableVaccin['created_at']; ?></td>
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
