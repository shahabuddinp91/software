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
                                        
                                        if(isset($_POST['reception'])){
                                            extract($_POST);
                                        }
                                        ?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Search for Employee Id '.$id.' Month :'.$month.' and year :'.$year; ?>

                                            </h2>



<!--                                            <h3 style="color: #3399ff;
    font-family: caption;
    margin-left: 54px;
    margin-top: 0;">Advance search for salary</h3>-->
                                        <form method="post" action="">
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
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <tr class="">
                                                <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Employee ID</td>
                                                <td style="background-color: #346E99;color: #fff;">Employee Name</td>
                                                <td style="background-color: #346E99;color: #fff;">Basic</td>
                                                <td style="background-color: #346E99;color: #fff;">Bonus</td>
                                                <td style="background-color: #346E99;color: #fff;">Overtime</td>
                                                <td style="background-color: #346E99;color: #fff;">Honoree</td>
                                                <td style="background-color: #346E99;color: #fff;">Total</td>
                                                <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>
                                                <td style="background-color: #346E99;color: #fff;">Date</td>
                                                
                                            </tr>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            //$today = date("m/d/Y");
//echo $today;
                                            include '../connection/db.php';
                                            $select_sql = "SELECT * FROM `salary` WHERE e_id = '$id' and ( month = '$month' and year = '$year')";
                                            $execute_sql = $conn->query($select_sql);
                                            $count = mysqli_num_rows($execute_sql);
//echo $count;
                                            if ($count > 0) {
                                                $sl=0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['e_id']; ?></td>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['basic']; ?></td>
                                                        <td><?php echo $row['bonus']; ?></td>
                                                        <td><?php echo $row['overtime']; ?></td>
                                                        <td><?php echo $row['honoree']; ?></td>
                                                        <td><?php echo $row['total']; ?></td>
                                                        <td><?php echo $row['payment']; ?></td>
                                                        <td><?php echo $row['due']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        
                                                    </tr>

                                                <?php } 
                                                
                                            }?>
                                                
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
