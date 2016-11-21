<?php
    $Promo = $_POST['Promo'];
    $House_Rent = $_POST['House_Rent'];
    $mobilebill = $_POST['mobilebill'];
    $o2gasbuy = $_POST['o2gasbuy'];
    $otherrepairfee = $_POST['otherrepairfee'];
    $Machine_repair_fee = $_POST['Machine_repair_fee'];
    $Invitation_fee = $_POST['Invitation_fee'];
    $Variant_spend = $_POST['Variant_spend'];
    $BuySurgerymaterial = $_POST['BuySurgerymaterial'];
    $rayflim_other = $_POST['rayflim_other'];
    $Electrical_Bill = $_POST['Electrical_Bill'];
    $Govt_tax = $_POST['Govt_tax'];
    $paper_pen_other = $_POST['paper_pen_other'];
    $Salary_Honoraria_Bonus = $_POST['Salary_Honoraria_Bonus'];
    $Subscription_grant = $_POST['Subscription_grant'];
    $fuel_Bill = $_POST['fuel_Bill'];
    $Buy_Electronics_material = $_POST['Buy_Electronics_material'];
    $Consultant_fee = $_POST['Consultant_fee'];
    $Buy_Electric_material = $_POST['Buy_Electric_material'];
    $Transport_fee = $_POST['Transport_fee'];
    $Buy_Hardware_material = $_POST['Buy_Hardware_material'];
    $Buy_Machine_material = $_POST['Buy_Machine_material'];
    $RF = $_POST['RF'];
    $Outside_experiment_cost = $_POST['Outside_experiment_cost'];
    
//    echo $Promo.' '.$House_Rent.' '.$mobilebill.' '.$o2gasbuy.' '.$otherrepairfee.' '
//    .$Machine_repair_fee.' '.$Invitation_fee.' '.$Variant_spend.' '.$BuySurgerymaterial.' '.
//   $rayflim_other.' '.$Electrical_Bill.' '.$Govt_tax.' '.$paper_pen_other.' '.$Salary_Honoraria_Bonus.' '.
// $Subscription_grant.' '.$fuel_Bill.' '.$Buy_Electronics_material.' '.
//$Consultant_fee.' '.$Buy_Electric_material.' '.$Transport_fee.' '.$Buy_Hardware_material.' '.$Buy_Machine_material
//.' '.$RF.' '.$Outside_experiment_cost;
?>
<input style="color: red;"value="<?php echo $Promo+$House_Rent+$mobilebill+$o2gasbuy+$Machine_repair_fee+$Invitation_fee+$Variant_spend+$BuySurgerymaterial+
   $rayflim_other+$otherrepairfee+$Electrical_Bill+$Govt_tax+$paper_pen_other+$Salary_Honoraria_Bonus+
 $Subscription_grant+$fuel_Bill+$Buy_Electronics_material+
$Consultant_fee+$Buy_Electric_material+$Transport_fee+$Buy_Hardware_material+$Buy_Machine_material
+$RF+$Outside_experiment_cost;?>" type="text" class="form-control"  id="Total" name="Total" readonly >