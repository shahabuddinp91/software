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
                            Dashboard Of Account
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
<?php include './left_side_accounts.php'; ?>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-9" style="margin-left:50px;">
                        <div class="right_content_area">
                            <div class="form_area">
                                <div class="row panel-primary ">
                                    <div class="panel-heading text-center ">Employee Information</div>
                                    
                                    <?php
                                    include '../connection/db.php';
                                    
                                    $patient_id_no = '';
                                    $massege = '';
                                    $name = '';
                                    $mobile = '';
                                    
                                        if(isset($_POST['RegSubmit'])){
                                            extract($_POST);
                                            $select_employ = "SELECT * FROM `add_person` WHERE id = '$patient_id_no'";
                                            //echo $select_employ;
                                            $exe_select_sql = $conn->query($select_employ);
                                            $count = mysqli_num_rows($exe_select_sql);
                                            if($count == 1){
                                                while ($row = $exe_select_sql->fetch_assoc()){
                                                    $name = $row['name'];
                                                    $mobile = $row['mobile'];
                                                }
                                            }  else {
                                                $massege = 'Id no valid';
                                            }
                                        }
                                    ?>
                                    <p style=" color: red;font-family: caption;font-size: 20px;font-weight: bolder;text-align: center;"><?php echo $massege;?></p>
                                    <form action="" method="POST" class="form-horizontal" role="form" style="margin-top:12px;">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="RegNo">Registration No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"   id="RegNo" name="patient_id_no" placeholder="Registration No">
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
                                    
                                    date_default_timezone_set("Asia/Dhaka");
                                        $month = date('F');
                                        $today=date('m/d/Y');
                                        $year = date("Y");
                                        //echo $month.' '.$today.' '.$year;
                                        $message = '';
                                        
                                        if(isset($_POST['submit'])){
                                            extract($_POST);
                                            
                                            $validation = TRUE;
                                            
                                            if(!$name){
                                                $message = 'Search by id then submit !';
                                                $validation = FALSE;
                                            }
                                            
                                            if(!$Total){
                                                $message = 'Enter salary !';
                                                $validation = FALSE;
                                            }
                                            
                                            if(isset($_REQUEST['Month']) && $_REQUEST['Month'] == '1') { 
                                                $message = 'Please select Month.'; 
                                                $validation = FALSE;
                                            }
                                              
                                            if(isset($_REQUEST['year']) && $_REQUEST['year'] == '1') { 
                                                $message = 'Please select Year.'; 
                                                $validation = FALSE;
                                            }
                                            
                                            
                                            //echo $check_id.' '.$name.' '.$mobile.' '.$Month.' '.$year.' '.$Basic.' '.$Bonus.' '.$Overtime.' '.$Honoree.' '.$Total.' '.$Payment.' '.$Due;
                                            if($validation){
                                                $insert_sql = "INSERT INTO `salary`( `e_id`, `name`, `mobile`, `basic`, `bonus`, `overtime`, `honoree`, `total`, `payment`, `due`, `date`, `month`, `year`) VALUES"
                                                    . " ('$check_id','$name','$mobile','$Basic','$Bonus','$Overtime','$Honoree','$Total','$Payment','$Due','$today','$Month','$year')";
                                                $exe_sql = $conn->query($insert_sql);
                                                if($exe_sql){
                                                    $message = 'Salary insert successful !';
                                                }
                                            }
                                            
                                        }
                                        
                                    ?>
                                    
                                            <form class="form-horizontal" action="" method="POST">
                                        <div class="container-fluid">
                                            <div class="row">

                                                <p class="text-center" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Employee Details</p>
                                                <p style=" color: red;font-family: caption;font-size: 20px;font-weight: bolder;text-align: center;"><?php echo $message;?></p>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="patientName">Employee Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="check_id" value="<?php echo $patient_id_no;?>">
                                                            <input style="color: red;" type="text" class="form-control"  id="name" value="<?php echo $name;?>" name="name" placeholder="Employee Name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="mobileNo">Mobile No:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control" value="<?php echo $mobile;?>" id="mobile" name="mobile" placeholder="Mobile No" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
