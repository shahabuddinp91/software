<?php
    $id = $_GET['id'];
    //echo $id;
    include '../../connection/db.php';
    $delete_sql = "DELETE FROM `outdoor_test_register` WHERE id = '$id'";
    $execute_delete = $conn->query($delete_sql);
    
    $del = "DELETE FROM `outdoor_test` WHERE out_p_id = '$id'";
    $ex = $conn->query($del);
    
    $dell = "DELETE FROM `outdoor_test_bill` WHERE patient_id = '$id'";
    $exf = $conn->query($dell);
    
    if($execute_delete ||$ex||$exf){
        header("location:../outdoor_patient_list.php");
    }
    
?>