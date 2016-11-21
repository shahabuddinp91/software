<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin_id'])) {
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

    </head>
    <body>
        <div class="wapper">
            <div class="dashbord_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dashboard_text text-center">
                                <div class="dashboard_text text-center">
                                <img src="../images/baner.png" alt="UPASHAM HOSPITAL" title="UPASHAM HOSPITAL" height="100">
                                <br>
                                Dashboard Of Admin
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <?php include 'left_side_admin.php';?>
                    </div>
                    
                    <?php
                    $id = $_GET['id'];
                    include '../connection/db.php';
                        $insert_sql = "SELECT * FROM `outdoor_test_register` WHERE id = '$id'";
                        $execute_sqli = $conn->query($insert_sql);
                        while ($row = $execute_sqli->fetch_assoc()){
                            $name = $row['patient_name'];
                            $mobile= $row['patient_mobile'];
                            $age = $row['age'];
                            $dr_name = $row['dr_name'];
                            $ref_name = $row['ref_name'];
                            $ref_mobile = $row['ref_mobile'];
                        }
                    ?>
                    
                    <div class="col-md-9">
                        <div class="panel-heading " style="  background: #fb7922 none repeat scroll 0 0;
    border: 1px solid;
    color: #fff;
    margin-top: 15px;
    text-transform: uppercase;">Updating pathology Patient Informatica</div>
                                
                                <?php
                                $mess = '';
                                    if(isset($_POST['update'])){
                                        extract($_POST);
                                        //echo $id.' '.$patient_name.' '.$patient_mobile.' '.$age.$Doctor_Name.' '.$ref_name.' '.$ref_mobile;
                                        $update = "UPDATE `outdoor_test_register` SET `patient_name`='$patient_name',`patient_mobile`='$patient_mobile',`age`='$age',`dr_name`='$Doctor_Name',`ref_name`='$ref_name',`ref_mobile`='$ref_mobile' WHERE id = '$id'";
                                        $execute_update = $conn->query($update);
                                        if($execute_update){
                                            $mess = 'Update successful';
                                        }
                                    }
                                ?>
                                
                                <form class="" style="margin-bottom: 200px;" method="post" action="">
                                    <p style="color: red;text-transform: uppercase;"><?php echo $mess;?></p>
                                        <div class="col-md-3 form-group">
                                            <label>Patient Name :</label>
                                            <input type="hidden" value="<?php echo $id;?>" name="id">
                                            <input style="text-align: center;color: #16A05D;" type="text" name="patient_name" value="<?php echo $name;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Patient Mobile :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="patient_mobile" value="<?php echo $mobile;?>">
                                        </div>
                                        
                                    <div class="col-md-3 form-group">
                                        <label>Age : </label><br>
                                        <input style="text-align: center;color: #16A05D;" type="text" value="<?php echo $age;?>" name="age">
                                    </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Doctor Name :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="Doctor_Name" value="<?php echo $dr_name;?>">
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Reference name :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="ref_name" value="<?php echo $ref_name;?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Reference mobile :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="ref_mobile" value="<?php echo $ref_mobile;?>">
                                        </div>
                                    <div class="col-md-6">
                                        <label style="color: #CB4025;">You are comform to update this ! Click Update</label><br>
                                        <button type="submit" class="btn-danger" name="update">Upadate</button>
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
        </div>
    </body>

</html>
