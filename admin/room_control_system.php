<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin_id'])) {
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
                                            <div class="panel-heading" align="center">Add room system</div>


                                            <?php
                                            $insert_message = '';
                                            $room_no = '';
                                            $price = '';
                                            $insert_messagek = '';

                                            if (isset($_POST['submit'])) {

                                                extract($_POST);
                                                //echo $room_no .' '.$room_type.' '.$price;
                                                $validation = TRUE;

                                                if (!$room_no) {
                                                    $insert_messagek = 'Enter Room Number !';
                                                    $validation = FALSE;
                                                }


                                                if (!$price) {
                                                    $insert_message = 'Enter Room Price !';
                                                    $validation = FALSE;
                                                }

                                                $select_sql = "SELECT * FROM `room_info` WHERE cabin_no = '$room_no'";
                                                $execute_select = $conn->query($select_sql);
                                                $count = mysqli_num_rows($execute_select);

                                                if ($count == 0) {
                                                    if ($validation) {
                                                        $inser_sql = "INSERT INTO `room_info`( `cabin_no`, `room_type`, `status`, `price`) VALUES ('$room_no','$room_type','1','$price')";

                                                        $execute_sql = $conn->query($inser_sql);
                                                        if ($execute_sql) {
                                                            $insert_message = 'Room no ' . $room_no . ' is added successful !';
                                                        }
                                                    }
                                                } else {
                                                    $insert_message = 'ERROR ! Room no ' . $room_no . ' already exixts !';
                                                }
                                            }
                                            ?>
                                            <P style="color: red;font-family: caption;font-size: 15px;font-weight: bold;text-align: center;"><?PHP echo $insert_messagek . $insert_message; ?></P>
                                            <form class="form-horizontal drugstore_form" role="form" method="POST" action="">

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="Room No">Cabin/Bed No :</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="<?php echo $room_no; ?>" class="form-control" id="room_no" name="room_no" placeholder="Enter Cabin/Bed number">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="room_type">Cabin/Bed type : </label>
                                                    <div class="col-sm-8">
                                                        <select name="room_type" class="form-control" required>
                                                            <option value="">SELECT CABIN/BED TYPE</option>
                                                            <option value="ac"
<?php
if (isset($room_type)) {
    if ($room_type == 'ac') {
        echo 'selected';
    }
}
?>
                                                                    >AC</option>
                                                            <option value="non-ac"
                                                            <?php
                                                            if (isset($room_type)) {
                                                                if ($room_type == 'non-ac') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>
                                                                    >NON-AC</option>
                                                            <option value="word"
                                                            <?php
                                                            if (isset($room_type)) {
                                                                if ($room_type == 'word') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>
                                                                    >WORD</option>
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
                                                        <button type="submit" class="btn btn-default submit btn-primary" name="submit" >Submit</button>
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
