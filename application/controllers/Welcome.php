<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()	{
		if($this->login->UsuarioEstaLogado()){
			redirect(base_url("/orcamento"));
		}else{
			$this->load->template('welcome_message');
		}
	}
}
