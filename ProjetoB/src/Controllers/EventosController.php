<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\EventosDAO;
use Php\Primeiroprojeto\Models\Domain\Eventos;

class EventosController{

    public function inserir($params){
        require_once("../src/Views/Eventos/inserir_eventos.html");
    }

    public function novo($params){
        $eventos = new Eventos(0, $_POST['nome'], $_POST['inicio'], $_POST['fim']);
        $eventosDAO = new EventosDAO();
        if ($eventosDAO->inserir($eventos)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}
