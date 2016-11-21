<?php
    $dia_due = $_POST['phar_pay'];
    $dia_total = $_POST['phar_total'];
    $date = $_POST['date'];
    //echo $dia_due.' '.$dia_total;
    include '../connection/db.php';
    $select_sql = "SELECT * FROM `daily_payment` WHERE date = '$date'";
    $ex_sql = $conn->query($select_sql);
    $count = mysqli_num_rows($ex_sql);
    
    $already_pay = '';
    if($count == 1){
        while ($row = $ex_sql->fetch_assoc()){
            $already_pay = $row['phar_pay'];
        }
        $pay = $dia_due+$already_pay;
        $due = $dia_total-$pay;
        //echo $already_pay.' '.$already_due;
    }  else {
       $due = $dia_total-$dia_due; 
    }
    
    ?>
<input style="color: red;" type="text" class="form-control" value="<?php echo $due;?>"  id="phar_due" name="phar_due" readonly>