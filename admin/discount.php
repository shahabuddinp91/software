<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    header("location:../log_form.php");
}
//$patient_message = '';
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
                        <?php
                                                date_default_timezone_set("Asia/Dhaka");
                                                $today = date("m/d/Y");
                                                $month=date('F');
                                                    if(isset($_POST['submit'])){
                                                        extract($_POST);
                                                        //echo $in_phar.' '.$out_phar.' '.$in_diago.' '.$our_diago.' '.$acounts;
                                                        $update_in_pharmacy = "UPDATE `discount` SET `discount`='$in_phar',`last_update`='$today' WHERE  id = '1'";
                                                        $execute_in_p = $conn->query($update_in_pharmacy);
                                                        
                                                        $update_out_pharmacy = "UPDATE `discount` SET `discount`='$out_phar',`last_update`='$today' WHERE  id = '2'";
                                                        $execute_out_p = $conn->query($update_out_pharmacy);
                                                        
                                                        $update_in_dia = "UPDATE `discount` SET `discount`='$in_diago',`last_update`='$today' WHERE  id = '3'";
                                                        $execute_in_dia = $conn->query($update_in_dia);
                                                        
                                                        $update_out_dia = "UPDATE `discount` SET `discount`='$our_diago',`last_update`='$today' WHERE  id = '4'";
                                                        $execute_out_dia = $conn->query($update_out_dia);
                                                        
                                                        $update_account = "UPDATE `discount` SET `discount`='$acounts',`last_update`='$today' WHERE  id = '5'";
                                                        $execute_ac = $conn->query($update_account);
                                                    }
                                                ?>
                        <?php
                            $select_in_pharmacy ="SELECT * FROM `discount` WHERE id = '1'";
                            $execute_i_p = $conn->query($select_in_pharmacy);
                            while ($row = $execute_i_p->fetch_assoc()){
                                $dis_i_p = $row['discount'];
                                $up_i_p = $row['last_update'];
                            }
                        ?>
                        <div class="right_content_area">
                            <div class="container">
                                <div class="row">
                                   <div class="col-md-offset-1 col-md-8">
                                    <br>
                                    <div class="panel panel-primary modal-content modal-body">
                                        <div class="panel-heading" align="center">Discount System</div>
                                                <br>
                                                
                                                <form class="form-horizontal teststore_form" action="" method="post" role="form">
                                        
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="in_phar">Indoor Pharmacy:</label>
                                          <div class="col-sm-5">
                                              <input type="text" class="form-control" id="in_phar" name="in_phar" value="<?php echo $dis_i_p;?>" placeholder="Indoor Pharmacy">
                                          </div>
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <p style=" color: red;
    font-family: caption;
    font-size: 16px;
    margin-bottom: -10px;
    margin-top: 5px;
    text-align: center;"><?php echo 'Indoor pharmacy Discount : '.$dis_i_p.' % & last update : '.$up_i_p;?></p>
                                              </div>
                                          </div>
                                         <?php
                                            $select_out_pharmacy ="SELECT * FROM `discount` WHERE id = '2'";
                                            $execute_o_p = $conn->query($select_out_pharmacy);
                                            while ($row = $execute_o_p->fetch_assoc()){
                                                $dis_o_p = $row['discount'];
                                                $up_o_p = $row['last_update'];
                                            }
                                        ?> 
                                        </div>
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="out_phar">Outdoor Pharmacy:</label>
                                          <div class="col-sm-5">
                                              <input type="text" class="form-control" id="out_phar" value="<?php echo $dis_o_p;?>" name="out_phar" placeholder="Outdoor Pharmacy">
                                          </div>
                                        </div>
                                         
                                         <div class="row">
                                              <div class="col-md-12">
                                                  <p style=" color: red;
    font-family: caption;
    font-size: 16px;
    margin-bottom: 7px;
    margin-top: -12px;
    text-align: center;"><?php echo 'Outdoor pharmacy Discount : '.$dis_o_p.' % & last update : '.$up_o_p;?></p>
                                              </div>
                                          </div>
                                         
                                         <?php
                                            $select_in_pathology ="SELECT * FROM `discount` WHERE id = '3'";
                                            $execute_in_pathology = $conn->query($select_in_pathology);
                                            while ($row = $execute_in_pathology->fetch_assoc()){
                                                $dis_in_pathology = $row['discount'];
                                                $up_in_pathology = $row['last_update'];
                                            }
                                        ?> 
                                         
                                          <div class="form-group">
                                          <label class="control-label col-sm-4" for="in_diago">Indoor Pathology:</label>
                                          <div class="col-sm-5">
                                              <input type="text" class="form-control" id="in_diago" name="in_diago" value="<?php echo $dis_in_pathology;?>" placeholder="Indoor Diagonostic">
                                          </div>
                                        </div>
                                         
                                         <div class="row">
                                              <div class="col-md-12">
                                                  <p style=" color: red;
    font-family: caption;
    font-size: 16px;
    margin-bottom: 6px;
    margin-top: -11px;
    text-align: center;"><?php echo 'Indoor Pathology Discount : '.$dis_in_pathology.' % & last update : '.$up_in_pathology;?></p>
                                              </div>
                                          </div>
                                         <?php
                                            $select_out_pathology ="SELECT * FROM `discount` WHERE id = '4'";
                                            $execute_out_pathology = $conn->query($select_out_pathology);
                                            while ($row = $execute_out_pathology->fetch_assoc()){
                                                $dis_out_pathology = $row['discount'];
                                                $up_out_pathology = $row['last_update'];
                                            }
                                        ?> 
                                         
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="our_diago">Outdoor Pathology:</label>
                                          <div class="col-sm-5">
                                              <input type="text" value="<?php echo $dis_out_pathology;?>" class="form-control" id="our_diago" name="our_diago" placeholder="Outdoor Diagonostic">
                                          </div>
                                        </div>
                                         
                                         <div class="row">
                                              <div class="col-md-12">
                                                  <p style=" color: red;
    font-family: caption;
    font-size: 16px;
    margin-bottom: 6px;
    margin-top: -11px;
    text-align: center;"><?php echo 'Outdoor Pathology Discount : '.$dis_out_pathology.' % & last update : '.$up_out_pathology;?></p>
                                              </div>
                                          </div>
                                         
                                         <?php
                                            $select_account ="SELECT * FROM `discount` WHERE id = '5'";
                                            $execute_account = $conn->query($select_account);
                                            while ($row = $execute_account->fetch_assoc()){
                                                $dis_account = $row['discount'];
                                                $up_account = $row['last_update'];
                                            }
                                        ?>
                                         
                                         <div class="form-group">
                                          <label class="control-label col-sm-4" for="acounts">Accounts:</label>
                                          <div class="col-sm-5">
                                              <input type="text" value="<?php echo $dis_account;?>" class="form-control" id="acounts" name="acounts" placeholder="Accounts">
                                          </div>
                                        </div>
                                         <div class="row">
                                              <div class="col-md-12">
                                                  <p style=" color: red;
    font-family: caption;
    font-size: 16px;
     margin-bottom: 10px;
    margin-top: -10px;
    text-align: center;"><?php echo 'Account Discount : '.$dis_account.' % & last update : '.$up_account;?></p>
                                              </div>
                                          </div>
                                        <div class="form-group">
                                          <div class="col-sm-offset-4 col-sm-8">
                                              <button style="margin-left: 211px;" type="submit" class="btn btn-default submit btn-primary update" name="submit" >Update</button>
<!--                                            <button type="reset" class="btn btn-default clear btn-success">Clear</button>-->
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
