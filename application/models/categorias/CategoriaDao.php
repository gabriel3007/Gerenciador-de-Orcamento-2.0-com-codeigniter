<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaDao extends MY_Model{

    protected function tabela(){
        return "categorias";
    }

    public function objeto($dados){
        return new Categoria($dados);
    }

    public function ehValidoEditarMesmoNome($nomeEditado, $idCategoria){
        $usuario = $this->login->usuarioLogado();
        $categorias = $this->buscaTodos($usuario->id);
        foreach($categorias as $categoria){
            $mesmoNome = $nomeEditado == $categoria->nome;
            $mesmoId = $idCategoria == $categoria->id;
            if($mesmoNome && $mesmoId){
               return true;
            }    
       }
       return false;
    }

    public function atualizaSaldo(Lancamento $lancamento){
        $categoriaAtual = $this->buscaPorId($lancamento->categoria->id);
        $this->db->where('id', $lancamento->categoria->id);
        $novoValor = $categoriaAtual->saldo + $lancamento->valor;
        $this->db->set("saldo", $novoValor);
        $this->db->update($this->tabela());
    }

}