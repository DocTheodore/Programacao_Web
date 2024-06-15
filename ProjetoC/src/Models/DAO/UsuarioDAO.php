<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Usuario;

class UsuarioDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Usuario $usuario){
        try{
            $sql = "INSERT INTO Usuario (Nome, Idade, Pais) VALUES (:Nome, :Idade, :Pais)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $usuario->getNome());
            $p->bindValue(":Idade", $usuario->getIdade());
            $p->bindValue(":Pais", $usuario->getPais());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}