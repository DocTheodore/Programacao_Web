<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\UsuarioDAO;
use Php\Primeiroprojeto\Models\Domain\Usuario;

class UsuarioController{

    public function inserir($params){
        require_once("../src/Views/Usuario/inserir_usuario.html");
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

}
