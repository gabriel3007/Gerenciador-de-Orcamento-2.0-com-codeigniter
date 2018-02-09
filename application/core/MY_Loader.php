<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class MY_loader extends CI_Loader{

    public function template($nome, $dados = []){
        $ci = get_instance();
        if($ci->login->usuarioEstaLogado()){
            $ci->load->view("header");
            $ci->load->view($nome, $dados);
            $ci->load->view("footer");
        }else{
            $ci->load->view("header-deslogado.php");
            $ci->load->view($nome, $dados);
            $ci->load->view("footer-deslogado.php");
        }
    }

    #require no model sem instanciar ele
    public function class($path){
        require_once APPPATH."/models/".$path.".php";
    }
}