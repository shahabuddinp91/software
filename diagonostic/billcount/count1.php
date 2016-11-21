<?php
    $dr_amount = $_POST['dr_amount'];
    $Obsarvation = $_POST['Obsarvation'];
    $Dressing = $_POST['Dressing'];
    $otcharge = $_POST['otcharge'];
    $Nabulizer = $_POST['Nabulizer'];
    $blood = $_POST['blood'];
    $ooo = $_POST['ooo'];
    
    
if(!$dr_amount && !$Obsarvation && !$Dressing && !$otcharge && !$Nabulizer && !$blood && !$ooo){
    $payment = 'a';
    $total = 'b';
    $MSS = 'Total field is empty';
    
}  else {
    $payment = $_POST['Payment'];
    $total = $_POST['total'];
    //echo $payment.' '.$total;
}
    
?>
<?php
    if($payment!='a' && $total!='b'){ ?>

<input style="color: red;" value="<?php echo $total-$payment;?>" type="text" class="form-control"  id="Due"  name="Due" readonly>

    <?php }  else { ?>
    <input style="color: red;" value="<?php echo $MSS;?>" type="text" class="form-control"  id="Due"  name="Due" readonly>
<?php } ?>