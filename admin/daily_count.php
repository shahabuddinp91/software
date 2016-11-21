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
                                Dashboard Of Admin
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include '../admin/left_side_admin.php'; ?>
                            </div>
                        </div>
                        <?php
                        include '../connection/db.php';
                        $reception_total = '';
                        $RegNo = '';
                        $message = '';
                        $indoor_test_payable = '';
                        $visit_amount = '';
                        $out_test_total = '';
                        $out_test_payment = '';
                        $out_test_p_due = '';
                        $admission_payment_bill = '';
                        $pharmacy_total = '';
                        $pharmacy_payment = '';
                        $pharmacy_due = '';
                        $pharmacy_total_out = '';
                        $in_pharma_payment = '';
                        $account_total = '';
                        $total_payment = '';
                        $acc_due = '';
                        $admission_payment_bill_em = '';
                        $count_daily_paymrnt = '';
                        $other_payment = '';
                        $payable_amount = '';
                        $rec_payment1 = '';
                        $rec_due1 = '';
                        $dia_payment1 = '';
                        $dia_due1 = '';
                        $phar_payment1 = '';
                        $phar_due1 = '';
                        $acc_due1 = '';
                        $acc_pay1 = '';
                        $RegNo = '';
                        $dressing_bill = '';
                        if (isset($_POST['date'])) {
                            extract($_POST);
                            //echo $RegNo;
                            if (!$RegNo) {
                                $message = 'Enter date !';
                            } else {
                                //for check
                                $select_daily_payment = "SELECT * FROM `daily_payment` WHERE date = '$RegNo'";
                                $ex_daily_payment = $conn->query($select_daily_payment);
                                $count_daily_paymrnt = mysqli_num_rows($ex_daily_payment);
                                if( $count_daily_paymrnt == 1){
                                    $rec_pay = "SELECT sum(rec_pay) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_rec_pay = $conn->query($rec_pay);
                                    while ($row_rec = $ex_rec_pay->fetch_assoc()){
                                        $rec_payment1 = $row_rec['sum(rec_pay)'];
                                    }
                                    //echo $rec_payment1;
                                    
                                    $rec_due = "SELECT sum(rec_due) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_rec_due = $conn->query($rec_due);
                                    while ($row_rec = $ex_rec_due->fetch_assoc()){
                                        $rec_due1 = $row_rec['sum(rec_due)'];
                                    }
                                    //echo $rec_due1;
                                    $dia_pay = "SELECT sum(dia_pay) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_dia_pay= $conn->query($dia_pay);
                                    while ($row_dia = $ex_dia_pay->fetch_assoc()){
                                        $dia_payment1 = $row_dia['sum(dia_pay)'];
                                    }
                                    //echo $dia_payment1;
                                    $dia_due = "SELECT sum(dia_due) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_dia_due= $conn->query($dia_due);
                                    while ($row_dia = $ex_dia_due->fetch_assoc()){
                                        $dia_due1 = $row_dia['sum(dia_due)'];
                                    }
                                    //echo $dia_due1;
                                    $phar_pay = "SELECT sum(phar_pay) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_phar_pay= $conn->query($phar_pay);
                                    while ($row_phar = $ex_phar_pay->fetch_assoc()){
                                        $phar_payment1 = $row_phar['sum(phar_pay)'];
                                    }
                                    //echo $phar_payment1;
                                    
                                    $phar_due = "SELECT sum(phar_due) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_phar_due= $conn->query($phar_due);
                                    while ($row_phar = $ex_phar_due->fetch_assoc()){
                                        $phar_due1 = $row_phar['sum(phar_due)'];
                                    }
                                    //echo $phar_due1;
                                    $acc_due22 = "SELECT sum(acc_due) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_acc_due= $conn->query($acc_due22);
                                    while ($row_acc = $ex_acc_due->fetch_assoc()){
                                        $acc_due1 = $row_acc['sum(acc_due)'];
                                    }
                                    //echo $acc_due1;
                                    
                                    $acc_payment = "SELECT sum(acc_pay) FROM `daily_payment` WHERE date = '$RegNo'";
                                    $ex_acc_pay= $conn->query($acc_payment);
                                    while ($row_acc = $ex_acc_pay->fetch_assoc()){
                                        $acc_pay1 = $row_acc['sum(acc_pay)'];
                                    }
                                    //echo $acc_pay1;
                                }
                                
                               
                                //for reception (outdoor test bill)
                                $select_out_test_bill = "SELECT * FROM `outdoor_test_bill` WHERE date = '$RegNo'";
                                $execute_out_test_bill = $conn->query($select_out_test_bill);
                                $count_out_test_bill = mysqli_num_rows($execute_out_test_bill);

                                if ($count_out_test_bill > 0) {
                                    $out_test_total = "SELECT sum(bill_after_diss) FROM `outdoor_test_bill` WHERE date = '$RegNo'";
                                    $execute_out_test_total = $conn->query($out_test_total);
                                    while ($row = $execute_out_test_total->fetch_assoc()) {
                                        $out_test_total = $row['sum(bill_after_diss)'];
                                    }
                                    //echo $out_test_total;

                                    $out_test_p_payment = "SELECT sum(payment) FROM `outdoor_test_bill` WHERE date = '$RegNo'";
                                    $execute_out_p_payment = $conn->query($out_test_p_payment);
                                    while ($row = $execute_out_p_payment->fetch_assoc()) {
                                        $out_test_payment = $row['sum(payment)'];
                                    }
                                    //echo $out_test_p_payment;
                                    $out_test_p_due = $out_test_total - $out_test_payment;
                                    //echo $out_test_p_due;
                                }

                                //Reception (admission bill) 
                                
                                $select_objervation = "SELECT * FROM `dreasing_bill` WHERE date = '$RegNo'";
                                $exe_ob = $conn->query($select_objervation);
                                $count_ob = mysqli_num_rows($exe_ob);
                                if($count_ob > 0){
                                    $select_ob_bill = "SELECT sum(total) FROM `dreasing_bill` WHERE date = '$RegNo'";
                                    $exe_ob_bill = $conn->query($select_ob_bill);
                                    while ($row = $exe_ob_bill->fetch_assoc()){
                                        $dressing_bill = $row['sum(total)'];
                                    }
                                    //echo $dressing_bill;
                                    
                                    $select_ob_pay = "SELECT sum(payment) FROM `dreasing_bill` WHERE date = '$RegNo'";
                                    $exe_ob_pay = $conn->query($select_ob_pay);
                                    while ($row = $exe_ob_pay->fetch_assoc()){
                                        $dressing_pay = $row['sum(payment)'];
                                    }
                                    //echo $dressing_pay;
                                }
                                
                                $select_admission = "SELECT * FROM `patient_admission_system` WHERE admission_date = '$RegNo'";
                                $execute_admission = $conn->query($select_admission);
                                $count_admission = mysqli_num_rows($execute_admission);
                                if ($count_admission > 0) {
                                    $admission_total = 300 * $count_admission;
                                    $admission_payment = "SELECT sum(admission_payment) FROM `patient_admission_system` WHERE admission_date = '$RegNo'";
                                    $execute_admission_paymen = $conn->query($admission_payment);
                                    while ($row = $execute_admission_paymen->fetch_assoc()) {
                                        $admission_payment_bill = $row['sum(admission_payment)'];
                                    }
                                    
//                                    $admission_payment_em = "SELECT sum(admission_payment) FROM `patient_admission_system` WHERE admission_date = '$RegNo' and sel = '1'";
//                                    $execute_admission_paymen_em = $conn->query($admission_payment_em);
//                                    while ($row = $execute_admission_paymen_em->fetch_assoc()) {
//                                        $admission_payment_bill_em = $row['sum(admission_payment)'];
//                                    }
                                    //echo $admission_payment_bill_em;
                                }

                                $select_entery = "SELECT * FROM `patient_entry_form` WHERE reg_date = '$RegNo'";
                                $execute_entey = $conn->query($select_entery);
                                $count_entry = mysqli_num_rows($execute_entey);

                                if ($count_entry > 0) {
                                    $select_visit_amount = "SELECT sum(visited_amount) FROM `patient_entry_form` WHERE reg_date = '$RegNo'";
                                    $execute_visit = $conn->query($select_visit_amount);
                                    while ($row = $execute_visit->fetch_assoc()) {
                                        $visit_amount = $row['sum(visited_amount)'];
                                    }
                                    //echo $visit_amount;
                                }
                                $reception_total = $out_test_total + $visit_amount ;

                                //receiption diagnostic
                                $select_test_indoor = "SELECT * FROM `diagonostic_patient_bill` WHERE date = '$RegNo'";
                                $execute_indoor_test = $conn->query($select_test_indoor);
                                $count_indoor_test = mysqli_num_rows($execute_indoor_test);
                                $indoor_test_payable = '';
                                if ($count_indoor_test > 0) {
                                    $select_indoor_test = "SELECT sum(payment) FROM `diagonostic_patient_bill` WHERE date = '$RegNo'";
                                    $execute_payment_indoor = $conn->query($select_indoor_test);
                                    while ($row = $execute_payment_indoor->fetch_assoc()) {
                                        $indoor_test_payable = $row['sum(payment)'];
                                    }
                                }
                                //echo $indoor_test_payable;
                                //pharmacy section
                                $select_pharmacy_out = "SELECT * FROM `out_pharmacy_bill` WHERE date = '$RegNo'";
                                $execute_pharmacy_out = $conn->query($select_pharmacy_out);
                                $count_pharmacy_out = mysqli_num_rows($execute_pharmacy_out);
                                if ($count_pharmacy_out > 0) {
                                    $select_total_out_pharma = "SELECT sum(total_bill) FROM `out_pharmacy_bill` WHERE date = '$RegNo'";
                                    $execute_total_pharma = $conn->query($select_total_out_pharma);
                                    while ($row = $execute_total_pharma->fetch_assoc()) {
                                        $pharmacy_total_out = $row['sum(total_bill)'];
                                    }
                                    //echo $pharmacy_total;

                                    $select_payment_out_pharma = "SELECT sum(payment) FROM `out_pharmacy_bill` WHERE date = '$RegNo'";
                                    $execute_payment_pharma = $conn->query($select_payment_out_pharma);
                                    while ($row = $execute_payment_pharma->fetch_assoc()) {
                                        $pharmacy_payment = $row['sum(payment)'];
                                    }
                                    //echo $pharmacy_payment;

                                    $select_due_out_pharma = "SELECT sum(due) FROM `out_pharmacy_bill` WHERE date = '$RegNo'";
                                    $execute_due_pharma = $conn->query($select_due_out_pharma);
                                    while ($row = $execute_due_pharma->fetch_assoc()) {
                                        $pharmacy_due = $row['sum(due)'];
                                    }
                                    //echo $pharmacy_due;
                                }

                                $select_in_pharma = "SELECT * FROM `pharmacy_patient_bill` WHERE date = '$RegNo'";
                                $execute_in_pharmacy = $conn->query($select_in_pharma);
                                $count_in_pharma = mysqli_num_rows($execute_in_pharmacy);
                                if ($count_in_pharma > 0) {
                                    $select_payment_in_pharmacy = "SELECT sum(payment) FROM `pharmacy_patient_bill` WHERE date = '$RegNo'";
                                    $execute_in_payment = $conn->query($select_payment_in_pharmacy);
                                    while ($row = $execute_in_payment->fetch_assoc()) {
                                        $in_pharma_payment = $row['sum(payment)'];
                                    }
                                }
                                //echo $in_pharma_payment;
                                //account section

                                $select_account = "SELECT * FROM `storeallbill` WHERE release_date = '$RegNo'";
                                $execute_account = $conn->query($select_account);
                                $count_account = mysqli_num_rows($execute_account);
                                if ($count_account > 0) {
                                    $select_acc_total = "SELECT sum(total) FROM `storeallbill` WHERE release_date = '$RegNo'";
                                    $execute_account_total = $conn->query($select_acc_total);
                                    while ($row = $execute_account_total->fetch_assoc()) {
                                        $account_total = $row['sum(total)'];
                                    }
                                    //echo $account_total;

                                    $select_acc_payment = "SELECT sum(payment) FROM `storeallbill` WHERE release_date = '$RegNo'";
                                    $execute_payment = $conn->query($select_acc_payment);
                                    while ($row = $execute_payment->fetch_assoc()) {
                                        $total_payment = $row['sum(payment)'];
                                    }
                                    //echo $total_payment;
                                    $acc_due = $account_total - $total_payment;
                                    //echo $acc_due;
                                    $select_acc_all = "SELECT sum(a_p_d_total) FROM `storeallbill` WHERE release_date = '$RegNo'";
                                    $exe_all = $conn->query($select_acc_all);
                                    while ($row = $exe_all->fetch_assoc()) {
                                        $other_payment = $row['sum(a_p_d_total)'];
                                    }
                                } //echo $other_payment;
                                $payable_amount = $total_payment - $other_payment;
                            }
                        }
                        ?>
                        <div class="col-md-10" style="font-family: caption;">
                            <h2 style="color: #c9302c;font-size: 26px;
    margin-left: 278px;
    text-transform: uppercase;">Daily payment system</h2>
                            <form class="form-horizontal" role="form"  method="POST" action="" style="margin-top: 5px;">
                                <p style="color: red;font-family: caption; font-size: 18px;text-align: center;text-transform: uppercase;"><?php echo $message; ?></p>
                                <div class="container-fluid" style="border-top: 1px solid;
    padding-top: 12px;">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label col-sm-4" for="RegNo">Select date :</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control datepicker" value="<?php echo $RegNo; ?>" id="RegNo" name="RegNo" placeholder="Please select date !">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="submit" name="date" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-danger">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form class="form-horizontal daily_count_form" role="form">
                                <div class="container-fluid" style="border: 1px solid;margin-bottom: 30px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p style="background: #ffd972 none repeat scroll 0 0;
    border: 1px solid;
    padding: 3px 5px;">Reception Desk (Diagnostic)</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>
                                                    <p>Visit amount : <?php echo $visit_amount; ?> tk.</p>
                                                <?php } ?>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>
                                                    <p>Outdoor test amount : <?php echo $out_test_total; ?> tk.</p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>
                                                    <p>Total amount : <?php echo $reception_total; ?> tk.</p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>
                                                    <p>Payable amount : <?php echo $reception_total - $out_test_p_due; ?> tk.</p>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>
                                                    <p>Outdoor test due : <?php echo $out_test_p_due; ?> tk.</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                                if($count_daily_paymrnt == 1) { ?>
                                            <p style=" background: #dcebf9 none repeat scroll 0 0;
    border: 1px solid;
    color: red;
    padding: 4px 250px;"><?php echo 'Diagnostic admin already payment taka : '.$rec_payment1 .' & due taka '.$rec_due1;?></p>
                                                <?php }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="rec_total">Diagnostic total:</label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" id="take_date" value="<?php echo $RegNo;?>">
                                                    <input style="color: red;" type="text" class="form-control" value="<?php echo $reception_total; ?>"  id="rec_total" name="rec_total" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="rec_pay">Diagnostic Payment:</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control" value=""  id="rec_pay" name="rec_pay" >
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#rec_pay').on('keyup', function (e) {
                                                        e.preventDefault();
                                                        var rec_pay = $(this).val();
                                                        var date = $('#take_date').attr("value");
                                                        var rec_total = $('#rec_total').attr("value");
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'reception_cal.php',
                                                            data: {date:date,rec_pay: rec_pay, rec_total: rec_total}
                                                        })
                                                                .done(function (r) {
                                                                    //alert(r)
                                                                    $('.rec_due').html(r);
                                                                })

                                                    })
                                                })
                                            </script>

                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="rec_due">Diagnostic Due:</label>
                                                <div class="col-sm-8 rec_due">
                                                    <input style="color: red;" type="text" class="form-control"   id="rec_due" name="rec_due" readonly>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <p style="background: #ffd972 none repeat scroll 0 0;
    border: 1px solid;
    padding: 3px 5px;">Reception Desk (Hospital)</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Indoor test amount : <?php echo $indoor_test_payable; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Admission amount : <?php echo $admission_payment_bill; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Outdoor amount : <?php echo $dressing_bill; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Total amount : <?php echo $dressing_bill+$admission_payment_bill+$indoor_test_payable; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Payable amount : <?php echo $dressing_pay+$admission_payment_bill+$indoor_test_payable; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Outdoor Due : <?php echo $dressing_bill-$dressing_pay; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                                if($count_daily_paymrnt == 1) { ?>
                                            <p style=" background: #dcebf9 none repeat scroll 0 0;
    border: 1px solid;
    color: red;
    padding: 4px 250px;"><?php echo 'Reception admin already payment taka : '.$dia_payment1 .' & due taka '.$dia_due1;?></p>
                                                <?php }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="dia_total">Reception total:</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control" value="<?php echo $indoor_test_payable+$dressing_bill+$admission_payment_bill; ?>"  id="dia_total" name="dia_total" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="dia_payment">Reception payment:</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control"   id="dia_payment" name="dia_payment" >
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#dia_payment').on('keyup', function (e) {
                                                        e.preventDefault();
                                                        var dia_pay = $(this).val();
                                                        var date = $('#take_date').attr("value");
                                                        var dia_total = $('#dia_total').attr("value");
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'Diagnostic_cal.php',
                                                            data: {date:date,dia_pay: dia_pay, dia_total: dia_total}
                                                        })
                                                                .done(function (r) {
                                                                    //alert(r)
                                                                    $('.dia_due').html(r);
                                                                })

                                                    })
                                                })
                                            </script>
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="dia_due">Reception Due:</label>
                                                <div class="col-sm-8 dia_due">
                                                    <input style="color: red;" type="text" class="form-control"   id="dia_due" name="dia_due" readonly>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <p style="background: #ffd972 none repeat scroll 0 0;
    border: 1px solid;
    padding: 3px 5px;">Pharmacy Management</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Outdoor pharmacy amount : <?php echo $pharmacy_total_out; ?> tk.</p>
                                                <?php }
                                                ?>

                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Indoor pharmacy amount : <?php echo $in_pharma_payment; ?> tk.</p>
                                                <?php }
                                                ?>

                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Total amount : <?php echo $in_pharma_payment + $pharmacy_total_out; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Payable amount : <?php echo ($in_pharma_payment + $pharmacy_payment); ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                            <div class="col-md-4">
                                                <?php
                                                if (isset($_POST['date'])) {
                                                    ?>  
                                                    <p>Outdoor due amount : <?php echo $pharmacy_due; ?> tk.</p>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                                if($count_daily_paymrnt == 1) { ?>
                                            <p style=" background: #dcebf9 none repeat scroll 0 0;
    border: 1px solid;
    color: red;
    padding: 4px 250px;"><?php echo 'Pharmacy admin already payment taka : '.$phar_payment1 .' & due taka '.$phar_due1;?></p>
                                                <?php }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="phar_total">Pharmacy total :</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control" value="<?php echo $in_pharma_payment + $pharmacy_total_out; ?>"  id="phar_total" name="phar_total" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="phar_pay">Pharmacy payment :</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control"  id="phar_pay" name="phar_pay" >
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#phar_pay').on('keyup', function (e) {
                                                        e.preventDefault();
                                                        var phar_pay = $(this).val();
                                                        var date = $('#take_date').attr("value");
                                                        var phar_total = $('#phar_total').attr("value");
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'pharmacy_cal.php',
                                                            data: {date:date,phar_pay: phar_pay, phar_total: phar_total}
                                                        })
                                                                .done(function (r) {
                                                                    //alert(r)
                                                                    $('.phar_due').html(r);
                                                                })

                                                    })
                                                })
                                            </script>

                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="phar_due">Pharmacy Due :</label>
                                                <div class="col-sm-8 phar_due">
                                                    <input style="color: red;" type="text" class="form-control"   id="phar_due" name="phar_due" readonly>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-12">
                                            <p style="background: #ffd972 none repeat scroll 0 0;
    border: 1px solid;
    padding: 3px 5px;">Accounts Management</p>
                                        </div>
                                        <div class="col-md-12">
                                            <?php if (isset($_POST['date'])) { ?>
                                                <div class="col-md-4">
                                                    <p>Account amount : <?php echo $account_total - $other_payment; ?> tk.</p>
                                                </div>
                                            <?php } ?>
                                            <?php if (isset($_POST['date'])) { ?>
                                                <div class="col-md-4">
                                                    <p>Payable amount : <?php echo $payable_amount; ?> tk.</p>
                                                </div>
                                            <?php } ?>
                                            <?php if (isset($_POST['date'])) { ?>
                                                <div class="col-md-4">
                                                    <p>Due amount : <?php echo $acc_due; ?> tk.</p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                                if($count_daily_paymrnt == 1) { ?>
                                            <p style=" background: #dcebf9 none repeat scroll 0 0;
    border: 1px solid;
    color: red;
    padding: 4px 250px;"><?php echo 'Account admin already payment taka : '.$acc_pay1 .' & due taka '.$acc_due1;?></p>
                                                <?php }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="acc_total">Account total :</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control" value="<?php echo $account_total - $other_payment; ?>"  id="acc_total" name="acc_total" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="acc_pay">Account payment :</label>
                                                <div class="col-sm-8">
                                                    <input style="color: red;" type="text" class="form-control"  id="acc_pay" name="acc_pay">
                                                </div>
                                            </div>

                                            <script>
                                                $(document).ready(function () {
                                                    $('#acc_pay').on('keyup', function (e) {
                                                        e.preventDefault();
                                                        var acc_pay = $(this).val();
                                                        var date = $('#take_date').attr("value");
                                                        var acc_total = $('#acc_total').attr("value");
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'account_cal.php',
                                                            data: {date:date,acc_pay: acc_pay, acc_total: acc_total}
                                                        })
                                                                .done(function (r) {
                                                                    //alert(r)
                                                                    $('.acc_due').html(r);
                                                                })

                                                    })
                                                })
                                            </script>

                                            <div class="form-group col-md-4">
                                                <label class="control-label col-sm-4" for="acc_due">Account Due :</label>
                                                <div class="col-sm-8 acc_due">
                                                    <input style="color: red;" type="text" class="form-control"   id="acc_due" name="acc_due" readonly>
                                                </div>
                                            </div>
                                            <!--its for total amount of .....-->
                                          <?php
