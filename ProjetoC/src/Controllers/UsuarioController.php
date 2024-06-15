<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\UsuarioDAO;
use Php\Primeiroprojeto\Models\Domain\Usuario;

class UsuarioController{

    public function index($params){
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->consultarTodos();
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
        
        require_once("../src/Views/usuario/usuario.php");
    }

    public function inserir($params){
        require_once("../src/Views/usuario/inserir_usuario.html");
    }

    public function novo($params){
        $usuario = new Usuario(0, $_POST['nome'], $_POST['idade'], $_POST['pais']);
        $usuarioDAO = new UsuarioDAO();
        if ($usuarioDAO->inserir($usuario)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

    public function alterar($params){
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->consultar($params[1]);
        require_once("../src/views/usuario/alterar_usuario.php");
    }

    public function excluir($params){
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->consultar($params[1]);
        require_once("../src/views/usuario/excluir_usuario.php");
    }

    public function editar($params){
        $usuario = new Usuario($_POST['id'], $_POST['nome'], $_POST['idade'], $_POST['pais']);
        $usuarioDAO = new UsuarioDAO();
        if($usuarioDAO->alterar($usuario)){
            header("location: /usuario/alterar/true");
        } else {
            header("location: /usuario/alterar/false");
        }
    }

    public function deletar($params){
        $usuarioDAO = new UsuarioDAO();
        if($usuarioDAO->excluir($_POST["id"])){
            header("location: /usuario/excluir/true");
        } else {
            header("location: /usuario/excluir/false");
        }
    }

}
