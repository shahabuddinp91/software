<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['pharmacy_id'])) {
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
        <script src="../js/bootstrap-datepicker.js"></script>

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
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9">

                                <div class="panel panel-primary modal-content modal-body" style="margin-left: -86px;
                                     margin-top: 26px;" >
                                    <div class="panel-heading entry_form_area" align="center">Outdoor Pharmacy Patient Drug Selling  Form </div>
                                    <br>

                                    <?php
                                    include '../connection/db.php';
                                    $reg_message = '';
                                    $count_message = '';
                                    $id = '';
                                    $patient_name = '';
                                    $mobile_no = '';
                                    $age = '';
                                    $doctor_name = '';
                                    $ref_name = '';
                                    $ref_mobile = '';
                                    $dr_name = '';

                                    if (isset($_POST['search'])) {
                                        $reg_id = $_POST['regi_id'];
//                                                echo $reg_id;

                                        $validation = TRUE;


                                        if ($validation) {
                                            $select_query = "SELECT * FROM `outdoor_pharmacy_p_register` WHERE id='$reg_id'";
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
                                                    $dr_name = $row['dr_name'];
                                                    $ref_name = $row['ref_name'];
                                                    $ref_mobile = $row['ref_mobile'];
                                                }
                                            } else {
                                                $count_message = "Registration Id Not Valid !";
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

                                    <form class="form-horizontal center-block drug_insert_form" role="form">
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
                                                    <label class="control-label col-sm-4" for="DrugName">Drug Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="DrugName" name="DrugName" placeholder="Drug Name">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="Units">Units:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Units" name="Units" placeholder="Enter Units">
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function () {
                                                        $('#Units').on('keyup', function (e) {
                                                            e.preventDefault();
                                                            var unit = $(this).val();
                                                            var name = $('#DrugName').val();
                                                            $.ajax({
                                                                method: 'POST',
                                                                url: 'drug_name.php',
                                                                data: {name: name, unit: unit}
                                                            })
                                                                    .done(function (rr) {
                                                                        //alert(rr);
                                                                        $('.replace').html(rr);
                                                                    })
                                                        })
                                                    })
                                                </script>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="Quantity">Quantity:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity">
                                                    </div>
                                                </div>


                                                <div class="form-group replace col-md-6">
                                                    <label class="control-label col-sm-4" for="Price">Price:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="Price" name="Price" placeholder="Price">
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('#Quantity').on('keyup', function (e) {
                                                            e.preventDefault();
                                                            var unit = $(this).val();
                                                            var Units = $('#Units').val();
                                                            var name = $('#DrugName').val();
                                                            var price = $('#Price').attr("value");
                                                            var total_q = $('#total_quantity').attr("value");
                                                            $.ajax({
                                                                method: 'POST',
                                                                url: 'total_price.php',
                                                                data: {price: price, unit: unit, total_q: total_q, Units: Units, name: name}
                                                            })
                                                                    .done(function (rr) {
                                                                        //alert(rr);
                                                                        $('.replace').html(rr);
                                                                    })
                                                        })
                                                    })
                                                </script>





                                                <div class="form-group col-md-10 text-right">
                                                    <div class=" text-right">
                                                        <input type="hidden" name="id_pass" id="id" value="<?php echo $id ?>">
                                                        <button type="submit" class="btn btn-primary insert" name="insert">Submit</button>
                                                        <button type="reset" class="btn btn-success clear">Clear</button>
                                                    </div>
                                                </div>

                                            </div>


                                    </form>

                                    <script>
                                        $(document).ready(function () {
                                            $('.insert').on('click', function (e) {
                                                e.preventDefault();
                                                var id = $('#id').attr("value");
                                                var name = $('#DrugName').val();
                                                var unit = $('#Units').val();
                                                var quentity = $('#Quantity').val();
                                                var price = $('#Price').attr("value");
                                                $.ajax({
                                                    method: 'POST',
                                                    url: 'outdoor_drug_insert.php',
                                                    data: {id: id, name: name, unit: unit, quentity: quentity, price: price}
                                                })
                                                        .done(function (m) {
                                                            alert(m)
                                                            $('.clear').trigger('click');

                                                        })
                                            })
                                        })
                                    </script> 

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
