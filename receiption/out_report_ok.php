<?php

    $id = $_POST['data'];
date_default_timezone_set("Asia/Dhaka");
    $today = date("m/d/Y");
    $month = date('F');
    $year = date("Y");
    $status = 'Report ok';
    $count = '';
    include '../connection/db.php';
    $select = "SELECT * FROM `outdoor_path_message` WHERE patient_id = '$id' and status = 'REPORT OK RECEPTION ADMIN RECEIVED IT.'";
    $ex = $conn->query($select);
    $count = mysqli_num_rows($ex);
    

        if($count == 1){
            echo 'Already Receive Outdoor Test Id : '.$id .' report';
        }  else {
            $select_patient = "UPDATE `outdoor_path_message` SET `status`='REPORT OK RECEPTION ADMIN RECEIVED IT.' WHERE patient_id = '$id'";
            $execuet_patient = $conn->query($select_patient);
            if($execuet_patient){
                echo 'Receive report for outdoor test id : '.$id;
            }
            
        }

    
    
?>