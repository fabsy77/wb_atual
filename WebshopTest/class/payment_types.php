<?php
include_once('database.php');



    class Products{

        private $db;

        public function __construct() {
            $this->db = new Database();
        }


        public function getAllProductsid($id){

            $param = [':uid' => $id                
        
        ];
            $query = $this->db->query('SELECT * FROM payment_types WHERE id = :uid',  $param);
    
            return $query;
    
        }
        public function getAllPaymentTypes(){
    
     
            $query = $this->db->query('SELECT * FROM payment_types');
    
            return $query;
    
        }






    }