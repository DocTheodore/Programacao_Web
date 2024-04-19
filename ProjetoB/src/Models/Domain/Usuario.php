<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Usuario{

    private $id;
    private $nome;
    private $idade;
    private $pais;

    public function __construct($id, $nome, $idade, $pais){
        $this->setId($id);
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setPais($pais);
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getIdade(){
        return $this->idade;
    }
    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }


}