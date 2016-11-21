<?php
    $cata = $_POST['cata'];
$name = $_POST['name'];
    $id = $_POST['data'];
    
date_default_timezone_set("Asia/Dhaka");
    $today = date("m/d/Y");
    $month = date('F');
    $year = date("Y");
    $status = 'Report ok';
    $count = '';
    include '../connection/db.php';
    $select = "SELECT * FROM `indoor_path_message` WHERE (patient_id = '$id' and status = 'REPORT OK RECEPTION ADMIN RECEIVED IT.') and (test_catagory = '$cata' and test_name = '$name')";
    $ex = $conn->query($select);
    $count = mysqli_num_rows($ex);
    

        if($count == 1){
            echo 'Already Receive Indoor Test Id : '.$id .' report';
        }  else {
            $select_patient = "UPDATE `indoor_path_message` SET `status`='REPORT OK RECEPTION ADMIN RECEIVED IT.' WHERE (patient_id = '$id' and test_catagory = '$cata') and (test_catagory = '$cata' and test_name = '$name')";
            $execuet_patient = $conn->query($select_patient);
            if($execuet_patient){
                echo 'Receive Report For Indoor Test Id : '.$id;
            }
            
        }

    
    
?>