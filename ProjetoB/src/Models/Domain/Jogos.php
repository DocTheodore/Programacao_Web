<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Jogos{

    private $id;
    private $nome;
    private $lancamento;
    private $preco;

    public function __construct($id, $nome, $lancamento, $preco){
        $this->setId($id);
        $this->setNome($nome);
        $this->setLancamento($lancamento);
        $this->setPreco($preco);
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

    public function getLancamento(){
        return $this->lancamento;
    }
    public function setLancamento($lancamento){
        $this->lancamento = $lancamento;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }


}