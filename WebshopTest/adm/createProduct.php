<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="products.php">All Products</a>
    <div class="card">

        <form action="formCreateProducts.php" method="post" enctype="multipart/form-data">
            <label for="">Product</label><br>
            <input type="text" name="product"><br>
            <label for="">Description</label><br>
            <input type="text" name="description"><br>
            <label for="">Price</label><br>
            <input type="text" name="price"><br>
            <label for="">Image</label><br>
            <input type="file" name="fileToUpload"><br><br>
            <button type="submit">Create a Product</button><br>
        </form>
        
</div>
</body>
</html>