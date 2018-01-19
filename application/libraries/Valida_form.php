<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class valida_form{

    protected $CI;

    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper("minhas_validacoes_helper");
    }

    public function criaConta(){
        $this->CI->form_validation->set_rules("nome", "Nome", "required");
        $this->CI->form_validation->set_rules("email", "Email", "required|valid_email|email_em_uso");
        $this->CI->form_validation->set_rules("confirm-email", "Confirmar Email", "required|valid_email|matches[email]");
        $this->CI->form_validation->set_rules("senha", "Senha", "required");
        $this->CI->form_validation->set_rules("confirm-senha", "Comfirmar Senha", "required|matches[senha]");
        $this->CI->form_validation->set_error_delimiters("<b style='color: red'>  (", ")</b>");
        return $this->CI->form_validation->run();
    }

    public function login($dadosLogin){
        $this->CI->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->CI->form_validation->set_rules("senha", "Senha", "required");
        $dadosForamInseridos = $this->CI->form_validation->run();
        $usuarioEhValido = $this->CI->UsuarioDao->buscaUsuario($dadosLogin); 
        if($dadosForamInseridos && $usuarioEhValido) return true;
        return false;
    }

    public function novaCategoria(){
        $this->CI->form_validation->set_rules("nome", " ", "required|categoria_ja_existe");
        $this->CI->form_validation->set_rules("usuario_id", "Id usuario", "required|integer");
        $this->CI->form_validation->set_error_delimiters("<p class = 'alert-danger'>", "</p>");
        return $this->CI->form_validation->run();
    }

    public function edicaoCategoria($dadosCategoria){
        $this->CI->form_validation->set_rules("nome", " ", "required|categoria_ja_existe");
        $this->CI->form_validation->set_rules("id", "Id", "required|integer");
        $this->CI->form_validation->set_rules("usuario_id", "Id usuario", "required|integer");
        $this->CI->form_validation->set_error_delimiters("<p class='alert-danger'>", "</p>");
        $dadosInseridos =  $this->CI->form_validation->run();
        $manteveMesmoNome = $this->CI->CategoriaDao->ehValidoEditarMesmoNome($dadosCategoria['nome'], $dadosCategoria['id']);
        if($dadosInseridos || $manteveMesmoNome) return true;
        return false;

    }

    public function novoLancamento(){
        $this->CI->form_validation->set_rules("valor", "Valor", "required|numeric");
        $this->CI->form_validation->set_rules("operacao", "Operação", "required|in_list[deposito,retirada]");
        $this->CI->form_validation->set_rules("categoria_id", "Categoria", "required|integer");
        $this->CI->form_validation->set_rules("descricao", "Descrição", "required|max_length[100]");
        $this->CI->form_validation->set_rules("usuario_id", " ", "required|integer");
        $this->CI->form_validation->set_error_delimiters("<b style='color: red'>  (", ")</b>");
        return $this->CI->form_validation->run();
    }

}