<?php


    if ( session_status() !== PHP_SESSION_ACTIVE )
    {
        session_start();
    }

    class MyPDO{

        private $pdo;
        const PARAM_host='localhost';
        const PARAM_port='3306';
        const PARAM_db_name='test';
        const PARAM_user='root';
        const PARAM_db_pass='';
    
        public function __construct(){
            $this->pdo = new PDO('mysql:host='.MyPDO::PARAM_host.';port='.MyPDO::PARAM_port.';dbname='.MyPDO::PARAM_db_name,
                                    MyPDO::PARAM_user, MyPDO::PARAM_db_pass);
        }
    
        public function query($query, $param = [], $insert = false){

            $query_prepare = $this->pdo->prepare($query);

            if(! empty($param)){

                foreach ($param as $colum => $value) {
                    
                    $query_prepare->bindValue($colum, $value);
                }
            }

            $exec = $query_prepare->execute();

            if($insert){

                return $exec;
            }

            $query_prepare->fetchAll(PDO::FETCH_ASSOC);





        }
    }




?>