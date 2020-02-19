<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:login.php');
}
include '../database/config.php';
$data = new database();
if (isset($_GET['p_id'])) {
  //echo "yeahhhhhh";
  $pr_id = $_GET['p_id'];
  $fn = $data->Update_FWork_Satus($pr_id);
  //$projects = $data->ViewAssignProjects($user_email);
  if ($fn) {

    //echo "yeaaaa";
    header('location:latest-works.php');
  }
}
// }else {
//   echo "nooooooo";
// }
 ?>
