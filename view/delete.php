<?php 
include('../controller/DBController.php');
$id = $_GET['id'];
//echo $id;
$obj = new DBController();
$obj->DeleteData('students',$id);
header("location:../index.php");

?>