<?php
$room_id = $_GET['id'];;
//echo $room_id.' raju';
include '../connection/db.php';
$delete_sql = "DELETE FROM `room_info` WHERE room_id = '$room_id' ";
$execute_sql = $conn->query($delete_sql);
if($execute_sql){
    header("location:room_list_system.php");
}
