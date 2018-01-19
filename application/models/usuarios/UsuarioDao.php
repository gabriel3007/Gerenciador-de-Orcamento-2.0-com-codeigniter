<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioDao extends MY_Model{

    protected function tabela(){
        return "usuarios";
    }
    
    public function objeto($dados){
        return new Usuario($dados);
    }
    
    public function buscaUsuario($dadosLogin){
        $this->db->where("email", $dadosLogin['email']);
        $dados =  $this->db->get($this->tabela())->row_array();
        if($dados && password_verify($dadosLogin['senha'], $dados['senha'])){
            return $dados;
        }
    }
}