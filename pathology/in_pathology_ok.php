<?php
include '../connection/db.php';
$id = $_POST['data'];
$cata = $_POST['cata'];
$name = $_POST['name'];
//echo $id.' '.$cata.' '.$name;
//die();
    date_default_timezone_set("Asia/Dhaka");
    $today = date("m/d/Y");
    $month = date('F');
    $year = date("Y");
    $status = 'Report ok';
    $count = '';
    
    $select_patient = "SELECT * FROM `indoor_path_message` WHERE (patient_id = '$id' and test_catagory = '$cata') and (patient_id = '$id' and test_name = '$name')";
//    echo $select_patient; die();
    $execuet_patient = $conn->query($select_patient);
    $count = mysqli_num_rows($execuet_patient);
    
    if($count == 1){
        echo 'Already send to admin';
    }  else {
        $isert_sql = "INSERT INTO `indoor_path_message`( `patient_id`, `status`, `date`, `month`, `year`, `test_catagory`, `test_name`) VALUES ('$id','$status','$today','$month','$year','$cata','$name')";
    $exe = $conn->query($isert_sql);
    if($exe){
        echo 'Panding for admin permit';
    }
    }
    
    
?>