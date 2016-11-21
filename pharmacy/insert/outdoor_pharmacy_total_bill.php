<?php
//echo "ok"; die();
include_once '../../connection/db.php';
if (!isset($_SESSION)) {
    session_start();
}

$get_patinet_id=$_POST['patient_id'];
//echo $get_patinet_id;
//die();
extract($_POST);
date_default_timezone_set("Asia/Dhaka");
$month=date('F');
$year = date("Y");
$today=date('m/d/Y');
$select_discount = "SELECT * FROM `discount` WHERE id = '2'";
    $execute_discount = $conn->query($select_discount);
    while ($row = $execute_discount->fetch_assoc()){
        $admin_discount = $row['discount'];
    }
    //echo $admin_discount;
    $validation = TRUE;
    if($admin_discount >= $discount){
        $parcentage = ($bill*$discount)/100;
        $total_bill = $bill-$parcentage;
    
        $validation = TRUE;
    }  else {
        $validation = FALSE;
    }
if($validation){
    $select_query="SELECT * FROM `out_pharmacy_bill` WHERE patient_id ='$get_patinet_id'";

$execule_sql=$conn->query($select_query);
$count=  mysqli_num_rows($execule_sql);


if($count==0){
    $inser_sql="INSERT INTO `out_pharmacy_bill`( `patient_id`, `bill`, `discount`,`total_bill`, `payment`, `due`, `date`, `month`,`year`) VALUES ('$get_patinet_id','$bill','$discount','$total_bill','$payment','$due','$today','$month','$year')";

    $execute_sql=$conn->query($inser_sql);
    if($execute_sql){
        echo "Pharmacy Bill Insert Successfully !";
    }  else {
        echo "Insert Not Successfully !";
    }
}
if($count == 1){
    while ($payme = $execule_sql->fetch_assoc()){
        $pay = $payme['payment'];
        //$du = $payme['due'];
        
        $paymentnew = $payment+$pay;
        $new_due = $total_bill-$paymentnew;
    }
    $update_sql="UPDATE `out_pharmacy_bill` SET `bill`='$bill',`discount`='$discount',`total_bill`='$total_bill',`payment`='$paymentnew',`due`='$new_due' WHERE patient_id ='$get_patinet_id'";
    $execute_sql=$conn->query($update_sql);
    if($execute_sql){
        echo "Pharmacy Bill Updated Successfully !";
    }  else {
        echo "Updated Not Successfully !";
    }
}
        
}  else {
    echo 'Discount cross limit . Discount permit '.$admin_discount.'%';
}