<!--                                                        <label class="control-label col-sm-4" for="Month">Month:</label>-->
                                                        <div class="col-sm-8">
                                                            <select name="Month" style="height: 30px;width: 123px;">
                                                                <option value="1"
                                                                        
                                                                >Select Month</option>
                                                                <option value="January"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'January'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >January</option>
                                                                <option value="February"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'February'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >February</option>
                                                                <option value="March"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'March'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >March</option>
                                                                <option value="April"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'April'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >April</option>
                                                                <option value="May"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'May'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >May</option>
                                                                <option value="June"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'June'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>
                                                                >June</option>
                                                                <option value="July"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'July'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >July</option>
                                                                <option value="August"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'August'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >August</option>
                                                                <option value="September"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'September'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >September</option>
                                                                <option value="October"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'October'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >October</option>
                                                                <option value="November"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'November'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >November</option>
                                                                <option value="December"
                                                                <?php
                                                                    if(isset($Month)){
                                                                        if($Month == 'December'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >December</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4">
<!--                                                        <label class="control-label col-sm-4" for="Month">Month:</label>-->
                                                        <div class="col-sm-8">
                                                            <select name="year" style="height: 30px;width: 123px;">
                                                                <option value="1">Select Year </option>
                                                                <option value="2016"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2016'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2016</option>
                                                                <option value="2017"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2017'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2017</option>
                                                                <option value="2018"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2018'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2018</option>
                                                                <option value="2019"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2019'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2019</option>
                                                                <option value="2020"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2020'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2020</option>
                                                                <option value="2021"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2021'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2021</option>
                                                                <option value="2022"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2022'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2022</option>
                                                                <option value="2023"
                                                                <?php
                                                                    if(isset($year)){
                                                                        if($year == '2023'){
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                ?>        
                                                                >2023</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <p class="text-center" style="background: #F2B013; color: white;text-align: center;text-transform: uppercase;padding: 5px 0px;">Salary Details</p>
                                                <div class="col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Basic">Basic:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control" id="Basic" name="Basic" placeholder="Enter Basic">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Basic').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Basic = $(this).val();
                                                                var Bonus = $('#Bonus').val();
                                                                var Overtime = $('#Overtime').val();
                                                                var Honoree = $('#Honoree').val();
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url:'salary_calclution.php',
                                                                    data:{Basic:Basic,Bonus:Bonus,Overtime:Overtime,Honoree:Honoree}
                                                                })
                                                                        .done(function(r){
                                                                           $('#ok').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Bonus">Bonus:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Bonus" name="Bonus" placeholder="Enter Bonus ">
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Bonus').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Basic = $('#Basic').val();
                                                                var Bonus = $(this).val();
                                                                var Overtime = $('#Overtime').val();
                                                                var Honoree = $('#Honoree').val();
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url:'salary_calclution.php',
                                                                    data:{Basic:Basic,Bonus:Bonus,Overtime:Overtime,Honoree:Honoree}
                                                                })
                                                                        .done(function(r){
                                                                            $('#ok').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Overtime">Overtime:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Overtime" name="Overtime" placeholder="Overtime Amount">
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Overtime').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Basic = $('#Basic').val();
                                                                var Bonus = $('#Bonus').val();
                                                                var Overtime = $(this).val();
                                                                var Honoree = $('#Honoree').val();
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url:'salary_calclution.php',
                                                                    data:{Basic:Basic,Bonus:Bonus,Overtime:Overtime,Honoree:Honoree}
                                                                })
                                                                        .done(function(r){
                                                                            $('#ok').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Honoree">Honoree:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Honoree" name="Honoree" placeholder="Honoree Amount">
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Honoree').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Basic = $('#Basic').val();
                                                                var Bonus = $('#Bonus').val();
                                                                var Overtime = $('#Overtime').val();
                                                                var Honoree = $(this).val();
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url:'salary_calclution.php',
                                                                    data:{Basic:Basic,Bonus:Bonus,Overtime:Overtime,Honoree:Honoree}
                                                                })
                                                                        .done(function(r){
                                                                            $('#ok').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Total">Total:</label>
                                                        <div class="col-sm-8" id="ok">
                                                            <input style="color: red;" type="text" class="form-control" id="Total" name="Total" placeholder="Total" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Payment">Payment:</label>
                                                        <div class="col-sm-8">
                                                            <input style="color: red;" type="text" class="form-control"  id="Payment" name="Payment" placeholder="Payment Amount">
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function(){
                                                            $('#Payment').on('keyup',function(e){
                                                                e.preventDefault();
                                                                var Payment = $(this).val();
                                                                var Total = $('#Total').val();
                                                                
                                                                
                                                                $.ajax({
                                                                    method : 'POST',
                                                                    url:'salary_calclution1.php',
                                                                    data:{Total:Total,Payment:Payment}
                                                                })
                                                                        .done(function(r){
                                                                            $('#okok').html(r);
                                                                })
                                                            })
                                                        })
                                                    </script>
                                                    
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label col-sm-4" for="Due">Due :</label>
                                                        <div class="col-sm-8" id="okok">
                                                            <input style="color: red;" type="text" class="form-control"  id="Due" name="Due" placeholder="Due" readonly>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4 col-md-offset-1">
                                                        <div class="col-sm-8">
                                                            <button type="submit" id="submit" name="submit" class="btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </form>
                                    
                                    
                                    
                                 

                                    
                                        </div>    ,
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
