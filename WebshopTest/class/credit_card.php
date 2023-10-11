<?php
include_once('database.php');

    class CreditCard{

        public $id;
        public $card_owner;
        public $card_number	;
        public $card_type;
        private $db;
     
	
        public function __construct() {
       
        $this->db = new Database;
     }
     			


     public function create( $card_owner, $card_number, $card_type){

        $param = [ ':ucard_owner'=> $card_owner,
                   ':ucard_number'=> $card_number,
                   ':ucard_type'=> $card_type
     ];
        $insert = $this->db->query('INSERT INTO credit_card (card_owner, card_number, card_type) 
        VALUES (:ucard_owner, :ucard_number, :ucard_type)', $param, true);

        if($insert){
            return $this->getAllInfosCreditCard($card_owner, $card_number, $card_type);
        }
    }

    public function getAllInfosCreditCard($card_owner, $card_number, $card_type) {
        $param = [ ':ucard_owner'=> $card_owner,
                   ':ucard_number'=> $card_number,
                   ':ucard_type'=> $card_type
     ];

        $query = $this->db->query('SELECT * FROM credit_card WHERE card_owner = :ucard_owner AND card_number = :ucard_number
        AND card_type = :ucard_type', $param);

        return $query;
    }
    public function getCardById($id) {

        $param = [
            ':uid' => $id,
            
        ];
        return $this->db->query("SELECT * FROM credit_card WHERE id = :uid", $param);

    }



     
        
	





    }





?>