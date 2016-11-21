<?php
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_SESSION['receiption_id'])){
        header("location:receiption/receiption_admin.php");
    }
    if(isset($_SESSION['dianostic_id'])){
        header("location:diagonostic/diagonostic_admin.php");
    }
    
    if(isset($_SESSION['pharmacy_id'])){
        header("location:pharmacy/pharmacy_admin.php");
    }
    if(isset($_SESSION['account_id'])){
        header("location:account/account_admin.php");
    }
    if(isset($_SESSION['pathology_id'])){
        header("location:pathology/pathology_admin.php");
    }
    
    
    include './connection/db.php';
    $mass = '';
    $level_id='';
    if(isset($_POST['login'])){
        extract($_POST);
        
        $validation = true;
        
        if(!$username){
            $mass = 'Enter user name !';
            $validation = FALSE;
        }
        
        if(!$password){
            $mass = 'Enter password !';
            $validation = FALSE;
        }
        
        $select_sql = "SELECT * FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
        $execute_select_sql = $conn->query($select_sql);
        while ($check_level_id = $execute_select_sql->fetch_assoc()){
            $level_id = $check_level_id['user_level_id'];
        }
        //echo $level_id;
        
        if($validation){
            if($level_id == 1){
            $check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_check_sql = $conn->query($check_sql);
            $admin_count = mysqli_num_rows($excute_check_sql);
            //echo $admin_count;
        
                if($admin_count > 0){
                    while ($admin = $excute_check_sql->fetch_assoc()){
                        $admin_id = $admin['id'];
                        $admin_level_id = $admin['user_level_id'];
                        $admin_name = $admin['user_name'];
                        $admin_password = $admin['password'];
                        
                        $_SESSION['admin_id'] =  $admin_id;
                        $_SESSION['admin_level_id'] =  $admin_level_id;
                        $_SESSION['admin_name'] =  $admin_name;
                        $_SESSION['admin_password'] =  $admin_password;
                        header("location:admin/admin_dashboard.php");
                    }
                    //echo $_SESSION['admin_id']." ".$_SESSION['admin_level_id'].' '.$_SESSION['admin_name'].' '.$_SESSION['admin_password'];
                }
        }elseif ($level_id == 2) {
            $receiption_check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_receiption_sql = $conn->query($receiption_check_sql);
            $receiption_count = mysqli_num_rows($excute_receiption_sql);
            //echo $admin_count;
        
                if($receiption_count > 0){
                    while ($receiption = $excute_receiption_sql->fetch_assoc()){
                        $receiption_id = $receiption['id'];
                        $receiption_level_id = $receiption['user_level_id'];
                        $receiption_name = $receiption['user_name'];
                        $receiption_password = $receiption['password'];
                        
                        $_SESSION['receiption_id'] =  $receiption_id;
                        $_SESSION['receiption_level_id'] =  $receiption_level_id;
                        $_SESSION['receiption_name'] =  $receiption_name;
                        $_SESSION['receiption_password'] =  $receiption_password;
                        header("location:receiption/receiption_admin.php");
                    }
                    //echo $_SESSION['receiption_id']." ".$_SESSION['receiption_level_id'].' '.$_SESSION['receiption_name'].' '.$_SESSION['receiption_password'];
                }
        
    }elseif($level_id == 3){
        $dianostic_check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_dianostic_sql = $conn->query($dianostic_check_sql);
            $dianostic_count = mysqli_num_rows($excute_dianostic_sql);
            //echo $admin_count;
        
                if($dianostic_count > 0){
                    while ($dianostic = $excute_dianostic_sql->fetch_assoc()){
                        $dianostic_id = $dianostic['id'];
                        $dianostic_level_id = $dianostic['user_level_id'];
                        $dianostic_name = $dianostic['user_name'];
                        $dianostic_password = $dianostic['password'];
                        
                        $_SESSION['dianostic_id'] =  $dianostic_id;
                        $_SESSION['dianostic_level_id'] =  $dianostic_level_id;
                        $_SESSION['dianostic_name'] =  $dianostic_name;
                        $_SESSION['dianostic_password'] =  $dianostic_password;
                        header("location:diagonostic/diagonostic_admin.php");
                    }
                    //echo $_SESSION['dianostic_id']." ".$_SESSION['dianostic_level_id'].' '.$_SESSION['dianostic_name'].' '.$_SESSION['dianostic_password'];
                }
    }elseif($level_id == 4){
         $pharmacy_check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_pharmacy_sql = $conn->query($pharmacy_check_sql);
            $pharmacy_count = mysqli_num_rows($excute_pharmacy_sql);
            //echo $admin_count;
        
                if($pharmacy_count > 0){
                    while ($pharmacy = $excute_pharmacy_sql->fetch_assoc()){
                        $pharmacy_id = $pharmacy['id'];
                        $pharmacy_level_id = $pharmacy['user_level_id'];
                        $pharmacy_name = $pharmacy['user_name'];
                        $pharmacy_password = $pharmacy['password'];
                        
                        $_SESSION['pharmacy_id'] =  $pharmacy_id;
                        $_SESSION['pharmacy_level_id'] =  $pharmacy_level_id;
                        $_SESSION['pharmacy_name'] =  $pharmacy_name;
                        $_SESSION['pharmacy_password'] =  $pharmacy_password;
                        header("location:pharmacy/pharmacy_admin.php");
                    }
                    //echo $_SESSION['pharmacy_id']." ".$_SESSION['pharmacy_level_id'].' '.$_SESSION['pharmacy_name'].' '.$_SESSION['pharmacy_password'];
                }
    }elseif ($level_id == 5) {
        $account_check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_account_sql = $conn->query($account_check_sql);
            $account_count = mysqli_num_rows($excute_account_sql);
            //echo $admin_count;
        
                if($account_count > 0){
                    while ($account = $excute_account_sql->fetch_assoc()){
                        $account_id = $account['id'];
                        $account_level_id = $account['user_level_id'];
                        $account_name = $account['user_name'];
                        $account_password = $account['password'];
                        
                        $_SESSION['account_id'] =  $account_id;
                        $_SESSION['account_level_id'] =  $account_level_id;
                        $_SESSION['account_name'] =  $account_name;
                        $_SESSION['account_password'] =  $account_password;
                        header("location:account/account_admin.php");
                    }
                    //echo $_SESSION['account_id']." ".$_SESSION['account_level_id'].' '.$_SESSION['account_name'].' '.$_SESSION['account_password'];
                }
    }elseif ($level_id == 6) {
        $pathology_check_sql =  "SELECT `id`, `user_level_id`, `user_name`, `password` FROM `user_information` WHERE user_name = '$username' AND password = '$password'";
            $excute_pathology_sql = $conn->query($pathology_check_sql);
            $pathlogy_count = mysqli_num_rows($excute_pathology_sql);
            //echo $admin_count;
        
                if($pathlogy_count > 0){
                    while ($pathology = $excute_pathology_sql->fetch_assoc()){
                        $pathology_id = $pathology['id'];
                        $pathology_level_id = $pathology['user_level_id'];
                        $pathology_name = $pathology['user_name'];
                        $pathology_password = $pathology['password'];
                        
                        $_SESSION['pathology_id'] =  $pathology_id;
                        $_SESSION['pathology_level_id'] =  $pathology_level_id;
                        $_SESSION['pathology_name'] =  $pathology_name;
                        $_SESSION['pathology_password'] =  $pathology_password;
                        header("location:pathology/pathology_admin.php");
                    }
                    //echo $_SESSION['account_id']." ".$_SESSION['account_level_id'].' '.$_SESSION['account_name'].' '.$_SESSION['account_password'];
                }
    }
        }
        
        
        
    }
?>
<html>
    <head>
        <title>UPASHOM HOSPITAL</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body style="background-color: gray; background-size: 100%; background-repeat: no-repeat">
        <div class="container margin_change" style="margin-top:50px;margin-right: 37px;">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong> Sign in to continue</strong>
                            <p><?php echo $mass;?></p>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="" method="POST">
                                <fieldset>
                                    <div class="row">
                                        <div class="center-block">
                                            <img class="profile-img"
                                                 src="images/images.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                    </span> 
                                                    <input class="form-control" placeholder="Enter User Name !" name="username" type="text" autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-lock"></i>
                                                    </span>
                                                    <input class="form-control" placeholder="Enter Your Password !" name="password" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in" name="login">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>