<?php
include_once('database.php');

    class Products{
      //properties
        public $id;
        public $name;
        public $description	;
        public $price;
        public $item_code;
        public $image;
        private $db;
     
	
      public function __construct() {
       
        $this->db= new Database;
     }

     //recupera informações do banco de dados com base na id do produto
     public function  getProductsById($id){

        $param = [':uid'=> $id];

        $query = $this->db->query('SELECT * FROM products WHERE id = :uid ', $param);

        return $query;
     }
     

     //recupera todos os registros da tabela de produtos no banco de dados
     public function getAll(){

        $query = $this->db->query('SELECT * FROM products');

      return $query;

     }
     //inseri ou cria no banco de dados novos elementos
     public function create($name, $description, $price,  $image){
      /* // Um ou mais campos estão vazios, não crie o produto
         if (empty($name) || empty($description) || empty($price) || empty($image)) {
         return false; // Um ou mais campos estão vazios, não crie o produto
      } */

      $param = [':uname'=> $name,
                ':udescription'=> $description,
                ':uprice'=> $price,
                ':uimage'=> $image];
                                 //quando for insert tem que ter true no final
      $query = $this->db->query('INSERT INTO products (name, description, price, image ) VALUES (:uname, :udescription, :uprice, :uimage)', $param, true);

      return $query;
   }
   //atualiza o banco de dados  para modificar os valores das colunas da tabela produto
   public function update( $id, $name, $description, $price, $image){

      $param = [':uid'=> $id,
                ':uname'=> $name,
                ':udescription'=> $description,
                ':uprice'=> $price,
                ':uimage'=> $image
               ];
                                 //quando for insert, update, delete tem que ter true no final
      $query = $this->db->query('UPDATE products SET id = :uid, name = :uname, description = :udescription, price = :uprice, image = :uimage WHERE id = :uid', $param, true);

      return $query;
   }
   //deleta com base no id do produto
   public function delete($id){

      $param = [':uid'=> $id];

      $query = $this->db->query('DELETE FROM products WHERE id = :uid ', $param, true);

      return $query;
   }
 
   }
?>