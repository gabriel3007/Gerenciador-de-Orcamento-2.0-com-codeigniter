<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento_model{

    private $lancamentos;
    private $valorTotal;

    function __construct($lancamentos){
        $this->lancamentos = array_reverse($lancamentos);
        $this->valorTotal = $this->somaLancamentos($lancamentos);
    }

    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome, $valor){
        $this->nome = $valor;
    }

    public function adicionaLancamento(Lancamento $lancamento){
        array_unshift($this->lancamentos, $lancamento);
    }

    public function atualizaValorTotal(Lancamento $lancamento){
        $this->valorTotal += $lancamento->valor;
    }

    public function lancamentosCategoria($idCategoria){
		$lancamentosCategoria = [];
		foreach ($this->lancamentos as $lancamento) {
			if($lancamento->categoria->id == $idCategoria){
				$lancamentosCategoria[] = $lancamento;
			}
		}
		return $lancamentosCategoria;
	}

    private function somaLancamentos($lancamentos){
        $total = 0;
        foreach ($lancamentos as $lancamento) {
            $total += $lancamento->valor;
        }
        return $total;
    }
}