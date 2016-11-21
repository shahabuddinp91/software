<?php
    $payment = $_POST['data'];
    $amount = $_POST['amount'];
    //echo $payment.$amount;
    $validation = TRUE;
    $due = '';
    $mass = '';
    if($payment){
       if(!$amount){
            $mass = 'Enter doctor visit amount !';
            $validation = FALSE;
        }  else {
            $due = $amount-$payment;
        } 
    }
    //echo $due;
    
    ?>
<p style="color: red;"><?php echo $mass;?></p>
<input type="text" class="form-control" readonly="true" id="payment_amount" name="due" value="<?php echo $due;?>">