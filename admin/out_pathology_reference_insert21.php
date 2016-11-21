<?php
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $total = $_POST['total'];
    $payment = $_POST['payment'];
    $due = $_POST['due'];
    include '../connection/db.php';
    date_default_timezone_set("Asia/Dhaka");
    $today = date("m/d/Y");
    $month = date("F");
    $year = date("Y");
    
    $select_ref = "SELECT * FROM `in_reference` WHERE (mobile= '$mobile' and month = '$month') and (mobile= '$mobile' and year = '$year')";
    $execute_ref = $conn->query($select_ref);
    $count_ref1 = mysqli_num_rows($execute_ref);
    while ($row = $execute_ref->fetch_assoc()){
        $al_pay = $row['payment'];
        $al_due =$row['due'];
    }
    //echo ''.$today.' '.$month.' '.$year;
    //echo $name.' '.$mobile.' '.$total.' '.$payment.' '.$due;
    
    
    if($count_ref1 == 1){
        $validation = TRUE;
        if(!$payment){
            echo 'Enter Payment';
            $validation = FALSE;
        }
        if($validation){
            $pay = $payment+$al_pay;
        $updaet = "UPDATE `in_reference` SET `payment`='$pay',`due`='$due' WHERE  (mobile= '$mobile' and month = '$month') and (mobile= '$mobile' and year = '$year')";
        $execute_up = $conn->query($updaet);
        if($execute_up){
            echo 'Update payment successful';
        }
        }
        
    }  else {
        $validation = TRUE;
        if(!$payment){
            $validation = FALSE;
            echo 'Enter payment';
        }
        if($validation){
            $insert_sql  = "INSERT INTO `in_reference`(`name`, `mobile`, `total`, `payment`, `due`, `date`, `month`, `year`)"
                . " VALUES ('$name','$mobile','$total','$payment','$due','$today','$month','$year')";
        $execute_sql = $conn->query($insert_sql);
        if($execute_sql){
            echo 'Insert successful';
        }
        }
        
    }
    
