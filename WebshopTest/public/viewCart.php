 <?php 

    /* include_once('../class/cart.php');
    include_once('../class/products.php');
    include_once('../class/products_in_cart.php');

    $class_cart = new Cart();
    $products_in_cart = $class_cart->getAllProducts($_SESSION['cartId']);

     $totalCart = 0; */

     
session_start(); // Certifique-se de iniciar a sessão no início do script

include_once('../class/cart.php');
include_once('../class/products.php');
include_once('../class/products_in_cart.php');

$class_cart = new Cart();

// Verifique se 'cartId' está definido na sessão antes de usá-lo
if (isset($_SESSION['cartId'])) {
    $products_in_cart = $class_cart->getAllProductsid($_SESSION['cartId']);

    $totalCart = 0;
} else {
    // Lidar com o caso em que 'cartId' não está definido, por exemplo:
    echo 'O carrinho não está definido.';
    // Ou redirecionar o usuário para uma página apropriada:
    // header('Location: pagina_de_redirecionamento.php');
}



     
    
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

                    <div class="topnav">
                    <a class="active" href="../index.php">Home</a>
                    <a href="./viewCart.php">Cart</a>
                    <a href="#contact">Contact</a>
                    <a href="#about">About</a>
                    </div>
         <div>
        <ul>
            <?php foreach($products_in_cart as $product){ ?>
                <li>
                <?php 
                
                    $class_prod = new Products();
                    $class_prodInCart = new ProductsInCard();
                    $class_prod = $class_prod->getProductsByID($product['product_id']);

                    $qttProduct  = $product['quantity']; 
                   


                    $totalCart += ($class_prod[0]['price'] *  $qttProduct);

                    
                    $path = "../modules/image/"; 
                    $image =  $class_prod[0]['image'];
                    echo '<img src="' . $path . $image . '" style="width:200px;"><br>';
                ?>     
                    <img src="" alt="">
                    <p>Name: <?php echo $class_prod[0]['name'];?></p>
                    <p>Quantity: <?php echo $qttProduct;?></p>
                    <p>Preis: <?php echo $class_prod[0]['price'];?> </p>
                    
                    <a href="formDeleteProductCart.php?productCardId=<?php echo $product['id']; ?>">Remove</a><br>
                     
                <?php
                    
                    ?>
                </li>

                <?php } ?>

            </ul>
                <h3>Total : € <?php  echo  $totalCart ?></h3>
    </div>
                <a href="finishOrder.php">Finish Cart</a>
</body>
</html>
<div>