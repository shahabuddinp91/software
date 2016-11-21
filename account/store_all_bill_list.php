<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['account_id'])) {
    header("location:../log_form.php");
}
//echo $_SESSION['account_id'];
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
        <!--<link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../js/owl.carousel.min.js" rel="stylesheet"/>
        <script src="../js/main.js"></script>
        
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/datepicker.css">
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
                                Dashboard Of Accounts
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
                                <?php include './left_side_accounts.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9">
                                
                                <form action="output_storeall_bill_list_search.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                    <table border="0" >
                                        <tr>
                                            <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="search_id" id="search_id"  class="form-control search datepicker" placeholder="Search By ID, Date, Month & Year !" required></td>
                                            <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                        </tr>
                                    </table>
                                </form>
                                
                                <table border="1" class="table text-center success" style="">
                                    <tr>
                                        <td style="background-color: #346E99;color: #fff;">SL No</td>
                                        <td style="background-color: #346E99;color: #fff;">Patient ID</td>
                                        <td style="background-color: #346E99;color: #fff;">Sub Total Bill</td>
                                        <td style="background-color: #346E99;color: #fff;">Discount</td>
                                        <td style="background-color: #346E99;color: #fff;">Total Payment</td>
                                        <td style="background-color: #346E99;color: #fff;">Due</td>

                                        <td style="background-color: #346E99;color: #fff;">Action</td>
                                    </tr>
                                    <tr>
                                        <?php
                                        include '../connection/db.php';
                                        date_default_timezone_set("Asia/Dhaka");
                                        $month = date('F');
                                        $today=date('m/d/Y');
//                                        $regi_id=$_POST[''];
                                        $sl = 0;
                                        $select = "SELECT * FROM `storeallbill` where release_date='$today'";
//                                        echo $select;
//                                        die();
                                        $execute_sql = $conn->query($select);
                                        while ($row = $execute_sql->fetch_assoc()) {
                                            $sl++;
                                            ?>

                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $row['patient_id']; ?>
                                            <td><?php echo $row['sub_total']; ?></td>
                                            <td><?php echo $row['discount']; ?></td>
                                            <td><?php echo $row['payment']; ?></td>
                                            <td><?php echo $row['due']; ?></td>
                                            <td>
                                                <a href="report_store_all_bill.php?patient_id=<?php echo $row['patient_id']; ?>" style="">Report</a> |
                                                <a href="details_store_allbill_report.php?patient_id=<?php echo $row['patient_id']; ?>">Details</a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </table>
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
