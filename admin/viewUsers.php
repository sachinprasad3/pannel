<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();
$counter=0;
// $msg=false;
$users = $data->ViewUsers();
  // if ($users) {
  //   if ($msg == true) {
  //     $msg ="Successfully Seleted";
  //   }else {
  //     $msg = "Something went wrong";
  //   }
  // }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | All Projrcts</title>
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
              <th>User Id</th>
              <th>Name</th>
              <th>Phone No.</th>
              <th>Email</th>
              <th>Gender</th>
              <th>Created At</th>
              <th>Update</th>
              <th>Delete</th>

            </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?php echo ++$counter; ?></td>
                <td><?php echo $user['id'] ; ?></td>
                <td><?php echo $user['name'] ; ?></td>
                <td><?php echo $user['phone'] ; ?></td>
                <td><?php echo $user['email'] ; ?></td>
                <td><?php echo $user['gender'] ; ?></td>
                <td><?php echo $user['created_at'] ; ?></td>
                <td>update</td>
                <td> <a class="btn btn-danger" name="del" href="deleteUser.php?userID=<?php echo $user['id'];?>">Delete</a> </td>
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
