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

            <div class="body_area" style="min-height: 400px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="left_content_area">
                                <?php include './left_side_pharmacy.php'; ?>
                            </div>
                        </div>
                        <div class="right_content_area">
                            <div class="col-md-9">
                                <div id="hide" class="panel panel-primary modal-content modal-body" style="margin-left: -100px;" >
                                    <div class="panel-heading entry_form_area" align="center"> Outdoor Patient Register Form 
                                        <div style="display: inline;margin-left: 240px;">
                                            <button class="btn-success" id="show" style="border: 1px solid #fff;
                                                    border-radius: 6%;color: #fff;margin-right: 10px;">For Drug</button>
                                                    <a href="outdoor_pharmacy_patient_list.php" style="border: 1px solid #fff;
                                               border-radius: 6%;color: #fff;margin-right: 10px;background: red none repeat scroll 0 0;
                                               padding: 2px 6px;
                                               text-decoration: none;">Outdoor Patient List</a>
                                        </div>
                                    </div>
                                    <br>

                                    <script>
                                        $(document).ready(function () {
                                            $('#show').click(function () {
                                                $('#open').show(1000);
                                                $('#hide').hide(1000);
                                            })
                                            $('#search').click(function () {
                                                $('#open').show(1000);
                                                $('#hide').hide(1000);
//                                                        alert('ok');
                                            })
                                        })
                                    </script>

                                    <form class="form-horizontal outdoor_patient_register" role="form">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="pt_name">Patient Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="pt_name" name="pt_name" placeholder="Patient Name !">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="mobile">Mobile No:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="mobile" name="mobile" placeholder="Mobile No !">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="age">Age:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="age" name="age" placeholder="Age !">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="dr_name">Dr. Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="dr_name" name="dr_name" placeholder="Doctor Name !">
                                                    </div>
                                                </div>

<!--                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="ref_name">Ref. Name:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="ref_name" name="ref_name" placeholder="Reference Name !">
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-6">
                                                    <label class="control-label col-sm-4" for="ref_mobile">Ref. Mobile:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control"  id="ref_mobile" name="ref_mobile" placeholder="Reference Mobile !">
                                                    </div>
                                                </div>-->
                                                <div class="form-group col-md-10 text-right">
                                                    <div class=" text-right">
                                                        <button type="submit" class="btn btn-primary submit" name="submit">Submit</button>
                                                        <button type="reset" class="btn btn-success clear">Clear</button>
                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('.submit').on('click', function (e) {
                                                            e.preventDefault();
                                                            var data = $('.outdoor_patient_register').serialize();
                                                            $.ajax({
                                                                method: 'POST',
                                                                url: 'insert/outdoor_p_register_insert.php',
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
                                    </form>

                                </div>

                                <?php
                                $id = '';
                                include '../connection/db.php';
                                //$id = $_POST['regi_id'];
                                ?>
                                <div class="panel panel-primary modal-content modal-body" id="open" style="display: none; font-size: 15px; padding-top: 5px; padding-bottom: 15px;margin-left: -95px;" >
                                    <div class="panel-heading entry_form_area" align="center">Outdoor Patient test Form </div>
                                    <br>
                                    <form  action="outdoor_pharmacy_p_drug_selling.php" method="POST" >

                                        <table border="0" >
                                            <tr>
                                                <td style="text-align: center;"><input value="<?php echo $id; ?>" style="text-align: center;font-size: 12px;width: 300px;" type="text"  name="regi_id" id="regi_id"  class="form-control" placeholder="Enter Registration ID !" required></td>
                                                <td><input type="submit" name="search" value="Search" id="search" class="form-control btn-danger" style="margin-left: 2px;">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>

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

