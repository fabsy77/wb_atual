<?php
    include_once('../class/products.php');

//verificacao que o ususario comum nao pode acessar essa pagina
    $verify_var = isset($_SESSION['user_info'][0]['role_id'] );// bool

    if(  $verify_var == true && $_SESSION['user_info'][0]['role_id'] == 'user'){
        header('Location: ../index.php');

        return false;
    }

    $class_prod = new Products();
    $allProducts = $class_prod->getAll();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><a href="createProduct.php">Create Products</a></div>
    <?php 
    //percorre toda a lista de produtos
    //$allProducts é um array que sera percorrido e a informacao sera salvo na variavel $products
    foreach ($allProducts as $products){

        echo 'Products: ' . $products['name'] . '<br>';
        echo 'Products: ' . $products['description'] . '<br>';
        echo 'Price: ' . $products['price'];?>
        
        <!-- link edit e deletar para cada produto com um paramentro  que a página de edição e deletar saiba qual produto está sendo editado ou deletado. -->
        <a href="editProduct.php?id=<?php echo $products['id'];?>">Edit</a>
        <a href="formDeleteProducts.php?id=<?php echo $products['id'];?>">Remove</a><br>
        <?php } ?>
   
</body>
</html>