<?php
    if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        include '../connection/db.php';
        
        $id = $_POST['id'];
        $drug_name = $_POST['name'];
        $unit = $_POST['unit'];
        $Quantity = $_POST['quentity'];
        
        
        
        date_default_timezone_set("Asia/Dhaka");
        $SellDate=date('m/d/Y');
        $month=date('F');
        
        $validation = TRUE;
        
        if(!$id){
            echo 'First search a outdoor patient ID';
            $validation = FALSE;
        }
        
        if($id){
           if(!$drug_name){
            echo 'Enter Drug Name';
            $validation = FALSE;
        }
        
        if(!$unit){
            echo 'Enter Drug Unit';
            $validation = FALSE;
        }
        
        if(!$Quantity){
            echo 'Enter Drug Quentity';
            $validation = FALSE;
        } 
        }
        
        
        //echo $month.' '.$SellDate;
        $d_name = '';
        
        if($validation){
            $price = $_POST['price'];
            
            $select = "SELECT * FROM `out_drug_sell_list` WHERE drug_name = '$drug_name' and patient_id = '$id'";
            $execute_select = $conn->query($select);
            while ($row = $execute_select->fetch_assoc()){
                $d_unit = $row['drug_unit'];
                $q = $row['quentity'];
                $p = $row['price'];
                $d_name = $row['drug_name']; 
            }
            
            if($drug_name == $d_name && $d_unit== $unit){
                $new_q = $Quantity+$q;
                $new_p = $price+$p;
                $update = "UPDATE `out_drug_sell_list` SET `quentity`='$new_q',`price`='$new_p',`date`='$SellDate',`month`='$month' WHERE patient_id = '$id' and drug_name = '$drug_name'";
                $execute_yp = $conn->query($update);
                
                if($execute_yp){
                $select = "SELECT * FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                $execute_select = $conn->query($select);
                while ($row = $execute_select->fetch_assoc()){
                    $update_quentity = $row['quantity'];
                }
                if($execute_select){
                    if($update_quentity>$Quantity){
                        $total_quentity = $update_quentity-$Quantity;
                        $update = "UPDATE `add_drug_store` SET `quantity`='$total_quentity' WHERE drug_name = '$drug_name' and drug_units = '$unit' ";
                        $execute_update = $conn->query($update);

                        if($execute_update){
                             echo 'Add to sell list & update successful';
                        }
                    }
                    
                    if($update_quentity ==$Quantity){
                        $delete_sql = "DELETE FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                        $execute_delete = $conn->query($delete_sql);
                        if($execute_delete){
                            echo 'Add to sell list & Delete successful';
                        }
                    }
                    
                }
            }
            }  else {
                $insert_sql = "INSERT INTO `out_drug_sell_list`( `patient_id`, `drug_name`, `drug_unit`, `quentity`, `price`, `date`, `month`) VALUES ('$id','$drug_name','$unit','$Quantity','$price','$SellDate','$month')";
            $execute_sql = $conn->query($insert_sql);
            
            if($execute_sql){
                $select = "SELECT * FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                $execute_select = $conn->query($select);
                while ($row = $execute_select->fetch_assoc()){
                    $update_quentity = $row['quantity'];
                }
                if($execute_select){
                    if($update_quentity>$Quantity){
                        $total_quentity = $update_quentity-$Quantity;
                        $update = "UPDATE `add_drug_store` SET `quantity`='$total_quentity' WHERE drug_name = '$drug_name' and drug_units = '$unit' ";
                        $execute_update = $conn->query($update);

                        if($execute_update){
                             echo 'Add to sell list & update successful';
                        }
                    }
                    
                    if($update_quentity ==$Quantity){
                        $delete_sql = "DELETE FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                        $execute_delete = $conn->query($delete_sql);
                        if($execute_delete){
                            echo 'Add to sell list & Delete successful';
                        }
                    }
                    
                }
            }
            }
            
            
        }
