<div class="manu">
    <ul>

        <li> <a href="patient_entry_form.php">Add Patient</a></li>
        <li> <a class="all_patient_list" href="All_patient_list.php">Patient list</a></li>
        <li><a href="outdoor_patient_test.php">Outdoor Patient Test</a></li>
        <li><a href="outdoor_patient_test_list.php">Bill Process</a></li>
        <li><a href="outdoor_patient_bill_list.php">Outdoor Bill</a></li>
        
<!--        <li><a href="admission_details_bill.php">Admission Bill</a></li>-->
<!--        <li><a href="patient_release_system.php">Patient Release System</a></li>-->
        
        <?php
        include '../connection/db.php';
        $select_query = "SELECT * FROM `outdoor_path_message` where status = 'Report ok'";
//                                  
        $execute_sql = $conn->query($select_query);
        $count = mysqli_num_rows($execute_sql);
        ?>
        <li><a href="out_report_massege.php">Outdoor report message<span style="color: red;"><?php echo '(' . $count . ')'; ?></span></a></li>
        
        <li><a href="setting.php">Setting</a></li>
        <li><a href="receiption_admin.php">Back</a></li>
        <li><a href="../logout.php">Logout</a></li>
    </ul>
</div>