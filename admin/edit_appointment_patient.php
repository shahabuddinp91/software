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
                    <div class="col-md-3">
                        <div class="left_content_area">
                            <?php include './left_side_admin.php'; ?>
                        </div>
                    </div>
                    <div class="right_content_area">
                        <div class="col-md-9" >
                            <br>
                            <?php
                            include_once '../connection/db.php';
//                            $get_id='';
                            $get_id=$_GET['id'];
                            //echo $get_id;
                            $insert_sql = "SELECT * FROM `patient_entry_form` WHERE id = '$get_id'";
                            $execute_sql = $conn->query($insert_sql);
                            while ($row = $execute_sql->fetch_assoc()){
                                $p_name = $row['patient_name'];
                                $p_mobile = $row['mobile'];
                                $d_name = $row['doctor_name'];
                                $d_r_no = $row['dr_room_no'];
                                $vi_bill = $row['visited_amount'];
                                $pay = $row['payment'];$due = $row['due'];
                                $r_name = $row['reference'];
                                $r_mobile = $row['ref_mobile'];
                                
                                
                            }
                            ?>
                            
                            <?php
                            $mess = '';
                                if(isset($_POST['update'])){
                                    extract($_POST);
                                                                                        //echo $patient_name.$patient_mobile.$Doctor_Name.$Room_No.$Visit_amount.$payment_amount.$due_amount.$ref_name.$ref_mobile;
                                    $update_sql = "UPDATE `patient_entry_form` SET `patient_name`='$patient_name',`mobile`='$patient_mobile',`doctor_name`='$Doctor_Name',`dr_room_no`='$Room_No',`visited_amount`='$Visit_amount',`payment`='$payment_amount',`due`='$due_amount',`reference`='$ref_name',`ref_mobile`='$ref_mobile' WHERE id = '$id'";
                                    $execute_update = $conn->query($update_sql);
                                    if($execute_update){
                                        $mess = "Update successful !";
                                    }
                                    
                                }
                            ?>
                            <div class="panel panel-primary modal-content ">
                                <div class="panel-heading text-center">Updating Appointment Patient Informatica</div>
                                <form class="" style="margin-bottom: 200px;" method="post" action="">
                                    <p style="color: red;text-align: center;text-transform: uppercase;"><?php echo $mess;?></p>
                                        <div class="col-md-3 form-group">
                                            <label>Patient Name :</label>
                                            <input type="hidden" value="<?php echo $get_id;?>" name="id">
                                            <input style="text-align: center;color: #16A05D;" type="text" name="patient_name" value="<?php echo $p_name;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Patient Mobile :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="patient_mobile" value="<?php echo $p_mobile;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Doctor Name :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="Doctor_Name" value="<?php echo $d_name;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Room No :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="Room_No" value="<?php echo $d_r_no;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Visit amount :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="Visit_amount" value="<?php echo $vi_bill;?>">
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label>Payment amount :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="payment_amount" value="<?php echo $pay;?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Due amount :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="due_amount" value="<?php echo $due;?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Reference name :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="ref_name" value="<?php echo $r_name;?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Reference mobile :</label>
                                            <input style="text-align: center;color: #16A05D;" type="text" name="ref_mobile" value="<?php echo $r_mobile;?>">
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