//                                            $all_total_r_p_d_a=($reception_total + $in_pharma_payment + $pharmacy_total_out + $account_total + $indoor_test_payable) - $other_payment;;
////                                            
                                             ?>

                                        </div>
                                        <div class="col-md-12">
                                            <p>Total for date : <?php echo $RegNo; ?></p>
                                            <?php
                                                $allbbb = ($in_pharma_payment + $pharmacy_total_out+$indoor_test_payable+$dressing_bill+$admission_payment_bill+$reception_total+$account_total)-$other_payment;
                                            ?>
                                            <p>Amount : <?php echo  $allbbb;?> tk.</p>
                                            <?php
                                            $allpay = '';
                                               $select_all_pay = "SELECT * FROM `daily_payment` WHERE date = '$RegNo'";
                                               $exe_toooo = $conn->query($select_all_pay);
                                               while ($row = $exe_toooo->fetch_assoc()){
                                                   $allpay = $row['total_pay'];
                                               }
                                            ?>
                                            <p>Payable : <?php echo $allpay;?> tk.</p>
                                            <p>Due : <?php echo ($allbbb-$allpay);?> tk.</p>
                                        </div>
                                        <div class="col-md-4 col-md-offset-8" style="margin-bottom: 30px;">
                                            <input type="hidden" name="date_pass" value="<?php echo $RegNo; ?>" >
                                            <button class="btn-primary submit" type="submit" name="submit">submit</button>
                                            <button class="clear btn-primary" type="reset" value="Clear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

            <script>
                $(document).ready(function () {
                    $('.submit').on('click', function (e) {
                        e.preventDefault();
                        var data = $('.daily_count_form').serialize();
                        $.ajax({
                            method: 'POST',
                            url: 'insert/daily_count_insert.php',
                            data: data
                        })
                                .done(function (m) {
                                    alert(m);
                                    
                                })
                    })
                })
            </script>
    </body>

</html>
