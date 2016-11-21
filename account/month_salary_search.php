<?php 
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//$patient_message = '';
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
<!--        <link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
        <script src="../js/main.js"></script>
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

            <div class="body_area" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right_content_area" style="margin-left: -95px;">
                                <div class="patient_list_area">
                                    <div class="response">
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $today = date("m/d/Y");
                                        $month=date('F');
                                        $year = date('Y');
                                        ?>
                                        
                                        <?php
    if(isset($_POST['month_search'])){
        extract($_POST);
    }
?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Total salary list for Month :'.$month.' and year :'.$year; ?>

                                            </h2>



<!--                                            <h3 style="color: #3399ff;
    font-family: caption;
    margin-left: 54px;
    margin-top: 0;">Advance search for salary</h3>-->
                                        <form method="post" action="salary_search.php">
                                            <div class="col-md-8" style=" margin-left: 40px;
    margin-bottom: 10px;">
                                                <?php?>
                                                <input type="text" name="id" class="" placeholder="Enter id !" style="height: 30px;" required>
                                                <select name="month" style="margin-left: -4px;height: 30px;margin-top: 19px;">
                                                    
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
                                                <select name="year" style="margin-left: -4px;height: 30px;margin-top: 19px;">
                                                    
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2010</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                                <button id="rec_show" type="submit" name="reception" style="color: #fb7922;
                                                        height: 32px;
                                                        margin-top: 18px;
                                                        margin-left: -5px;
                                                        text-transform: uppercase;
                                                        font-family: caption;
                                                        width: 72px;">Search</button>
                                            </div>
                                        </form>

<form action="" method="post">
    <select name="month" style="margin-left: -4px;height: 30px;margin-top: 19px;">
                                                    
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
                                                <select name="year" style="margin-left: -4px;height: 30px;margin-top: 19px;">
                                                    
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2010</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                                <button id="rec_show" type="submit" name="month_search" style="color: #fb7922;
                                                        height: 32px;
                                                        margin-top: 18px;
                                                        margin-left: -5px;
                                                        text-transform: uppercase;
                                                        font-family: caption;
                                                        width: 72px;">Search</button>
</form>
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Basic</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Bonus</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Overtime</td>
                                                <td style="background-color: #346E99;color: #fff;">Total Honoree</td>
                                                <td style="background-color: #346E99;color: #fff;">Total</td>
                                                <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>
                                                
                                            </tr>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            //$today = date("m/d/Y");
//echo $today;
                                            include '../connection/db.php';
                                              
                                            ?>
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <?php
                                                    $select_basic = "SELECT sum(basic) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_basic = $conn->query($select_basic);
                                                    while ($row = $exe_basic->fetch_assoc()){
                                                        $basic = $row['sum(basic)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $basic;?></td>
                                                <?php
                                                    $select_bonus = "SELECT sum(bonus) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_bonus = $conn->query($select_bonus);
                                                    while ($row = $exe_bonus->fetch_assoc()){
                                                        $bonus = $row['sum(bonus)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $bonus;?></td>
                                                <?php
                                                    $select_overtime = "SELECT sum(overtime) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_overtime = $conn->query($select_overtime);
                                                    while ($row = $exe_overtime->fetch_assoc()){
                                                        $overtime = $row['sum(overtime)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $overtime;?></td>
                                                <?php
                                                    $select_honoree = "SELECT sum(honoree) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_honoree = $conn->query($select_honoree);
                                                    while ($row = $exe_honoree->fetch_assoc()){
                                                        $honoree = $row['sum(honoree)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $honoree;?></td>
                                                <?php
                                                    $select_total = "SELECT sum(total) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_total = $conn->query($select_total);
                                                    while ($row = $exe_total->fetch_assoc()){
                                                        $total = $row['sum(total)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $total;?></td>
                                                <?php
                                                    $select_payment = "SELECT sum(payment) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_payment = $conn->query($select_payment);
                                                    while ($row = $exe_payment->fetch_assoc()){
                                                        $payment = $row['sum(payment)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $payment;?></td>
                                                <?php
                                                    $select_due = "SELECT sum(due) FROM `salary` WHERE month = '$month' and year = '$year'";
                                                    $exe_due = $conn->query($select_due);
                                                    while ($row = $exe_due->fetch_assoc()){
                                                        $due = $row['sum(due)'];
                                                    }
                                                ?>
                                                <td style="background-color: #346E99;color: #fff;"><?php echo $due;?></td>
                                                
                                            </tr>
                                                
                                        </table>
                                        
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
    </body>

</html>
