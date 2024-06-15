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
            $sql = "INSERT INTO usuario (Nome, Idade, Pais) VALUES (:Nome, :Idade, :Pais)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $usuario->getNome());
            $p->bindValue(":Idade", $usuario->getIdade());
            $p->bindValue(":Pais", $usuario->getPais());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Usuario $usuario){
        try{
            $sql = "UPDATE usuario SET Nome, Idade, Pais = :Nome, :Idade, :Pais WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $usuario->getNome());
            $p->bindValue(":Idade", $usuario->getIdade());
            $p->bindValue(":Pais", $usuario->getPais());
            $p->bindValue(":id", $usuario->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM usuario";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }catch(\Exception $e){
            return 0;
        }
    }

}
