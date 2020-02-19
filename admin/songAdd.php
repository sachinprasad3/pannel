<?php
include '../database/config.php';
$data = new database();
if (isset($_POST['add'])) {
  // echo "<script>alert('yes');</script>";
$songs=$_FILES['song1']['name'];
move_uploaded_file($_FILES['song1']['tmp_name'],'../audio/'.$songs);
  // $title = $_POST['title'];
  // $artist = $_POST['artist'];
  //
  // $songName = $_FILES['song']['name'];
  // $songTempName = $_FILES['song']['tmp_name'];
  // move_uploaded_file($songTempName,"../audio/songs/".$songName);
  // $dir='../audio/';
  //
  // $audio_path = $dir.basename($_FILES['song']['name']);
  // if (move_uploaded_file($_FILES['song']['tmp_name'],$audio_path)) {
  //   echo '<script>alert("successful")</script>';
  // }
  // $title = $_POST['title'];
  // $artist = $_POST['artist'];


  // $addSong = $data->addSong($title,$artist,$audio_path);
//   if ($addSong) {
//   header('location:songAdd.php');
// }
}


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Song | Wingx</title>
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
          <h3 class="card-title">Add Song</h3>
        </div>
        <form method="post" action="songAdd.php" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <!-- <fieldset class="form-group">
            <label for="formGroupExampleInput">Song Title</label>
            <input type="text" class="form-control" name="title" placeholder="Song title">
          </fieldset>
          <fieldset class="form-group">
            <label for="formGroupExampleInput2">Artist Name</label>
            <input type="text" class="form-control" name="artist"  placeholder="Artist name">
          </fieldset> -->
          <!-- <fieldset class="form-group">
            <label for="formGroupExampleInput2">Upload Song File</label>
            <input type="file" class="form-control" name="song">
          </fieldset> -->
          <fieldset class="form-group">
            <label for="formGroupExampleInput2">Upload Song File</label>
            <input type="file" class="form-control" name="song1">
          </fieldset>
        </div>
        <div class="card-footer">
          <input class="btn btn-primary" type="submit" name="add" value="Add">
        </div>
      </form>
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
</body>
</html>
