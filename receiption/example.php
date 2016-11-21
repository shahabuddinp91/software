<?php
if (!isset($_SESSION)) {
    session_start();
}
$id = '';
if (!isset($_SESSION['receiption_id'])) {
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
                                Dashboard Of Reception Desk (Diagnostic)
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
                                <?php include './left_side_reception.php'; ?>

                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="patient_entry_form">
                                <div class="container-fluid">
                                    <div class="col-md-9">

                                        <div class="panel panel-primary modal-content modal-body" style="margin-left: -86px;
                                             margin-top: 26px;" >
                                            <div class="panel-heading entry_form_area" align="center">Outdoor Patient test Form </div>
                                            <br>

                                            <?php
                                            include '../connection/db.php';
                                            $reg_message = '';
                                            $count_message = '';

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
                                                    $select_query = "SELECT * FROM `outdoor_test_register` WHERE id='$reg_id'";
//                                                    echo $select_query;
                                                    $execute_sql = $conn->query($select_query);
                                                    $count_patient = mysqli_num_rows($execute_sql);
//                                                    echo $count_patient;
                                                    if ($count_patient == 1) {
                                                        while ($row = $execute_sql->fetch_assoc()) {
                                                            $id = $row['id'];
                                                            $patient_name = $row['patient_name'];
                                                            $mobile_no = $row['patient_mobile'];
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

                                            <form class="form-horizontal center-block entey_out_test" role="form">
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
                                                        <!--                                                        <div class="form-group col-md-6">
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
                                                        
                                                        
                                                                                                                <div class="form-group col-md-6">
                                                                                                                    <label class="control-label col-sm-4" for="test_price">Test Price:</label>
                                                                                                                    <div class="col-sm-8" id="price">
                                                                                                                        <input type="text" name="test_price" readonly="true" value="">
                                                                                                                    </div>
                                                                                                                </div>-->

                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <h3 class="text-center">Test Information</h3>
                                                                    <table class="table table-bordered table-hover" id="tab_logic">
                                                                        <thead>
                                                                            <tr >
                                                                                <th class="text-center">
                                                                                    #
                                                                                </th>
                                                                                <th class="text-center">
                                                                                    Test Category
                                                                                </th>
                                                                                <th class="text-center">
                                                                                    Test Name
                                                                                </th>
                                                                                <th class="text-center">
                                                                                    Test Price
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr id='addr0'>
                                                                                <td>
                                                                                    1
                                                                                </td>
                                                                                <td>
                                                                                    <?php
                                                                                    $select_sql = "SELECT * FROM `add_test_info` ";
                                                                                    $execute_sql = $conn->query($select_sql);
                                                                                    ?>
                                                                                    <select name="test_category[]" id="test_category" class="col-md-6 form-control">
                                                                                        <option value="0">Select One</option>
                                                                                        <?php while ($row = $execute_sql->fetch_assoc()) { ?>
                                                                                            <option id="testcatagory"><?php echo $row['test_category']; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
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
                                                                                </td>
                                                                                <td id="cata_test_name">
                                                                                    <select name="test_name" id="test_name" class="col-md-6 form-control">
                                                                                        <option value="0">Select One</option>

                                                                                    </select>
                                                                                </td>
                                                                                <td id="price">
                                                                                    <input type="text" name="test_price[]" readonly="true" value="" class="form-control">
                                                                                </td>
                                                                            </tr>
                                                                            <tr id='addr1'></tr>
                                                                        </tbody>
                                                                        <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
                                                                    </table>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            var i = 1;
                                                                            $("#add_row").click(function () {
                                                                                $('#addr' + i).html("<td>" + (i + 1) +
                                                                                        "</td><td><input name='test_category[]" + i + "' type='text' placeholder='Name' class='form-control input-md'  />\n\
                                                                             </td><td><input  name='test_name[]" + i + "' type='text' placeholder='Mail'  class='form-control input-md'>\n\
                                                                               </td><td><input  name='test_price[]" + i + "' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

                                                                                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                                                                                i++;
                                                                            });
                                                                            $("#delete_row").click(function () {
                                                                                if (i > 1) {
                                                                                    $("#addr" + (i - 1)).html('');
                                                                                    i--;
                                                                                }
                                                                            });

                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group col-md-10 text-right">
                                                            <div class=" text-right">
                                                                <input type="hidden" name="id_pass" value="<?php echo $id ?>">
                                                                <button type="submit" class="btn btn-primary outdoor_test_insert" name="insert">Submit</button>
                                                                <button type="reset" class="btn btn-success clear">Clear</button>
                                                            </div>
                                                        </div>

                                                    </div>


                                            </form>

                                            <script>
                                                $(document).ready(function () {
                                                    $('.outdoor_test_insert').on('click', function (e) {
                                                        e.preventDefault();
                                                        var data = $('.entey_out_test').serialize();
                                                        $.ajax({
                                                            method: 'POST',
                                                            url: 'out_test_insert.php',
                                                            data: data
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
