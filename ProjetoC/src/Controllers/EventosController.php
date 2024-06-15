<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\EventosDAO;
use Php\Primeiroprojeto\Models\Domain\Eventos;

class EventosController{

    public function index($params){
        $eventosDAO = new EventosDAO();
        $resultado = $eventosDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";

        if($acao == "inserir"){
            if($status == "true"){
                $mensagem = "Registro inserido com sucesso";
            } else if($status == "false"){
                $mensagem = "Falha ao inserir";
            }
        }
        else if($acao == "alterar"){
            if($status == "true"){
                $mensagem = "Registro alterado com sucesso";
            } else if($status == "false"){
                $mensagem = "Falha ao alterar";
            }
        }
        else if($acao == "excluir"){
            if($status == "true"){
                $mensagem = "Registro excluido com sucesso";
            } else if($status == "false"){
                $mensagem = "Falha ao excluir";
            }
        }
        else{
            $mensagem = "";
        }
        
        require_once("../src/Views/eventos/eventos.php");
    }

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

    public function alterar($params){
        $eventosDAO = new EventosDAO();
        $resultado = $eventosDAO->consultar($params[1]);
        require_once("../src/views/eventos/alterar_eventos.php");
    }

    public function excluir($params){
        $eventosDAO = new EventosDAO();
        $resultado = $eventosDAO->consultar($params[1]);
        require_once("../src/views/eventos/excluir_eventos.php");
    }

    public function editar($params){
        $eventos = new Eventos($_POST['id'], $_POST['nome'], $_POST['inicio'], $_POST['fim']);
        $eventosDAO = new EventosDAO();
        if($eventosDAO->alterar($eventos)){
            header("location: /eventos/alterar/true");
        } else {
            header("location: /eventos/alterar/false");
        }
    }

    public function deletar($params){
        $eventosDAO = new EventosDAO();
        if($eventosDAO->excluir($_POST["id"])){
            header("location: /eventos/excluir/true");
        } else {
            header("location: /eventos/excluir/false");
        }
    }

}