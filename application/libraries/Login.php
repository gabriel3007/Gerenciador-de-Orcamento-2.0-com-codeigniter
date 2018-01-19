<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class login{

    public $CI;

    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model("usuarios/UsuarioDao");
        $this->CI->load->class("usuarios/Usuario");
    }
    
    public function iniciaSessao(Usuario $usuario){
        $this->CI->session->set_userdata("usuario_logado", serialize($usuario));
    }

    public function encerraSessao(){
        $this->CI->session->unset_userdata("usuario_logado");
    }

    public function usuarioLogado(){
        return unserialize($this->CI->session->userdata("usuario_logado"));
    }

    public function usuarioEstaLogado(){
        return $this->CI->session->has_userdata("usuario_logado");
    }

    public function verificaUsuarioLogado(){
        if(!$this->usuarioEstaLogado()){
            $this->CI->session->set_flashdata("danger", "Faça Login antes de acessar essa funcionlidade");
            redirect("/usuarios/login");
        }
    }
}