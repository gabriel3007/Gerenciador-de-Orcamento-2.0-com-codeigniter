<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class MY_loader extends CI_Loader{

    public function template($nome, $dados = []){
        $ci = get_instance();
        $ci->load->view("header");
        $ci->load->view($nome, $dados);
        $ci->load->view("footer");
    }

    #require no model sem instanciar ele
    public function class($path){
        require_once APPPATH."/models/".$path.".php";
    }
}