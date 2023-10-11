<?php


    include_once('../class/address.php');
    include_once('../class/order.php');   



    var_dump($_POST);
    if (isset ($_POST) && 
        isset ($_POST['street']) && 
        isset ($_POST['house_number']) && 
        isset ($_POST['postal_code']) && 
        isset ($_POST['city']) &&
        isset ($_POST['in_street']) &&  
        isset ($_POST['in_house_number']) && 
        isset ($_POST['in_postal_code']) && 
        isset ($_POST['in_city']) &&
        isset ($_POST['payment_type'])
        ){
            //pega o id do usuario
            $user_id = $_SESSION['user_info'][0]['id'];
            $type_addr_delivery = 1;
            $type_addr_invoice = 2;
            $payment_card_type = 1;
            //instancia classe address
            $class_addr = new Address();

            $delivery_address = $class_addr->create($user_id, 
            $_POST['street'],
            $_POST['house_number'], 
            $_POST['postal_code'], 
            $_POST['city'], 
            $type_addr_delivery
         );

            if($delivery_address){
                 
                $delivery_invoice = $class_addr->create($user_id,
                 $_POST['in_street'],
                 $_POST['in_house_number'], 
                 $_POST['in_postal_code'], 
                 $_POST['in_city'], 
                 $type_addr_invoice 
            );

            }
            // se cair no if entao 
            if( $delivery_invoice){
                //se o tipo de cartao for 1 (cartao) vai encaminhar para a pargina de cadastrar cartao
                if($_POST['payment_type'] ==  $payment_card_type ){

                    header('Location: registerCreditCard.php');
                    return;
                }
                //caso seja o recibo, ja criar a order
                else{
                    $class_order = new Order();
                    $create_order =$class_order->create($_SESSION['cartId'], null, 'cart', 1, false);

                    if($create_order){
                       
                        echo '<a href="confirmOrder.php">Ir para o carrinho</a>';

                        

                        return;
                    }
                        
                }
            }
        }
?>
