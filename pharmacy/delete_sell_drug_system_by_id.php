<?php
include '../connection/db.php';
$delete_drug=$_GET['id'];
////echo $delete_drug;
//
$delete_query="DELETE FROM `drug_sell_system` WHERE `drug_sell_system`.`id` ='$delete_drug'";
//echo $delete_drug;
//die();
if (mysqli_query($conn, $delete_query)) {
    $delete_message = "Record Deleted successfully";
    header("location:all_sell_drug_list.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
