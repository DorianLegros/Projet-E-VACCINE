<?php include('pdo.php') ?>
<?php include('../inc/fonction.php') ?>

<?php include('header_back.php') ?>

<?php if(isAdmin('user', 'id', 'pseudo', 'email', 'role', 'ip')) { ?>


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">E-vaccine</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php }
      else {
          header('Location: 404.php');
      }
?>

<?php include('footer_back.php') ?>
