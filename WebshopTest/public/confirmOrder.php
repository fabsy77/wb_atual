<?php


include_once("../class/order.php");
include_once("../class/products.php");
include_once('../class/address.php');
include_once("../class/cart.php");
include_once("../class/credit_card.php");



$class_cart = new Cart();

$productsInCart = $class_cart->getAllProductsId($_SESSION['cartId']);
$totalInCart = 0;


$fullName = $_SESSION['user_info'][0]['first_name'] . ' ' .$_SESSION['user_info'][0]['last_name'];
$class_order = new Order();
$receivedOrders= $class_order->getOrdersByCardId($_SESSION['cartId']);
$receivedCardId = $receivedOrders[0]['credit_card_id'];


if($receivedOrders[0]['payment_type'] == 'card'){

    $class_Cred = new CreditCard();
    $receiveCard = $class_Cred->getCardById($receivedCardId );

}
$class_addr = new Address();
$allAddress = $class_addr->getByUserId($_SESSION['user_info'][0]['id']);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Purchase</h1>

        <h3>Products in cart</h3>
        <ul>
            <?php foreach ($productsInCart as $product) { ?>
                <li style="display: flex; margin:10px;">
                    <?php 
                        $productInfo = new Products();
                        $productCart = new ProductsInCard();
                        $productInfo = $productInfo->getProductsById($product['product_id']);
                        $qttProduct  = $product['quantity'];
    
                        $totalInCart += ($productInfo[0]['price'] * $qttProduct);
                    ?>
                </li>
            <?php } ?>
        </ul>
                <p>Name: <?php echo $productInfo[0]['name']; ?></p>
                <p>Qtt: <?php echo $qttProduct; ?></p>
                <p>Price: <?php echo $productInfo[0]['price']; ?></p>
        <div>
            <h3>Total: R$ <?php echo $totalInCart; ?></h3>
        </div>
    </div>

    <hr>
    <div>
        <h3>Delivery Address</h3>
        <p>Name: <?php echo $fullName; ?></p>
        <p>Street: <?php echo $allAddress[0]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[0]['house_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[0]['postal_code']; ?></p>
        <p>City: <?php echo $allAddress[0]['city']; ?></p>
    </div>
    <hr>
    <div>
        <h3>Invoice Address</h3>
        <p>Name: <?php echo $fullName; ?></p>
        <p>Street: <?php echo $allAddress[1]['street']; ?></p>
        <p>Street number: <?php echo $allAddress[1]['house_number']; ?></p>
        <p>Zip code: <?php echo $allAddress[1]['postal_code']; ?></p>
        <p>City: <?php echo $allAddress[1]['city']; ?></p>
    </div>

    <hr>
    <?php
    if($receivedOrders[0]['payment_type'] == 'card'){
    ?>
    <h3>Metodo de pagamento</h3>

    <p>nome do dono do cartao : <?php echo $receiveCard[0]['card_owner']; ?></p>
    <p>numero do cartao: <?php echo $receiveCard[0]['card_number']; ?></p>
    <p>Tipo de cartao: <?php echo $receiveCard[0]['card_type']; ?></p>
 
    
    <?php } else{?>


        <h3>tipo de pagamento</h3>
        <p>recibo</p>


    <?php }?>
    <a href="thankyou.php ">Confirms the purchase </a>
</body>
</html>