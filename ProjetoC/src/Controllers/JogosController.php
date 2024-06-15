<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\JogosDAO;
use Php\Primeiroprojeto\Models\Domain\Jogos;

class JogosController{

    public function index($params){
        $jogosDAO = new JogosDAO();
        $resultado = $jogosDAO->consultarTodos();
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
        
        require_once("../src/Views/jogos/jogos.php");
    }

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

    public function alterar($params){
        $jogosDAO = new JogosDAO();
        $resultado = $jogosDAO->consultar($params[1]);
        require_once("../src/views/jogos/alterar_jogos.php");
    }

    public function excluir($params){
        $jogosDAO = new JogosDAO();
        $resultado = $jogosDAO->consultar($params[1]);
        require_once("../src/views/jogos/excluir_jogos.php");
    }

    public function editar($params){
        $jogos = new Jogos($_POST['id'], $_POST['nome'], $_POST['data'], $_POST['preco']);
        $jogosDAO = new JogosDAO();
        if($jogosDAO->alterar($jogos)){
            header("location: /jogos/alterar/true");
        } else {
            header("location: /jogos/alterar/false");
        }
    }

    public function deletar($params){
        $jogosDAO = new JogosDAO();
        if($jogosDAO->excluir($_POST["id"])){
            header("location: /jogos/excluir/true");
        } else {
            header("location: /jogos/excluir/false");
        }
    }

}
