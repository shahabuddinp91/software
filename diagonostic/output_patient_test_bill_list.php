<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
<!--        <link rel="stylesheet" href="../css/style.css">-->
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
                                Dashboard Reception Desk (Hospital)
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
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="drugstore_form">
                                <div class="container">
                                    <div class="col-md-9">
                                        <br>
                                        <div class="" style="
                                             color: #000;
                                             font-family: caption;
                                             font-size: 20px;
                                             margin-left: 10px;
                                             opacity: 0.6;
                                             padding-bottom: 6px;">
                                             <?php
                                             // echo 'All Drug Store ' . $today
                                             
//                                                 echo $delete_message;
                                             $patient_id = '';
                                             ?>
                                        </div>
                                        <form action="output_patient_test_bill_list.php" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                            <table border="0" >
                                                <tr>
                                                    <td style="text-align: center;"><input style="text-align: center;font-size: 12px;width: 300px;" type="text" value="<?php echo $patient_id; ?>"  name="search_name_mobile" id="search_name_mobile"  class="form-control datepicker" placeholder="Search By ID AND Date !" required></td>
                                                    <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                </tr>
                                            </table>
                                        </form>
                                        <?php
                                        include_once '../connection/db.php';
                                        $searching_item = '';
                                        $patient_id = '';
                                        $count_name = '';
                                        $count_mobile = '';
                                        $sum = '';
                                        date_default_timezone_set("Asia/Dhaka");
                                        $month = date('F');

                                        if (isset($_POST['search'])) {
                                            $searching_item = $_POST['search_name_mobile'];
//                                            echo $searching_item;
                                            $select_query_id = "SELECT * FROM `diagonostic_patient_bill` WHERE regi_id = '$searching_item'";
//                                            echo $select_query_id;
//                                            die();
                                            $execule_sql_id = $conn->query($select_query_id);
                                            $count_id = mysqli_num_rows($execule_sql_id);
//                                            echo $count_id;
//                                            die();


                                            $select_query_mobile = "SELECT * FROM `diagonostic_patient_bill` WHERE date = '$searching_item'";
//                                            echo $select_query_mobile;
//                                            die();
                                            $execute_mobile = $conn->query($select_query_mobile);
                                            $count_mobile = mysqli_num_rows($execute_mobile);

                                            if ($count_id == 0 &  $count_mobile == 0) {
                                                ?>
                                                <h2  style="color: red; font-style: caption;"><?php echo'Data Not Found !'; ?></h2>
                                                <?php
                                            }
                                        }
                                        ?>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">
                                            <!--its for search by id-->
                                            <?php if ($count_id > 0) { ?>
                                                <h2 style="color: red;font-family: caption;font-size: 24px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for ID ' . $searching_item ?>
                                                </h2>
                                                <tr class="">
                                                   <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient Id</td>
                                                <td style="background-color: #346E99;color: #fff;">Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Bill(After dis)</td>
                                                <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>
                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                <?php
                                                $sl = 0;
                                                $sum = 0;
                                                while ($row = $execule_sql_id->fetch_assoc()) {
                                                    $patient_id = $row['regi_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                    $sl++;
//                                                    $sum = $row['price'] + $sum;
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $patient_id;?></td>
                                                    <td><?php echo $row['bill']; ?></td>
                                                    <td><?php echo $row['discount'].'%'; ?></td>
                                                    <td><?php echo $row['total_bill']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="diagonostic_bill_report.php?reg_id=<?php echo $patient_id; ?>"><i class="fa fa-eye" aria-hidden="true" title="Show" >Report</i></a>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>

                                            <!--its for search by mobile-->
                                            <?php if ($count_mobile > 0) { ?>
                                                <h2 style="color: red;font-family: caption;font-size: 24px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for Mobile No ' . $searching_item ?>
                                                </h2>
                                                <tr class="">
                                                   <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                <td style="background-color: #346E99;color: #fff;">Patient Id</td>
                                                <td style="background-color: #346E99;color: #fff;">Bill</td>
                                                <td style="background-color: #346E99;color: #fff;">Discount</td>
                                                <td style="background-color: #346E99;color: #fff;">Bill(After dis)</td>
                                                <td style="background-color: #346E99;color: #fff;">Payment</td>
                                                <td style="background-color: #346E99;color: #fff;">Due</td>
                                                <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>
                                                <?php
                                                $sl = 0;
                                                $sum = 0;
                                                while ($row = $execute_mobile->fetch_assoc()) {
                                                    $patient_id = $row['regi_id'];
//                                                    echo $patient_id;
//                                                    die();
                                                    $sl++;
//                                                    $sum = $row['price'] + $sum;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                    <td><?php echo $patient_id;?></td>
                                                    <td><?php echo $row['bill']; ?></td>
                                                    <td><?php echo $row['discount'].'%'; ?></td>
                                                    <td><?php echo $row['total_bill']; ?></td>
                                                    <td><?php echo $row['payment']; ?></td>
                                                    <td><?php echo $row['due']; ?></td>
                                                    <td>
                                                        <a href="diagonostic_bill_report.php?reg_id=<?php echo $patient_id; ?>"><i class="fa fa-eye" aria-hidden="true" title="Show" >Report</i></a>
                                                    </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>
                                        </table>

                                        

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
        <script>
            $(document).ready(function () {
                $('.submit_bill').on('click', function (e) {
                    e.preventDefault();
                    var data = $('.patient_test_total_bill').serialize();
                    $.ajax({
                        method: 'POST',
                        url: 'insert/patient_test_bill_insert.php',
                        data: data
                    })
                            .done(function (m) {
                                alert(m)
                                $('.clear').trigger('click')
                            })
                })
            })
        </script>

    </body>

</html>
