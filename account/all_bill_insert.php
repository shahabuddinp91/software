<?php
    include '../connection/db.php';
    date_default_timezone_set("Asia/Dhaka");
    $month=date('F');
    $year = date("Y");
    $today=date('m/d/Y');
    
    extract($_POST);
    //echo $cabin_id;
    //die();
    //echo $v_payment.' '.$ad_pay.' '.$pahrmacy_pay.' '.$dia_payment;
    
    
    
    $select_sql = "SELECT * FROM `storeallbill` WHERE patient_id = '$RegNo'";
    $execute_select = $conn->query($select_sql);
    $count = mysqli_num_rows($execute_select);
    if($count == 0){
        $select_discount = "SELECT * FROM `discount` WHERE id = '5'";
    $execute_discount = $conn->query($select_discount);
    while ($row = $execute_discount->fetch_assoc()){
        $admin_discount = $row['discount'];
    }
    //echo $admin_discount;
    $validation = TRUE;
    if($admin_discount >= $Discount){
        
        
    }  else {
        echo 'Discount cross limit. Discount permit '.$admin_discount.'%';
        $validation = FALSE;
    }
//        if($visit_due){
//            if(!$v_payment){
//                $validation = FALSE;
//                echo 'Please enter Visit Payment';
//            }
//            
//            if($v_payment != $visit_due){
//                $validation = FALSE;
//                echo 'Visit Payment & due not equal';
//            }
//        }
        
//        if($ad_due){
//            if(!$ad_pay){
//                $validation = FALSE;
//                echo 'Please enter Admission Payment';
//            }
//            
//            if($ad_pay != $ad_due){
//                $validation = FALSE;
//                echo 'Admission Payment & due not equal';
//            }
//        }
        
//        if($phar_due){
//            if(!$pahrmacy_pay){
//                $validation = FALSE;
//                echo 'Please enter Pharmacy Payment';
//            }
//            
//            if($pahrmacy_pay != $phar_due){
//                $validation = FALSE;
//                echo 'Pharmacy Payment & due not equal';
//            }
//        }
        
//        if($dia_due){
//            if(!$dia_payment){
//                $validation = FALSE;
//                echo 'Please enter Diagonostic Payment';
//            }
//            if($dia_payment != $dia_due){
//                echo 'Diagonostic Payment & due not equal';
//                $validation = FALSE;
//            }
//        }
        
        
            if($room_bill){
                if(!$room_payment){
                    $validation = FALSE;
                    echo 'Enter Cabin payment .';
                }
                
                if($room_payment != $room_bill){
                    $validation = FALSE;
                    echo 'Cabin payment & bill not eqeal .';
                }
            }
            
           
            if(!$ttl_bill){
                $validation = FALSE;
                echo 'Enter Discount 0% .';
            }
        
        
        if($validation){
            
            $payment_total1 = $payment_total+$a_p_d_total;
            $due = ($ttl_bill-$payment_total1);
    //echo $due;
        $insert_sql = "INSERT INTO `storeallbill`( `patient_id`, `cabin_bill`, `cabin_payment`,"
            . " `iv_item`, `iv_quentity`, `iv_price`, `photo_hour`, `photo_price`, "
            . "`ryl_quentity`, `ryl_price`, `suc_quentity`, `suc_price`, `ot_price`, "
            . "`ana_price`, `gas_item`, `gas_hour`, `gas_price`, `end_price`, `post_price`,"
            . " `baby_price`,`dre_quertity`, `dre_price`, `o2_quentity`, `o2_price`, `con_price`,"
            . " `ene_price`, `other_price`, `con_a_price`, `con_b_price`, `con_c_price`,"
            . " `sur_price`, `imp_price`, `dres_quentity`, `dres_price`, `anes_item`, "
            . "`anes_price`, `an_other_price`, `sub_total`, `discount`, `total`, `payment`,"
            . "`due`, `release_date`, `month`, `year`,`a_p_d_total`) "
            . "VALUES ('$RegNo','$room_bill','$room_payment','$canula','$canula_quentity','$canula_price',"
            . "'$Phototheraphy','$Pho_price','$Rylestube_quentity','$Rylestube_price','$Sucction_quentity','$Sucction_price','$OT_Laber_room_charge_price','$Anaesthetic_Equipment_price','$Gas',"
            . "'$Gas_hour','$gas_price','$Endotracheal_tube_price','$Post_operative_charge','$Baby_management_price','$Dressing_fees_quentity','$Dressing_fees_charge','$O2_gas_quentity','$o2_gas_price',"
            . "'$Consultation_fees_price','$Enema_Simplex_price','$other_price','$A','$B','$C','$Surgeon_fees_price','$Implants','$ot_dresing_quentity',"
            . "'$ot_dresing_price','$ANESTHESIOLOGIST','$BLOCK_p','$ano_other','$sub_ttl_bill','$Discount','$ttl_bill','$payment_total1','$due','$today','$month','$year','$a_p_d_total')";
      
            $execute_sql = $conn->query($insert_sql);
            if($execute_sql){
                $update_room = "UPDATE `room_info` SET `status`='1'WHERE cabin_no = '$cabin_id'";
                $execute_room = $conn->query($update_room);
                if($execute_room){
                    $up = "UPDATE `patient_admission_system` SET `status`= 'Release' WHERE reg_id = '$RegNo'";
                    $ex_up = $conn->query($up);
                    echo 'Bill process & cabin/bed no. '.$cabin_id.' are free now !';
                }
//                if($dia_payment){
//                    $select_dia = "SELECT * FROM `diagonostic_patient_bill` WHERE regi_id = '$RegNo'";
//                    $exe_dia = $conn->query($select_dia);
//                    while ($row = $exe_dia->fetch_assoc()){
//                        $dia_pay = $row['payment'];
//                        $dia_due = $row['due'];
//                    }
//                    
//                    $new_dia_pay = $dia_pay+$dia_payment;
//                    $new_dia_due = $dia_due-$dia_payment;
//                    $update_dia ="UPDATE `diagonostic_patient_bill` SET `payment`='$new_dia_pay',`due`='$new_dia_due' WHERE regi_id = '$RegNo'" ;
//                    $ex_dia = $conn->query($update_dia);    
//                }
//                
//                if($v_payment){
//                    $select_visit = "SELECT * FROM `patient_entry_form` WHERE id = '$RegNo'";
//                    $exe_vi = $conn->query($select_visit);
//                    while ($row = $exe_vi->fetch_assoc()){
//                        $vi_pay = $row['payment'];
//                        $vi_due = $row['due'];
//                    }
//                    $new_vi_pay = $vi_pay+$v_payment;
//                    $new_vi_due = $vi_due-$v_payment;
//                    $update_vi ="UPDATE `patient_entry_form` SET `payment`='$new_vi_pay',`due`='$new_vi_due' WHERE id = '$RegNo'" ;
//                    $ex_vi = $conn->query($update_vi);    
//                }
//                
//                if($ad_pay){
//                    $select_add = "SELECT * FROM `patient_admission_system` WHERE reg_id = '$RegNo'";
//                    $exe_add = $conn->query($select_add);
//                    while ($row = $exe_add->fetch_assoc()){
//                        $add_pay = $row['admission_payment'];
//                        $add_due = $row['admission_due'];
//                    }
//                    $new_add_pay = $add_pay+$ad_pay;
//                    $new_add_due = $add_due-$ad_pay;
//                    $update_add ="UPDATE `patient_admission_system` set `admission_payment`='$new_add_pay',`admission_due`='$new_add_due' WHERE reg_id = '$RegNo'" ;
//                    $ex_add = $conn->query($update_add);    
//                }
//                
//                if($pahrmacy_pay){
//                    $select_phr = "SELECT * FROM `pharmacy_patient_bill` WHERE regi_id = '$RegNo' ";
//                    $exe_phr = $conn->query($select_phr);
//                    while ($row = $exe_phr->fetch_assoc()){
//                        $phr_pay = $row['payment'];
//                        $phr_due = $row['due'];
//                    }
//                    $new_phr_pay = $phr_pay+$pahrmacy_pay;
//                    $new_phr_due = $phr_due-$pahrmacy_pay;
//                    $update_phr ="UPDATE `pharmacy_patient_bill` SET `payment`='$new_phr_pay',`due`='$new_phr_due' WHERE regi_id = '$RegNo'" ;
//                    $ex_phr = $conn->query($update_phr);    
//                }
                
            }
        }
        
    }
    
    if($count == 1){
        while ($row = $execute_select->fetch_assoc()){
            $pay = $row['payment'];
            $du = $row['due'];
            $new_due = $du-$payment_total;
            $new_pay = $pay+$payment_total;
        }
        $update_insert = "UPDATE `storeallbill` SET `payment`='$new_pay',`due`='$new_due' WHERE patient_id = '$RegNo'";
        $execute_up = $conn->query($update_insert);
        if($execute_up){
            echo 'Update payment successful ';
        }
    }
    
?>