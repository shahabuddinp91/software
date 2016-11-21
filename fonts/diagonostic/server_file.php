<?php
include '../connection/db.php';
if(isset($_GET['testName'])){
 $testname=$_GET['testName'];
$price=  mysqli_query($conn, "SELECT * FROM add_test_info WHERE price='$testname'");
while($row=  mysqli_fetch_array($subDistrict)){
     echo '<option value="' . $row['id'] . '">' . $row['sub_dis_name'] . '</option>';
    
}   
}