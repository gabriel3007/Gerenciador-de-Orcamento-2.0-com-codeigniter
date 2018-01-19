<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/models/Objeto.php";

class Usuario implements Objeto{

    private $id;
    private $nome;
    private $email;
    private $senha; 
      
    function __construct($params){
        if(isset($params['id'])) $this->id = $params['id'];
        $this->nome = $params['nome'];
        $this->email = $params['email'];
        $this->senha = $params['senha'];
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
            'email' => strtolower($this->email),
            'senha' => password_hash($this->senha, PASSWORD_DEFAULT)
        ];
        return $array;      
    }
}