<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
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
                                Dashboard Of Accounts
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 670px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container-fluid">
                                    <div class="col-md-10">
                                        <br>

                                        <?php
                                        include '../connection/db.php';
                                        $validation = TRUE;
                                        $msg = '';
                                        $count_message = '';
                                        $regno = '';
                                        $patient_name = '';
                                        $guardian_name = '';
                                        $mobile = '';
                                        $address = '';
                                        $gender = '';
                                        $age = '';
                                        $doctor_name = '';
                                        $visit_amount = '';

                                        $pharmacy_bill = '';
                                        $diagonostic_bill = '';
                                        $pharmercy_bill = '';
                                        $add_bill = '';

                                        if (isset($_POST['RegSubmit'])) {
                                            $regno = $_POST['RegNo'];
//                                                echo $regno;
                                            if (!$regno) {
                                                $msg = "Please, Enter Registration ID !";
                                                $validation = FALSE;
                                            }
                                            if ($validation) {
//                                                $select_query = "Select * from patient_entry_form where id='$regno'";
                                                $select_query = "SELECT * FROM `patient_entry_form` WHERE id = '$regno'";
//                                                    echo $select_query;
//                                                    die();
                                                $execute_sql = $conn->query($select_query);
                                                $count_patient = mysqli_num_rows($execute_sql);

                                                
                                                    while ($row = $execute_sql->fetch_assoc()) {
                                                        $patient_name = $row['patient_name'];
                                                        $guardian_name = $row['guardian_name'];
                                                        $mobile = $row['mobile'];
                                                        $address = $row['address'];
                                                        $gender = $row['gender'];
                                                        $age = $row['age'];
                                                        $doctor_name = $row['doctor_name'];
                                                        $visit_amount = $row['visit_amount'];

//                                                        from pharmacy
//                                                        $pharmacy_bill=$row['pharmacy_bill'];
//                                                        from diagonostic
                                                        
                                                    }
                                                $select_dia = "SELECT * FROM `diagonostic_patient_bill` WHERE regi_id = '$regno'";
                                                $execute_dia = $conn->query($select_dia);
                                                while ($dia = $execute_dia->fetch_assoc()){
                                                    $diagonostic_bill = $dia['diagonostic_bill'];
                                                }
                                                
                                                if(!$execute_sql){
                                                    $count_message = 'Data not found !';
                                                }
                                            }
                                            
                                            
                                        }
                                        ?>
                                        
                                        <?php
                                                if(isset($_POST['submit'])){
                                                    extract($_POST);
                                                    date_default_timezone_set("Asia/Dhaka");
                                                    $month = date('F');
                                                    //echo $reg_no.' '.$VisitAmount.' ' .$PharmacyAmount.' ' .$DiagonosticAmount.' '.$AdmissionAmount.' '.$subbill.' '.$vat.' '.$TotalBill.' '.$PaymentBill;
                                                    $insert_final = "INSERT INTO `storeallbill`( `reg_id`, `visit_amount`, `pharmacy_bill`, `diagonostic_bill`, `admission_bill`, `sub_total`, `vat`, `total_bill`, `payment_bill`, `current_month`) VALUES ('$reg_no','$VisitAmount','$PharmacyAmount','$DiagonosticAmount','$AdmissionAmount','$subbill','$vat','$TotalBill','$PaymentBill','$month')";
                                                    
                                                    $execute_final = $conn->query($insert_final);
                                                    if($execute_final){
                                                        $msg = 'Payment successful !';
                                                    }
                                                }
                                            ?>
                                        
                                        
                                        <div class="panel panel-primary modal-content modal-body">
                                            <div class="panel-heading" align="center">Store All Bill</div>
                                            <p style="color: #941596; font-size: 20px; font-family: cursive; text-align: center;"> <?php echo $msg, $count_message; ?></p>
                                            <br>
                                            <form class="form-horizontal container-fluid" role="form" action="" method="post">
                                                <div class="form-group col-md-10">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="RegNo" name="RegNo" value="<?php echo $regno; ?>" placeholder="Registration No">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" name="RegSubmit" class="btn btn-default btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-success">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                            
                                            <form class="form-horizontal" role="form" action="" method="post">
                                                <p style="background: #f1af11 none repeat scroll 0 0;
    border: 1px solid #f1af11;color: #000;font-family: caption;font-size: 17px;padding: 5px 0;
    text-align: center;text-transform: uppercase;">Patient details</p>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="PatientName">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" value="<?php echo $regno;?>" name="reg_no">
                                                        <input type="text" class="form-control" id="PatientName" name="PatientName" value="<?php echo $patient_name; ?>" placeholder="Patient Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="guardianName">Guardian Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="guardianName" name="guardianName" value="<?php echo $guardian_name; ?>" placeholder="Guardian Name" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="MobileNo">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="MobileNo" name="MobileNo" value="<?php echo $mobile; ?>" placeholder="Mobile No" readonly>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="VisitAmount">Visited Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" id="VisitAmount" value="<?php echo $visit_amount; ?>" name="VisitAmount" placeholder="Visit Amount">
                                                    </div>
                                                </div>
                                                
                                                <?php
                                                    $select_phr = "SELECT * FROM `pharmacy_patient_bill` WHERE regi_id = '$regno'";
                                                    $execute_phr = $conn->query($select_phr);
                                                    while ($pharma = $execute_phr->fetch_assoc()){
                                                        $pharmercy_bill = $pharma['pharmacy_bill'];
                                                    }
                                                    //echo $pharmercy_bill;
                                                ?>
                                                
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="PharmacyAmount">Pharmacy Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" id="PharmacyAmount" name="PharmacyAmount" value="<?php echo $pharmercy_bill;?>">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="DiagonosticAmount">Diagonostic Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" id="DiagonosticAmount" value="<?php echo $diagonostic_bill; ?>" name="DiagonosticAmount" placeholder="Diagonostic Bill">
                                                    </div>
                                                </div>
                                                
                                                <?php
                                                    $select_add = "SELECT * FROM `admission_detail_bill` WHERE reg_id = '$regno'";
                                                    $execute_add = $conn->query($select_add);
                                                    while ($add = $execute_add->fetch_assoc()){
                                                        $add_bill = $add['total_bill'];
                                                    } 
                                                    $total_bill = $add_bill+$pharmercy_bill+$visit_amount+$diagonostic_bill;
                                                ?>
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="AdmissionAmount">Admission Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" value="<?php echo $add_bill;?>" id="AdmissionAmount" name="AdmissionAmount" placeholder="Admission Bill">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="Subtotal">Sub Total Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" value="<?php echo $total_bill;?>" class="form-control" id="subbill" name="subbill" placeholder="Total Bill">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="vat">Vat:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"  class="form-control" id="vat" name="vat" placeholder="Enter vat %.">
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    $(document).ready(function () {
                                                        $('#vat').on('keyup', function (e) {
                                                            e.preventDefault();
                                                            var vat = $(this).val();
                                                            var sub_total = $('#subbill').attr("value");
                                                            $.ajax({
                                                                method: 'POST',
                                                                url: 'vat.php',
                                                                data:{vat:vat,sub_total:sub_total}
                                                            })
                                                                    .done(function (m) {
                                                                        //alert(m)
                                                                        $('#final').html(m);
                                                                    })
                                                        })
                                                    })
                                                </script>
                                                
                                                <div id="final" class="form-group col-md-4" >
                                                    <label class="control-label col-sm-4" for="total"> Total Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" class="form-control" id="TotalBill" name="TotalBill" placeholder="Total Bill">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label col-sm-4" for="PaymentBill">Payment Bill:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="PaymentBill" name="PaymentBill" placeholder="Payment Bill">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" name="submit" class="btn btn-default btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default btn-success">Clear</button>
                                                    </div>
                                                </div>
                                            </form>
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
