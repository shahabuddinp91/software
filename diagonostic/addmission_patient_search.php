<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['dianostic_id'])) {
    header("location:../log_form.php");
}
$patient_message = '';
include '../connection/link.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UPASHAM HOSPITAL</title>
        <link rel="stylesheet" href="../css/responsive.css">
<!--        <link rel="stylesheet" href="../css/style.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

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

            <div class="body_area" style="min-height: 700px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './letf_side_diagonostic.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right_content_area">
                                <div class="patient_list_area">
                                    <div class="response">
                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $today = date("m/d/Y");
                                        ?>

                                        <div class="" style="border-bottom: 1px solid;padding-bottom: 6px;">

                                            <?php
                                            include '../connection/db.php';
                                            $searching_date = '';
                                            if (isset($_POST['search'])) {
                                                $searching_date = $_POST['selldate'];

                                                $select_query = "select patient_entry_form.patient_name,patient_entry_form.id,patient_entry_form.mobile,patient_admission_system.reg_id ,patient_admission_system.cabin_no,patient_admission_system.admission_date,patient_admission_system.doctor_name,patient_admission_system.madical_problem,patient_admission_system.admission_fee,patient_admission_system.admission_payment,patient_admission_system.admission_due from patient_entry_form inner join patient_admission_system on patient_entry_form.id=patient_admission_system.reg_id where admission_date = '$searching_date'";
//                                                echo $select_query;
//                                                die();
                                                $execute_sql = $conn->query($select_query);
                                                $sell_date_count = mysqli_num_rows($execute_sql);

                                                $select_queryas = "select patient_entry_form.patient_name,patient_entry_form.id,patient_entry_form.mobile,patient_admission_system.reg_id ,patient_admission_system.cabin_no,patient_admission_system.admission_date,patient_admission_system.doctor_name,patient_admission_system.madical_problem,patient_admission_system.admission_fee,patient_admission_system.admission_payment,patient_admission_system.admission_due from patient_entry_form inner join patient_admission_system on patient_entry_form.id=patient_admission_system.reg_id where reg_id = '$searching_date'";
                                                $sele = $conn->query($select_queryas);
                                                $count = mysqli_num_rows($sele);

                                                $select_query_mobile = "select patient_entry_form.patient_name,patient_entry_form.id,patient_entry_form.mobile,patient_admission_system.reg_id ,patient_admission_system.cabin_no,patient_admission_system.admission_date,patient_admission_system.doctor_name,patient_admission_system.madical_problem,patient_admission_system.admission_fee,patient_admission_system.admission_payment,patient_admission_system.admission_due from patient_entry_form inner join patient_admission_system on patient_entry_form.id=patient_admission_system.reg_id where mobile = '$searching_date' ";
                                                $execute_mobile = $conn->query($select_query_mobile);
                                                $count_mobile = mysqli_num_rows($execute_mobile);

                                                if ($sell_date_count == 0 && $count == 0 && $count_mobile == 0) {
                                                    ?>
                                                    <h2 align="center" style="color: red; font-style: italic;"><?php echo'Data Not Found !'; ?></h2>
                                                    <?php
                                                }
                                            }
                                            ?>


                                            <form action="" method="POST" style="font-size: 15px; padding-top: 5px; padding-bottom: 5px;">
                                                <table border="0" >
                                                    <tr>
                                                        <td><input type="text" style="text-align: center;font-size: 12px;width: 300px;" value="<?php echo $searching_date; ?>"  name="selldate" id="selldate"  class="form-control datepicker" placeholder="Search BY DATE,ID & Mobile !" required></td>
                                                        <td><input type="submit" name="search" value="Search" class="form-control btn-success" style="margin-left: 2px;"></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>

                                        <table border="1" class="table text-center" style="margin-top: 10px;">

                                            <?php if ($sell_date_count > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'All admitted Patient at ' . $searching_date ?>

                                                </h2>

                                                <tr>
                                                    <td style="background-color: #346E99;color: #fff;">SL No</td>
                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Cabin/Word Number</td>
                                                    <td style="background-color: #346E99;color: #fff;">Contact</td>
                                                    <td style="background-color: #346E99;color: #fff;">Provisional Diagnosis</td>
                                                    <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment Fee</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>

                                                <?php
                                                $sl = 0;
                                                while ($row = $execute_sql->fetch_assoc()) {
                                                    $sl++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $sl; ?></td>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                        <td><?php echo $row['cabin_no']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['madical_problem']; ?></td>
                                                        <td><?php echo $row['doctor_name']; ?></td>
                                                        <td><?php echo $row['admission_payment']; ?></td>
                                                        <td><?php echo $row['admission_due']; ?></td>
                                                        <td><?php echo $row['admission_date']; ?></td>
                                                        <td>
                                                            <a href="report_admited_patient.php?id=<?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="Show" ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>

                                            <?php if ($count > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for ID ' . $searching_date; ?>

                                                </h2>

                                                <tr>

                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Cabin/Word Number</td>
                                                    <td style="background-color: #346E99;color: #fff;">Contact</td>
                                                    <td style="background-color: #346E99;color: #fff;">Provisional Diagnosis</td>
                                                    <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment Fee</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>

                                                <?php
                                                $sl = 0;
                                                while ($row = $sele->fetch_assoc()) {
                                                    $sl++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                        <td><?php echo $row['cabin_no']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['madical_problem']; ?></td>
                                                        <td><?php echo $row['doctor_name']; ?></td>
                                                        <td><?php echo $row['admission_payment']; ?></td>
                                                        <td><?php echo $row['admission_due']; ?></td>
                                                        <td><?php echo $row['admission_date']; ?></td>
                                                        <td>
                                                            <a href="report_admited_patient.php?id=<?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="Show" ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>


                                            <?php if ($count_mobile > 0) { ?>
                                                <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
                                                    <?php echo 'Search Complete for Mobile no ' . $searching_date; ?>

                                                </h2>

                                                <tr>

                                                    <td style="background-color: #346E99;color: #fff;">Registration ID</td>
                                                    <td style="background-color: #346E99;color: #fff;">Patient Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Cabin/Word Number</td>
                                                    <td style="background-color: #346E99;color: #fff;">Contact</td>
                                                    <td style="background-color: #346E99;color: #fff;">Provisional Diagnosis</td>
                                                    <td style="background-color: #346E99;color: #fff;">Doctor Name</td>
                                                    <td style="background-color: #346E99;color: #fff;">Payment Fee</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Due</td>
                                                    <td style="background-color: #346E99;color: #fff;">Admission Date</td>
                                                    <td style="background-color: #346E99;color: #fff;">Action</td>
                                                </tr>

                                                <?php
                                                $sl = 0;
                                                while ($row = $execute_mobile->fetch_assoc()) {
                                                    $sl++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['patient_name']; ?></td>
                                                        <td><?php echo $row['cabin_no']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['madical_problem']; ?></td>
                                                        <td><?php echo $row['doctor_name']; ?></td>
                                                        <td><?php echo $row['admission_payment']; ?></td>
                                                        <td><?php echo $row['admission_due']; ?></td>
                                                        <td><?php echo $row['admission_date']; ?></td>
                                                        <td>
                                                            <a href="report_admited_patient.php?id=<?php echo $row['id']; ?>"><i class="fa fa-eye" aria-hidden="true" title="Show" ></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            <?php } ?>

                                        </table>
                                        <p style=" background: #0099cc none repeat scroll 0 0;border: 1px solid;color: #fff;font-family: caption; font-size: 15px;height: 26px;text-align: center;width: 100%;">
                                            <?php echo $patient_message; ?>
                                        </p>
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
    </body>

</html>
