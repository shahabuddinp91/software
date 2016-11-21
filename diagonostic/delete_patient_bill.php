<?php
include '../connection/db.php';

$delete_id=$_GET['regi_id'];
//echo $delete_id;

$delete_query="DELETE FROM `diagonostic_patient_bill` WHERE `diagonostic_patient_bill`.`regi_id` = $delete_id";
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:patient_bill_list.php");
} else {
    echo "Error Deleting Record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

