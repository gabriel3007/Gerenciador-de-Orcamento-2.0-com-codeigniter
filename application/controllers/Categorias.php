<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller{

    private $usuario;

    function __construct(){
        parent::__construct();
        $this->login->verificaUsuarioLogado();
        $this->load->library("gerenciador_orcamento");
        $this->load->library("valida_form");
        $this->load->helper("csrf_helper");
        $this->load->helper("date_helper");
        $this->load->helper("download");
        $this->load->helper("excel_helper");
        $this->usuario = $this->login->usuarioLogado();
    }
    
    public function index(){
        $categorias = $this->gerenciador_orcamento->buscaCategorias($this->usuario->id);
        $dados = ['categorias' => $categorias];
        $this->load->template("categorias/index", $dados);
    }

    public function adicionar(){
        $dados = ['csrf' => getCsrf(), 'usuario' => $this->usuario];
        $this->load->template("categorias/form-nova-categoria", $dados);
    }

    public function editar($id){
        $categoria = $this->CategoriaDao->buscaPorId($id);
        $dados = ['csrf' => getCsrf(), 'categoria' => $categoria, 'usuario' => $this->usuario];
        $this->load->template("categorias/form-edita-categoria", $dados);
    }

    public function adicionaNovaCategoria(){
        $categoriaValida = $this->valida_form->novaCategoria();
        if($categoriaValida){
            $dadosCategoria = $this->input->post();
            $categoria = new Categoria($dadosCategoria);
            $this->CategoriaDao->salva($categoria);
            $this->session->set_flashdata("success", "Categoria adicionada com sucesso, <a href='/categorias'>Confira!</a> ");
            redirect("/categorias/adicionar ");
        }
        $this->session->set_flashdata("erros", validation_errors());
        redirect("/categorias/adicionar");
    }

    public function editaCategoria(){
        $dadosCategoria = $this->input->post();
        $categoriaValida = $this->valida_form->edicaoCategoria($dadosCategoria);
        if($categoriaValida){
            $categoria = new Categoria($dadosCategoria);
            $this->CategoriaDao->edita($categoria);
            redirect("/categorias");
        }
        $this->session->set_flashdata("erros", validation_errors());
        $idCategoria = $this->input->post('id');
        redirect("/categorias/editar/".$idCategoria);
    }

    public function detalhesCategoria($id){
        $categoria = $this->CategoriaDao->buscaPorId($id);
        $orcamento = $this->gerenciador_orcamento->orcamentoUsuario();
        $lancamentosCategoria = $orcamento->lancamentosCategoria($categoria->id);
        $dados = ['categoria' => $categoria, 'lancamentos' => $lancamentosCategoria];
        $this->load->template("categorias/detalhes-categoria", $dados);
    }

    public function downloadExcel(){
        $categorias = $this->gerenciador_orcamento->buscaCategorias($this->usuario->id);
        $arquivo = "tabela_catgorias.xls";
        $conteudo = geraTabelaCategorias($categorias);
        force_download($arquivo, $conteudo);
        redirect("/catgorias");
    }
}