<?php include('../inc/pdo.php') ?>
<?php include('../inc/fonction.php') ?>

<?php
$sql = "SELECT * FROM v2_user WHERE 1=1";
$query = $pdo -> prepare($sql);
$query -> execute();
$tableUsers = $query -> fetchAll();
?>

<?php include('header_back.php') ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liste des utilisateurs</h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table panel panel-default">
              <tr>
                <th>User</th>
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
                <td><a href="modifuser.php?id=<?= $tableUser['id']; ?>">Modifier</a></td>
                <td><a href="suppruser.php?id=<?= $tableUser['id']; ?>">Supprimer</a></td>
              </tr>
              <?php }
              } ?>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include('footer_back.php') ?>
