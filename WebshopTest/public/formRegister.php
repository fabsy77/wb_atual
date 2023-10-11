<?php

include_once('../class/user.php');

var_dump($_POST);

if(isset($_POST) 
    && isset($_POST['f_name'])
    && isset($_POST['l_name'])
    && isset($_POST['birthday'])
    && isset($_POST['email'])
    && isset($_POST['psw'])
    && isset($_POST['psw-repeat'])){


        $class_user = new User();

        $register_user = $class_user->create($_POST['f_name'], $_POST['l_name'], $_POST['birthday'], $_POST['email'], $_POST['psw'], 'adm' );

        if($register_user){

            echo 'Seu registro foi feito com sucesso';
            header('Location: login.php');
        }
        else{
            echo'Erro ao fazer o registro';
            header('Location: login.php');
        }
    }



?>