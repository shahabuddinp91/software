<?php
    $rec_total = $_POST['rec_total'];
    $rec_pay = $_POST['rec_pay'];
    $date = $_POST['date'];
    //echo $date;
    include '../connection/db.php';
    $select_sql = "SELECT * FROM `daily_payment` WHERE date = '$date'";
    $ex_sql = $conn->query($select_sql);
    $count = mysqli_num_rows($ex_sql);
    
    $already_pay = '';
    if($count == 1){
        while ($row = $ex_sql->fetch_assoc()){
            $already_pay = $row['rec_pay'];
        }
        $pay = $rec_pay+$already_pay;
        $due = $rec_total-$pay;
        //echo $already_pay.' '.$already_due;
    }  else {
       $due = $rec_total-$rec_pay; 
    }
    
?>
<input style="color: red;" type="text" class="form-control" value="<?php echo $due;?>"  id="rec_due" name="rec_due" readonly>