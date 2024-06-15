<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Eventos;

class EventosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Eventos $eventos){
        try{
            $sql = "INSERT INTO eventos (Nome, Inicio, Fim) VALUES (:Nome, :Inicio, :Fim)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $eventos->getNome());
            $p->bindValue(":Inicio", $eventos->getInicio());
            $p->bindValue(":Fim", $eventos->getFim());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Eventos $eventos){
        try{
            $sql = "UPDATE eventos SET Nome, Inicio, Fim = :Nome, :Inicio, :Fim WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $eventos->getNome());
            $p->bindValue(":Inicio", $eventos->getInicio());
            $p->bindValue(":Fim", $eventos->getFim());
            $p->bindValue(":id", $eventos->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM eventos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM eventos";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM eventos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }catch(\Exception $e){
            return 0;
        }
    }

}
