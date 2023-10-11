<?php
include_once('database.php');

    class ProductsInCard{

        public $id;
        public $product_id;
        public $card_id;
        public $quantity;
        private $db;

        public function __construct() {
            $this->db = new Database;
        }


        //nserir um produto em um carrinho de compras 
        public function create ($product_id, $card_id, $quantity){
            $param = [ ':uproduct_id'=> $product_id,
                       ':ucard_id'=> $card_id,
                       ':uquantity'=> $quantity

        ];

            $query = $this->db->query('INSERT INTO products_in_cart (product_id, cart_id, quantity) 
            VALUES (:uproduct_id, :ucard_id, :uquantity)', $param, true);

            return $query;

        }
        //update do  produto em um carrinho de compras 
        public function update($cart_Id, $productId, $quantity) {
            $params = [
                ':ucart_id' => $cart_Id,
                ':uproduct_id' => $productId,
                ':uquantity' => $quantity,
            ];
            var_dump($params);
            die;
            return $this->db->query("UPDATE products_cart SET quantity = :uquantity WHERE cart_id = :ucart_id AND product_id = :uproductid", $params, true);
        }
    
        //deleta do carrinho
        public function delete($productCartId) {
            $params = [
                ':uid' => $productCartId,
            ];
        
            return $this->db->query("DELETE FROM products_in_cart WHERE id = :uid", $params, true);
        }

        
        public function getCartById($id_cart){

            $param = [ ':ucart'=> $id_cart ];

            $query = $this->db->query('SELECT * FROM products_in_cart WHERE cart_id = :ucart GROUP BY product_id', $param );

            return $query;
        }
        
       /*  public function getQuantityProductInCart($cart_Id, $product_Id) {
            $param = [
                ':ucart_id' => $cart_Id,
                ':uproduct_id' => $product_Id,
            ];
           
            $query = $this->db->query('SELECT * FROM products_in_cart WHERE cart_id = :ucart_id AND product_id = :uproduct_id', $param);

            return $query;
        }
         */
     
	

       
        
	





    }





?>