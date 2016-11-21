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
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <script src="../js/main.js"></script>
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
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container">
                                    <div class="col-md-9">
                                        <br>
                                        <div class="panel panel-primary modal-content modal-body" style="margin-left: -86px;
                                             margin-top: 26px;" >
                                            <div class="panel-heading entry_form_area" align="center">Indoor Patient test Form </div>
                                            <br>

                                            <?php
                                            include '../connection/db.php';
                                            $reg_message = '';
                                            $count_message = '';

                                            $patient_name = '';
                                            $mobile_no = '';
                                            $age = '';
                                            $dr_name = '';
                                            $ref_name = '';
                                            $ref_mobile = '';
                                            $id='';
                                            

                                            if (isset($_POST['search'])) {
                                                $reg_id = $_POST['regi_id'];
//                                                echo $reg_id;
//                                                die();

                                                $validation = TRUE;
                                                if(!$reg_id){
                                                    $count_message = 'Search by an ID';
                                                    $validation = FALSE;
                                                }
                                                
                                                if($validation){
                                                    $select_patient = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$reg_id'";
                                                $execute_patient = $conn->query($select_patient);
                                                $count_patient = mysqli_num_rows($execute_patient);
                                                
                                                if($count_patient == 1){
                                                    $select_query = "SELECT * FROM `patient_entry_form` WHERE id='$reg_id'";
//                                                    echo $select_query;
                                                    $execute_sql = $conn->query($select_query);
                                                    $count_patient = mysqli_num_rows($execute_sql);
//                                                    echo $count_patient;
                                                    if ($count_patient == 1) {
                                                        while ($row = $execute_sql->fetch_assoc()) {
                                                            $id = $row['id'];
                                                            $patient_name = $row['patient_name'];
                                                            $mobile_no = $row['mobile'];
                                                            $age = $row['age'];
                                                            $dr_name = $row['doctor_name'];
                                                            $ref_name = $row['reference'];
                                                            $ref_mobile = $row['ref_mobile'];
                                                        }
                                                    } else {
                                                        $count_message = "Registration Id Not Valid !";
                                                    }
                                                }  else {
                                                    $count_message = 'ID '.$reg_id.' is not admitted patient.';
                                                }
                                                }
                                        }
                                            ?>

                                            <form  action="" method="POST" >
                                                <table border="0" >
                                                    <tr>
                                                        <td style="text-align: center;"><input value="<?php echo $id; ?>" style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="regi_id" id="regi_id"  class="form-control" placeholder="Enter Registration ID !"></td>
                                                        <td><input type="submit" name="search" value="Search" id="search" class="form-control btn-danger" style="margin-left: 2px;">
                                                        </td>
                                                    </tr>
                                                </table>

                                            </form>


                                            <div class="text-center text-danger">
                                                <span style="color: #c9302c;font-weight: bolder;
                                                      font-family: caption;font-size: 18px;padding: 4px 10px;"><?php echo $reg_message, $count_message; ?></span>
                                            </div>

                                            <form class="form-horizontal center-block patient_test_form" role="form">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="pt_name">Patient Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $patient_name; ?>" id="pt_name" name="pt_name" placeholder="Patient Name" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="piatent_mobile_no">Mobile No:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $mobile_no; ?>" id="pa_mobile_no" name="mobile_no" placeholder="Mobile No" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4"  for="age">Age:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $age; ?>" id="age" name="age" placeholder="Age" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="dr_name">Doctor Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $dr_name; ?>" id="dr_name" name="dr_name" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="ref_name">Ref Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $ref_name; ?>" id="ref_name" name="ref_name" placeholder="Enter ref name" readonly>
                                                            </div>
                                                        </div>



                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="ref_mobile_no">Ref Mobile No:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="<?php echo $ref_mobile; ?>" id="ref_mobile_no" name="ref_mobile_no" placeholder="Enter ref Mobile No" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="ref_amount">Ref Amount:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="ref_amount" name="ref_amount" placeholder="Enter ref amount">
                                                            </div>
                                                        </div>

                                                        <?php
                                                        $select_sql = "SELECT * FROM `add_test_info` ";
                                                        $execute_sql = $conn->query($select_sql);
                                                        ?>

                                                        <div class="form-group col-md-6">
                                                            <label class="control-label col-sm-4" for="test_category">Test Category:</label>
                                                            <div class="col-sm-8">
                                                                <select name="test_category" id="test_category" class="col-md-6 form-control">
                                                                    <option value="0">Select One</option>
                                                                    <?php while ($row = $execute_sql->fetch_assoc()) { ?>
                                                                        <option id="testcatagory"><?php echo $row['test_category']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function () {
                                                                $('#test_category').change(function (e) {
                                                                    e.preventDefault();
                                                                    var data = $(this).val();
                                                                    $.ajax({
                                                                        method: 'POST',
                                                                        url: 'test_name.php',
                                                                        data: {data: data}
                                                                    })
                                                                            .done(function (m) {
                                                                                //alert(m)
                                                                                $('#cata_test_name').html(m);
                                                                            })
                                                                })
                                                            })
                                                        </script>       

                                                        <div class="form-group col-md-6" id="cata_test_name">
                                                            <label class="control-label col-sm-4" for="test_name">Test Name:</label>
                                                            <div class="col-sm-8">
                                                                <select name="test_name" id="test_name" class="col-md-6 form-control">
                                                                    <option value="0">Select One</option>

                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-group col-md-6 form">
                                                            <label class="control-label col-sm-4" for="test_price">Test Price:</label>
                                                            <div class="col-sm-8" id="price">
                                                                <input type="text" name="test_price" readonly="true" value="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-10 text-right">
                                                            <div class=" text-right">
                                                                <input type="hidden" name="id_pass" value="<?php echo $id ?>">
                                                                <button type="submit" class="btn btn-primary insert" name="insert">Submit</button>
                                                                <button type="reset" class="btn btn-success clear">Clear</button>
                                                            </div>
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
            $('.insert').on('click', function (e) {
                e.preventDefault();
                var data = $('.patient_test_form').serialize();
                $.ajax({
                    method: 'POST',
                    url: 'insert/patient_test_insert.php',
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
