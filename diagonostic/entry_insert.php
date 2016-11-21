<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $regdate = '';
    $patientname = '';
    $age = '';
    $mobile = '';
    $gender = '';
    $address = '';
    $doctorname = '';
    $dr_room_no = '';
    $visitedamount ='';
    $payment='';
    $due ='';
    $reference ='';
    $ref_number='';
    
    include '../connection/db.php';
    
    extract($_POST);
    date_default_timezone_set("Asia/Dhaka");
        $month = date('F');
        $today=date('m/d/Y');
        $year = date("Y");
        $validation = true;
    

        if(!$patientname){
            echo  "Enter patient name !";
            $validation = FALSE;    
        }
        
        if(!$age){
            echo  "Enter patient age !";
            $validation = FALSE;    
        }
        
       if(!$mobile){
            echo  "Enter Mobile Number !";
            $validation = FALSE;    
        }

        if(!$address){
            echo  "Enter Patient address !";
            $validation = FALSE;    
        }

        if($reference){
            if(!$ref_number){
            echo  "Enter Reference phone number !";
            $validation = FALSE; }   
        }


        if($doctorname){
            if(!$dr_room_no){
                echo 'Doctor room number !';
                $validation = FALSE;
            }   
            
            if(!$visitedamount){
                echo 'Enter doctor visit amount !';
                $validation = FALSE;
            }
        }
        
        
        
        
        

        
        //echo $regdate,$patientname,$guardianname,$address,$mobile,$gender,$age,$medicalproblem,$doctorname,$visitamount;
    
        if($validation){
            $insert_sql = "INSERT INTO `patient_entry_form`(`reg_date`,`patient_name`, `age`, `mobile`, `gender`, `address`, `doctor_name`, `dr_room_no`, `visited_amount`, `payment`, `due`, `reference`,`ref_mobile`, `current_month`,`year`,`status`) VALUES ('$today','$patientname','$age','$mobile','$gender','$address','$doctorname','$dr_room_no','$visitedamount','$payment','$due','$reference','$ref_number','$month','$year','1')";
            $execute_insert_sql = $conn->query($insert_sql);
            
            
            
            if($execute_insert_sql){
                $select_patient = "SELECT `id`  FROM `patient_entry_form` WHERE patient_name = '$patientname' AND mobile = '$mobile'";
                $execute_select_patient = $conn->query($select_patient);
                while ($row = $execute_select_patient->fetch_assoc()){
                    $reg_id = $row['id'];
                    
                }
                echo 'Registration id is '.$reg_id.' . Please Store This Id';
                //header("location:all_patient_list.php");
            }  else {
                echo "Insert unsuccessful";
            }
        }
    
?>
