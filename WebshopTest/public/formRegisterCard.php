<?php
    include_once('../class/order.php');
    include_once('../class/credit_card.php');

    if(
        isset($_POST) &&
        isset($_POST['card_owner']) &&
        isset($_POST['card_number']) &&
        isset($_POST['cvc']) &&
        isset($_POST['month']) &&
        isset($_POST['year'])

    ){
        $class_credit = new CreditCard();
        $new_credit = $class_credit->create($_POST['card_owner'], $_POST['card_number'], $_POST['credit_card_type']);

        
        $class_order = new Order();
        //pq cart e nao o name q eu coloquei no select?
        $new_order = $class_order->create($_SESSION['cartId'], $new_credit[0]['id'], 'card');

        if($new_order){

            //header('Location: confirmOrder.php');
            header('Location: ConfirmOrder.php');
            return;
        }
    }






?>