<?php
    include_once('../class/products.php');

   
    if(isset ($_POST) && isset($_POST['product']) && isset($_POST['description'])  && isset($_POST['price'])  && isset($_FILES['fileToUpload'])){

 

        $class_prod = new Products();
        
        $creat_prod = $class_prod->create($_POST['product'], $_POST['description'], $_POST['price'], $_FILES['fileToUpload']['name']);

         if($creat_prod ){

            echo "seu produto foi criado";

            echo '<a href="createProduct.php">retornar</a>';            

        }
        else{
            echo "erro ao criar o produto";
            
        }
        
       
    }
    

?>