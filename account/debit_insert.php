<?php
include '../connection/db.php';
date_default_timezone_set("Asia/Dhaka");
$month=date('F');
$year = date("Y");
$today=date('m/d/Y');
    
extract($_POST);

$insert_sql = "INSERT INTO `debit`(`Promo`, `House`, `Mobile`, `O2`, `Other_repair_fee`, `Machine`, `Invitation`, `Variant`, `Buy_Surgery_material`, `ray_flim`, `Electrical_Bill`, `Govt_tax`, `Paper`, `Fuel`, `Salary`, `Subscription`, `Consultant`, `Buy_Electric_material`, `Buy_Electronics_material`, `Transport`, `Hardware`, `Buy_Machine_material`, `RF`, `Outside`, `Total`, `date`, `month`, `year`) VALUES "
        . "('$Promo','$House_Rent','$mobilebill','$o2gasbuy','$otherrepairfee','$Machine_repair_fee','$Invitation_fee','$Variant_spend','$BuySurgerymaterial','$rayflim_other','$Electrical_Bill','$Govt_tax','$paper_pen_other','$fuel_Bill','$Salary_Honoraria_Bonus','$Subscription_grant','$Consultant_fee','$Buy_Electric_material','$Buy_Electronics_material','$Transport_fee','$Buy_Hardware_material','$Buy_Machine_material','$RF','$Outside_experiment_cost','$Total','$today','$month','$year')";
//echo $insert_sql;
$exe_insert_sql = $conn->query($insert_sql);
if($exe_insert_sql){
    echo 'Debit Insert Successful !';
}