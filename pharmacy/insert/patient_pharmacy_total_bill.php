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
$validation=TRUE;

    $select_discount = "SELECT * FROM `discount` WHERE id = '1'";
    $execute_discount = $conn->query($select_discount);
    while ($row = $execute_discount->fetch_assoc()){
        $admin_discount = $row['discount'];
    }
    
    if($admin_discount >= $discount){
        $parcentage = ($bill*$discount)/100;
        $total_bill = $bill-$parcentage;
    
        $validation = TRUE;
    }  else {
        $validation = FALSE;
    }
    
    if($validation){
        $select_query="SELECT * FROM `pharmacy_patient_bill` WHERE regi_id='$get_patinet_id'";
        //echo $select_query;
        //die();
        $execule_sql=$conn->query($select_query);
        $count=  mysqli_num_rows($execule_sql);


        if($count==0){
            $inser_sql="INSERT INTO `pharmacy_patient_bill`(`regi_id`, `bill`, `discount`, `total_bill`, `payment`, `due`, `date`, `month`,`year`)"
                    . " VALUES ('$get_patinet_id','$bill','$discount','$total_bill','$payment','$due','$today','$month','$year')";
        //    echo $inser_sql;
        //    die();
            $execute_sql=$conn->query($inser_sql);
            if($execute_sql){
                echo "Test Bill Insert Successfully !";
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
            $update_sql="UPDATE `pharmacy_patient_bill` SET `bill`='$bill',`discount`='$discount',`total_bill`='$total_bill',`payment`='$paymentnew',`due`='$new_due' WHERE regi_id='$get_patinet_id'";
            $execute_sql=$conn->query($update_sql);
            if($execute_sql){
                echo "Test Bill Updated Successfully !";
            }  else {
                echo "Updated Not Successfully !";
            }
        }
        
    }  else {
        echo 'Discount cross limit. Discount permit '.$admin_discount.'%';
    }
