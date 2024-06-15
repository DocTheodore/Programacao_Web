<?php

namespace Php\Primeiroprojeto\Models\DAO;

use PDO;

class Conexao{

    public $conexao;

    public function __construct(){
        $this->conexao = 
            new PDO("mysql:host=localhost; dbname=banco", "root", "");
    }

    public function getConexao(){
        return $this->conexao;
    }

}