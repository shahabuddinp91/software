<?php

if(!isset($_SESSION)){
    session_start();
}
include '../../connection/db.php';
extract($_POST);

//echo $testcategory.' '. $testname. ' '. $price;

$month=date('f');
$validation=TRUE;

if(!$testcategory){
    echo "Please Enter Test Category";
    $validation=FALSE;
}

if(!$testname){
    echo "Please Enter Test Name";
}

if(!$price){
    echo "Please Enter Price";
}


if($validation){
    $insert_qeury="INSERT INTO `add_test_info`(`test_category`, `test_name`, `price`) VALUES ('$testcategory','$testname','$price')";
//    echo $insert_qeury;
//    die();
    $execute_insert_sql=$conn->query($insert_qeury);
    
    if($execute_insert_sql){
        echo "Test Insert Successfully !";
        
    }  else {
        echo "Test Insert Not Successfully !";
    }
}