<?php

    include_once('../class/products.php');
        if(isset($_GET) && isset($_GET['id'])){

        $class_prod = new Products();
        $deleteProd = $class_prod->delete($_GET['id']);
        
        echo 'product deleted successfully';
    }
    else{
        echo 'Error while deleting the product';
        header('products.php');
    }

?>