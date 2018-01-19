<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gerenciador_orcamento{

    private $CI;

    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model("categorias/CategoriaDao");
        $this->CI->load->model("orcamentos/LancamentoDao");
        $this->CI->load->class("orcamentos/Lancamento");
        $this->CI->load->class("orcamentos/Orcamento_model");
        $this->CI->load->class("categorias/Categoria");
    }

    public function carregaOrcamento($idUsuario){
        $lancamentos = $this->CI->LancamentoDao->buscaTodos($idUsuario);
        $orcamento = new Orcamento_model($lancamentos);
        $this->CI->session->set_userdata("orcamento", serialize($orcamento));
    }

    public function orcamentoUsuario(){
        return unserialize($this->CI->session->userdata("orcamento"));
    }

    public function atualizaOrcamento($lancamento){
        $orcamento = $this->orcamentoUsuario();
        $orcamento->adicionaLancamento($lancamento);
        $orcamento->atualizaValorTotal($lancamento);
        $this->CI->session->set_userdata("orcamento", serialize($orcamento));
    }

    public function buscaCategorias($idUsuario){
        return $this->CI->CategoriaDao->buscaTodos($idUsuario);
    }
}