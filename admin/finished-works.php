<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();
$msg="";
$counter=0;
$devName="";
$user_email = $_SESSION['email'];
$projects = $data->ViewTotalFworks();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Finished Works</title>
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
              <th>Assign To (ID)</th>
              <th>Assign To (Name)</th>
              <th>Assign Date</th>
              <th>Finishing Date</th>
              <th>Update</th>



            </tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project): ?>
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $project['id'] ; ?></td>
                <td><?php echo $project['title'] ; ?></td>
                <td><?php echo $project['customer'] ; ?></td>
                <td><?php echo $project['assign_to'] ; ?></td>
                <?php
                $devId = $project['assign_to'];
                $select_query = "SELECT name from `users` WHERE id='$devId'";
                $result = $data->conn->query($select_query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $devName=$row['name'];
                  }
                }
                 ?>
                <td><?php echo $devName ; ?></td>
                <td><?php echo $project['assign_date'] ; ?></td>
                <td><?php echo $project['finished_date'] ; ?></td>
                <td>update</td>
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
