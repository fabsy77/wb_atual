<?php

//verifica se a sessao esta ativa 
if ( session_status() !== PHP_SESSION_ACTIVE ) {
    session_start();

}

class Database{


    private $pdo;//propriedade que armazena a conexão PDO com o banco de dados.
    const PARAM_host='localhost';////constantes que armazena o nome do host do banco de dados
    const PARAM_port='3306';//armazena o numero da porta do DB
    const PARAM_db_name='wb_test';//nome do DB
    const PARAM_user='root';//nome do usuario do DB
    const PARAM_db_pass='';//armazena o senha do DB

   /*  /*instancia PDO é criada e armazenada na propriedade $pdo. 
    Isso cria uma conexão com o banco de dados usando os valores das constantes definidas acima */
    public function __construct(){

        $this->pdo = new PDO('mysql:host='.Database::PARAM_host.';port='.Database::PARAM_port.';dbname='.Database::PARAM_db_name,
        Database::PARAM_user,Database::PARAM_db_pass);
    }


     /* funcao c 3 parâmetros: $query para a consulta SQL, $param para os parâmetros da consulta
     e $insert que é um valor booleano para indicar se a consulta é de inserção (por padrão, é falso). */
    public function query($query, $param = [], $insert = false){

            //preparando uma consulta, usando a conexao PDO e usando a consulta SQL $query como parametro
            $queryPrepare = $this->pdo->prepare($query);

            //verifica se o array $param nao esta vazia
            if(!empty($param)){
            //foreach para acessar o array $param e acessa a chave coluna e o seu valor
                foreach($param as $column => $value){

                    //Vincula cada valor do parâmetro à consulta preparada.
                    $queryPrepare->bindValue($column, $value);
                }
            }   
            
            //executa a consulta 
            $exec = $queryPrepare->execute();

            //verifica se o parametro $insert é verdadeiro, ou seja se a consulta foi bem sucedida
             if($insert){
                //se verdadeiro retorna exec
            return $exec;
    }
            //caso Contrario
            //fetchAll() retorna como uma matriz associativa(mas somente se o $insert for falso)
            return $queryPrepare->fetchAll(PDO::FETCH_ASSOC);
    }


}




//$queryPrepare: variável representa a consulta preparada que foi criada 
?>
