<?php

include_once('../class/products.php');
include_once('../class/cart.php');
include_once('../class/products_in_cart.php');

if(isset($_POST) && isset($_POST['id']) && isset($_POST['quantity'])){
    if(! isset($_SESSION['cartId']) || empty($_SESSION['cartId'])  ){//

        $class_card = new cart();
        $card_id = $class_card->create($_SESSION['user_info'][0]['id']);
        //card id armazenado na sessao
        $_SESSION['cartId'] = $card_id;
    }   else{
        $class_products = new ProductsInCard();
        $product_card = $class_products->create($_POST['id'],  $_SESSION['cartId'], $_POST['quantity'] );
        if($product_card){

            echo 'produto add no carrinho com sucesso';
            echo '<a href="./viewCart.php">Ir para o carrinho</a>';
        }
        else{
            echo ' erro ao add no carrinho';
        }

    }
    





}





?>