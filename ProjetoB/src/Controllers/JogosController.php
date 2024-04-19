<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\JogosDAO;
use Php\Primeiroprojeto\Models\Domain\Jogos;

class JogosController{

    public function inserir($params){
        require_once("../src/Views/Jogos/inserir_jogos.html");
    }

    public function novo($params){
        $jogos = new Jogos(0, $_POST['nome'], $_POST['data'], $_POST['preco']);
        $jogosDAO = new JogosDAO();
        if ($jogosDAO->inserir($jogos)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
