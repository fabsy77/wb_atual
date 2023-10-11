<?php

    include_once('../class/user.php');
  
    if(isset($_POST['uname']) && !empty($_POST['uname']) && isset($_POST['psw']) && !empty($_POST['psw'])){

         $class_user = new User();
         $verify_user = $class_user->getEmailAndPassword($_POST['uname'], $_POST['psw'], 'adm');

         if(!empty($verify_user)){
            $_SESSION['user_info'] =  $verify_user;
            
            header('location: products.php');
         }else{
            echo 'email or password incorrect';
            header('location: login.php');
         }     
    }


?>