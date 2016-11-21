<?php
include '../connection/db.php';

$delete_id=$_GET['id'];
//echo $delete_id;

$delete_query="DELETE FROM `patient_test_info` WHERE `patient_test_info`.`id` ='$delete_id'";
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:all_patient_test_list.php");
} else {
    echo "Error Deleting Record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
