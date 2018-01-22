<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/models/Objeto.php";

class Categoria implements Objeto{

    private $id;
    private $nome;
    private $saldo;
    private $usuario_id;

    function __construct($params){
        if(isset($params['id'])) $this->id = $params['id'];
        if(isset($params['saldo'])) $this->saldo = $params['saldo'];
        else $this->saldo = 0;
        if(isset($params['usuario_id'])) $this->usuario_id = $params['usuario_id'];
        $this->nome = $params['nome'];      
    }

    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome, $valor){
        $this->$nome = $valor;
    }

    public function toArray(){
        $array = [
            'nome' => $this->nome,
            'saldo' => $this->saldo,
            'usuario_id' => $this->usuario_id
        ];
        return $array;
    }
}