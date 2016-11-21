<?php
    $id = $_POST['id'];
    $pay = $_POST['pay'];
    //echo $id.' '.$pay;
    
    include_once '../../connection/db.php';
    $select_sql = "SELECT * FROM `dreasing_bill` WHERE patient_id = '$id'";
    $execute_sql = $conn->query($select_sql);
        while ($row = $execute_sql->fetch_assoc()) {
            $total = $row['total'];
            $ayment = $row['payment'];
            $due = $row['due'];
        }
    
    if( $due>=$pay ){
        $payment = $ayment+$pay;
        $ddd = $total-$payment;
        $update_sql = "UPDATE `dreasing_bill` SET `payment`='$payment',`due`='$ddd' WHERE patient_id = '$id'";
        $execute_update = $conn->query($update_sql);
        if($execute_update){
            echo 'Payment update !';
        }
    }else{
        echo 'Payment is more than total bill !';
    }
    
        
    
   