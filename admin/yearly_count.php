<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
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
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">

    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center" style="font-family: initial;">
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
                        <div class="right_content_area" style="font-family: caption;">
                            <div class="col-md-10">
                                <h2 style="border-bottom: 1px solid;
    color: #0099cc;
    font-family: caption;
    font-size: 28px;
    padding-bottom: 7px;
    padding-left: 183px;">Advance search for Yearly payment count</h2>
                                <?php 
                                $message = '';
                                $count = '';
                                include '../connection/db.php';
                                    if(isset($_POST['total'])){
                                        $count = '';
                                        $rec_total = '';
                                        extract($_POST);
                                        //echo $total_month.' '.$total_year;
                                        if($total_year == 1){
                                            $message = 'Select year !';
                                        }  else {
                                            $select_value = "SELECT * FROM `daily_payment` WHERE year = '$total_year'";
                                            $execute_value = $conn->query($select_value);
                                            $count = mysqli_num_rows($execute_value);
                                            if($count > 0){
                                                $message = 'Search complete for  year : '.$total_year;
                                                $select_all = "SELECT sum(rec_total), sum(rec_pay),sum(rec_due),sum(dia_total),sum(dia_pay),"
                                                        . "sum(dia_due),sum(phar_total),sum(phar_pay),sum(phar_due),sum(acc_total),sum(acc_pay),sum(acc_due),sum(total),sum(total_pay),sum(total_due) FROM `daily_payment` WHERE year = '$total_year'";
                                                $execute_sql = $conn->query($select_all);
                                                while ($row = $execute_sql->fetch_assoc()){
                                                    $rec_total = $row['sum(rec_total)'];
                                                    $rec_pay = $row['sum(rec_pay)'];
                                                    $rec_due = $row['sum(rec_due)'];
                                                    $dia_total = $row['sum(dia_total)'];
                                                    $dia_pay = $row['sum(dia_pay)'];
                                                    $dia_due = $row['sum(dia_due)'];
                                                    $phar_total = $row['sum(phar_total)'];
                                                    $phar_pay = $row['sum(phar_pay)'];
                                                    $phar_due = $row['sum(phar_due)'];
                                                    $acc_total = $row['sum(acc_total)'];
                                                    $acc_pay = $row['sum(acc_pay)'];
                                                    $acc_due = $row['sum(acc_due)'];
                                                    $total = $row['sum(total)'];
                                                    $total_payment = $row['sum(total_pay)'];
                                                    $total_due = $row['sum(total_due)'];
                                                }
                                                //echo $rec_total;
                                            }  else {
                                                $message = 'Data not found for year : '.$total_year;
                                            }
                                        }
                                    }
                                ?>
                                <form method="post" action="">
                                    <p style="color: red;
    font-size: 18px;
    padding-left: 181px;"><?php echo $message;?></p>
                                    <div class="nei" style="margin-left: 100px;">
                                        
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
                                
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-9" style=" margin-left: 36px;
    margin-top: 34px;">
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Reception Total : '.$rec_total;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Reception Payment : '.$rec_pay;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Reception Due : '.$rec_due;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Diagnostic Total : '.$dia_total;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Diagnostic Payment : '.$dia_pay;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Diagnostic Due : '.$dia_due;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Pharmacy Total : '.$phar_total;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Pharmacy Payment : '.$phar_pay;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p><?php echo 'Pharmacy Due : '.$phar_due;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p style="border-bottom: 1px solid;"><?php echo 'Account Total : '.$acc_total;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p style="border-bottom: 1px solid;"><?php echo 'Account payment : '.$acc_pay;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p style="border-bottom: 1px solid;"><?php echo 'Account Due : '.$acc_due;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  
                                                 
                                                $select_debit = "SELECT sum(Total) FROM `debit` WHERE  year = '$total_year'";
                                                $exe_debit = $conn->query($select_debit);
                                                while ($row = $exe_debit->fetch_assoc()){
                                                    $debit  = $row['sum(Total)'];
                                                }
                                                $select_salary = "SELECT sum(payment) FROM `salary` WHERE  year = '$total_year'";
                                                $exe_salary = $conn->query($select_salary);
                                                while ($row = $exe_salary->fetch_assoc()){
                                                    $salary = $row['sum(payment)'];
                                                }
                                                
                                                $ref_in_select = "SELECT sum(payment) FROM `in_reference` WHERE  year = '$total_year'";
                                                $exe_in = $conn->query($ref_in_select);
                                                while ($row = $exe_in->fetch_assoc()){
                                                    $in_ref = $row['sum(payment)'];
                                                }
                                                
                                                $ref_out_select = "SELECT sum(payment) FROM `out_reference` WHERE  year = '$total_year'";
                                                $exe_out = $conn->query($ref_out_select);
                                                while ($row = $exe_out->fetch_assoc()){
                                                    $out_ref = $row['sum(payment)'];
                                                }
                                                
                                            
                                            ?>
                                            <p style="color:#B12807"><?php echo 'All Total : '.$total;?> tk.</p>
                                            <br>
                                            <p style="color:#B12807"><span style="text-align: right;"><?php echo 'Account Expense : '.$debit;?> tk.</span></p>
                                            <p style="color:#B12807"><?php echo 'Salary Expense : '.$salary;?> tk.</p>
                                            <p style="color:#B12807;border-bottom: 1px solid;"><?php echo 'Honoree Expense : '.($in_ref+$out_ref);?> tk.</p>
                                            <p style="color:#B12807"><?php echo 'Total Expense : '.($salary+$debit+$in_ref+$out_ref);?> tk.</p>
                                            <br><?php
                                            $expance = $salary+$debit+$in_ref+$out_ref;
                                            ?>
                                            
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p style="color:#B12807"><?php echo 'All Payment : '.$total_payment;?> tk.</p>
                                            <p style="color:#B12807;border-bottom: 1px solid;"><?php echo 'Total Expense : '.($salary+$debit+$in_ref+$out_ref);?> tk.</p>
                                            <p style="color:#B12807"><?php echo 'Net Balance : '.($total_payment-$expance);?> tk.</p>
                                            <?php    }
                                            ?>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                                if($count > 0) {  ?>
                                            <p style="color:#B12807"><?php echo 'All Due : '.$total_due;?> tk.</p>
                                            <?php    }
                                            ?>
                                            
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
