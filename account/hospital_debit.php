<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//echo $_SESSION['account_id'];
include '../connection/link.php';
include '../connection/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="../js/main.js"></script>

    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Account
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content">
<?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="right_content">
                                <form id="form_data">
                                <p style="
    color: red;
    font-family: caption;
    font-size: 20px;
    font-weight: bold;
    margin-left: 343px;
    text-transform: uppercase;">Daily debit form </p>
                                <div class="col-md-12" style="border-top: 1px solid;padding-top: 10px;">
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Promo">Promo & printing fee :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Promo" name="Promo" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    
                                    <script>
                                        $(document).ready(function () {
                                            $('#Promo').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $(this).val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="House_Rent">House Rent :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="House_Rent" name="House_Rent" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#House_Rent').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $(this).val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="mobilebill">Mobile Bill:</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="mobilebill" name="mobilebill" placeholder="Enter balance">
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#mobilebill').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $(this).val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                    
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="o2gasbuy">O2 gas buy :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="o2gasbuy" name="o2gasbuy" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#o2gasbuy').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $(this).val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="otherrepairfee">Other repair fee :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="otherrepairfee" name="otherrepairfee" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#otherrepairfee').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $(this).val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Machine_repair_fee">Machine repair fee :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Machine_repair_fee" name="Machine_repair_fee" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Machine_repair_fee').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $(this).val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Invitation_fee">Invitation fee :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Invitation_fee" name="Invitation_fee" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Invitation_fee').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $(this).val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Variant_spend">Variant spend :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Variant_spend" name="Variant_spend" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Variant_spend').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $(this).val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="BuySurgerymaterial">Buy Surgery material :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="BuySurgerymaterial" name="BuySurgerymaterial" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#BuySurgerymaterial').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $(this).val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="rayflim_other">Buy X-ray flim /other :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="rayflim_other" name="rayflim_other" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#rayflim_other').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $(this).val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Electrical_Bill">Electrical Bill  :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Electrical_Bill" name="Electrical_Bill" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Electrical_Bill').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $(this).val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Govt_tax">Govt tax :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Govt_tax" name="Govt_tax" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Govt_tax').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $(this).val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="paper_pen_other">Paper / Pen / Other :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="paper_pen_other" name="paper_pen_other" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#paper_pen_other').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $(this).val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="fuel_Bill">Fuel Bill  :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="fuel_Bill" name="fuel_Bill" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Salary_Honoraria_Bonus').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $(this).val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Salary_Honoraria_Bonus">Salary/Honoraria/Bonus :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Salary_Honoraria_Bonus" name="Salary_Honoraria_Bonus" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Subscription_grant').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $(this).val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                         <label class="control-label col-sm-4" for="Subscription_grant">Subscription/<br>grant :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Subscription_grant" name="Subscription_grant" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#fuel_Bill').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $(this).val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Consultant_fee">Consultant fee  :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Consultant_fee" name="Consultant_fee" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Buy_Electronics_material').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $(this).val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Buy_Electric_material">Buy Electric material :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Buy_Electric_material" name="Buy_Electric_material" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Consultant_fee').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $(this).val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                         <label class="control-label col-sm-4" for="Buy_Electronics_material">Buy Electronics material :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Buy_Electronics_material" name="Buy_Electronics_material" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Buy_Electric_material').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $(this).val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Transport_fee">Transport fee  :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Transport_fee" name="Transport_fee" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Transport_fee').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $(this).val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Buy_Hardware_material">Buy Hardware material :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Buy_Hardware_material" name="Buy_Hardware_material" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Buy_Hardware_material').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $(this).val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                         <label class="control-label col-sm-4" for="Buy_Machine_material">Buy Machine material :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Buy_Machine_material" name="Buy_Machine_material" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Buy_Machine_material').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $(this).val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="RF">RF  :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="RF" name="RF" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#RF').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $(this).val();
                                                var Outside_experiment_cost = $('#Outside_experiment_cost').val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                     <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Outside_experiment_cost">Outside experiment cost :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" class="form-control"  id="Outside_experiment_cost" name="Outside_experiment_cost" placeholder="Enter balance" >
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            $('#Outside_experiment_cost').on('keyup', function (e) {
                                            e.preventDefault();
                                                var Promo = $('#Promo').val();
                                                var House_Rent = $('#House_Rent').val();
                                                var mobilebill = $('#mobilebill').val();
                                                var o2gasbuy = $('#o2gasbuy').val();
                                                var otherrepairfee = $('#otherrepairfee').val();
                                                var Machine_repair_fee = $('#Machine_repair_fee').val();
                                                var Invitation_fee = $('#Invitation_fee').val();
                                                var Variant_spend = $('#Variant_spend').val();
                                                var BuySurgerymaterial = $('#BuySurgerymaterial').val();
                                                var rayflim_other = $('#rayflim_other').val();
                                                var Electrical_Bill = $('#Electrical_Bill').val();
                                                var Govt_tax= $('#Govt_tax').val();
                                                var paper_pen_other = $('#paper_pen_other').val();
                                                var Salary_Honoraria_Bonus = $('#Salary_Honoraria_Bonus').val();
                                                var Subscription_grant = $('#Subscription_grant').val();
                                                var fuel_Bill = $('#fuel_Bill').val();
                                                var Buy_Electronics_material = $('#Buy_Electronics_material').val();
                                                var Consultant_fee = $('#Consultant_fee').val();
                                                var Buy_Electric_material = $('#Buy_Electric_material').val();
                                                var Transport_fee = $('#Transport_fee').val();
                                                var Buy_Hardware_material = $('#Buy_Hardware_material').val();
                                                var Buy_Machine_material = $('#Buy_Machine_material').val();
                                                var RF = $('#RF').val();
                                                var Outside_experiment_cost = $(this).val();

                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'cost_calclution.php',
                                                    data: {Outside_experiment_cost:Outside_experiment_cost,RF:RF,Buy_Machine_material:Buy_Machine_material,Buy_Hardware_material:Buy_Hardware_material,Transport_fee:Transport_fee,Buy_Electric_material:Buy_Electric_material,Consultant_fee:Consultant_fee,Buy_Electronics_material:Buy_Electronics_material,fuel_Bill:fuel_Bill,Subscription_grant:Subscription_grant,Salary_Honoraria_Bonus:Salary_Honoraria_Bonus,paper_pen_other:paper_pen_other,Govt_tax:Govt_tax,Electrical_Bill:Electrical_Bill,rayflim_other:rayflim_other,BuySurgerymaterial:BuySurgerymaterial,Variant_spend:Variant_spend,Invitation_fee:Invitation_fee,Machine_repair_fee:Machine_repair_fee,otherrepairfee:otherrepairfee,o2gasbuy:o2gasbuy,Promo:Promo,House_Rent:House_Rent,mobilebill:mobilebill}
                                                })
                                                .done(function (m) {
                                                    //alert(m)
                                            $('#rajunice').html(m)
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                
                                <div class="col-md-12">
                                     <div class="form-group col-md-4">
                                         <label class="control-label col-sm-4" for="Total">Total :</label>
                                         <div class="col-sm-8" id="rajunice">
                                            <input style="color: red;" type="text" class="form-control"  id="Total" name="Total" readonly >
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group col-md-4">
                                         <button type="submit" class="btn-primary" id="submit_raju" name="submit">Submit</button>
                                         <button type="clear" class="btn-success">Clear</button>
                                    </div>
                                </div>
                                
                                </form>
                                <script>
                                    $(document).ready(function(){
                                        $('#submit_raju').on('click',function(e){
                                            e.preventDefault();
                                            $data = $('#form_data').serialize();
                                            $.ajax({
                                                method:'post',
                                                url:'debit_insert.php',
                                                data:$data
                                            })
                                                    .done(function(r){
                                                        alert(r)
                                            })
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_area">
                <div class="container-fluid">
                    <div class="row">

<?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
