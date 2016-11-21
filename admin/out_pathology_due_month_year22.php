<?php
    $mobile = $_POST['mobile'];
    $total = $_POST['total'];
    $payment = $_POST['payment'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    //echo $mobile.' '.$total.' '.$payment.' '.$month.' '.$year;
   // die();
    
    
    include '../connection/db.php';
    
    $select_ref = "SELECT * FROM `in_reference` WHERE (mobile= '$mobile' and month = '$month') and (mobile= '$mobile' and year = '$year')";
    $execute_ref = $conn->query($select_ref);
    $count_ref1 = mysqli_num_rows($execute_ref);
    while ($row = $execute_ref->fetch_assoc()){
        $al_pay = $row['payment'];
        $al_due =$row['due'];
    }
    
    
    ?>
<?php
    if($count_ref1 == 1){ 
        $due = $al_due-$payment;
        ?>
        <input type="text" class="form-control" id="due" name="due" value="<?php echo $due;?>">
<?php    } else { 
    $due = $total-$payment;
    ?>
                <input type="text" class="form-control" id="due" name="due" value="<?php echo $due;?>">
        <?php    }
?>
