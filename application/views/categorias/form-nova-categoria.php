<h2>Adicionar categoria</h2>
<?=$this->session->flashdata("erros")?>
<form action="<?=base_url('categorias/adicionaNovaCategoria')?>" method="post">
    <div class="form-group">
        <label for="">Categoria</label>
        <input class="form-control" type="text" name="nome" required value="<?=set_value('nome','')?>">
    </div>
    <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <button class="btn btn-default btn-block" type="submit">Adicionar</button>
</form>