<?php
if (!isset($_SESSION)) {
        session_start();
    }
include '../connection/db.php';
date_default_timezone_set("Asia/Dhaka");
$month = date('F');
$date = date('m/d/Y');
$year = date('Y');

$validation = true;

extract($_POST);

if (!$pt_name) {
echo 'Enter patient name !';
$validation = FALSE;
}
if (!$mobile) {
echo 'Enter Mobile No !';
$validation = FALSE;
}
if (!$age) {
echo 'Enter Age !';
$validation = FALSE;
}
//echo $pt_name . ''.$mobile. ''.$age. ''.$ref_name. ''.$ref_mobile;
//die();
if($validation){
$inser_sql = "INSERT INTO `outdoor_test_register`( `patient_name`, `patient_mobile`, `age`,`dr_name`, `ref_name`, `ref_mobile`, `current_month`, `date`,`year`) VALUES ('$pt_name','$mobile','$age','$dr_name','$ref_name','$ref_mobile','$month','$date','$year')";
$execute_sql= $conn->query($inser_sql);

$reg_id = mysqli_insert_id($conn);
echo 'Registration id is '.$reg_id.' . Please Store This Id';
//header("location:all_patient_list.php");
} else {
echo "Insert unsuccessful";
}