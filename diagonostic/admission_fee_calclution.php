<?php
    $fee = $_POST['fee'];
    $payment = $_POST['payment'];
//echo $fee.' '.$payment;
    if($payment>$fee){
        $due = 'Payment bill Exist limit ';
    }  else {
        $due = $fee-$payment;
}
    
?>
<input style="color: red;" type="text" value="<?php echo $due;?>" class="form-control" id="addmission_due" name="admission_due" readonly="true" >