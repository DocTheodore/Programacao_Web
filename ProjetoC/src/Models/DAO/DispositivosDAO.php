<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Dispositivos;

class DispositivosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Dispositivos $dispositivos){
        try{
            $sql = "INSERT INTO dispositivos (Nome, QuantidadeDisponivel) VALUES (:Nome, :QuantidadeDisponivel)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $dispositivos->getNome());
            $p->bindValue(":QuantidadeDisponivel", $dispositivos->getQuantidade_Disponivel());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Dispositivos $dispositivos){
        try{
            $sql = "UPDATE dispositivos SET Nome, QuantidadeDisponivel = :Nome, :QuantidadeDisponivel WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $dispositivos->getNome());
            $p->bindValue(":QuantidadeDisponivel", $dispositivos->getQuantidade_Disponivel());
            $p->bindValue(":id", $dispositivos->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM dispositivos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM dispositivos";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM dispositivos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }catch(\Exception $e){
            return 0;
        }
    }

}