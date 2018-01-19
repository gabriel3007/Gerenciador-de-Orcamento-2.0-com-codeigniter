<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LancamentoDao extends MY_model{

    public function tabela(){
        return "lancamentos";
    }

    public function objeto($dados){
        return new Lancamento($dados);
    }
}