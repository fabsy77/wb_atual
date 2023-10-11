<?php
    include_once('../class/products.php');

    if(isset($_GET) && !empty($_GET) && isset($_GET['id']) && !empty($_GET['id'])){

        $class_prod = new Products();
        $edit = $class_prod->getProductsById($_GET['id']);
        
        $id = $edit[0]['id'];
        $prod = $edit[0]['name'];
        $descrip = $edit[0]['description'];
        $price = $edit[0]['price'];
        $image = $edit[0]['image'];
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
    <div class="card">
        <a href="products.php">ALL PRODUCTS</a><br>
        <form action="formEdit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br><br>
            <label for="">Product</label>
            <input type="text" name="name" value="<?php echo $prod; ?>"><br><br>
            <label for="">Description</label>
            <input type="text" name="description" value="<?php echo $descrip; ?>"><br><br>
            <label for="">Price</label>
            <input type="text" name="price" value="<?php echo $price; ?>"><br><br>
            <label for="">Image</label><br>
            <input type="file" name="image" value="<?php echo $image; ?>"><br><br>
            <button type="submit">Edit a Product</button>

            
        </form>
        
    
</div>
</body>
</html>