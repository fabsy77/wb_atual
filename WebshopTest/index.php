<?php


 require_once('./class/database.php');
 
 require_once('./class/products.php');

 $class_data = new Database(); //preciso mesmo instanciar database ou so inportar ja esta ok?

 $class_prod = new Products();
 $listProducts = $class_prod->getAll();

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
                    <a href="index.php">Home</a>
                    <a href="./public/viewCart.php">Cart</a>
                    <a href="public/login.php">logout</a>
                
                    </div>
    <div class="container">

                <?php  foreach ($listProducts as $products) {   ?>
                <?php  
                $path = "./modules/image/";
                $image =  $products['image'];
                echo '<img src="' . $path . $image . '" style="width:200px;"><br>';
                echo "Product name: " . $products['name'] . "<br><br>"; 
                echo "Desription: ".  $products['description']. "<br><br>"; 
                echo "Price: " . $products['price'] . "<br><br>";  
                ?>
                <form action="./public/formAddToCart.php" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name ="id" value="<?php echo $products['id'];?> ">
                    <label>Quantity</label>
                    <input type="number" name="quantity" min="1" placeholder="1">
                    <button type="submit">Add To Cart</button>
                </form> <?php }  ?>
      
    </div>
</body>
</html>

