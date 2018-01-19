<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper("monta_objetos_helper");
    }

    abstract protected function tabela();
    abstract public function objeto($dados);

    public function salva($objeto){
        $arrayObjeto = $objeto->toArray();
        $this->db->insert($this->tabela(), $arrayObjeto);
    }

    public function deleta($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tabela());
    }

    public function edita($objeto){
        $this->db->where('id', $objeto->id);
        $dados = $objeto->toArray();
        $this->db->update($this->tabela(), $dados);
    }

    public function buscaTodos($usuario_id = false){
        if($usuario_id) $this->db->where('usuario_id', $usuario_id);
        $array = $this->db->get($this->tabela())->result_array();
        return montaObjetos($this, $array);
    }

    public function busca($coluna, $usuario_id = false){
        if($usuario_id) $this->db->where('usuario_id', $usuario_id);
        $this->db->select($coluna);
        return $this->db->get($this->tabela())->result_array();
    }

    public function buscaPorId($id){
        $this->db->where('id', $id);
        $dados = $this->db->get($this->tabela())->row_array();
        return $this->objeto($dados);
    }
}