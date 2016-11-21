<?php
include '../../connection/db.php';
//echo "Ok";
//die();
if(!isset($_SESSION)){
    session_start();
}

extract($_POST);

//echo $id_pass. ' ' .$pt_name. ' '.$mobile_no.' '.$age.''.$dr_name.''.$ref_name.''.$ref_mobile_no.''.$ref_amount.''.$test_category.''.$test_name.''.$test_price;
//die();

$regi_id='';
date_default_timezone_set("Asia/Dhaka");
$month=date('F');
$date=date('m/d/Y');
$year = date('Y');
$validation=TRUE;
$get_id=$_POST['id_pass'];
//echo $reg_id;
//die();



    if(!$id_pass){
    echo 'Please, Enter Registration No !';
    $validation=FALSE;
    }
    if(!$test_name){
        echo 'Please, Select Test Name !';
        $validation=FALSE;
    }
    if($validation){
        $insert_qeury="INSERT INTO `patient_test_info`(`reg_id`, `patient_name`, `p_mobile`, `age`, `dr_name`, `ref_name`, `ref_mobile`, `ref_amount`, `test_category`, `test_name`, `price`, `date`, `month`,`year`)"
                . " VALUES ('$get_id','$pt_name','$mobile_no','$age','$dr_name','$ref_name','$ref_mobile_no','$ref_amount','$test_category','$test_name','$test_price','$date','$month','$year')";
        $execute_sql=$conn->query($insert_qeury);
        if($execute_sql){
             echo "Data Insert Successfully !";
        }  else {
            echo 'Data Insert Not Successfully !';
        }
    }




