<?php
include_once('database.php');
include_once('products.php');
include_once('products_in_cart.php');

    class Cart{

        public $id;
        public $user_id;
        public $product_id;
        private $db;
     
	
      public function __construct() {
       
        $this->db= new Database;
      }

      public function create( $user_id){

      $param = [ ':uuser_id'=> $user_id,
                                  
         ]; //inseri no carrinho
               $this->db->query('INSERT INTO cart (user_id)  VALUES (:uuser_id)', $param, true);
              //seleciona o carrinho com base no id do usuario
               $card_id = $this->db->query('SELECT id FROM cart WHERE user_id = :uuser_id AND  date_deleted IS NULL', $param);

               return $card_id[0]['id'];//retorna o id
      }

   
     
      public function get($id){
        $param = [':uid'=>$id];

        $query = $this->db->query('SELECT * FROM cart WHERE id = :uid', $param);

        return $query;

      }

      public function getAll(){

        $query = $this->db->query('SELECT * FROM cart WHERE date_deleted IS NULL');

        return $query;

      }
      public function getAllProductsId($id){

        $productsCart = new ProductsInCard();

        return $productsCart->getCartById($id);

      }
      public function finishCart($cartId) {
        $params = [
            ':ucartid' => $cartId,
        ];
    
        return $this->db->query("UPDATE cart SET date_deleted = NOW() WHERE id = :ucartid", $params, true);
      }
      
     
    
     
     
	


     


    }





?>