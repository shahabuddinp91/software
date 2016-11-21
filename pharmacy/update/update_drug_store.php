<?php

if (!isset($_SESSION)) {
    session_start();
}

include '../../connection/db.php';
$update_id=$_GET['id'];
echo $update_id;


