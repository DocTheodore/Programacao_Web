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

}