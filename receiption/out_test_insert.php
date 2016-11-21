<?php

include '../connection/db.php';
$get_id=$_POST['id_pass'];
//echo $get_id;
//die();
date_default_timezone_set("Asia/Dhaka");
$month = date('F');
$year=date('Y');
$date = date('m/d/Y');

$test_price = '';
$pt_name = '';
$mobile_no = '';
$age = '';
$ref_name = '';
$ref_mobile_no = '';
$ref_amount = '';
$execute_update= '';
$exe_sql_inser = '';

$validation = true;

extract($_POST);

if (!$pt_name) {
    echo 'Enter patient name !';
    $validation = FALSE;
}

if (!$mobile_no) {
    echo 'Enter patient Molibe number !';
    $validation = FALSE;
}

if (!$age) {
    echo 'Enter patient age !';
    $validation = FALSE;
}

if ($ref_name) {
    if (!$ref_mobile_no) {
        echo 'Enter reference mobile number !';
        $validation = FALSE;
    }

    if (!$ref_amount) {
        echo 'Enter reference amount !';
        $validation = FALSE;
    }
}

if (!$test_price) {
    if (!$test_category) {
        echo 'Select test category.';
        $validation = FALSE;
    }
    if (!$test_name) {
        echo 'Select test name.';
        $validation = FALSE;
    }
}



if ($validation) {

   
        $insert_sql = "INSERT INTO `outdoor_test`(`out_p_id`,`patient_name`, `patient_mobile`, `age`, `ref_name`, `ref_mobile`, `ref_amount`, `test_category`, `test_name`, `test_price`, `current_manth`, `dr_name`, `date`,`year`) VALUES ('$get_id','$pt_name','$mobile_no','$age','$ref_name','$ref_mobile_no','$ref_amount','$test_category','$test_name','$test_price','$month','$dr_name','$date','$year')";
        $execule_sql = $conn->query($insert_sql);
        //$count = mysqli_num_rows($result)

        if ($execule_sql) {
            echo 'Insert successful !';
        }
    }
    

    