<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento extends CI_Controller{

    private $usuario;

    function __construct(){
        parent::__construct();
        $this->login->verificaUsuarioLogado();
        #da load em todas as classes referentes ao orçamento
        $this->load->library("gerenciador_orcamento");
        $this->load->library("valida_form");
        $this->load->helper("csrf_helper");
        $this->load->helper("date_helper");
        $this->load->helper("download");
        $this->load->helper("excel_helper");
        $this->usuario = $this->login->usuarioLogado();
    }

    public function index(){
        $orcamento = $this->gerenciador_orcamento->orcamentoUsuario();
        if(count($orcamento->lancamentos) == 0){
            $this->load->template("orcamento/valor-inicial");
        }else{
            $dados = ['orcamento' => $orcamento];
            $this->load->template("orcamento/index", $dados);
        }
    }
    #load no form para fazer lançamento
    public function novoLancamento(){
        $categorias = $this->gerenciador_orcamento->buscaCategorias($this->usuario->id);
        if(count($categorias) == 0){
            $this->session->set_flashdata("danger", "Insira suas categorias de gastos antes de fazer um Lançamento");
            redirect("/categorias");
        }else{
            $dados = ['categorias' => $categorias, 'csrf' => getCsrf(), 'usuario' => $this->usuario];
            $this->load->template("orcamento/form-lancamento", $dados);
        }
    }
    #ações após enviar o form
    public function fazLancamento(){
        $formValido  = $this->valida_form->novoLancamento();
        $dadosLancamento = $this->input->post();
        if($formValido){
            $lancamento = new Lancamento($dadosLancamento);
            $this->LancamentoDao->salva($lancamento);
            $this->CategoriaDao->atualizaSaldo($lancamento);
            $this->gerenciador_orcamento->atualizaOrcamento($lancamento);
            $this->session->set_flashdata("success", "Lançamento feito com sucesso! <a href='/orcamento'>Confira!</a>");
            redirect("/orcamento/novoLancamento");
    }
        $erros = [
            'valor' => form_error('valor'),
            'operacao' => form_error('operacao'),
            'categoria_id' => form_error('categoria_id'),
            'descricao' => form_error('descricao'),
        ];
        $this->session->set_flashdata("dadosInseridos", $dadosLancamento);
        $this->session->set_flashdata("erros", $erros);
        redirect("/orcamento/novoLancamento");
    }

    public function downloadExcel(){
        $orcamento = $this->gerenciador_orcamento->orcamentoUsuario();
        $arquivo = "tabela_orcamento.xls";
        $conteudo = geraTabelaLancamentos($orcamento->lancamentos);
        force_download($arquivo, $conteudo);
        redirect("/orcamento");
    }
}