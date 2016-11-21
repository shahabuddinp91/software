<?php

//echo "M";
if (!isset($_SESSION)) {
    session_start();
}
include '../connection/db.php';
$get_patinet_id=$_POST['patient_id'];
//echo $get_patinet_id;
//die();
extract($_POST);
date_default_timezone_set("Asia/Dhaka");
$month = date('F');
$today = date('m/d/Y');
$year = date("Y");
$validation = true;

//if (!$payment) {
//    echo "Enter Payment !";
//    $validation = FALSE;
//}
    $select_discount = "SELECT * FROM `discount` WHERE id = '4'";
    $execute_select = $conn->query($select_discount);
    while ($row = $execute_select->fetch_assoc()){
        $admin_discount = $row['discount'];
    }
    if($admin_discount >= $discount){
        $validation = TRUE;
    }  else {
       $validation = FALSE;
    }
    
    if($validation){
        //echo $regi_id.''. $bill.' ' .$discount.' '.$total_bill.' '.$payment.' '.$due;
        $select_query="SELECT * FROM `outdoor_test_bill` WHERE patient_id='$get_patinet_id'";
        //echo $select_query;
        //die();
        $execule_sql=$conn->query($select_query);
        $count=  mysqli_num_rows($execule_sql);


        if($count==0){
            $inser_sql="INSERT INTO `outdoor_test_bill`(`patient_id`,`bill_out_dis`, `discount`, `bill_after_diss`, `payment`, `due`, `curunt_month`,`year`,`date`) VALUES ('$get_patinet_id','$bill','$discount','$total_bill','$payment','$due','$month','$year','$today')";
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
            $update_sql="UPDATE `outdoor_test_bill` SET `bill_out_dis`='$bill',`discount`='$discount',`bill_after_diss`='$total_bill',`payment`='$paymentnew',`due`='$new_due',`curunt_month`='$month' WHERE patient_id='$get_patinet_id'";
            $execute_sql=$conn->query($update_sql);
            if($execute_sql){
                echo "Test Bill Updated Successfully !";
            }  else {
                echo "Updated Not Successfully !";
            }
        }
    }  else {
        echo 'Discount cross limit ! Discount permit '.$admin_discount.'%';
    }

        