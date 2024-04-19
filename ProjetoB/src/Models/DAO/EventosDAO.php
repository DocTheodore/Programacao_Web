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
            $sql = "INSERT INTO Eventos (Nome, Inicio, Fim) VALUES (:Nome, :Inicio, :Fim)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":Nome", $eventos->getNome());
            $p->bindValue(":Inicio", $eventos->getInicio());
            $p->bindValue(":Fim", $eventos->getFim());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}