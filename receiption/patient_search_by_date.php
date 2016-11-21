    <?php
        extract($_POST);
        //echo $search_date;
        include '../connection/db.php';
       
        
       
            $select_sql1 = "SELECT * FROM `patient_entry_form` WHERE reg_date = '$search_date'";
            $execute_sql1 = $conn->query($select_sql1);
            $count = mysqli_num_rows($execute_sql1);
            //echo $count;
        
    ?>
    <div style="border-bottom: 1px solid;padding-bottom: 6px;">
        <h2 style="color: #000;font-family: caption;font-size: 24px;margin-left: 50px;opacity: 0.6;display: inline-block;">
            <?php echo 'All Patient at '.$search_date?>
        </h2>
        <script>
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
        <form class="searchdata" style="display: inline">
            <input style="display: inline-block;border: 1px solid;font-family: caption;font-size: 14px;margin-left: 370px;opacity: 0.9;padding: 3px;
                   text-align: center;" name="search_date"  type="text" class="datepicker" placeholder="Click here for date .">
            <button style="background: #fff none repeat scroll 0 0;border: 1px solid;border-radius: 11%;margin-left: -4px;opacity: 0.7;padding: 3px 7px;"
                type="submit" class="icon" name="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>

    <table border="2" class="table text-center" style="display: inline-block;margin-left: 50px;width: 832px;font-family: caption;margin-top: 10px;">
    <tr>
        <td class="d" style="width: 117px;background-color: #346E99;color: #fff;">Registration Num</td>
        <td class="f" style="width: 115px;background-color: #346E99;color: #fff;">Patient Name</td>
        <td class="k" style="width: 128px;background-color: #346E99;color: #fff;">Guardian Name</td>
        <td class="l" style="width: 90px;background-color: #346E99;color: #fff;">Contact</td>
        <td class="n" style="width: 130px;background-color: #346E99;color: #fff;">Medical Problem</td>
        <td class="m" style="width: 122px;background-color: #346E99;color: #fff;">Doctor Name</td>
        <td class="p" style="width: 126px;background-color: #346E99;color: #fff;">Registration Date</td>
    </tr>
    <?php
        if($count > 0) {
            while ($row1 = $execute_sql1->fetch_assoc()) {
    ?>

    <tr>
        <td><?php echo $row1['id'];?></td>
        <td class="td_patient_name" style="width: 100px;"><?php echo $row1['patient_name'];?></td>
        <td style="width: 150px;"><?php echo $row1['guardian_name'];?></td>
        <td><?php echo $row1['mobile'];?></td>
        <td><?php echo $row1['medical_problem'];?></td>
        <td style="width: 200px;"><?php echo $row1['doctor_name'];?></td>
        <td><?php echo $row1['reg_date'];?></td>
    </tr>

    <?php } ?>
    <?php }  else {
        $patient_message = 'Patient are not present !';
            }
    ?>    
    </table>
    <p style=" background: #0099cc none repeat scroll 0 0;border: 1px solid;color: #fff;font-family: caption; font-size: 15px;height: 26px;text-align: center;width: 100%;">
        <?php echo $patient_message;?>
    </p>
     
                