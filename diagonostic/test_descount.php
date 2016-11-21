<?php
    $discount = $_POST['discount'];
    $bill = $_POST['bill'];
    //echo $discount,$bill;
    
    include '../connection/db.php';
    $select_discount = "SELECT * FROM `discount` WHERE id = '3'";
    $execute_discount = $conn->query($select_discount);
    while ($row = $execute_discount->fetch_assoc()){
        $admin_discount = $row['discount'];
    }
    //echo $admin_discount;
    $validation = TRUE;
    if($admin_discount >= $discount){
        $parcentage = ($bill*$discount)/100;
        $total_bill = $bill-$parcentage;
        $validation = TRUE;
    }  else {
        $validation = FALSE;
    }
    ?>

<input style="color: red;font-family: caption;font-size: 15px;" type="text" value="<?php 
    if($validation){
        echo $total_bill;
    }  else {
        echo 'Admin permit '.$admin_discount.'% discount !';
    }
?>" class="form-control text-center" id="total_bill" name="total_bill" readonly="" >