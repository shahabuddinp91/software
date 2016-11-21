<?php
    $id = $_GET['id'];
    //echo $id;
    include '../../connection/db.php';
    $delete_sql = "DELETE FROM `outdoor_pharmacy_p_register` WHERE id = '$id'";
    $execute_delete = $conn->query($delete_sql);
    
    $del = "DELETE FROM `out_pharmacy_bill` WHERE id = '$id'";
    $ex = $conn->query($del);
    
    $dell = "SELECT * FROM `out_drug_sell_list` WHERE patient_id = '$id'";
    $exf = $conn->query($dell);
    
    if($execute_delete ||$ex||$exf){
        header("location:../outdoor_pharmacy.php");
    }
    
?>