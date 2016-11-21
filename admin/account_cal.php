<?php
    $dia_due = $_POST['acc_pay'];
    $dia_total = $_POST['acc_total'];
    $date = $_POST['date'];
    //echo $dia_due.' '.$dia_total;
    include '../connection/db.php';
    $select_sql = "SELECT * FROM `daily_payment` WHERE date = '$date'";
    $ex_sql = $conn->query($select_sql);
    $count = mysqli_num_rows($ex_sql);
    
    $already_pay = '';
    if($count == 1){
        while ($row = $ex_sql->fetch_assoc()){
            $already_pay = $row['acc_pay'];
        }
        $pay = $already_pay+$dia_due;
        $due = $dia_total-$pay;
        //echo $already_pay.' '.$already_due;
    }  else {
       $due = $dia_total-$dia_due; 
    }
    
    ?>
<input style="color: red;" type="text" class="form-control" value="<?php echo $due;?>"  id="acc_due" name="acc_due" readonly>