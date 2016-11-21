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
        <!--<link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../js/owl.carousel.min.js" rel="stylesheet"/>
        <script src="../js/main.js"></script>
        
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
        <script src="../js/bootstrap-datepicker.js"></script>
        <script>
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
        <style>
            body{
    height: 100%;
    background: url(../images/patern.png);
    font-family: initial;

}




.dashbord_area {
    /*background: #3BB7DB none repeat scroll 0 0;*/
    padding: 15px 0;
}
.dashboard_text {
    color: #000;
    font-family: caption;
    font-size: 16px;
    font-weight: bolder;
}
.dashboard_text img{width: 100%; }


.manu {
    margin-top: 25px;
}
.manu li {
    list-style: outside none none;
    text-decoration: none;
}
.manu ul {
    padding-left: 0;
}
.manu a {
    background: #33b5e5 none repeat scroll 0 0;
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px 5px;
    text-decoration: none;
    width: 210px;
    font-family: caption;
     font-size: 16px;
}
.manu a:hover {
    background: #0099cc none repeat scroll 0 0;
    color: #fff;
    text-decoration: none;
}
            #copyright {
    background: #a4bed9 none repeat scroll 0 0;
    color: #fff;
    font-family: caption;
    font-size: 15px;
    text-align: center;
      padding: 10px 0;
    
}
        </style>

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
                                Dashboard Of Accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">

                                
                                <form method="post" action="">
                                    <p style="color: red;
    font-size: 18px;
    padding-left: 181px;"></p>
                                    <div class="nei" style="margin-left: 100px;">
                                        <div class="col-md-3">
                                        <select name="total_month" style="height: 30px;margin-left: 41px;margin-top: 19px;width: 123px;">
                                            <option value="1">Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="total_year" style="margin-left: -113px;height: 30px;margin-top: 19px;width: 123px;">
                                            <option value="1">Select Year </option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option><option>2023</option>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button id="total_show" type="submit" name="total" style="color: #fb7922;
                                                height: 32px;
                                                margin-left: -268px;
                                                margin-top: 18px;
                                                width: 72px;">Search</button>
                                    </div>
                                    </div>
                                </form> 
                                <?php
                                $total_month = 'Null';
                                $total_year = 'Null';
                                    if(isset($_POST['total'])){
                                        extract($_POST);
                                        //echo $total_month.$total_year;
                                    }
                                ?>
                                <div>
                                    <p style="color:red;font-size: 20px;">Debit for Month : <?php echo $total_month;?> and Year : <?php echo $total_year;?></p>
                                    <div class="container-fluid col-md-5">
                                        <div class="row">
                                            <p><b>Particulars<span style="float:right;">Taka</span></b></p>
                                            <?php
                                                $select1 = "SELECT sum(promo) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select1 = $conn->query($select1);
                                                while ($row = $exe_select1->fetch_assoc()){
                                                    $Promo = $row['sum(promo)'];
                                                }
                                            ?>
                                            <p>1. Promo & printing fee : <span style="float:right;"><?php echo $Promo;?> tk.</span></p>
                                            <?php
                                                $select2 = "SELECT sum(House) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select2 = $conn->query($select2);
                                                while ($row = $exe_select2->fetch_assoc()){
                                                    $House = $row['sum(House)'];
                                                }
                                            ?>
                                            <p>2. House Rent  : <span style="float:right;"><?php echo $House;?> tk.</span></p>
                                            <?php
                                                $select3 = "SELECT sum(Mobile) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select3 = $conn->query($select3);
                                                while ($row = $exe_select3->fetch_assoc()){
                                                    $Mobile = $row['sum(Mobile)'];
                                                }
                                            ?>
                                            <p>3. Mobile Bill  : <span style="float:right;"><?php echo $Mobile;?> tk.</span></p>
                                            <?php
                                                $select4 = "SELECT sum(O2) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select4 = $conn->query($select4);
                                                while ($row = $exe_select4->fetch_assoc()){
                                                    $o2 = $row['sum(O2)'];
                                                }
                                            ?>
                                            <p>4. Buy O2 gas   : <span style="float:right;"><?php echo $o2;?> tk.</span></p>
                                            <?php
                                                $select5 = "SELECT sum(Other_repair_fee) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select5 = $conn->query($select5);
                                                while ($row = $exe_select5->fetch_assoc()){
                                                    $Other_repair_fee = $row['sum(Other_repair_fee)'];
                                                }
                                            ?>
                                            <p>5. Other repair fee  : <span style="float:right;"><?php echo $Other_repair_fee;?> tk.</span></p>
                                            <?php
                                                $select6 = "SELECT sum(Machine) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select6 = $conn->query($select6);
                                                while ($row = $exe_select6->fetch_assoc()){
                                                    $Machine = $row['sum(Machine)'];
                                                }
                                            ?>
                                            <p>6. Machine repair fee  : <span style="float:right;"><?php echo $Machine;?> tk.</span></p>
                                            <?php
                                                $select7 = "SELECT sum(Invitation) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select7 = $conn->query($select7);
                                                while ($row = $exe_select7->fetch_assoc()){
                                                    $Invitation = $row['sum(Invitation)'];
                                                }
                                            ?>
                                            <p>7. Invitation fee  : <span style="float:right;"><?php echo $Invitation;?> tk.</span></p>
                                            <?php
                                                $select8 = "SELECT sum(Variant) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select8 = $conn->query($select8);
                                                while ($row = $exe_select8->fetch_assoc()){
                                                    $Variant = $row['sum(Variant)'];
                                                }
                                            ?>
                                            <p>8. Variant spend  : <span style="float:right;"><?php echo $Variant;?> tk.</span></p>
                                            <?php
                                                $select9 = "SELECT sum(Buy_Surgery_material) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select9 = $conn->query($select9);
                                                while ($row = $exe_select9->fetch_assoc()){
                                                    $Buy_Surgery_material = $row['sum(Buy_Surgery_material)'];
                                                }
                                            ?>
                                            <p>9. Buy Surgery material  : <span style="float:right;"><?php echo $Buy_Surgery_material;?> tk.</span></p>
                                            <?php
                                                $select10 = "SELECT sum(ray_flim) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select10 = $conn->query($select10);
                                                while ($row = $exe_select10->fetch_assoc()){
                                                    $ray_flim = $row['sum(ray_flim)'];
                                                }
                                            ?>
                                            <p>10. Buy X-ray flim /other  : <span style="float:right;"><?php echo $ray_flim;?> tk.</span></p>
                                            <?php
                                                $select11 = "SELECT sum(Electrical_Bill) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select11 = $conn->query($select11);
                                                while ($row = $exe_select11->fetch_assoc()){
                                                    $Electrical_Bill = $row['sum(Electrical_Bill)'];
                                                }
                                            ?>
                                            <p>11. Electrical Bill  : <span style="float:right;"><?php echo $Electrical_Bill;?> tk.</span></p>
                                            <?php
                                                $select12 = "SELECT sum(Govt_tax) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select12 = $conn->query($select12);
                                                while ($row = $exe_select12->fetch_assoc()){
                                                    $Govt_tax = $row['sum(Govt_tax)'];
                                                }
                                            ?>
                                            <p>12. Govt tax  : <span style="float:right;"><?php echo $Govt_tax;?> tk.</span></p>
                                            <p style="border-top: 2px solid red;font-weight: bolder;">SUBTOTAL<span style="float:right;"><?php echo $Promo+$House+$Mobile+$o2+$Other_repair_fee+$Machine+$Invitation+$Variant+$Buy_Surgery_material+$ray_flim+$Govt_tax+$Electrical_Bill;?> Tk.</span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row">
                                            <p><b>Particulars<span style="float:right;">Taka</span></b></p>
                                            <?php
                                                $select12 = "SELECT sum(Paper) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select12 = $conn->query($select12);
                                                while ($row = $exe_select12->fetch_assoc()){
                                                    $Paper = $row['sum(Paper)'];
                                                }
                                            ?>
                                            <p>13. Paper / Pen / Other : <span style="float:right;"><?php echo $Paper;?> tk.</span></p>
                                            <?php
                                                $select13 = "SELECT sum(Fuel) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select13 = $conn->query($select13);
                                                while ($row = $exe_select13->fetch_assoc()){
                                                    $Fuel = $row['sum(Fuel)'];
                                                }
                                            ?>
                                            <p>14. Fuel Bill  : <span style="float:right;"><?php echo $Fuel;?> tk.</span></p>
                                            <?php
                                                $select14 = "SELECT sum(Salary) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select14 = $conn->query($select14);
                                                while ($row = $exe_select14->fetch_assoc()){
                                                    $Salary = $row['sum(Salary)'];
                                                }
                                            ?>
                                            <p>15. Salary/Honoraria/Bonus  : <span style="float:right;"><?php echo $Salary;?> tk.</span></p>
                                            <?php
                                                $select15 = "SELECT sum(Subscription) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select15 = $conn->query($select15);
                                                while ($row = $exe_select15->fetch_assoc()){
                                                    $Subscription = $row['sum(Subscription)'];
                                                }
                                            ?>
                                            <p>16. Subscription/grant   : <span style="float:right;"><?php echo $Subscription;?> tk.</span></p>
                                            <?php
                                                $select16 = "SELECT sum(Consultant) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select16 = $conn->query($select16);
                                                while ($row = $exe_select16->fetch_assoc()){
                                                    $Consultant = $row['sum(Consultant)'];
                                                }
                                            ?>
                                            <p>17. Consultant fee  : <span style="float:right;"><?php echo $Consultant;?> tk.</span></p>
                                            <?php
                                                $select17 = "SELECT sum(Buy_Electric_material) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select17 = $conn->query($select17);
                                                while ($row = $exe_select17->fetch_assoc()){
                                                    $Buy_Electric_material = $row['sum(Buy_Electric_material)'];
                                                }
                                            ?>
                                            <p>18. Buy Electric material  : <span style="float:right;"><?php echo $Buy_Electric_material;?> tk.</span></p>
                                            <?php
                                                $select18 = "SELECT sum(Buy_Electronics_material) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select18 = $conn->query($select18);
                                                while ($row = $exe_select18->fetch_assoc()){
                                                    $Buy_Electronics_material = $row['sum(Buy_Electronics_material)'];
                                                }
                                            ?>
                                            <p>19. Buy Electronics material  : <span style="float:right;"><?php echo $Buy_Electronics_material;?> tk.</span></p>
                                            <?php
                                                $select19 = "SELECT sum(Transport) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select19 = $conn->query($select19);
                                                while ($row = $exe_select19->fetch_assoc()){
                                                    $Transport = $row['sum(Transport)'];
                                                }
                                            ?>
                                            <p>20. Transport fee  : <span style="float:right;"><?php echo $Transport;?> tk.</span></p>
                                            <?php
                                                $select20 = "SELECT sum(Hardware) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select20 = $conn->query($select20);
                                                while ($row = $exe_select20->fetch_assoc()){
                                                    $Hardware = $row['sum(Hardware)'];
                                                }
                                            ?>
                                            <p>21. Buy Hardware material  : <span style="float:right;"><?php echo $Hardware;?> tk.</span></p>
                                           <?php
                                                $select21 = "SELECT sum(Buy_Machine_material) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select21 = $conn->query($select21);
                                                while ($row = $exe_select21->fetch_assoc()){
                                                    $Buy_Machine_material = $row['sum(Buy_Machine_material)'];
                                                }
                                            ?>
                                            <p>22. Buy Machine material  : <span style="float:right;"><?php echo $Buy_Machine_material;?> tk.</span></p>
                                            <?php
                                                $select22 = "SELECT sum(RF) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select22 = $conn->query($select22);
                                                while ($row = $exe_select22->fetch_assoc()){
                                                    $RF = $row['sum(RF)'];
                                                }
                                            ?>
                                            <p>23. RF  : <span style="float:right;"><?php echo $RF;?> tk.</span></p>
                                            <?php
                                                $select23 = "SELECT sum(Outside) FROM `debit` WHERE month = '$total_month' and year = '$total_year'";
                                                $exe_select23 = $conn->query($select23);
                                                while ($row = $exe_select23->fetch_assoc()){
                                                    $Outside = $row['sum(Outside)'];
                                                }
                                            ?>
                                            <p>24. Outside experiment cost  : <span style="float:right;"><?php echo $Outside;?> tk.</span></p>
                                            <p style="border-top: 2px solid red;font-weight: bolder;">SUBTOTAL<span style="float:right;"><?php echo $Fuel+$Salary+$Subscription+$Consultant+$Buy_Electric_material+$Buy_Electronics_material+$Transport+$Hardware+$Buy_Machine_material+$RF+$Paper+$Outside;?>Tk.</span></p>
                                            <?php 
                                                $number1  = $Promo+$House+$Mobile+$o2+$Other_repair_fee+$Machine+$Invitation+$Variant+$Buy_Surgery_material+$ray_flim+$Govt_tax+$Electrical_Bill;
                                                $number2 = $Fuel+$Salary+$Subscription+$Consultant+$Buy_Electric_material+$Buy_Electronics_material+$Transport+$Hardware+$Buy_Machine_material+$RF+$Paper+$Outside;
                                            ?>
                                            <p style="color:red;font-weight: bolder;">Total : <span style="float:right;"><?php echo $number1.' + '.$number2.' = '.($number1+$number2);?>Tk.</span></p>
                                        </div>
                                    </div>
                                </div>


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
