<?php

if (!isset($_SESSION)) {
    session_start();
}


include '../../connection/db.php';
$d_name = '';
extract($_POST);

//echo $sell_price.''.buy_price.' '. $storedate.' ' .$drugName.' ' .$quantity.' ' .$drugUnit.' ' .$price;

date_default_timezone_set("Asia/Dhaka");
$month = date('F');
$year =  date('Y');
$validation = true;

if (!$storedate) {
    echo "Select Date";
    $validation = FALSE;
}

if (!$drugName) {
    echo "Enter Drug Name";
    $validation = FALSE;
}

if (!$quantity) {
    echo "Enter Quantity";
    $validation = FALSE;
}

if (!$drugUnit) {
    echo "Enter Drug Units";
    $validation = FALSE;
}

if (!$sell_price) {
    echo "Enter selling Price";
    $validation = FALSE;
}

if (!$buy_price) {
    echo "Enter Buying Price";
    $validation = FALSE;
}


    if($validation){
        $select_drug_sql = "SELECT * FROM `add_drug_store` WHERE drug_name =  '$drugName' and drug_units = '$drugUnit'";
        $execute_sql = $conn->query($select_drug_sql);
        while ($row = $execute_sql->fetch_assoc()){
            $d_name = $row['drug_name'];
            $d_unit = $row['drug_units'];
            $d_quentity = $row['quantity'];
            
        }

        if($drugName == $d_name && $d_unit == $drugUnit){
            $total_quantity = $d_quentity+$quantity;
            $update_sql = "UPDATE `add_drug_store` SET `date`= '$storedate',`quantity`='$total_quantity',`buy_price`='$buy_price',`sell_price`='$sell_price',`current_month`='$month',`year` = '$year' WHERE drug_name = '$d_name' and drug_units = '$d_unit'";
            $execute_sql = $conn->query($update_sql);
            if($execute_sql){
                echo 'Update successful';
            }
        }  else {
            $insert_sql = "INSERT INTO `add_drug_store`( `date`, `drug_name`, `quantity`, `drug_units`, `buy_price`, `sell_price`, `current_month`,`year`) VALUES ('$storedate','$drugName','$quantity','$drugUnit','$buy_price','$sell_price','$month','$year')";
            $execute_insert_sql = $conn->query($insert_sql);

            if ($execute_insert_sql) {
                echo 'Drug store successful !';
            }
        }
    }