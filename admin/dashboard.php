<?php include('../inc/pdo.php') ?>
<?php include('../inc/fonction.php') ?>

<?php include('header_back.php') ?>

<?php
$sql = "SELECT * FROM v2_user WHERE 1=1";
$query = $pdo -> prepare($sql);
$query -> execute();
$tableUsers = $query -> fetchAll();

$sql = "SELECT * FROM v2_vaccins WHERE 1=1";
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
            <table class="table">
              <tr>
                <th>User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Membre depuis</th>
              </tr>
            <?php
            foreach ($tableUsers as $tableUser) { ?>
              <tr>
                <td><?= $tableUser['login']; ?></td>
                <td><?= $tableUser['mail']; ?></td>
                <td><?= $tableUser['status'] ?></td>
                <td><?= $tableUser['created_at'] ?></td>
                <td><a href="#">Modifier</a></td>
                <td><a href="#">Supprimer</a></td>
              </tr>
            <?php } ?>
            </table>
            <div class="col-lg-12">
                <h2 class="page-header">Vaccins</h1>
            </div>
            <table class="table">
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
                <td><a href="#">Modifier</a></td>
                <td><a href="#">Supprimer</a></td>
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
