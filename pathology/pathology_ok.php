<?php

    $id = $_POST['data'];
date_default_timezone_set("Asia/Dhaka");
    $today = date("m/d/Y");
    $month = date('F');
    $year = date("Y");
    $status = 'Report ok';
    $count = '';
    include '../connection/db.php';
    $select_patient = "SELECT * FROM `outdoor_path_message` WHERE patient_id = '$id'";
    $execuet_patient = $conn->query($select_patient);
    $count = mysqli_num_rows($execuet_patient);
    
    if($count == 1){
        echo 'Already send to admin';
    }  else {
        $isert_sql = "INSERT INTO `outdoor_path_message`( `patient_id`, `status`, `date`, `month`, `year`) VALUES ('$id','$status','$today','$month','$year')";
    $exe = $conn->query($isert_sql);
    if($exe){
        echo 'Panding for admin permit';
    }
    }
    
    
?>