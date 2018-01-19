<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/models/Objeto.php";

class Lancamento implements Objeto{

    private $valor;
	private $operacao;
	private $descricao;
	private $data;
    private $categoria;
    private $usuario_id;
    
    function __construct($params){
        if(isset($params['data'])) $this->data = $params['data'];
        else $this->data = date("Y-m-d");
        $this->usuario_id = $params['usuario_id'];
        $this->valor = $params['valor'];
        $this->operacao = $params['operacao'];
        $this->descricao = $params['descricao'];
        $this->categoria = $this->buscaCategoriaLancamento($params['categoria_id']);
    }
    
    private function buscaCategoriaLancamento($categoriaId){
        $ci = get_instance();
        return $ci->CategoriaDao->buscaPorId($categoriaId);
    }

    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome, $valor){
        $this->$nome = $valor;
    }


    public function corrigeValor(){
        if($this->operacao == "retirada"){
            $this->valor = -($this->valor);
        }
    }
    
    public function toArray(){
        $this->corrigeValor();
        $array = [
            'valor' => $this->valor,
            'operacao' => $this->operacao,
            'descricao' => $this->descricao,
            'data' => $this->data,
            'categoria_id' => $this->categoria->id,
            'usuario_id' => $this->usuario_id
        ];
        return $array;
    }
    
}