<?php
$room_id = $_GET['id'];

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
include '../connection/db.php';

$select_sql = "SELECT * FROM `room_info` WHERE room_id = '$room_id'";
$execute_slq = $conn->query($select_sql);
while ($row = $execute_slq->fetch_assoc()) {
    $type = $row['room_type'];
    $price = $row['price'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
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

            <div class="body_area"  style="min-height: 660px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_admin.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-offset-1 col-md-8">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body add_drug_store" style="height: 300px;">
                                            <div class="panel-heading" align="center">Edit room information</div>


                                            <?php
                                            include '../connection/db.php';
                                            $insert_message = '';
                                            $insert_messagek = '';
                                            $update_masseage = '';
                                            $edit_id='';
                                            $edit_id = $_GET['id'];
                                            
                                            $select_query = "SELECT * FROM `room_info` WHERE room_id='$edit_id'"; 
                                            $execute_sql = $conn->query($select_query);
                                            
                                            while ($row = $execute_sql->fetch_assoc()) {
                                                $room_no = $row['cabin_no'];
                                                $room_id = $row['room_id'];
                                                $type = $row['room_type'];
                                                $status = $row['status'];
                                                $price = $row['price'];
                                            }
                                            
                                            if(isset($_POST['submit'])){
                                                extract($_POST);
                                                //echo $room_no.' '.$type.' '.$price;
                                                $upadte_sql = "UPDATE `room_info` SET `room_type`='$type',`price`='$price' WHERE room_id = '$room_id'";
                                                $execute_sql = $conn->query($upadte_sql);
                                                if($execute_sql){
                                                    $update_masseage = 'Update successful !';
                                                }  else {
                                                    $update_masseage = 'Update Error !';
                                                }
                                            }
                                            ?>
                                            <P style="color: red;font-family: caption;font-size: 15px;font-weight: bold;text-align: center;"><?PHP echo $update_masseage; ?></P>
                                            <form class="form-horizontal drugstore_form" role="form" method="POST" action="">

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Room No">Cabin/bed No :</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" readonly="true" value="<?php echo $room_no; ?>" class="form-control" id="room_no" name="room_no" placeholder="Enter room number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="room_type">Room type : </label>
                                                    <div class="col-sm-8">
                                                        <select name="type">
<!--                                                            <option value="">Update room type !</option>-->
                                                            <option value="ac"
                                                                    <?php
                                                                        if(isset($_POST['']))
                                                                    ?>
                                                            >AC</option>
                                                            <option value="non-ac">NON-AC</option>
                                                            <option value="word">WORD</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="<?php echo $price; ?>" class="form-control" id="price" name="price" placeholder="Price">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-default submit btn-primary" name="submit" >Update</button>
                                                        <button type="reset" class="btn btn-default clear btn-warning">Clear</button>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>

                                        <div>

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
