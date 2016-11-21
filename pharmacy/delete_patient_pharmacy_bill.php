<?php
include '../connection/db.php';

$delete_id=$_GET['regi_id'];
//echo $delete_id;

$delete_query="DELETE FROM `pharmacy_patient_bill` WHERE `pharmacy_patient_bill`.`regi_id` ='$delete_id'";
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:patient_pharmacy_bill.php");
} else {
    echo "Error Deleting Record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

