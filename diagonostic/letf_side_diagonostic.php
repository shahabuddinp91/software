<div class="manu">
                            <ul>
                                <li> <a href="patient_entry_form.php">For emergency</a></li>
                                <li> <a class="all_patient_list" href="All_patient_list.php">Emergency Patient list</a></li>
                                <li><a href="patient_admission_system.php">Patient Admission System</a></li>
        <li><a href="addmision_patient_list.php">Admission Patient</a></li>
        <li><a href="dressing.php">Dressing / Observation</a></li>
        <li><a href="dressing_list.php">Dressing / Observation List</a></li>
                                <li> <a href="patient_test.php">Indoor Patient Test</a></li>
                                <li> <a href="all_patient_test_list.php">Bill Process</a></li>
                                <li> <a href="patient_bill_list.php">Test Bill</a></li>
                                <?php include '../connection/db.php';
        $select_query_in = "SELECT * FROM `indoor_path_message` where status = 'Report ok'";
        $execute_sql_in=$conn->query($select_query_in);
        $count_in=  mysqli_num_rows($execute_sql_in);
        ?>
        <li><a href="in_report_message.php">Indoor report message<span style="color: red;"><?php echo '(' . $count_in . ')'; ?></span></a></li>
                                <li> <a href="add_test_info.php">Add Test Information</a></li>
                                <li><a href="all_test_list.php">Test List</a></li>
                                <li><a href="setting.php">Setting</a></li>
                                <li><a href="diagonostic_admin.php">Back</a></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
 </div>