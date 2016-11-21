<?php
    $mabile = $_POST['data'];
    //echo $mabile;
    include '../connection/db.php';
    $mess = '';
    $visit_date = '';
    $dr_name_p = '';
    $p_name = '';
    $id = '';
    
    if($mabile){
        
        $select_id = "SELECT * FROM `patient_entry_form` WHERE id = (SELECT MAX(id) FROM `patient_entry_form` where mobile = '$mabile')";

        $execute_sql = $conn->query($select_id);
        $count = mysqli_num_rows($execute_sql);
        
        if($count > 0){
             while ($row = $execute_sql->fetch_assoc()){
                $id = $row['id'];
                $p_name = $row['patient_name'];
                $visit_date = $row['reg_date'];
                $dr_name_p = $row['doctor_name'];
            } ?>
<p style="color: red;
    font-family: caption;
    font-size: 18px;
    font-weight: lighter;
    text-align: center;"><?php echo 'Patient Name : '.$p_name.'- Last Visit : '.$visit_date.' -Doctor Name: '.$dr_name_p.'.';?></p>
        <?php }  else {
            $mess = 'New patient';
            ?>
            <p style="color: red;
    font-family: caption;
    font-size: 18px;
    font-weight: lighter;
    text-align: center;"><?php echo $mess;?></p>
        <?php }
           
          
    }

?>

