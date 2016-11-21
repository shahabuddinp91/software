<?php
//echo "ok";
include '../../connection/db.php';
if(!isset($_SESSION)){
    session_start();
}
extract($_POST);
//echo $pt_name.''.$mobile.''.$age.''.$dr_name.''.$ref_name.''.$ref_mobile;
$month=date('F');
$year = date('Y');
$date=date('m/d/Y');
$show_reg_id='';
$validation=TRUE;

if(!$pt_name){
    echo "Write Patient Name !";
    $validation=FALSE;
}
if(!$mobile){
    echo "Write Patient Mobile No !";
    $validation=FALSE;
}



if($validation){
    $insert_query="INSERT INTO `outdoor_pharmacy_p_register`(`patient_name`, `mobile`, `age`, `dr_name`, `ref_name`, `ref_mobile`, `date`, `month`,`year`)"
            . " VALUES ('$pt_name','$mobile','$age','$dr_name','','','$date','$month','$year')";
    $execute_sql=$conn->query($insert_query);
    $show_reg_id=  mysqli_insert_id($conn);
    
//    echo $execute_sql;
    if($execute_sql){
        echo 'Pharmacy id is '.$show_reg_id.' . Please Store This Id';
    }  else {
        echo "Outdoor Patient Registered Not Successfully !";
    }
}
