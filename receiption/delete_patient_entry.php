<?php
include '../connection/db.php';

$delete_id=$_GET['id'];
//echo $delete_id;

$delete_query="DELETE FROM `patient_entry_form` WHERE `patient_entry_form`.`id` = '$delete_id'";
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:All_patient_list.php");
} else {
    echo "Error Deleting Record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
