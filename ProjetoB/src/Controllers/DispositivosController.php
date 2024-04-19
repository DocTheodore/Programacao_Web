<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DispositivosDAO;
use Php\Primeiroprojeto\Models\Domain\Dispositivos;

class DispositivosController{

    public function inserir($params){
        require_once("../src/Views/dispositivos/inserir_dispositivo.html");
    }

    public function novo($params){
        $dispositivos = new Dispositivos(0, $_POST['nome'], $_POST['quantidade']);
        $dispositivosDAO = new DispositivosDAO();
        if ($dispositivosDAO->inserir($dispositivos)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
