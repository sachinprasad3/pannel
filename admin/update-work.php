<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();
$msg="";
$developers = $data->developersList();
$update = $data->update();
//print_r($rows);
// if ($rows) {
//
// }

if (isset($_POST['update'])) {
  $aDate = $_POST['aDate'];
  $fDate = $_POST['fDate'];
  $title = $_POST['title'];
  $customer = $_POST['customer'];
  $assign_to = $_POST['assign_to'];

  $rows = $data->addProject($aDate,$fDate,$title,$customer,$assign_to);

  if ($rows) {
    $msg="successfully Added";
  }else {
    $msg="something went wrong";
  }


}
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Update</title>
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
          <h3 class="card-title">Title</h3>
          <p><?php echo $msg ?></p>

        </div>
        <div class="card-body">
          <form action="" method="post">

            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Assign Date</label>
              <input type="text" class="form-control" name="aDate" placeholder="" id="assignDate">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Finishing Date</label>
              <input type="text" class="form-control" name="fDate" placeholder=""id="finishingDate">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Work Title</label>
              <input type="text" class="form-control" name="title" placeholder="">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput">Custome Name</label>
              <input type="text" class="form-control" name="customer" placeholder="">
            </fieldset>
            <fieldset class="form-group">
              <label for="formGroupExampleInput2">Assign To</label>
              <select class="" name="assign_to">
                <option value="" selected disabled='disabled'>...Choose...</option>
                <?php foreach ($developers as $dev): ?>
                  <option value="<?php echo $dev['id']; ?>"><?php echo $dev['name']; ?></option>
                <?php endforeach; ?>
              </select>

            </fieldset>
            <input type="submit" class="btn btn-primary" name="submit" value="submit">
          </form>
        </div>
        <div class="card-footer">
          Footer
        </div>
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
<script type="text/javascript">
  $(function() {
      $( "#assignDate,#finishingDate" ).datepicker();
  });
</script>
</body>
</html>
