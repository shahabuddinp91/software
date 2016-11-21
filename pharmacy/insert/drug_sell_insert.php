<?php

if(!isset($_SESSION)){
    session_start();
}
include '../../connection/db.php';
$id = $_POST['p_id'];
$drug_name = $_POST['drug_name'];
$unit = $_POST['Units'];
$Quantity = $_POST['Quantity'];


$validation = TRUE;
        
        if(!$id){
            echo 'First search a patient ID';
            $validation = FALSE;
        }
        
        if($id){
           if(!$drug_name){
            echo 'Enter Drug Name. ';
            $validation = FALSE;
        }
        
        if(!$unit){
            echo 'Enter Drug Unit. ';
            $validation = FALSE;
        }
        
        if(!$Quantity){
            echo 'Enter Drug Quentity';
            $validation = FALSE;
        } 
        }
        
        if($validation){
            $price = $_POST['price'];
            
            $select_sql = "SELECT * FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
        $execute_sql = $conn->query($select_sql);
        while ($row = $execute_sql->fetch_assoc()){
            $store_quenty = $row['quantity'];
        }

        date_default_timezone_set("Asia/Dhaka");
        $month=date('F');
        $SellDate=date('m/d/Y');
        $in_unit = '';
        
        $select_ddd = "SELECT * FROM `drug_sell_system` WHERE drug_name = '$drug_name' and reg_id = '$id'";
        $execute_ddd = $conn->query($select_ddd);
        while ($raj = $execute_ddd->fetch_assoc()){
            //$in_id = $raj['reg_id'];
            $in_unit = $raj['unit'];
            $in_quentity = $raj['quantity'];
            $in_price = $raj['price'];
        }
        
        if($in_unit == $unit){
            $new_qn  =  $in_quentity+$Quantity;
            $new_pp = $in_price+$price;
            
            $update_data = "UPDATE `drug_sell_system` SET `quantity`='$new_qn',`price`='$new_pp' WHERE reg_id = '$id' and drug_name = '$drug_name'";
            $exe_up = $conn->query($update_data);
            
            if($exe_up){
                if($store_quenty > $Quantity){
                    $main_quentity = $store_quenty-$Quantity;
                    $update_sql = "UPDATE `add_drug_store` SET `quantity`='$main_quentity' WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                    $execute_sqls = $conn->query($update_sql);
                    if($execute_sqls){
                        echo "Drug Sell Successfully & Update database !";
                    }
                }

                if($store_quenty == $Quantity){
                    $delete_sql = "DELETE FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                    $execute_delete = $conn->query($delete_sql);
                    if($execute_delete){
                        echo 'Insert & Delete successfully !';
                    }
                }

            }  else {
                echo "Drug Sell Not  Successfully !";
            }
        }  else {
            $insert_query="INSERT INTO `drug_sell_system`(`reg_id`, `sell_date`, `drug_name`, `unit`, `quantity`, `price`) VALUES ('$id','$SellDate','$drug_name','$unit','$Quantity','$price')";
           
            $execute_sql=$conn->query($insert_query);



            if($execute_sql){
                if($store_quenty > $Quantity){
                    $main_quentity = $store_quenty-$Quantity;
                    $update_sql = "UPDATE `add_drug_store` SET `quantity`='$main_quentity' WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                    $execute_sqls = $conn->query($update_sql);
                    if($execute_sqls){
                        echo "Drug Sell Successfully & Update database !";
                    }
                }

                if($store_quenty == $Quantity){
                    $delete_sql = "DELETE FROM `add_drug_store` WHERE drug_name = '$drug_name' and drug_units = '$unit'";
                    $execute_delete = $conn->query($delete_sql);
                    if($execute_delete){
                        echo 'Insert & Delete successfully !';
                    }
                }

            }  else {
                echo "Drug Sell Not  Successfully !";
            }
        }
        }

