<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if(!isset($_SESSION['account_id'])){
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
                        <div class="left_content_area">
                            <?php include './left_side_accounts.php'; ?>
                        </div>
                    </div>
                    
                    <?php
                    $massege = '';
                    $page_count = '';
                    $RegNo = ''; 
                    $name = '';
                    $mobile = '';
                    $g_name = '';
                    $visit_amount = '';
                    $visit_due = '';
                    $admission_fee = '';
                    $admission_due = '';
                    $cabin_no = '';
                    $admission_date = '';
                    $admission_time = '';
                    
                        if(isset($_POST['RegSubmit'])){
                            extract($_POST);
                            //echo $RegNo;
                            $select_sql = "SELECT patient_entry_form.patient_name, patient_entry_form.mobile,patient_entry_form.visited_amount,patient_entry_form.due, patient_admission_system.gardian_name, patient_admission_system.cabin_no,patient_admission_system.admission_fee,patient_admission_system.admission_date,patient_admission_system.admission_time,patient_admission_system.admission_due
                        FROM patient_entry_form INNER JOIN patient_admission_system ON patient_entry_form.id=patient_admission_system.reg_id where patient_admission_system.reg_id = '$RegNo'";
                            $execute_select = $conn->query($select_sql);
                            
                            $count = mysqli_num_rows($execute_select);
                            //echo $count;
                            if( $count == 1){
                                while ($row = $execute_select->fetch_assoc()){
                                    $name = $row['patient_name'];
                                    $mobile = $row['mobile'];
                                    $g_name = $row['gardian_name'];
                                    $visit_amount = $row['visited_amount'];
                                    $visit_due = $row['due'];
                                    $admission_fee = $row['admission_fee'];
                                    $admission_due = $row['admission_due'];
                                    $cabin_no = $row['cabin_no'];
                                    $admission_date = $row['admission_date'];
                                    $admission_time = $row['admission_time'];
                                }
                            }  else {
                               $massege = "Data not Found !" ;
                            }
                            $select_total_bill = "SELECT * FROM `storeallbill` WHERE patient_id = '$RegNo'";
                            $exe_bill = $conn->query($select_total_bill);
                            
                            $page = "SELECT * FROM `storeallbill` WHERE patient_id = '$RegNo'";
                            $exe_page = $conn->query($page);
                            $page_count = mysqli_num_rows($exe_page);
                        }
                    ?>
                    
                    <div class="right_content_area">
                        <div class="col-md-10">
                            <div class="panel panel-primary" style="margin-top: 15px;">
                                <div class="panel-heading text-center">Patient Bill Details</div>
                                <form class="form-horizontal" role="form"  method="POST" action=""style="margin-top: 5px;">
                                    <p style="color: red;font-family: caption; font-size: 18px;text-align: center;text-transform: uppercase;"><?php echo $massege;?></p>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $RegNo;?>" id="RegNo" name="RegNo" placeholder="Registration No">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="submit" name="RegSubmit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <form class="form-horizontal " id="serial" role="form" style="margin-top: 5px;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <input type="hidden"value="<?php echo $RegNo;?>" class="id"  name="RegNo">
                                                <?php 
                                                    if($page_count == 0) {
                                                ?>
                                                <p class="text-center" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Patient Details</p>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="patientName">Patient Name:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control" value="<?php echo $name;?>"  id="patientName" name="patientName" placeholder="Patient Name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="guardianName">Guardian Name:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" readonly="true" value="<?php echo $g_name;?>" class="form-control"  id="guardianName" name="guardianName" placeholder="Enter Father / Husband's Name" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="mobileNo">Mobile No:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control" value="<?php echo $mobile;?>" id="mobileNo" name="mobileNo" placeholder="Mobile No" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                     <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">patient due Bill Details</p>
                                                </div>
                                               
                                                <div class="col-md-12">
<!--                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="visited_amount">Visited Amount:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" value="<?php //echo $visit_amount;;?>" type="text" class="form-control" id="visited_amount" name="visited_amount" placeholder="Visited Amount" readonly="true" >
                                                        </div>
                                                    </div>-->
<!--                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="visit_due">Visited Due:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" value="<?php //echo $visit_due;?>" type="text" class="form-control" readonly="true" id="visit_due" name="visit_due" placeholder="Visited Due" readonly="true">
                                                        </div>
                                                    </div>-->
<!--                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="v_payment">Visited Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="v_payment" name="v_payment" placeholder="Visited Payment">
                                                        </div>
                                                    </div>-->
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="ad_bill">Admission Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" value="<?php echo $admission_fee;?>" class="form-control" id="ad_bill" name="ad_bill" placeholder="Admission Bill!" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="ad_due">Admission Due:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" value="<?php echo $admission_due;?>" type="text" class="form-control" id="ad_due" name="ad_due" placeholder="Admission Due" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="ad_pay">Admission Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="ad_pay" name="ad_pay" placeholder="Admission Payment">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php
                                                $pharmacy_bill = '';
                                                $pharmacy_due = '';
                                                    if(isset($_POST['RegSubmit'])){
                                                        extract($_POST);
                                                        //echo $RegNo;
                                                        $select_pharmacy = "SELECT * FROM `pharmacy_patient_bill` WHERE regi_id = '$RegNo'";
                                                        $execute_sql = $conn->query($select_pharmacy);
                                                        while ($row = $execute_sql->fetch_assoc()){
                                                            $pharmacy_bill = $row['total_bill'];
                                                            $pharmacy_due = $row['due'];
                                                        }
                                                    }
                                                ?>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="pha_bill">Pharmacy Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $pharmacy_bill;?>" id="pha_bill" name="pha_bill" placeholder="Pharmacy Bill!" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="phar_due">Pharmacy Due:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $pharmacy_due;?>" id="phar_due" name="phar_due" placeholder="Pharmacy Due !" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="pahrmacy_pay">Pharmacy Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="pahrmacy_pay" name="pahrmacy_pay" placeholder="Pharmacy Payment!">
                                                        </div>
                                                    </div> 
                                                </div> 
                                                
                                                <?php
                                                    $dia_bill = '';
                                                    $dia_due = '';
                                                    if(isset($_POST['RegSubmit'])){
                                                        extract($_POST);
                                                        //echo $RegNo;
                                                        $select_pharmacy = "SELECT * FROM `diagonostic_patient_bill` WHERE regi_id = '$RegNo'";
                                                        $execute_sql = $conn->query($select_pharmacy);
                                                        while ($row = $execute_sql->fetch_assoc()){
                                                            $dia_bill = $row['total_bill'];
                                                            $dia_due = $row['due'];
                                                        }
                                                    }
                                                ?>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="dia_bill">Diagonostic Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $dia_bill;?>" id="dia_bill" name="dia_bill" placeholder="Diagonostic Bill !" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="dia_due">Diagonostic Due:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $dia_due;?>" id="dia_due" name="dia_due" placeholder="Diagonostic Due !" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="dia_payment">Diagonostic Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="dia_payment" name="dia_payment" placeholder="Diagonostic Payment !">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-12">
                                                     <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Cabin/G.Bed Rent Details</p>
                                                </div>
                                                
                                                <?php
                                                $rate = '';
                                                $category = '';
                                                $cata = '';
                                                $days_between = '';
                                                $room_bill = '';
                                                $sub_total1 = '';
                                                
                                                //echo $days_between;
                                                
                                                    if(isset($_POST['RegSubmit'])){
                                                        extract($_POST);
                                                        
                                                        date_default_timezone_set("Asia/Dhaka");
                                                        $month=date('F');
                                                        $today=date('m/d/Y');

                                                        $star = strtotime($admission_date);
                                                        $end = strtotime($today);

                                                        $days_between = ceil(abs($end - $star) / 86400)+1;
                                                        
                                                        
                                                        
                                                        $select_cabin = "SELECT * FROM `room_info` WHERE cabin_no = '$cabin_no'";
                                                        $execute_cabin = $conn->query($select_cabin);
                                                        while ($row = $execute_cabin->fetch_assoc()){
                                                            $rate =$row['price'];
                                                            $category = $row['room_type'];
                                                        }
                                                        $room_bill = $days_between*$rate;
                                                        if($category == 'ac'){
                                                            $cata = 'AC';
                                                        }
                                                        
                                                        if($category == 'word'){
                                                            $cata = 'Word';
                                                        }
                                                        if($category == 'non-ac'){
                                                            $cata = 'Non-AC';
                                                        }
                                                        echo $room_bill.' '.$dia_bill.' '.$pharmacy_bill.' '.$admission_fee;
                                                        $sub_total1= $room_bill+$dia_bill+$pharmacy_bill +$admission_fee;
                                    
                                                    }
                                                ?>
                                                
                                                <div class="room_system">
                                                    <div class="col-md-12">
                                                        <p style="text-align: center;font-family: caption;font-size: 18px;color: #1AA260;"><?php echo 'Admission date : '.$admission_date.'. Admission time : '. $admission_time;?></p>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="room_no">Cabin/G.Bed No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="cabin_id" id="cabin_id" value="<?php echo $cabin_no;?>">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $cabin_no.' ('.$cata.')';?>" id="room_no" name="room_no" placeholder="Cabin  / G.Bed  No !" readonly="true">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="room_rate">Cabin/G.Bed Rate:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $rate;?>" id="room_rate" name="room_rate" placeholder="Cabin  / G.Bed  Rate !" readonly="true">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="day">Total Day:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="<?php echo $days_between;?>" id="day" name="day" placeholder="Total day !" readonly="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="room_bill">Cabin/G.Bed Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" id="cabin_bill" class="form-control" value="<?php echo $room_bill;?>" id="room_bill" name="room_bill" placeholder="Total bill !" readonly="true">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="room_payment">Cabin/G.Bed Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="room_payment" name="room_payment" placeholder="Cabin Rent / G.Bed Rent Payment !">
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">I.V canula/Catheter/Nabulizer</p>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="I.V canula/Catheter/Nabulizer">Items:</label>
                                                        <div class="col-sm-8">
                                                            <select name="canula" id="canula">
                                                                <option value="I.V canula/Catheter/Nabulizer">I.V canula/Catheter/Nabulizer</option>
                                                                <option value="I.V canula">I.V canula</option>
                                                                <option value="Catheter">Catheter</option>
                                                                <option value="Nabulizer">Nabulizer</option>
                                                                <option value="Nabulizer / Catheter">Nabulizer / Catheter</option>
                                                                <option value="Nabulizer / I.V canula">Nabulizer / I.V canula</option>
                                                                <option value="Nabulizer / I.V canula">Catheter / I.V canula</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="canula_quentity">Quentity:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="canula_quentity" name="canula_quentity" placeholder="Enter quentity!">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="canula_price">Price:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="canula_price" name="canula_price" placeholder="Enter Total price!">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    $(document).ready(function () {
                                                            $('#canula_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var canula_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate.php',
                                                                    data: {check:check,canula_price: canula_price,sub_total:sub_total}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                
                                                <div class="col-md-12">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Phototheraphy</p>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Phototheraphy">Hours:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="Phototheraphy" name="Phototheraphy" placeholder="Phototheraphy Hours!">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Pho_price">Price:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="Pho_price" name="Pho_price" placeholder="Phototheraphy Price!">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    $(document).ready(function () {
                                                            $('#Pho_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Pho_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate1.php',
                                                                    data: {check:check,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                            
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Rylestube</p>
                                                        <div class="col-md-2">
                                                            <label class="control-label" for="Pho_price">Quentity:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Rylestube" value="Rylestube">
                                                            <input type="text" class="form-control" value="" id="Rylestube_quentity" name="Rylestube_quentity" placeholder="Quentity !">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-label" for="Rylestube_price">Price:</label>
                                                        </div>
                                                        
                                                        
                                                        
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" value="" id="Rylestube_price" name="Rylestube_price" placeholder="Price !">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Rylestube_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Rylestube_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate2.php',
                                                                    data: {check:check,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>   
                                                    
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Sucction</p>
                                                        <div class="col-md-2">
                                                            <label class="control-label" for="Pho_price">Quentity:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Sucction" value="Sucction">
                                                            <input type="text" class="form-control" value="" id="Sucction_quentity" name="Sucction_quentity" placeholder="Quentity !">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-label" for="Sucction_price">Price:</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" value="" id="Sucction_price" name="Sucction_price" placeholder="Price !">
                                                        </div>
                                                        
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Sucction_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Sucction_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate3.php',
                                                                    data: {check:check,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">OT/Laber room charge</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="OT_Laber_room_charge" value="OT/Laber room charge">
                                                            <input type="text" class="form-control" id="OT_Laber_room_charge" name="OT_Laber_room_charge_price" placeholder="Price">
                                                        </div>
                                                        
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#OT_Laber_room_charge').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var OT_Laber_room_charge = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate4.php',
                                                                    data: {check:check,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Anaesthetic Equipment</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Anaesthetic_Equipment" value="Anaesthetic Equipment">
                                                            <input type="text" class="form-control" id="Anaesthetic_Equipment_price" name="Anaesthetic_Equipment_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Anaesthetic_Equipment_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Anaesthetic_Equipment_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate5.php',
                                                                    data: {check:check,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Gas NO<sub>2</sub>, O<sub>2</sub>, CO<sub>2</sub> Etc.</p>
                                                    
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="I.V canula/Catheter/Nabulizer">Items:</label>
                                                        <div class="col-sm-8">
                                                            <select name="Gas">
                                                                <option value="No2/CO2/O2">No2/CO2/O2</option>
                                                                <option value="No2">No2</option>
                                                                <option value="CO2">CO2</option>
                                                                <option value="O2">O2</option>
                                                                <option value="No2/CO2">No2/CO2</option>
                                                                <option value="No2/O2">No2/O2</option>
                                                                <option value="CO2/O2">CO2/O2</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Gas_hour">Hours:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="Gas_hour" name="Gas_hour" placeholder="Enter Hours!">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="gas_price">Price:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="gas_price" name="gas_price" placeholder="Enter gas price!">
                                                        </div>
                                                    </div>
                                                    <script>
                                                    $(document).ready(function () {
                                                            $('#gas_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var gas_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate6.php',
                                                                    data: {check:check,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    
                                                </div>
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Endotracheal tube</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Endotracheal_tube" value="Endotracheal tube">
                                                            <input type="text" class="form-control" id="Endotracheal_tube_price" name="Endotracheal_tube_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Endotracheal_tube_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Endotracheal_tube_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate7.php',
                                                                    data: {check:check,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Post operative charge</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Post_operative_charge" value="Post operative charge">
                                                            <input type="text" class="form-control" id="Post_operative_charge" name="Post_operative_charge" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Post_operative_charge').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Post_operative_charge = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate8.php',
                                                                    data: {check:check,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Baby management</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Baby_management" value="Baby management">
                                                            <input type="text" class="form-control" id="Baby_management_price" name="Baby_management_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Baby_management_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Baby_management_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate9.php',
                                                                    data: {check:check,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Dressing fees</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Quentity </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Dressing_fees" value="Dressing fees">
                                                            <input type="text" class="form-control" name="Dressing_fees_quentity" placeholder="Quentity">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="Dressing_fees_charge" name="Dressing_fees_charge" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Dressing_fees_charge').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Dressing_fees_charge = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate10.php',
                                                                    data: {check:check,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">O<sub>2</sub> Gas</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Quentity </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="O2_gas" value="O2 Gas">
                                                            <input type="text" class="form-control" name="O2_gas_quentity" placeholder="Quentity">
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="o2_gas_price" name="o2_gas_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#o2_gas_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var o2_gas_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate11.php',
                                                                    data: {check:check,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Consultation fees</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Consultation_fees" value="Consultation fees">
                                                            <input type="text" class="form-control" id="Consultation_fees_price" name="Consultation_fees_price" placeholder="price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Consultation_fees_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Consultation_fees_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate12.php',
                                                                    data: {check:check,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                     </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Enema Simplex</p>
                                                        
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="Enema_Simplex" value="Enema Simplex">
                                                            <input type="text" class="form-control" id="Enema_Simplex_price" name="Enema_Simplex_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Enema_Simplex_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Enema_Simplex_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate13.php',
                                                                    data: {check:check,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Service Charge</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="ohers" value="Others">
                                                            <input type="text" class="form-control" id="other_price" name="other_price" placeholder="price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#other_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var other_price = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate14.php',
                                                                    data: {check:check,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                     </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Consultant visits</p>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="A">A:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="" id="A" name="A" placeholder="">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#A').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var a = $(this).val();
                                                                var other_price = $('#other_price').val();
                                                                var check = $('#check').attr("value");
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate15.php',
                                                                    data: {check:check,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="B">B:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" style="color: red;" class="form-control" value="" id="B" name="B" placeholder="">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#B').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var b = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate16.php',
                                                                    data: {check:check,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="C">C:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="C" name="C" placeholder="">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#C').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var c = $(this).val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate17.php',
                                                                    data: {check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Surgeon fees</p>
                                                        
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="Surgeon_fees_price" name="Surgeon_fees_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Surgeon_fees_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Surgeon_fees_price = $(this).val();
                                                                var c = $('#C').val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate18.php',
                                                                    data: {Surgeon_fees_price:Surgeon_fees_price,check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Implants</p>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="Implants" name="Implants" placeholder="price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#Implants').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var Implants = $(this).val();
                                                                var Surgeon_fees_price = $('#Surgeon_fees_price').val();
                                                                var c = $('#C').val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate19.php',
                                                                    data: {Implants:Implants,Surgeon_fees_price:Surgeon_fees_price,check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                     </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12" style="margin-bottom:15px;">
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Dressing fees</p>
                                                        <div class="col-md-2">
                                                            <label class="label-control">Quentity</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="ot_dresing_quentity" placeholder="Quentity">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="ot_dresing_price" name="ot_dresing_price" placeholder="Price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#ot_dresing_price').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var ot_dresing_price = $(this).val();
                                                                var Implants = $('#Implants').val();
                                                                var Surgeon_fees_price = $('#Surgeon_fees_price').val();
                                                                var c = $('#C').val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate20.php',
                                                                    data: {ot_dresing_price:ot_dresing_price,Implants:Implants,Surgeon_fees_price:Surgeon_fees_price,check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">ANESTHESIOLOGIST</p>
                                                        <div class="col-md-2">
                                                            <label>Items: </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            
                                                            <select name="ANESTHESIOLOGIST">
                                                                <option value="GA/LA/BLOCK">GA/LA/BLOCK</option>
                                                                <option value="GA">GA</option>
                                                                <option value="LA">LA</option>
                                                                <option value="BLOCK">BLOCK</option>
                                                                <option value="GA/LA">GA/LA</option>
                                                                <option value="GA/BLOCK">GA/BLOCK</option>
                                                                <option value="LA/BLOCK">LA/BLOCK</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            
                                                            <label class="control-lebel">Price :</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" id="BLOCK_p" name="BLOCK_p" placeholder="price">
                                                        </div>
                                                        <script>
                                                    $(document).ready(function () {
                                                            $('#BLOCK_p').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var BLOCK_p = $(this).val();
                                                                var ot_dresing_price = $('#ot_dresing_price').val();
                                                                var Implants = $('#Implants').val();
                                                                var Surgeon_fees_price = $('#Surgeon_fees_price').val();
                                                                var c = $('#C').val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate21.php',
                                                                    data: {BLOCK_p:BLOCK_p,ot_dresing_price:ot_dresing_price,Implants:Implants,Surgeon_fees_price:Surgeon_fees_price,check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                     </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6" style="margin-bottom:15px;">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Others</p>
                                                    <div class="col-md-2">
                                                        <label class="label-control">Price :</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="ano_other" id="ano_other" placeholder="price">
                                                    </div>
                                                    <script>
                                                    $(document).ready(function () {
                                                            $('#ano_other').on('keyup', function (e) {
                                                                e.preventDefault();
                                                                var ano_other = $(this).val();
                                                                var BLOCK_p = $('#BLOCK_p').val();
                                                                var ot_dresing_price = $('#ot_dresing_price').val();
                                                                var Implants = $('#Implants').val();
                                                                var Surgeon_fees_price = $('#Surgeon_fees_price').val();
                                                                var c = $('#C').val();
                                                                var check = $('#check').attr("value");
                                                                var b = $('#B').val();
                                                                var a = $('#A').val();
                                                                var other_price = $('#other_price').val();
                                                                var Enema_Simplex_price = $('#Enema_Simplex_price').val();
                                                                var Consultation_fees_price = $('#Consultation_fees_price').val();
                                                                var o2_gas_price = $('#o2_gas_price').val();
                                                                var Dressing_fees_charge = $('#Dressing_fees_charge').val();
                                                                var Baby_management_price = $('#Baby_management_price').val();
                                                                var Post_operative_charge = $('#Post_operative_charge').val();
                                                                var Endotracheal_tube_price = $('#Endotracheal_tube_price').val();
                                                                var gas_price = $('#gas_price').val();
                                                                var Anaesthetic_Equipment_price = $('#Anaesthetic_Equipment_price').val();
                                                                var OT_Laber_room_charge = $('#OT_Laber_room_charge').val();
                                                                var Sucction_price = $('#Sucction_price').val();
                                                                var Rylestube_price = $('#Rylestube_price').val();
                                                                var Pho_price = $('#Pho_price').val();
                                                                var sub_total = $('#sub_ttl_bill').attr("value");
                                                                var canula_price = $('#canula_price').val();
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'sub_total_calculate22.php',
                                                                    data: {ano_other:ano_other,BLOCK_p:BLOCK_p,ot_dresing_price:ot_dresing_price,Implants:Implants,Surgeon_fees_price:Surgeon_fees_price,check:check,c:c,b:b,a:a,other_price:other_price,Enema_Simplex_price:Enema_Simplex_price,Consultation_fees_price:Consultation_fees_price,o2_gas_price:o2_gas_price,Dressing_fees_charge:Dressing_fees_charge,Baby_management_price:Baby_management_price,Post_operative_charge:Post_operative_charge,Endotracheal_tube_price:Endotracheal_tube_price,gas_price:gas_price,Anaesthetic_Equipment_price:Anaesthetic_Equipment_price,OT_Laber_room_charge:OT_Laber_room_charge,Sucction_price:Sucction_price,Rylestube_price:Rylestube_price,Pho_price: Pho_price,sub_total:sub_total,canula_price:canula_price}
                                                                })
                                                                        .done(function (m) {
                                                                            $('#common').html(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-12">
                                                    <p class="text-center container-fluid" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Total bill & payment</p>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="sub_ttl_bill">Sub Total Bill:</label>
                                                        <input type="hidden" id="check" value="<?php echo $sub_total1;?>">
                                                        <div class="col-sm-8" id="common">
                                                            
                                                            <input type="text" class="form-control" value="<?php echo $sub_total1;?>" id="sub_ttl_bill" name="sub_ttl_bill" placeholder="Sub Total Bill!" readonly="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="vat">Discount:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="Discont" name="Discount" placeholder="Discount!">
                                                        </div>
                                                        <script>
                                                            $(document).ready(function(){
                                                                $('#Discont').on('keyup',function(e){
                                                                    e.preventDefault();
                                                                    var discount = $(this).val();
                                                                    var id = $('.id').attr("value");
                                                                    var sub_total = $('#sub_ttl_bill').attr("value");
                                                                    
                                                                    $.ajax({
                                                                        method:'post',
                                                                        url:'total_discount.php',
                                                                        data:{id:id,discount:discount,sub_total:sub_total}
                                                                    })
                                                                            .done(function(r){
                                                                                //alert(r);
                                                                        $('.total').html(r);
                                                                    })
                                                                })
                                                            })
                                                        </script>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="ttl_bill">Total Bill:</label>
                                                        <div class="col-sm-8 total">
                                                            <input type="text" class="form-control" value="" id="ttl_bill" name="ttl_bill" placeholder="Total Bill !" readonly="true">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="ttl_bill">Payment Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="payment_total" name="payment_total" placeholder="Enter payment amount !" >
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php 
                                                        if($page_count == 1) {
                                                            $total_b = '';
                                                    $payent = '';
                                                    $due = '';
                                                    
                                                    if(isset($_POST['RegSubmit'])){
                                                        $count_bill = mysqli_num_rows($exe_bill);
                                                        //echo $count_bill;
                                                        if($count_bill == 1){
                                                            while ($row = $exe_bill->fetch_assoc()){ 
                                                                $total_b = $row['total'];
                                                                $payent = $row['payment'];
                                                                $due = $row['due'];
                                                                  
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <div class="col-md-10"></div>
                                                    <div class="col-md-8" style="border-bottom: 1px solid #ccc;
    color: red;
    font-family: caption;
    font-size: 16px;
    margin-bottom: 10px;
    padding-bottom: 9px;
    text-align: center;"> Only for Payment</div>
                                                    <div class="form-group col-md-5">
                                                        <label class="control-label col-sm-4" for="ttl_bill">Payment Bill:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="" id="payment_total" name="payment_total" placeholder="Enter payment amount !" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-5">
                                                                    <p style="color: red;font-family: caption;font-size: 18px;margin-left: 69px;"><?php echo 'Total bill : '.$total_b;?></p>
                                                        <p style="color: red;font-family: caption;font-size: 18px;margin-left: 69px;"><?php echo 'Payment bill : '.$payent;?></p>
                                                        <p style="color: red;font-family: caption;font-size: 18px;margin-left: 69px;"><?php echo 'Due bill : '.$due;?></p>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class="form-group text-center col-md-10">
                                                    <button type="submit" id="submit" name="RegSubmit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                                        <?php } ?>
                                                    
                                                    
                                                </div>
                                                
                                                <?php
                                                    if($page_count == 0) {
                                                ?>
                                                <div class="form-group text-right col-md-10">
                                                    <button type="submit" id="submit" name="RegSubmit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                                    <?php } ?>
                                                
                                                <script>
                                                    $(document).ready(function () {
                                                            $('#submit').on('click', function (e) {
                                                                e.preventDefault();
                                                                var data = $('#serial').serialize();
                                                                
                                                                $.ajax({
                                                                    method: 'POST',
                                                                    url: 'all_bill_insert.php',
                                                                    data: data
                                                                })
                                                                        .done(function (m) {
                                                                            //$('#common').html(m);
                                                                    alert(m);
                                                                        })
                                                            })
                                                        })
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_area">
            <div class="container-fluid">
                <div class="row">
                    
                        <?php   include '../footer.php';?>
                   
                </div>
            </div>
        </div>
        </div>
    </body>
        
</html>
