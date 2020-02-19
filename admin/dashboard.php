<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();

$Total_a_work = $data->TotalAssignWork();
$Total_f_work = $data->TotalFinishWork();
$Total_p_work = $data->TotalPendinghWork();
$TotalUser = $data->TotalUser();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'layout/headerLink.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include 'layout/header.php'; ?>
  <?php include 'layout/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-5">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $Total_a_work; ?></h3>

              <p>Total Works</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="projectsView.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $Total_f_work; ?></h3>

              <p>Finished Works</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="finished-works.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $Total_p_work; ?></h3>

              <p>Pending Works</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="pendingProjectsView.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $TotalUser; ?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="ViewUsers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <div class="card-footer">
          Footer
        </div>
      </div>
      <!-- /.card -->

      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'layout/footer.php'; ?>

</div>
<!-- ./wrapper -->



<?php include 'layout/footerLink.php'; ?>
</body>
</html>
