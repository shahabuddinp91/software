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
                                <ul style="margin-top: 28px;">
                                    <li style="  background: #17a05d none repeat scroll 0 0;
                                        border: 1px solid;
                                        color: #fff;
                                        cursor: pointer;
                                        display: inline;
                                        font-family: caption;
                                        font-size: 15px;
                                        padding: 8px 64px;
                                        text-transform: uppercase;" id="in_pathology">Indoor Pathology</li>
                                    
                                    <li style="  background: #17a05d none repeat scroll 0 0;
                                        border: 1px solid;
                                        color: #fff;
                                        cursor: pointer;
                                        display: inline;
                                        font-family: caption;
                                        font-size: 15px;
                                        padding: 8px 64px;
                                        text-transform: uppercase;" id="out_pathology">Outdoor Pathology</li>
                                    
                                </ul>
                                <script>
                                        $(document).ready(function () {
                                            $('#in_pathology').on('click', function () {
                                                $('.search_in_pathology').show(1000);
                                                $('.search_out_pathology').hide(1000);
                                            })
                                        })
                                    </script>
                                
                                <script>
                                        $(document).ready(function () {
                                            $('#out_pathology').on('click', function () {
                                                $('.search_out_pathology').show(1000);
                                                $('#in_pathology').hide(1000);
                                            })
                                        })
                                    </script>
                                
                                <?php
                                $count_mobile = '';
                                $count_month = '';
                                $count_year = '';
                                $year_massege = '';
                                $year_select = '';
                                include_once '../connection/db.php';
                                if (isset($_POST['search'])) {
                                    date_default_timezone_set("Asia/Dhaka");
                                    $today = date("m/d/Y");
                                    $month = date('F');
                                    $year = date('Y');
                                    $year_massage = ''; 
                                    extract($_POST);
                                    //echo $mobile.' '.$out_patho_month.' '.$out_patho_year.' '.$year.' '.$month;
                                    if($mobile and ($out_patho_month == 1 and $out_patho_year == 1)){
                                        $select_query = "SELECT * FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$month') and (ref_mobile= '$mobile' and year = '$year')";
                                        $execute_sql = $conn->query($select_query);
                                        $count_mobile = mysqli_num_rows($execute_sql);
                                    }
                                    
                                    if($mobile and ($out_patho_month != 1 and $out_patho_year != 1)){
                                        $select_query = "SELECT * FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$out_patho_month') and (ref_mobile= '$mobile' and year = '$out_patho_year')";
                                        $execute_sql = $conn->query($select_query);
                                        $count_mobile = mysqli_num_rows($execute_sql);
                                    }
                                    
                                        if ($count_mobile == 0) {  ?>
                                        <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                    <?php   }  ?> 
                                    

                                <?php    
                                    
                                }
                                ?>
                                
                                <?php
                                $count_mobile = '';
                                $count_month = '';
                                $count_year = '';
                                $year_massege = '';
                                $year_select = '';
                                include_once '../connection/db.php';
                                if (isset($_POST['reception'])) {
                                    date_default_timezone_set("Asia/Dhaka");
                                    $today = date("m/d/Y");
                                    $month = date('F');
                                    $year = date('Y');
                                    $year_massage = ''; 
                                    $count_mobile2 ='';
                                    extract($_POST);
                                    //echo $mobile.' '.$out_patho_month.' '.$out_patho_year.' '.$year.' '.$month;
                                    if($mobile and ($rec_month == 1 and $recp_year == 1)){
                                        $select_query = "SELECT * FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$month') and (ref_mobile = '$mobile' and year = '$year')";
                                        $execute_sql = $conn->query($select_query);
                                        $count_mobile2 = mysqli_num_rows($execute_sql);
                                        //echo 'raju';
                                    }
                                    
                                    if($mobile and ($rec_month != 1 and $recp_year != 1)){
                                        $select_query = "SELECT * FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$rec_month') and (ref_mobile = '$mobile' and year = '$recp_year')";
                                        $execute_sql = $conn->query($select_query);
                                        $count_mobile2 = mysqli_num_rows($execute_sql);
                                        //echo 'rased';
                                    }
                                    
                                        if ($count_mobile2 == 0) {  ?>
                                        <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                    <?php   }  ?> 
                                    

                                <?php    
                                    
                               }
                                ?>
                                <div class="search_in_pathology" style="display: none;">
                                    <div class="row">
                                        <h3 style="color: #3399ff;
    font-family: caption;
    margin-left: 54px;
    margin-top: 0;">Indoor Pathology Searching Point</h3>
                                        <form method="post" action="">
                                            <div class="col-md-8" style=" margin-left: 40px;
    margin-top: -21px;">
                                                <?php?>
                                                <input type="text" name="mobile" class="" placeholder="Enter Mobile No !" style="height: 30px;">
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
                                </div>
                                        
                                <?php
                                if(isset($_POST['reception'])) {
                                    $select = '';
                                    $ref_name = '';
                                    $ref_mobile = '';
                                    $total = '';
                                    $count_ref1 = '';
                                    if($mobile and ($rec_month == 1 and $recp_year == 1)){
                                        $select_query = "SELECT * FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$month') and ( ref_mobile = '$mobile' and year = '$year')";
                                        $execute_sql11 = $conn->query($select_query);
                                        $count_mobile = mysqli_num_rows($execute_sql11);
                                        
                                        //echo $ref_name.' '.$ref_mobile;
                                        $select_query11 = "SELECT sum(ref_amount) FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$month') and ( ref_mobile = '$mobile' and year = '$year')";
                                        $execute_sql111 = $conn->query($select_query11);
                                        while ($row = $execute_sql111->fetch_assoc()){
                                            $total = $row['sum(ref_amount)'];
                                        }
                                        //echo $total;
                                        
                                        $select_ref = "SELECT * FROM `in_reference` WHERE (mobile= '$mobile' and month = '$month') and (mobile= '$mobile' and year = '$year')";
                                        $execute_ref = $conn->query($select_ref);
                                        $count_ref1 = mysqli_num_rows($execute_ref);
                                        while ($row = $execute_ref->fetch_assoc()){
                                            $al_pay = $row['payment'];
                                            $al_due =$row['due'];
                                        }
                                        //echo $count_ref1;
                                        ?>
                                
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php
                                    if ($count_mobile > 0) { 
                                        if($mobile and ($rec_month == 1 and $recp_year == 1)){ ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Reference mobile : '.$mobile.' Month : '.$month.' Year : '.$year;?>
                                            </h2>
                                    <?php    }
                                     
                                        ?>
                                    
                                        
                                        <tr>
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                            <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Reference Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Amount</td>
                                            <td style="background-color: #346E99;color: #fff;">Date</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql11->fetch_assoc()) {
                                            $ref_name = $row['ref_name'];
                                            $ref_mobile = $row['ref_mobile'];
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['reg_id']; ?></td>
                                                <td><?php echo $row['patient_name']; ?></td>
                                                <td><?php echo $row['p_mobile']; ?></td>
                                                <td><?php echo $row['ref_name']; ?></td>
                                                <td><?php echo $row['ref_mobile']; ?></td>
                                                <td><?php echo $row['ref_amount']; ?></td>
                                                <td><?php echo $row['date']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                            <!--its for month-->
                                            
                                    

                                </table>
                                
                                        
                                        <div class="panel panel-primary ref_show" style="">
                                    <div class="panel-heading text-center" style="margin-bottom: 15px;">Reference Bill Payment</div>
                                    <form class="form-group-sm">
                                        <div class="container-fluid">
                                            <div class="">
                                                
                                                    <?php
                                                        if($count_ref1 == 1){ ?>
                                                <p style="color: red;
    font-family: caption;
    text-align: center;"><?php echo 'Already payment : '. $al_pay.' & due : '.$al_due;?></p>
                                                    <?php    }
                                                    ?>
                                                
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_name">Reference Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_name" name="ref_name" value="<?php echo $ref_name; ?>" placeholder="Reference Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_mobile">Reference Mobile:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_mobile" name="ref_mobile" value="<?php echo $ref_mobile;?>" placeholder="Reference Mobile">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ttl_amount">Total Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ttl_amount" name="ttl_amount" value="<?php echo $total;?>" placeholder="Total Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="payment">Payment:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="payment" name="payment" placeholder="Payment">
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#payment').on('keyup',function(e){
                                                            e.preventDefault();
                                                            
                                                            var payment = $(this).val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var mobile = $('#ref_mobile').val();
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_due2.php',
                                                                data:{mobile:mobile,payment:payment,total:total}
                                                            })
                                                                    .done(function(m){
                                                                        //alert(m);
                                                                $('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="due">Due:</label>
                                                    <div class="col-sm-8" id="bvvbv">
                                                        <input type="text" class="form-control" value="<?php echo $total;?>" id="due" name="due" placeholder="Due">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5" >
                                                    <button id="in_submit" type="submit" name="in_submit">Submit</button>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#in_submit').on('click',function(e){
                                                            e.preventDefault();
                                                            var name = $('#ref_name').val();
                                                            var mobile = $('#ref_mobile').val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var payment = $('#payment').val();
                                                            var due = $('#due').attr("value");
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_reference_insert21.php',
                                                                data:{name:name,mobile:mobile,total:total,payment:payment,due:due}
                                                            })
                                                                    .done(function(m){
                                                                        alert(m);
                                                                //$('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                    <?php }
                                        if($mobile and ($rec_month != 1 and $recp_year != 1)){
                                            $select_query = "SELECT * FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$rec_month') and ( ref_mobile = '$mobile' and year = '$recp_year')";
                                            $execute_sql = $conn->query($select_query);
                                            $count_mobile = mysqli_num_rows($execute_sql);
                                            
                                        $select_query11 = "SELECT sum(ref_amount) FROM `patient_test_info` WHERE (ref_mobile = '$mobile' and month = '$rec_month') and ( ref_mobile = '$mobile' and year = '$recp_year')";
                                        $execute_sql111 = $conn->query($select_query11);
                                        while ($row = $execute_sql111->fetch_assoc()){
                                            $total = $row['sum(ref_amount)'];
                                        }
                                        //echo $total;
                                        
                                        $select_ref2 = "SELECT * FROM `in_reference` WHERE (mobile= '$mobile' and month = '$rec_month') and (mobile= '$mobile' and year = '$recp_year')";
                                        $execute_ref111 = $conn->query($select_ref2);
                                        $count_ref1111 = mysqli_num_rows($execute_ref111);
                                        //echo $count_ref1;
                                        while ($row = $execute_ref111->fetch_assoc()){
                                            $al_pay = $row['payment'];
                                            $al_due =$row['due'];
                                        }
                                        ?>
                                
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php
                                    if ($count_mobile > 0) { 
                                        
                                    if($mobile and ($rec_month != 1 and $recp_year != 1)){ ?>
                                        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Reference mobile : '.$mobile.' Month : '.$rec_month.' Year : '.$recp_year;?>
                                            </h2>
                                    <?php } 
                                        ?>
                                    
                                        
                                         <tr>
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                            <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Reference Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Amount</td>
                                            <td style="background-color: #346E99;color: #fff;">Date</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $ref_name = $row['ref_name'];
                                                $ref_mobile =$row['ref_mobile'];
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['reg_id']; ?></td>
                                                <td><?php echo $row['patient_name']; ?></td>
                                                <td><?php echo $row['p_mobile']; ?></td>
                                                <td><?php echo $row['ref_name']; ?></td>
                                                <td><?php echo $row['ref_mobile']; ?></td>
                                                <td><?php echo $row['ref_amount']; ?></td>
                                                <td><?php echo $row['date']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                             
                                    
                                </table>
                                
                                        <div class="panel panel-primary ref_show" style="">
                                    <div class="panel-heading text-center" style="margin-bottom: 15px;">Reference Bill Payment</div>
                                    <form class="form-group-sm">
                                        <div class="container-fluid">
                                            <div class="">
                                                <?php
                                                        if($count_ref1111 == 1){ ?>
                                                <p style="color: red;
    font-family: caption;
    text-align: center;"><?php echo 'Already payment : '. $al_pay.' & due : '.$al_due;?></p>
                                                    <?php    }
                                                    ?>
                                                    
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_name">Reference Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_name" name="ref_name" value="<?php echo $ref_name; ?>" placeholder="Reference Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_mobile">Reference Mobile:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_mobile" name="ref_mobile" value="<?php echo $ref_mobile;?>" placeholder="Reference Mobile">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ttl_amount">Total Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ttl_amount" name="ttl_amount" value="<?php echo $total;?>" placeholder="Total Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="payment">Payment:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" id="month" value="<?php echo $rec_month;?>">
                                                        <input type="hidden" id ="year" value="<?php echo $recp_year;?>">
                                                        <input type="text" class="form-control" id="payment" name="payment" placeholder="Payment">
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#payment').on('keyup',function(e){
                                                            e.preventDefault();
                                                            
                                                            var payment = $(this).val();
                                                            var month = $('#month').attr("value");
                                                            var year = $('#year').attr("value");
                                                            var total = $('#ttl_amount').attr("value");
                                                            var mobile = $('#ref_mobile').val();
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_due_month_year22.php',
                                                                data:{month:month,year:year,mobile:mobile,payment:payment,total:total}
                                                            })
                                                                    .done(function(m){
                                                                        //alert(m);
                                                                $('#bvv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="due">Due:</label>
                                                    <div class="col-sm-8" id="bvv">
                                                        <input type="text" class="form-control" value="<?php echo $total;?>" id="due" name="due" placeholder="Due">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5" >
                                                    <button id="out_submit_in" type="submit" name="out_submit">Submit</button>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#out_submit_in').on('click',function(e){
                                                            e.preventDefault();
                                                            var name = $('#ref_name').val();
                                                            var mobile = $('#ref_mobile').val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var payment = $('#payment').val();
                                                            var due = $('#due').attr("value");
                                                            var month = $('#month').attr("value");
                                                            var year = $('#year').attr("value");
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_reference_insert222.php',
                                                                data:{month:month,year:year,name:name,mobile:mobile,total:total,payment:payment,due:due}
                                                            })
                                                                    .done(function(m){
                                                                        alert(m);
                                                                //$('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    
                                            
                                    <?php    }
                                    ?>
                                <?php } ?>
                                
                                        
                                        
                                        
                                        
                                <!--its for outdoor pathology-->
                                <div class="search_out_pathology" style="display: none;">
                                    <div class="row">
                                        <h3 style="color: #4585f3;
    display: inline;
    font-family: caption;
    margin-left: 56px;
    margin-top: 0;">Outdoor Pathology Searching Point</h3>
                                        <form method="post" action="">
                                            <div class="col-md-8" style="text-align: center;font-family: caption;">
                                                <?php
                                                    if($year_select == 1){ ?>
                                                <p style="color: red"><?php echo $year_massege;?></p>
                                                <?php    }
                                                ?>
                                                <input type="text" name="mobile" class="" placeholder="Enter Mobile No !" style="height: 30px;
    margin-left: 44px;">
                                                <select name="out_patho_month" style="margin-left: -4px;height: 30px;margin-top: 19px;width: 123px;">
                                                    <option value="1">Select one</option>
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
                                                <select name="out_patho_year" style="margin-left: -4px;height: 30px;margin-top: 19px;width: 123px;">
                                                    <option value="1">Select one </option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                    <option>2010</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                </select>
                                                <button id="rec_show" type="submit" name="search" style="color: #fb7922;
                                                        height: 32px;
                                                        margin-top: 18px;
                                                        margin-left: -5px;
                                                        text-transform: uppercase;
                                                        width: 72px;">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--outdoor pathology reference list-->
                                
                                
                                
                                
                                
                                
                
                                
                                <?php
                                if(isset($_POST['search'])) {
                                    $select = '';
                                    $ref_name = '';
                                    $ref_mobile = '';
                                    $total = '';
                                    $count_ref1 = '';
                                    if($mobile and ($out_patho_month == 1 and $out_patho_year == 1)){
                                        $select_query = "SELECT * FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$month') and (ref_mobile= '$mobile' and year = '$year')";
                                        $execute_sql11 = $conn->query($select_query);
                                        $count_mobile = mysqli_num_rows($execute_sql11);
                                        while ($rows = $execute_sql11->fetch_assoc()){
                                            $ref_name = $rows['ref_name'];
                                            $ref_mobile =$rows['ref_mobile'];
                                        }
                                        $select_query11 = "SELECT sum(ref_amount) FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$month') and (ref_mobile= '$mobile' and year = '$year')";
                                        $execute_sql111 = $conn->query($select_query11);
                                        while ($row = $execute_sql111->fetch_assoc()){
                                            $total = $row['sum(ref_amount)'];
                                        }
                                        
                                        $select_ref = "SELECT * FROM `out_reference` WHERE (mobile= '$mobile' and month = '$month') and (mobile= '$mobile' and year = '$year')";
                                        $execute_ref = $conn->query($select_ref);
                                        $count_ref1 = mysqli_num_rows($execute_ref);
                                        while ($row = $execute_ref->fetch_assoc()){
                                            $al_pay = $row['payment'];
                                            $al_due =$row['due'];
                                        }
                                        //echo $count_ref1;
                                        ?>
                                
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php
                                    if ($count_mobile > 0) { 
                                        if($mobile and ($out_patho_month == 1 and $out_patho_year == 1)){ ?>
                                            <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Reference mobile : '.$mobile.' Month : '.$month.' Year : '.$year;?>
                                            </h2>
                                    <?php    }
                                     
                                        ?>
                                    
                                        
                                        <tr>
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                            <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Reference Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Amount</td>
                                            <td style="background-color: #346E99;color: #fff;">Date</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['out_p_id']; ?></td>
                                                <td><?php echo $row['patient_name']; ?></td>
                                                <td><?php echo $row['patient_mobile']; ?></td>
                                                <td><?php echo $row['ref_name']; ?></td>
                                                <td><?php echo $row['ref_mobile']; ?></td>
                                                <td><?php echo $row['ref_amount']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
<!--                                                <td>
                                                    <a href="edit_appointment_patient.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil-square" aria-hidden="true" title="Edit"></i></a> |
                                                    <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>
                                                </td>-->
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                            <!--its for month-->
                                            
                                    

                                </table>
                                
                                        
                                        <div class="panel panel-primary ref_show" style="">
                                    <div class="panel-heading text-center" style="margin-bottom: 15px;">Reference Bill Payment</div>
                                    <form class="form-group-sm">
                                        <div class="container-fluid">
                                            <div class="">
                                                
                                                    <?php
                                                        if($count_ref1 == 1){ ?>
                                                <p style="color: red;
    font-family: caption;
    text-align: center;"><?php echo 'Already payment : '. $al_pay.' & due : '.$al_due;?></p>
                                                    <?php    }
                                                    ?>
                                                
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_name">Reference Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_name" name="ref_name" value="<?php echo $ref_name; ?>" placeholder="Reference Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_mobile">Reference Mobile:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_mobile" name="ref_mobile" value="<?php echo $ref_mobile;?>" placeholder="Reference Mobile">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ttl_amount">Total Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ttl_amount" name="ttl_amount" value="<?php echo $total;?>" placeholder="Total Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="payment">Payment:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="payment" name="payment" placeholder="Payment">
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#payment').on('keyup',function(e){
                                                            e.preventDefault();
                                                            
                                                            var payment = $(this).val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var mobile = $('#ref_mobile').val();
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_due.php',
                                                                data:{mobile:mobile,payment:payment,total:total}
                                                            })
                                                                    .done(function(m){
                                                                        //alert(m);
                                                                $('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="due">Due:</label>
                                                    <div class="col-sm-8" id="bvvbv">
                                                        <input type="text" class="form-control" value="<?php echo $total;?>" id="due" name="due" placeholder="Due">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5" >
                                                    <button id="out_submit" type="submit" name="out_submit">Submit</button>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#out_submit').on('click',function(e){
                                                            e.preventDefault();
                                                            var name = $('#ref_name').val();
                                                            var mobile = $('#ref_mobile').val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var payment = $('#payment').val();
                                                            var due = $('#due').attr("value");
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_reference_insert.php',
                                                                data:{name:name,mobile:mobile,total:total,payment:payment,due:due}
                                                            })
                                                                    .done(function(m){
                                                                        alert(m);
                                                                //$('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                    <?php }
                                        if($mobile and ($out_patho_month != 1 and $out_patho_year != 1)){
                                            $select_query = "SELECT * FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$out_patho_month') and (ref_mobile= '$mobile' and year = '$out_patho_year')";
                                            $execute_sql = $conn->query($select_query);
                                            $count_mobile = mysqli_num_rows($execute_sql);
                                            //echo $mobile.' '.$out_patho_month.' '.$out_patho_year;
                                            
//                                            while ($rows = $execute_sql->fetch_assoc()){
//                                                $ref_name = $rows['ref_name'];
//                                                $ref_mobile =$rows['ref_mobile'];
//                                            }
                                        //echo $ref_name.' '.$ref_mobile;
                                        $select_query11 = "SELECT sum(ref_amount) FROM `outdoor_test` WHERE (ref_mobile= '$mobile' and current_manth = '$out_patho_month') and (ref_mobile= '$mobile' and year = '$out_patho_year')";
                                        $execute_sql111 = $conn->query($select_query11);
                                        while ($row = $execute_sql111->fetch_assoc()){
                                            $total = $row['sum(ref_amount)'];
                                        }
                                        //echo $total;
                                        
                                        $select_ref2 = "SELECT * FROM `out_reference` WHERE (mobile= '$mobile' and month = '$out_patho_month') and (mobile= '$mobile' and year = '$out_patho_year')";
                                        $execute_ref111 = $conn->query($select_ref2);
                                        $count_ref1111 = mysqli_num_rows($execute_ref111);
                                        //echo $count_ref1;
                                        while ($row = $execute_ref111->fetch_assoc()){
                                            $al_pay = $row['payment'];
                                            $al_due =$row['due'];
                                        }
                                        ?>
                                
                                <table border="1" class="table text-center" style="margin-top: 10px;">

                                    <?php
                                    if ($count_mobile > 0) { 
                                        
                                    if($mobile and ($out_patho_month != 1 and $out_patho_year != 1)){ ?>
                                        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                <?php echo 'Reference mobile : '.$mobile.' Month : '.$out_patho_month.' Year : '.$out_patho_year;?>
                                            </h2>
                                    <?php } 
                                        ?>
                                    
                                        
                                         <tr>
                                            <td style="background-color: #346E99;color: #fff;">SL No</td>
                                            <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                            <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Reference Name</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Mobile</td>
                                            <td style="background-color: #346E99;color: #fff;">Ref Amount</td>
                                            <td style="background-color: #346E99;color: #fff;">Date</td>
                                        </tr>

                                        <?php
                                        $sl = 0;
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $ref_name = $row['ref_name'];
                                                $ref_mobile =$row['ref_mobile'];
                                            $sl++;
                                            ?>
                                            <tr>
                                                <td><?php echo $sl; ?></td>
                                                <td><?php echo $row['out_p_id']; ?></td>
                                                <td><?php echo $row['patient_name']; ?></td>
                                                <td><?php echo $row['patient_mobile']; ?></td>
                                                <td><?php echo $row['ref_name']; ?></td>
                                                <td><?php echo $row['ref_mobile']; ?></td>
                                                <td><?php echo $row['ref_amount']; ?></td>
                                                <td><?php echo $row['date']; ?></td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <?php } ?>
                                             
                                    
                                </table>
                                
                                        <div class="panel panel-primary ref_show" style="">
                                    <div class="panel-heading text-center" style="margin-bottom: 15px;">Reference Bill Payment</div>
                                    <form class="form-group-sm">
                                        <div class="container-fluid">
                                            <div class="">
                                                <?php
                                                        if($count_ref1111 == 1){ ?>
                                                <p style="color: red;
    font-family: caption;
    text-align: center;"><?php echo 'Already payment : '. $al_pay.' & due : '.$al_due;?></p>
                                                    <?php    }
                                                    ?>
                                                    
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_name">Reference Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_name" name="ref_name" value="<?php echo $ref_name; ?>" placeholder="Reference Name">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ref_mobile">Reference Mobile:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ref_mobile" name="ref_mobile" value="<?php echo $ref_mobile;?>" placeholder="Reference Mobile">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="ttl_amount">Total Amount:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="ttl_amount" name="ttl_amount" value="<?php echo $total;?>" placeholder="Total Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="payment">Payment:</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" id="month" value="<?php echo $out_patho_month;?>">
                                                        <input type="hidden" id ="year" value="<?php echo $out_patho_year;?>">
                                                        <input type="text" class="form-control" id="payment" name="payment" placeholder="Payment">
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#payment').on('keyup',function(e){
                                                            e.preventDefault();
                                                            
                                                            var payment = $(this).val();
                                                            var month = $('#month').attr("value");
                                                            var year = $('#year').attr("value");
                                                            var total = $('#ttl_amount').attr("value");
                                                            var mobile = $('#ref_mobile').val();
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_due_month_year.php',
                                                                data:{month:month,year:year,mobile:mobile,payment:payment,total:total}
                                                            })
                                                                    .done(function(m){
                                                                        //alert(m);
                                                                $('#bvv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                <div class="form-group col-md-5">
                                                    <label class="control-label col-sm-4" for="due">Due:</label>
                                                    <div class="col-sm-8" id="bvv">
                                                        <input type="text" class="form-control" value="<?php echo $total;?>" id="due" name="due" placeholder="Due">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-5" >
                                                    <button id="out_submit" type="submit" name="out_submit">Submit</button>
                                                </div>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#out_submit').on('click',function(e){
                                                            e.preventDefault();
                                                            var name = $('#ref_name').val();
                                                            var mobile = $('#ref_mobile').val();
                                                            var total = $('#ttl_amount').attr("value");
                                                            var payment = $('#payment').val();
                                                            var due = $('#due').attr("value");
                                                            var month = $('#month').attr("value");
                                                            var year = $('#year').attr("value");
                                                            $.ajax({
                                                                method:'post',
                                                                url:'out_pathology_reference_insert2.php',
                                                                data:{month:month,year:year,name:name,mobile:mobile,total:total,payment:payment,due:due}
                                                            })
                                                                    .done(function(m){
                                                                        alert(m);
                                                                //$('#bvvbv').html(m);
                                                            })
                                                        })
                                                    })
                                                </script>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    
                                            
                                    <?php    }
                                    ?>
                                <?php } ?>
                                    
                                    
                                
                                
                                
                                


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
