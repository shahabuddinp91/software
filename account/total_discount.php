<?php
$admission_payment = '';
$pharmacy_payment = '';
$pathology_payment = '';
$id = $_POST['id'];
$discount = $_POST['discount'];
    $sub_total = $_POST['sub_total'];
//echo $id;
include '../connection/db.php';
$select_admission = "SELECT admission_payment FROM `patient_admission_system` WHERE reg_id = '$id'";
$excute_admission = $conn->query($select_admission);
while ($row = $excute_admission->fetch_assoc()){
    $admission_payment = $row['admission_payment'];
}
//echo $admission_payment;

$select_pharmacy = "SELECT payment FROM `pharmacy_patient_bill` WHERE regi_id = '$id'";
$execute_pharmacy = $conn->query($select_pharmacy);
while ($row = $execute_pharmacy->fetch_assoc()){
    $pharmacy_payment = $row['payment'];
}

$select_pathology = "SELECT payment FROM `diagonostic_patient_bill` WHERE regi_id = '$id'";
$execute_pathology = $conn->query($select_pathology);
while ($row = $execute_pathology->fetch_assoc()){
    $pathology_payment = $row['payment'];
}
    
    //echo $pathology_payment;
$total_payment = $pathology_payment+$pharmacy_payment+$admission_payment;
    
    $dis = ($sub_total*$discount)/100;
    //echo $dis;
    $total = $sub_total-$dis;
    
    $due = $total-$total_payment;
    ?>
<input type="hidden" name="a_p_d_total" value="<?php echo $total_payment;?>">
<input type="text" class="form-control" value="<?php echo $total;?>" id="ttl_bill" name="ttl_bill" readonly="true">
<p id="a_p_d_total" style="font-family: caption;color: red;">Total payment : <?php echo $total_payment;?></p>
<p style="font-family: caption;color: red;">Total due : <?php echo $due;?></p>