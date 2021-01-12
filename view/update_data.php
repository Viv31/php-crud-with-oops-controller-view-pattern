<?php
include('../controller/DBController.php');
$id = $_POST['id'];
$full_name = $_POST['full_name'];
$mobile_no = $_POST['mobile_no'];
$course = $_POST['course'];
$obj = new DBController();


//print_r($_POST); die;
if(isset($_POST['update'])){
$data_arr = array('full_name'=>$full_name,'mobile_no'=>$mobile_no,'course'=>$course);
$obj->UpdateData('students',$data_arr,$id);
header("location:../index.php");
}
?>