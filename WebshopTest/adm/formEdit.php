<?php

    include_once('../class/products.php');
    var_dump($_POST);
    if(isset($_POST) && isset($_POST['id']) && isset($_POST['name']) &&  isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['image'])){

    $class_prod = new Products();
    

    $edit_prod = $class_prod->update( $_POST['id'],$_POST['name'], $_POST['description'], $_POST['price'], $_FILES['image']['name']);
        
    if($edit_prod){

        echo 'produto editado com sucesso';
      
        echo "<a href='products.php'>volte para o index</a>";

    } else{
         echo 'produto nao pode ser editado';
    }



  
   /*  if($edit_prod){
        echo 'produto editado com sucesso';
    }
    else{
        echo 'produto nao pode ser editado';

        header('products.php');
    } */


    }






// form actionEditprod
?>