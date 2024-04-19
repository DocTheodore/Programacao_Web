<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Eventos{

    private $id;
    private $nome;
    private $inicio;
    private $fim;

    public function __construct($id, $nome, $inicio, $fim){
        $this->setId($id);
        $this->setNome($nome);
        $this->setinicio($inicio);
        $this->setfim($fim);
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

    public function getInicio(){
        return $this->$inicio;
    }
    public function setInicio($inicio){
        $this->$inicio = $inicio;
    }

    public function getFim(){
        return $this->$fim;
    }
    public function setFim($fim){
        $this->$fim = $fim;
    }


}