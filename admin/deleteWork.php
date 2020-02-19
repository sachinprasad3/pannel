<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:index.php');
}
include '../database/config.php';
$data = new database();
$msg="";
if (isset($_GET['projectId'])) {
  $project_id = $_GET['projectId'];
  $delete = $data->DeleteWork($project_id);
  if ($delete) {
    $msg = "true";
    header('location:projectsView.php');
  }
}
 ?>
