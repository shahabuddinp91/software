<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
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
        <script src="../js/bootstrap-datepicker.js"></script>
        <script>
            $(function(){
                $('.datepicker').datepicker()
            })
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
                            <div class="left_content">
<?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <?php
                        date_default_timezone_set("Asia/Dhaka");
                            //$today = date("m/d/Y");
                            $month=date('F');
                            $year = date('Y');
                            
                            $massege = '';
                            $Name = '';
                            $Father_Name = '';
                            $Mobile = '';
                            $Address = '';
                            $date = '';
                            
                            if(isset($_POST['submit'])){
                                extract($_POST);
                                //echo $Name.' '.$Father_Name.' '.$Mobile.' '.$Address.' '.$Gender.' '.$date;
                                $validation = TRUE;
        
                                if(!$Name){
                                    $massege = 'Enter Name !';
                                    $validation = FALSE;
                                }
                                
                                if(!$Father_Name){
                                    $massege = 'Enter Father Name !';
                                    $validation = FALSE;
                                }
                                
                                if(!$Mobile){
                                    $massege = 'Enter Mobile number !';
                                    $validation = FALSE;
                                }
                                
                                if(!$date){
                                    $massege = 'Select Join Date !';
                                    $validation = FALSE;
                                }
                                
                                if(isset($_REQUEST['Gender']) && $_REQUEST['Gender'] == '0') { 
                                    $massege = 'Please select Gender.'; 
                                    $validation = FALSE;
                                  }
                                
                                
                                $select_mobile = "SELECT * FROM `add_person` WHERE mobile = '$Mobile' ";
                                $exe_mobile = $conn->query($select_mobile);
                                $count = mysqli_num_rows($exe_mobile);
                                
                                if($validation){
                                    if($count == 0){
                                        $insert_sql = "INSERT INTO `add_person`( `name`, `f_name`, `mobile`, `address`, `gender`, `date`, `month`, `year`) VALUES ('$Name','$Father_Name','$Mobile','$Address','$Gender','$date','$month','$year')";
                                        $exe_insert_sql = $conn->query($insert_sql);
                                        //$employ_id = mysqli_insert_id($exe_insert_sql);
                                
                                    if($exe_insert_sql){
                                        $select_id = "SELECT * FROM `add_person` WHERE name = '$Name' and mobile = '$Mobile'";
                                        $exe_select_id = $conn->query($select_id);
                                        while ($row = $exe_select_id->fetch_assoc()){
                                            $id = $row['id'];
                                        }
                                            $massege = $Name.' is insert successful . Id is '.$id;
                                        }
                                    }  else {
                                        $massege = 'Mobile Number allready exists !';
                                    }
                                }
                                
                                
                            }
                        ?>
                        <div class="col-md-10">
                            <div class="right_content">
                                <form id="form_data" action="" method="post">
                                <p style="
    color: red;
    font-family: caption;
    font-size: 20px;
    font-weight: bold;
    margin-left: 343px;
    text-transform: uppercase;">Insert Employee form </p>
                                <p style="color: blue;
    font-size: 20px;
    margin-left: 283px;"><?php echo $massege;?></p>
                                <div class="col-md-12" style="border-top: 1px solid;padding-top: 10px;">
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Name">Name :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" value="<?php echo $Name;?>" class="form-control"  id="Name" name="Name" placeholder="Enter Name" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Father_Name">Father Name :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" value="<?php echo $Father_Name;?>" class="form-control"  id="Father_Name" name="Father_Name" placeholder="Enter Father Name" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Mobile">Mobile :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" value="<?php echo $Mobile;?>" class="form-control"  id="Mobile" name="Mobile" placeholder="Enter Mobile number" >
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Address">Address :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" value="<?php echo $Address;?>" class="form-control"  id="Address" name="Address" placeholder="Enter Address" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="Gender">Gender :</label>
                                        <div class="col-sm-8">
                                            <select name="Gender">
                                                <option value="0">Select Gender</option>
                                                <option value="Male"
                                                        <?php
                                                        if(isset($Gender)){
                                                            if($Gender == 'Male'){
                                                                echo 'selected';
                                                            }
                                                        }
                                                    ?>
                                                        >Male</option>
                                                <option value="Female"
                                                        <?php
                                                        if(isset($Gender)){
                                                            if($Gender == 'Female'){
                                                                echo 'selected';
                                                            }
                                                        }
                                                    ?>
                                                        >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-sm-4" for="date">Join Date :</label>
                                        <div class="col-sm-8">
                                            <input style="color: red;" type="text" value="<?php echo $date;?>" class="form-control datepicker"  id="date" name="date" placeholder="Select Join Date" >
                                        </div>
                                    </div>
                                </div>
                                
                                
                                    
                                <div class="col-md-12">    
                                     <div class="form-group col-md-4">
                                         <button type="submit" class="btn-primary" id="submit" name="submit">Submit</button>
                                         <button type="clear" class="btn-success">Clear</button>
                                    </div>
                                </div>
                                
                                </form>
                                
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
