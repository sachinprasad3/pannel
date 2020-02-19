<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();
$msg="";
if (isset($_GET['userID'])) {
  $user_id = $_GET['userID'];
  $delete = $data->DeleteUser($user_id);
  if ($delete) {
    $msg = "true";
    header('location:viewUsers.php');
  }
}
 ?>
