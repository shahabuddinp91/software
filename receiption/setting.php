<?php session_start(); ?>             
                            <?php

if (!isset($_SESSION['receiption_id'])) {
    header("location:../log_form.php");
}
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
                                Dashboard Of Reception Desk (Diagnostic)
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_reception.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <br>
                            <?php
                           
                            $mess = '';
                            $old_pass = '';
                            $new_pass = '';
                            $confirm_pass = '';
                            $old_user = '';
                            $new_user = '';
                            
                            if(isset($_POST['submit'])){
                                extract($_POST);
                                $user_name = $_SESSION['receiption_name'];
                                $user_id = $_SESSION['receiption_id'];
                                //echo $old_pass.$new_pass.$confirm_pass.$old_user.$new_user;
                                //die();
                                $validation = TRUE;
                                
//                                if(!$old_user){
//                                    $validation = FALSE;
//                                    $mess = 'Enter present user name !';
//                                }
//                                
//                                if(!$new_user){
//                                    $validation = FALSE;
//                                    $mess = 'Enter new user name !';
//                                }
                                if($old_user){
                                    if(!$new_user){
                                        $validation = FALSE;
                                        $mess = 'Enter new user name !';
                                    }
                                }  else {
                                    $new_user = $user_name;
                                    $old_user = $user_name;
                                }
                                
                                if(!$old_pass){
                                    $validation = FALSE;
                                    $mess = 'Enter present password !';
                                }
                                
                                if(!$new_pass){
                                    $validation = FALSE;
                                    $mess = 'Enter new password !';
                                }
                                
                                if(!$confirm_pass){
                                    $validation = FALSE;
                                    $mess = 'Please Conform password !';
                                }
                                
                                if($validation){
                                    $select_sql = "SELECT * FROM `user_information` WHERE id = '$user_id'";
                                    $execute = $conn->query($select_sql);
                                    while ($row = $execute->fetch_assoc()){
                                        $password = $row['password'];
                                        $present_name = $row['user_name'];
                                    }
                                    if($password == $old_pass){
                                        if($new_pass == $confirm_pass){
                                            if($old_user == $present_name){
                                                $update_password = "UPDATE `user_information` SET `user_name`='$new_user',`password`='$new_pass' WHERE id = '$user_id'";
                                                $execute_sql  = $conn->query($update_password);
                                                if($execute_sql){
                                                    $mess = 'Update successful ';
                                                }
                                            }  else {
                                                $mess = 'Present user name wrong, enter correct !';
                                            }
                                            
                                        }  else {
                                            $mess = 'You enter different password !';
                                        }
                                        
                                    }  else {
                                        $mess = 'You Enter Wrong Password !';
                                    }
                                }
                                
                                
                            }
                            
                            ?>
                            <div class="col-md-offset-2 col-md-5 col-md-offset-1">
                                <div class="panel panel-primary" style="min-height: 250px;">
                                    <div class="panel panel-heading text-center">Change Your Password</div>
                                    <form action="" method="post">
                                        <p style="color: red;font-family: caption;
    margin-top: -14px;text-align: center;"><?php echo $mess;?></p>
                                        <table border="1">
                                            <div class="text-center">
                                                <label><input type="text" value="<?php echo $old_user;?>" name="old_user" placeholder="Enter present user name !" class="form-control text-center" size="40"></label>
                                            </div>
                                            <div class="text-center">
                                                <label><input type="text" value="<?php echo $new_user;?>" name="new_user" placeholder="Enter New user name !" class="form-control text-center" size="40"></label>
                                            </div>
                                            <div class="text-center">
                                                <label><input type="text" value="<?php echo $old_pass;?>" name="old_pass" placeholder="Enter present Password !" class="form-control text-center" size="40"></label>
                                            </div>
                                            <div class="text-center">
                                                <label><input type="text" value="<?php echo $new_pass;?>" name="new_pass" placeholder="Enter New Password !" class="form-control text-center" size="40"></label>
                                            </div>
                                            <div class="text-center">
                                                <label><input type="text" value="<?php echo $confirm_pass;?>" name="confirm_pass" placeholder="Enter Confirm Password !" class="form-control text-center" size="40"></label>
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" name="submit" class="btn-primary" value="Update" style="height: 32px; width: 200px; margin-bottom: 15px;">
                                            </div>
                                        </table>
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

                        <?php include '../footer.php'; ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
