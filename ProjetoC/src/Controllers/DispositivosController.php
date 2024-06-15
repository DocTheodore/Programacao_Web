<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DispositivosDAO;
use Php\Primeiroprojeto\Models\Domain\Dispositivos;

class DispositivosController{

    public function index($params){
        $dispositivosDAO = new DispositivosDAO();
        $resultado = $dispositivosDAO->consultarTodos();
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
        
        require_once("../src/Views/dispositivos/dispositivos.php");
    }

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

    public function alterar($params){
        $dispositivosDAO = new DispositivosDAO();
        $resultado = $dispositivosDAO->consultar($params[1]);
        require_once("../src/views/dispositivos/alterar_dispositivos.php");
    }

    public function excluir($params){
        $dispositivosDAO = new DispositivosDAO();
        $resultado = $dispositivosDAO->consultar($params[1]);
        require_once("../src/views/dispositivos/excluir_dispositivos.php");
    }

    public function editar($params){
        $dispositivos = new Dispositivos($_POST['id'], $_POST['nome'], $_POST['quantidade']);
        $dispositivosDAO = new DispositivosDAO();
        if($dispositivosDAO->alterar($dispositivos)){
            header("location: /dispositivos/alterar/true");
        } else {
            header("location: /dispositivos/alterar/false");
        }
    }

    public function deletar($params){
        $dispositivosDAO = new DispositivosDAO();
        if($dispositivosDAO->excluir($_POST["id"])){
            header("location: /dispositivos/excluir/true");
        } else {
            header("location: /dispositivos/excluir/false");
        }
    }

}