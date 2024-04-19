<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Dispositivos{

    private $id;
    private $nome;
    private $quantidade_disponivel;

    public function __construct($id, $nome, $quantidade_disponivel){
        $this->setId($id);
        $this->setNome($nome);
        $this->setQuantidade_Disponivel($quantidade_disponivel);
    }

    public function getId(){
        return $this->$id;
    }
    public function setId($id){
        $this->$id = $id;
    }

    public function getNome(){
        return $this->$nome;
    }
    public function setNome($nome){
        $this->$nome = $nome;
    }

    public function getQuantidade_Disponivel(){
        return $this->$quantidade_disponivel;
    }
    public function setQuantidade_Disponivel($quantidade_disponivel){
        $this->$quantidade_disponivel = $quantidade_disponivel;
    }


}