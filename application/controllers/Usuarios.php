<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library("valida_form");
        $this->load->library("gerenciador_orcamento");
        $this->load->helper("csrf_helper");
    }

    public function criarConta(){
        $dados = ['csrf' => getCsrf()];
        $this->load->template("usuarios/form-novo-usuario", $dados);
    }

    public function login(){
        $dados = ['csrf' => getCsrf()];
        $this->load->template("usuarios/form-login", $dados);
    }

    public function novo(){
       $params = $this->input->post();
       $formValido = $this->valida_form->criaConta();
        if($formValido){
            $usuario = new Usuario($params);    
            $this->UsuarioDao->salva($usuario);
            $this->session->set_flashdata("success", "Conta criada com sucesso! Efetue Login para contnuar");
            redirect("/usuarios/login");
        }
        $erros = [
            'nome' => form_error('nome'),
            'email' => form_error('email'),
            'confirm-email' => form_error('confirm-email'),
            'senha' => form_error('senha'),
            'confirm-senha' => form_error('confirm-senha'),
        ];
        $this->session->set_flashdata("erros", $erros);
        $this->session->set_flashdata("dadosInseridos", $params);
        redirect("/criarconta");
    }

    public function fazLogin(){
        $dadosLogin = $this->input->post();
        $formValido = $this->valida_form->login($dadosLogin);
        if($formValido){
            $dadosUsuario = $this->UsuarioDao->buscaUsuario($dadosLogin);
            $usuario = new Usuario($dadosUsuario);
            $this->login->iniciaSessao($usuario);
            $this->gerenciador_orcamento->carregaOrcamento($usuario->id);
            redirect(base_url("/Orcamento"));
        }
        $this->session->set_flashdata("danger", "Erro ao efetuar login, verifique seus dados");
        redirect("/usuarios/login");
    }

    public function logout(){
        $this->login->encerraSessao();
        redirect(base_url("/"));
    }
}