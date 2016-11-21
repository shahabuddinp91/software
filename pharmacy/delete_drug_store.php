<?php
include '../connection/db.php';
$delete_drug=$_GET['id'];
////echo $delete_drug;
//
$delete_query="DELETE FROM `add_drug_store` WHERE id ='$delete_drug'";
//echo $delete_drug;
//die();
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:all_drug_store.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
