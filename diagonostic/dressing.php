<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
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
                font-family: caption;
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
                            Dashboard Reception Desk (Hospital)
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="body_area"  style="min-height: 660px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="left_content_area">
<?php include './letf_side_diagonostic.php'; ?>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-9" style="margin-left:50px;">
                        <div class="right_content_area">
                            <div class="form_area">
                                <div class="row panel-primary ">
                                    <div class="panel-heading text-center ">Patient Information</div>
                                    
                                    <?php
                                    include '../connection/db.php';
                                    $name = '';
                                    $mobile = '';
                                    $mass = '';
                                    $patient_id_no ='';
                                    $count_patient = '';
                                    
                                        if(isset($_POST['RegSubmit'])){
                                            extract($_POST);
                                            //echo $patient_id_no;
                                            
                                            if(empty($patient_id_no)){
                                                $mass = 'Enter ID Number';
                                            }  else {
                                                $select_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$patient_id_no'";
                                                $execute_sql = $conn->query($select_sql);
                                                $count = mysqli_num_rows($execute_sql);
                                                //echo $count;
                                                
                                                $select_patient = "SELECT * FROM `dreasing_bill` WHERE patient_id = '$patient_id_no'";
                                                $execute_patient = $conn->query($select_patient);
                                                $count_patient = mysqli_num_rows($execute_patient);
                                                //echo $count_patient;

                                                if($count == 1){
                                                    $row = $execute_sql->fetch_assoc();
                                                    $name = $row['patient_name'];
                                                    //echo $name;
                                                    $mobile = $row['mobile'];
                                                }  else {
                                                    $mass = 'Invalid ID';
                                                }
                                            }
                                            
                                            
                                        }
                                    ?>
                                    <p style=" color: red;font-family: caption;font-size: 20px;font-weight: bolder;text-align: center;"><?php echo $mass;?></p>
                                    <form action="" method="POST" class="form-horizontal" role="form" style="margin-top:12px;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="<?php echo $patient_id_no;?>"  id="RegNo" name="patient_id_no" placeholder="Registration No">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="submit" name="RegSubmit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-danger">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <?php
                                    $massege = '';
                                    $doctor = '';
                                    $guardianName = '';
                                    $drvisit = '';
                                    $Obsarvation = '';
                                    $Dressing ='';
                                    $otcharge ='';
                                    $Nabulizer = '';
                                    $blood = '';
                                    $ooo = '';
                                    $Total = '';
                                    $Payment = '';
                                    $Due = '';
                                    
                                    date_default_timezone_set("Asia/Dhaka");
                                        $month = date('F');
                                        $today=date('m/d/Y');
                                        $year = date("Y");
                                        //echo $month.' '.$today.' '.$year;
                                        
                                        if(isset($_POST['billsubmit'])){
                                            extract($_POST);
                                            if(!$check_id){
                                                $massege = 'Enter patient Id !';
                                            }  else {
                                                $select_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$check_id'";
                                                $execute_sql = $conn->query($select_sql);
                                                $count = mysqli_num_rows($execute_sql);
                                                if($count == 1){
                                                    $insert_sql = "INSERT INTO `dreasing_bill`(`patient_id`, `dr_name`, `g_name`, `visit_amount`, `Obsarvation`, `Dressing`, `otcharge`, `Nabulizer`, `blood`, `o2`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES "
                                                        . "('$check_id','$doctor','$guardianName','$drvisit','$Obsarvation','$Dressing','$otcharge','$Nabulizer','$blood','$ooo','$Total','$Payment','$Due','$today','$month','$year')";
                                                    $execute_sql = $conn->query($insert_sql);
                                                    if($execute_sql){
                                                        $massege = 'Bill Insert successful';
                                                    }
                                                    //echo $insert_sql;
                                                    //echo $doctor.' '.$check_id.' '.$guardianName.' '.$drvisit.' '.$Obsarvation.' '.$Dressing.' '.
                                                            //$otcharge.' '.$Nabulizer.' '.$blood.' '.$ooo.' '.$Total.' '.$Payment.' '.$Due;
                                                }  else {
                                                    $massege = 'Patient Id Invalid !';
                                                }
                                                
                                            }
                                            
                                        }
                                    ?>
                                    
                                    <?php
                                        if($count_patient == 0){ ?>
                                            <form class="form-horizontal" action="" method="POST">
                                        <div class="container-fluid">
                                            <div class="row">

                                                <p class="text-center" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Patient Details</p>
                                                <p style=" color: red;font-family: caption;font-size: 20px;font-weight: bolder;text-align: center;"><?php echo $massege;?></p>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="patientName">Patient Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="check_id" value="<?php echo $patient_id_no;?>">
                                                            <input style="color: red;" type="text" class="form-control"  id="patientName" value="<?php echo $name;?>" name="patientName" placeholder="Patient Name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="mobileNo">Mobile No:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control" value="<?php echo $mobile;?>" id="mobileNo" name="mobileNo" placeholder="Mobile No" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="dr">Name of consultant:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="doctor" name="doctor" placeholder="Enter Doctor name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="guardianName">Guardian Name:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;text-align: center;
    width: 466px;" type="text"   class="form-control"  id="guardianName" name="guardianName" placeholder="Enter Father / Husband's Name" >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row">

                                                <p class="text-center" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Patient Bill</p>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="drvisit">Dr visit:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="drvisit"  name="drvisit" placeholder="Visit amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#drvisit').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $(this).val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Obsarvation">Obsarvation:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Obsarvation"  name="Obsarvation" placeholder="Observation amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Obsarvation').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $(this).val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Dressing">Dressing:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Dressing"  name="Dressing" placeholder="Dressing amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Dressing').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $(this).val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="otcharge">O.T Charge:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="otcharge"  name="otcharge" placeholder="O.T Charge amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#otcharge').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $(this).val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Nabulizer">Nabulizer:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Nabulizer"  name="Nabulizer" placeholder="Nabulizer amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Nabulizer').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $(this).val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="blood">Blood transfusion:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="blood"  name="blood" placeholder="Blood transfusion amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#blood').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $(this).val();
                                                                var ooo = $('#ooo').val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="o2">0<sub>2</sub>:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="ooo"  name="ooo" placeholder="Amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#ooo').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $(this).val(); 
                                                                $.ajax({
                                                                    url : 'billcount/count.php',
                                                                    method : 'post',
                                                                    data : {dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#allvalue').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Total">Total:</label>
                                                        <div class="col-sm-8" id="allvalue">
                                                            <input style="color: red;" type="text" class="form-control"  id="Total"  name="Total" placeholder="Total amount" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Payment">Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Payment"  name="Payment" placeholder="Payment amount" >
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Payment').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Payment = $(this).val();
                                                                var total = $('#Total').attr('value');
                                                                var dr_amount = $('#drvisit').val();
                                                                var Obsarvation = $('#Obsarvation').val();
                                                                var Dressing = $('#Dressing').val();
                                                                var otcharge = $('#otcharge').val();
                                                                var Nabulizer = $('#Nabulizer').val();
                                                                var blood = $('#blood').val();
                                                                var ooo = $('#ooo').val();
                                                                
                                                                $.ajax({
                                                                    method : 'post',
                                                                    url : 'billcount/count1.php',
                                                                    data:{dr_amount:dr_amount,Obsarvation:Obsarvation,Dressing:Dressing,
                                                                    otcharge:otcharge,Nabulizer:Nabulizer,blood:blood,ooo:ooo,Payment:Payment,total:total}
                                                                })
                                                                        .done(function(r){
                                                                            //alert(r);
                                                                        $('#duevalue').html(r)
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Due">Due:</label>
                                                        <div class="col-sm-8" id="duevalue">
                                                            <input style="color: red;" type="text" class="form-control"  id="Due"  name="Due" placeholder="Due amount" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group col-md-6">
                                                        <button type="submit" name="billsubmit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-danger">Clear</button>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php    }
                                    ?>
                                    
                                    <?php
                                        if($count_patient == 1){ 
                                            $select_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$patient_id_no'";
                                            $execute_patient = $conn->query($select_sql);
                                            while ($row = $execute_patient->fetch_assoc()){
                                                $p_name = $row['patient_name'];
                                                $p_mobile = $row['mobile'];
                                            }
                                            $select_dressing_sql = "SELECT * FROM `dreasing_bill` WHERE patient_id = '$patient_id_no'";
                                            $execute_sql_der = $conn->query($select_dressing_sql);
                                            while ($row = $execute_sql_der->fetch_assoc()){
                                                $g_name = $row['g_name'];
                                                $d_name = $row['dr_name'];
                                                $v_amount = $row['visit_amount'];
                                                $Obsarvation = $row['Obsarvation'];
                                                $Dressing = $row['Dressing'];
                                                $otcharge = $row['otcharge'];
                                                $Nabulizer = $row['Nabulizer'];
                                                $blood = $row['blood'];
                                                $o2 = $row['o2'];
                                                $total = $row['total'];
                                                $ayment = $row['payment'];
                                                $due = $row['due'];
                                                $date = $row['date'];
                                            }
                                            //echo $p_name.' '.$p_mobile.' '.$g_name.' '.$d_name.' '.$v_amount.' '.$Obsarvation.' '.$Dressing
                                                    //.' '.$otcharge.' '.$Nabulizer.' '.$blood. ' '.$o2.' '.$total.' '.$Payment.' '.$due.' '.$date;
                                            ?>
                                    <div class="container-fluid panel panel-danger">
                                        <div class="row">
                                            <p class="panel panel-heading" style="background: #deebf9 none repeat scroll 0 0;
    color: red;
    text-align: center;">Patient & Bill Information</p>
                                            <div class="col-md-3">
                                                <p style="color:#337AB7;">Patient Name : <?php echo $p_name;?></p>
                                                <p style="color:#F2AA2D;">Patient Mobile : <?php echo $p_mobile;?></p>
                                                <p style="color:#337AB7;">Guardian Name : <?php echo $g_name;?></p>
                                                <p style="color:#F2AA2D;">Name of consultant : <?php echo $d_name;?></p>
                                                <p style="color:#337AB7;">Bill Date : <?php echo $date;?></p>
                                            </div>
                                            <div class="col-md-3">
                                                <p style="color:#F2AA2D;">Visit Amount : <?php echo $v_amount;?></p>
                                                <p style="color:#337AB7;">Obsarvation : <?php echo $Obsarvation;?></p>
                                                <p style="color:#F2AA2D;">Dressing : <?php echo $Dressing;?></p>
                                                <p style="color:#337AB7;">O.T Charge : <?php echo $otcharge;?></p>
                                                <p style="color:#F2AA2D;">Nabulizer : <?php echo $Nabulizer;?></p>
                                                <p style="color:#337AB7;">Blood transfusion : <?php echo $blood;?></p>
                                                <p style="color:#F2AA2D;">02 : <?php echo $o2;?></p>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                
                                                <?php
                                                    if(isset($_POST['update'])){
                                                        extract($_POST);
                                                        echo $p_id.' '.$total_bill.' '.$pay.' '.$due;
                                                    }
                                                ?>
                                                
                                                <form class="form-group send">
                                                   
                                                    <input type="hidden" id="p_id" name="p_id" value="<?php echo $patient_id_no;?>">
                                                            
                                                    <table>
                                                        <tr class="form-group" >
                                                            <td>Total Bill : </td>
                                                            
                                                            <td><input id="total_bill" type="text" name="total_bill" class="form-control" value="<?php echo $total;?>" readonly style="margin-bottom: 10px;"> </td>
                                                            
                                                        </tr>
                                                        
                                                        <tr class="form-group">
                                                            <td>Payment Bill : </td>
                                                            <td><input id="payment_bill" type="text" name="pay" class="form-control" style="margin-bottom: 10px;"></td>
                                                            <td><?php echo '  + '.$ayment;?></td>
                                                        </tr>
                                                        
                                                        <tr class="form-group">
                                                            <td>Due Bill : </td>
                                                        
                                                            <td id="call"><input id="due_bill" type="text" name="due" class="form-control" value="<?php echo $due;?> " readonly style="margin-bottom: 10px;"></td>
                                                        
                                                            
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button type="submit" id="submit" name="update" class="btn btn-primary">Submit</button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                    
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#payment_bill').on('keyup',function(e){
                                                                e.preventDefault();
                                                                
                                                                var total = $('#total_bill').attr('value');
                                                                var pay = $(this).val();
                                                                var due = $('#due_bill').attr('value');
                                                                var id = $('#p_id').attr('value');
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url : 'billcount/update.php',
                                                                    data: {total:total,pay:pay,due:due,id:id}
                                                                })
                                                                        .done(function(r){
                                                                            $('#call').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                </form>
                                                
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#submit').on('click',function(e){
                                                            e.preventDefault();
                                                            
                                                            var data = $('.send').serialize()
                                                            var total = $('#total_bill').attr('value');
                                                            var pay = $('#payment_bill').val();
                                                            var due = $('#due_bill').attr('value');
                                                            var id = $('#p_id').attr('value');
                                                            
                                                            $.ajax({
                                                                method : 'POST',
                                                                url : 'billcount/bill_update.php',
                                                                data:{id:id,pay:pay}
                                                            })
                                                                    .done(function(r){
                                                                        alert(r);
                                                            })
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <?php    }
                                    ?>

                                    
                                </div>

                                            ,
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


                <script>
                    $(document).ready(function () {
                        $('.submit').on('click', function (e) {
                            e.preventDefault();
                            var data = $('.teststore_form').serialize();
                            $.ajax({
                                method: 'POST',
                                url: 'insert/test_insert.php',
                                data: data
                            })
                                    .done(function (m) {
                                        alert(m)
                                        $('.clear').trigger('click')
                                    })
                        })
                    })
                </script>
                </body>

                </html>
