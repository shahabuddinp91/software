<?php
if (!isset($_SESSION)) {
    session_start();
}
$count_mobile2 = '';

if (!isset($_SESSION['admin_id'])) {
    header("location:../log_form.php");
}
//$patient_message = '';
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

    </head><script src="../js/main.js"></script>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                               <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Admin
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
                                <?php include './left_side_admin.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-10">
                                <div class="row">
                                    <form method="post" action="">
                                            <div class="col-md-8" style=" margin-left: 40px;
    margin-top: -21px;">
                                                <?php?>
<!--                                                <input type="text" name="mobile" class="" placeholder="Enter Mobile No !" style="height: 30px;">-->
                                                <select name="rec_month" style="margin-left: -4px;height: 30px;margin-top: 19px;">
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
                                                <select name="recp_year" style="margin-left: -4px;height: 30px;margin-top: 19px;">
                                                    <option value="1">Select Year </option>
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
                                <?php
                                $rec_month = '';
                                $recp_year = '';
                                $ref_name = '';
                                $ref_mobile = '';
                                $total = '';
                                $payment = '';
                                $due = '';
                                $month = '';
                                $year = '';
                                $sl = '';
                                $out_count = '';
                                $ref_namess = '';
                                $ref_mobiless = '';
                                $totalss = '';
                                $paymentss = '';
                                $duess = '';
                                $monthss = '';
                                $yearss = '';
                                $ids = '';
                                $in_count = '';
                                $sls = '';
                                $id = '';
                                    if(isset($_POST['reception'])){
                                        extract($_POST);
                                        //echo $rec_month.' '.$recp_year;
                                        $out_ref_select  = "SELECT * FROM `out_reference` WHERE month = '$rec_month' and year = '$recp_year'";
                                        $exe_out_ref = $conn->query($out_ref_select);
                                        $out_count = mysqli_num_rows($exe_out_ref);
                                        //echo $out_count;
                                        ?>
                                <?php
                                if($out_count>0){ ?>
                                <table border="2" style="text-align: center;font-family: caption;">
                                        <tr><p style="color: #fb7922;font-size: 22px;font-weight: bolder;">Table For Outdoor Reference For Month <?php echo $month.' ';?>and Year <?php echo $year.'.';?></p></tr>
                                        <tr>
                                            <td style="width: 100px;color: red;">Sl#</td>
                                            <td style="width: 100px;color: red;">Name</td>
                                            <td style="width: 100px;color: red;">Mobile</td>
                                            <td style="width: 100px;color: red;">Total</td>
                                            <td style="width: 100px;color: red;">Payment</td>
                                            <td style="width: 100px;color: red;">Due</td>
                                            <td style="width: 100px;color: red;">Month</td>
                                            <td style="width: 100px;color: red;">Year</td>
                                            <td style="width: 100px;color: red;">Action</td>
                                        </tr>
                                    
                            <?php    }
                                
                                ?>
                                <?php
                                        $sl = 0;
                                        while ($row = $exe_out_ref->fetch_assoc()){
                                            $ref_name = $row['name'];
                                            $ref_mobile  = $row['mobile'];
                                            $total = $row['total'];
                                            $payment = $row['payment'];
                                            $due = $row['due'];
                                            $month = $row['month'];
                                            $year = $row['year'];
                                            $sl++;
                                            $id = $row['id'];
                                             
                                        if($out_count > 0) { ?>
                                    
                                        <tr>
                                            <td style="width: 100px;color: red;"><?php echo $sl;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $ref_name;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $ref_mobile;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $total;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $payment;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $due;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $month;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $year;?></td>
                                            <td style="width: 100px;color: red;">
                                                <a href="out_slip.php?id=<?php echo $id;?>">Slip</a>
                                            </td>
                                        </tr>
                                    
                                        <?php } 
                                        } ?>
                                        </table>
                                        <?php 
                                
                                
                                        $in_ref_select = "SELECT * FROM `in_reference` WHERE month = '$rec_month' and year = '$recp_year'";
                                        $exe_in_ref = $conn->query($in_ref_select);
                                        $in_count  = mysqli_num_rows($exe_in_ref);
                                        //echo $in_count;
                                        ?>
                                <?php 
                                        if($in_count > 0) { ?>
                                    
                                    <table border="2" style="text-align: center;font-family: caption;">
                                        <tr><p style="color: #fb7922;font-size: 22px;font-weight: bolder;">Table For In Reference For Month <?php echo $month.' ';?>and Year <?php echo $year.'.';?></p></tr>
                                        <tr>
                                            <td style="width: 100px;color: red;">Sl#</td>
                                            <td style="width: 100px;color: red;">Name</td>
                                            <td style="width: 100px;color: red;">Mobile</td>
                                            <td style="width: 100px;color: red;">Total</td>
                                            <td style="width: 100px;color: red;">Payment</td>
                                            <td style="width: 100px;color: red;">Due</td>
                                            <td style="width: 100px;color: red;">Month</td>
                                            <td style="width: 100px;color: red;">Year</td>
                                            <td style="width: 100px;color: red;">Action</td>
                                        </tr>
                                <?php
                                        $sls = 0;
                                        while ($rows = $exe_in_ref->fetch_assoc()){
                                            $ids = $rows['id'];
                                            $ref_namess = $rows['name'];
                                            $ref_mobiless  = $rows['mobile'];
                                            $totalss = $rows['total'];
                                            $paymentss = $rows['payment'];
                                            $duess = $rows['due'];
                                            $monthss = $rows['month'];
                                            $yearss = $rows['year'];
                                            $sls++;
                                        ?>
                                        <?php 
                                        if($in_count > 0) { ?>
                                    
                                    
                                        <tr>
                                            <td style="width: 100px;color: red;"><?php echo $sls;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $ref_namess;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $ref_mobiless;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $totalss;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $paymentss;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $duess;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $monthss;?></td>
                                            <td style="width: 100px;color: red;"><?php echo $yearss;?></td>
                                            <td style="width: 100px;color: red;">
                                                <a href="in_slip.php?id=<?php echo  $ids;?>">Slip</a>
                                            </td>
                                        </tr>
                                    
                                        <?php } 
                                    }
                                        }
                                    }
                                ?></table>
                                <div class="row">
                                    
                                    
                                    
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
