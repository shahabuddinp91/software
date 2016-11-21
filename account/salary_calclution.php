<?php
$basic = $_POST['Basic'];
$Bonus = $_POST['Bonus'];
$Overtime = $_POST['Overtime'];
$Honoree = $_POST['Honoree'];
//echo $basic.' '.$Bonus.' '.$Overtime.' '.$Honoree;
$Total = $basic+$Bonus+$Overtime+$Honoree;
?>
<input style="color: red;" type="text" class="form-control" value="<?php echo $Total;?>" id="Total" name="Total" placeholder="Total" readonly>