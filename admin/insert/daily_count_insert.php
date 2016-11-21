<?php
//echo "ok";
if (!isset($_SESSION)) {
    session_start();
}
include '../../connection/db.php';
//$get_date=$_POST[''];
$all_total_r_p_d_a='';
$count = '';
$al_rec_pay = '';
$al_dia_pay = '';
$al_phar_pay = '';
$al_acc_pay = '';
extract($_POST);

date_default_timezone_set("Asia/Dhaka");
$month = date('F');
$year = date("Y");
$validation = true;

$all_total_r_p_d_a=$rec_total+$dia_total+$phar_total+$acc_total;
$all_totla_payment=$rec_pay+$dia_payment+$phar_pay+$acc_pay;
$all_totla_due=$rec_due+$dia_due+$phar_due+$acc_due;

$select_payment = "SELECT * FROM `daily_payment` WHERE date = '$date_pass'";
$ex_payment = $conn->query($select_payment);
$count = mysqli_num_rows($ex_payment);



if($validation){
    if($count == 1){
        while ($row = $ex_payment->fetch_assoc()){
            $al_rec_pay = $row['rec_pay'];
            $al_dia_pay = $row['dia_pay'];
            $al_phar_pay = $row['phar_pay'];
            $al_acc_pay = $row['acc_pay'];
        }
        $r_pay = $al_rec_pay+$rec_pay;
        $d_pay = $al_dia_pay+$dia_payment;
        $p_pay = $al_phar_pay+$phar_pay;
        $a_pay = $al_acc_pay+$acc_pay;
        $total_payment = $r_pay+$d_pay+$p_pay+$a_pay;
        $r_due = $rec_total-$r_pay;
        $d_due = $dia_total-$d_pay;
        $p_due = $phar_total-$p_pay;
        $a_due = $acc_total-$a_pay;
        $total_due = $a_due+$p_due+$d_due+$r_due;
        $update_sql = "UPDATE `daily_payment` SET `rec_total`='$rec_total',`rec_pay`='$r_pay',`rec_due`='$r_due',`dia_total`='$dia_total',`dia_pay`='$d_pay',`dia_due`='$d_due',`phar_total`='$phar_total',`phar_pay`='$p_pay',`phar_due`='$p_due',`acc_total`='$acc_total',`acc_pay`='$a_pay',`acc_due`='$a_due',`total`='$all_total_r_p_d_a',`total_pay`='$total_payment',`total_due`='$total_due' WHERE  date = '$date_pass'";
        $execute_update = $conn->query($update_sql);
        if($execute_update){
            echo 'Payment update successful';
        }
    }  else {
        $insert_qeury="INSERT INTO `daily_payment`(`rec_total`, `rec_pay`, `rec_due`, `dia_total`, `dia_pay`, `dia_due`, `phar_total`, `phar_pay`, `phar_due`, `acc_total`, `acc_pay`, `acc_due`, `total`, `total_pay`, `total_due`, `date`, `month`, `year`) VALUES"
            . " ('$rec_total','$rec_pay','$rec_due','$dia_total','$dia_payment','$dia_due','$phar_total','$phar_pay','$phar_due','$acc_total','$acc_pay','$acc_due','$all_total_r_p_d_a','$all_totla_payment','$all_totla_due','$date_pass','$month','$year')";
        $execute_insert_sql=$conn->query($insert_qeury);
    
        if($execute_insert_sql){
             echo "Daily Payment Insert Successfully !";
        }
    }
    
}
