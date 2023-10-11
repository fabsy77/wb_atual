<?php
include_once('database.php');

    class Order{

        public $id;
        public $user_id;
        public $payment_type_id;
        public $address_id;
        public $db;


        public function __construct() {
            $this->db = new Database;
        }
        //cart_id	credit_card_id	payment_type_id
        public function create( $cart_id, $credit_id, $payment_type, $returnAllColumns = true){

            $param = [ ':ucart_id'=> $cart_id,
                       ':ucredit_card_id'=> $credit_id,
                       ':upayment_type'=> $payment_type
         ];
            $insert = $this->db->query('INSERT INTO orders(cart_id, credit_card_id, payment_type) 
            VALUES (:ucart_id, :ucredit_card_id, :upayment_type)', $param, true);
   
            if($returnAllColumns){
                return $this->getOrdersByAllColumns($cart_id, $credit_id, $payment_type);         
            }else if($insert){
                return true;
            }
        }

        
    public function getOrdersByAllColumns($cart_id, $credit_id, $payment_type){
        $param = [     ':ucart_id'=> $cart_id,
                       ':ucredit_card_id'=> $credit_id,
                       ':upayment_type'=> $payment_type
         ];
         return  $this->db->query('
         SELECT * FROM orders 
         WHERE cart_id = :ucart_id
         AND credit_card_id = :ucredit_card_id 
         AND payment_type = :upayment_type', $param);


   }

        // get all Products with the parameter  ID
        public function get($id){

            $param = [':uid' => $id];

            $query = $this->db->query('SELECT * FROM orders WHERE id = :uid', $param);

            return $query;
        }
        //get all Prodcucts
        public function getAll(){

            $query = $this->db->query('SELECT * FROM orders');

            return $query;

        }

        public function getOrdersByCardId($cart_id){

            $param = [ ':ucart_id'=> $cart_id

        ];
            return $this->db->query('SELECT * FROM orders WHERE cart_id = :ucart_id ', $param);

        }

     
	


     


    }





?>