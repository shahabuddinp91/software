<?php
    $payment = $_POST['payment'];
    $total_bill = $_POST['total_bill'];
    $id = $_POST['id'];
    include '../connection/db.php';
    $select = "SELECT * FROM `out_pharmacy_bill` WHERE patient_id = '$id'";
    $execute = $conn->query($select);
    $count = mysqli_num_rows($execute);
    //echo $payment.' '.$total_bill;
    if($count == 0){
        $due_bill = $total_bill-$payment;
    }
    
    if($count == 1){
        while ($row = $execute->fetch_assoc()){
            $old_pay = $row['payment'];
        }
        $due_bill = $total_bill-($payment+$old_pay);
    }
    //echo $due_bill;
    
    ?>
<input type="text" value="<?php echo $due_bill;?>" class="form-control text-center" id="Due" readonly="true" name="due" >