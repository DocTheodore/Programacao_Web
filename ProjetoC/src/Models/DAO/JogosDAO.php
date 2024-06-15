<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Jogos;

class JogosDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Jogos $jogos){
        try{
            $sql = "INSERT INTO jogos (Nome, Lancamento, Preco) VALUES (:Nome, :Lancamento, :Preco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $jogos->getNome());
            $p->bindValue(":Lancamento", $jogos->getLancamento());
            $p->bindValue(":Preco", $jogos->getPreco());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Jogos $jogos){
        try{
            $sql = "UPDATE jogos SET Nome, Lancamento, Preco = :Nome, :Lancamento, :Preco WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $jogos->getNome());
            $p->bindValue(":Lancamento", $jogos->getLancamento());
            $p->bindValue(":Preco", $jogos->getPreco());
            $p->bindValue(":id", $jogos->getId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM jogos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM jogos";
            return $this->conexao->getConexao()->query($sql);
        }catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM jogos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        }catch(\Exception $e){
            return 0;
        }
    }

}