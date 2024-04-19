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
            $sql = "INSERT INTO Jogos (Nome, Lancamento, Preco) VALUES (:Nome, :Lancamento, :Preco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $jogos->getNome());
            $p->bindValue(":Lancamento", $jogos->getLancamento());
            $p->bindValue(":Preco", $jogos->getPreco());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}