<?php
session_start();
include '../database/config.php';
if (!isset($_SESSION['email'])) {
  header('location:login.php');
}
$data = new database();
$msg="";
$counter=0;
$user_email = $_SESSION['email'];
$projects = $data->ViewAssignProjects($user_email);
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Wingx</title>
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

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All Songs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>S.No.</th>
              <th>Project id</th>
              <th>Project Title</th>
              <th>Customer</th>
              <th>Assign Date</th>
              <th>Finishing Date</th>
              <th>Update</th>
              <th>Finished</th>


            </tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project): ?>
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $project['id'] ; ?></td>
                <td><?php echo $project['title'] ; ?></td>
                <td><?php echo $project['customer'] ; ?></td>
                <td><?php echo $project['assign_date'] ; ?></td>
                <td><?php echo $project['finished_date'] ; ?></td>
                <td>update</td>
                <td> <a class="btn btn-primary" name="fbtn" href='fwork.php?p_id=<?php echo $project['id'] ; ?>'>Finished</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'layout/footer.php'; ?>

</div>
<!-- ./wrapper -->



<?php include 'layout/footerLink.php'; ?>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
