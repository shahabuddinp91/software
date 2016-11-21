<?php
    $id = $_GET['id'];
    //echo $id;
    include '../connection/db.php';
    $delete_sql = "DELETE FROM `patient_entry_form` WHERE id = '$id'";
    $execute_delete = $conn->query($delete_sql);
    if($execute_delete){
        header("location:all_appointment_p_list.php");
    }