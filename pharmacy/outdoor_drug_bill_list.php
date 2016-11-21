<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pharmacy_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
$delete_message = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <!--<link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
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
                                Dashboard of Pharmacy
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_area" style="min-height: 662px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="drug_list_area">
                                            <?php
//                                            $today = date('m/d/y');
//                                            echo $today;
                                            ?>
                                            <div class="" style="border-bottom: 1px solid;
                                                 color: #000;
                                                 font-family: caption;
                                                 font-size: 20px;
                                                 margin-left: 50px;
                                                 opacity: 0.6;
                                                 padding-bottom: 6px;">
                                                 <?php
                                                 // echo 'All Drug Store ' . $today
                                                 date_default_timezone_set("Asia/Dhaka");
                                                    $today = date("m/d/Y");
                                                $month=date('F');
                                                 echo $delete_message;
                                                 ?>


                                            </div>
                                            <form action="out_p_search.php" method="post" style="padding-bottom: 10px;">
                                                <table>
                                                    <tr>
                                                        <td><input type="text" name="regid" placeholder="Registration ID and date  !" class="form-control datepicker" required></td>
                                                        <td><input type="submit" name="search" id="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                            <table border="1" class="table text-center" style="">
                                                <h2>Outdoor pharmacy bill for <?php echo $today;?></h2>
                                                <tr>
                                                    <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill</td>
                                                    <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                    <td style="background-color: #346E99;color: #fff;">Bill(With Discount)</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                    <td style="background-color: #346E99;color: #fff;">Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                <?php
                                                include '../connection/db.php';
                                                $select_query = "SELECT * FROM `out_pharmacy_bill` WHERE date = '$today' order by patient_id desc ";
//                                            echo $select_query;
//                                                die();
                                                $execute_sql = $conn->query($select_query);
                                                $sl = 0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    $due = $row['due'];
//                                                    $r = '-';
//                                                    if($due == $r.$row['due']){
//                                                        $due = 0;
//                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['patient_id']; ?></td>
                                                        <td><?php echo $row['bill']; ?></td>
                                                        <td><?php echo $row['discount'].'%'; ?></td>
                                                        <td><?php echo $row['total_bill']; ?></td>
                                                        <td><?php echo $row['payment']; ?></td>
                                                        <td><?php echo $due; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td>
                                                            <a href="outdoor_bill_report.php?regi_id=<?php echo $row['patient_id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i>Report</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
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
