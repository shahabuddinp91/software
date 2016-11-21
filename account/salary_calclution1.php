<?php
$Total = $_POST['Total'];
$Payment = $_POST['Payment'];
//echo $Payment.' '.$Total;
$due = $Total-$Payment;
?>
<input value="<?php echo $due;?>" style="color: red;" type="text" class="form-control"  id="Due" name="Due" placeholder="Due" readonly>