<?php
    include_once('database.php');
    
    class User{

        public $id;
        public $first_name;
        public $last_name;
        public $date_of_birth;
        public $email;
        private $password;
        public $role_id;
        private $db;
     
	
        public function __construct() {
       
        $this->db= new Database;
     }


     public function create( $first_name, $last_name, $date_of_birth, $email, $password, $role_id){

         $param = [ ':ufirst_name'=> $first_name,
                     ':ulast_name'=> $last_name,
                     ':udate_of_birth'=> $date_of_birth,
                     ':uemail'=> $email,
                     ':upassword'=> md5($password),//criptografa a senha
                     ':urole'=> $role_id
      ];

         $query = $this->db->query('INSERT INTO user( first_name, last_name, date_of_birth, email, password, role_id) 
         VALUES (:ufirst_name, :ulast_name, :udate_of_birth, :uemail, :upassword, :urole)', $param, true);

         return $query;
     }

     public function get($id){

        $param = [':uid' => $id];

        $query = $this->db->query('SELECT * FROM user WHERE id = :uid', $param);


        return $query;

     }

     public function getEmailAndPassword($email, $psw, $role){
        $param = [':uemail' => $email,
                  ':upsw' => $psw,
                  ':urole'=> $role          
     ];
        $query = $this->db->query('SELECT * FROM user WHERE email  = :uemail AND password = md5(:upsw) AND role_id = :urole', $param);
        return $query;
     }
   }





?>

