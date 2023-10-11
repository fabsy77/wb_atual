<?php

include_once('../class/products_in_cart.php');



    if(isset($_GET) && isset($_GET['productCardId'])){

        $class_prodCart = new ProductsInCard();

        $prod_delete = $class_prodCart->delete($_GET['productCardId']);

        if($prod_delete){

            echo 'produto deletado com sucesso';
            
         echo '<a href="viewCart.php"> voltar a comprar</a>';

            
        }
        

    }




