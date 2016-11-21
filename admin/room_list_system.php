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
        <!--<link rel="stylesheet" href="../css/style.css">-->
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
    height: 100%;
    background: url(../images/patern.png);
    font-family: initial;

}




.dashbord_area {
    /*background: #3BB7DB none repeat scroll 0 0;*/
    padding: 15px 0;
}
.dashboard_text {
    color: #000;
    font-family: caption;
    font-size: 16px;
    font-weight: bolder;
}
.dashboard_text img{width: 100%; }


.manu {
    margin-top: 25px;
}
.manu li {
    list-style: outside none none;
    text-decoration: none;
}
.manu ul {
    padding-left: 0;
}
.manu a {
    background: #33b5e5 none repeat scroll 0 0;
    display: inline-block;
    margin-bottom: 10px;
    padding: 10px 5px;
    text-decoration: none;
    width: 210px;
    font-family: caption;
     font-size: 16px;
}
.manu a:hover {
    background: #0099cc none repeat scroll 0 0;
    color: #fff;
    text-decoration: none;
}
            #copyright {
    background: #a4bed9 none repeat scroll 0 0;
    color: #fff;
    font-family: caption;
    font-size: 15px;
    text-align: center;
      padding: 10px 0;
    
}
        </style>


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


                                        <div>
                                            <p style="background: #ccc none repeat scroll 0 0;border: 1px solid;border-radius: -29%;margin-top: 20px;
                                               color: red;font-family: caption;font-size: 18px;height: 30px;text-align: center;width: 489px;">List of all room !</p>
                                            <form action="output_search_by_room_no.php" method="post" style="font-size: 15px; margin-bottom: 10px;">
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="room_no" class="form-control" id="room_no" class="form-control" placeholder="Write Room No !" required="1"</td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <table border="3"  style="margin-left: 0px;width: 510px;font-family: caption;text-align: center;">
                                                <?php
                                                $select_sql = "SELECT * FROM `room_info` order by room_id desc";
                                                $execute_sql = $conn->query($select_sql);
                                                ?>

                                                <tr style="background: #0099cc none repeat scroll 0 0;color: #fff;font-size: 20px;">
                                                    <td style="width: -1px">#SL.NO</td>
                                                    <td>Cabin/Bed number</td>
                                                    <td style="width: 80px;">Type</td>
                                                    <td style="width: 80px;">Price</td>
                                                    <td style="width: 50px;">Status</td>
                                                    <td>Action</td>
                                                </tr>
                                                <?php
                                                $sl = 1;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    ?>
                                                    <tr style=" font-size: 15px;">
                                                        <td><?php echo $sl++; ?></td>
                                                        <td><?php echo $row['cabin_no']; ?></td>
                                                        <td><?php echo $row['room_type']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php
                                                            $status = $row['status'];
                                                            if ($status == 1) {
                                                                echo 'FREE';
                                                            }
                                                            if ($status == 2) {
                                                                echo 'BOOK';
                                                            };
                                                            ?></td>
                                                        <td>
                                                            <a href="room_info_edit.php?id=<?php echo $row['room_id']; ?>" style="text-decoration: none; " class="" name="edit"><img src="../images/edit2.png" width="35" height="35" title="Edit" alt="Edit" style="padding: 2px;"></a>
                                                            <a href="room_delete.php?id=<?php echo $row['room_id']; ?>" style=" text-decoration: none;" class="" name="delete"><img src="../images/delete2.png" width="35" height="35" title="Delete" alt="Delete" style="padding: 2px;"></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
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
