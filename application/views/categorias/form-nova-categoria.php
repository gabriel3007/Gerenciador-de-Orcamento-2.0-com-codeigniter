<?=$this->session->flashdata("erros")?>
<div class="form-container large-form">
    <form action="<?=base_url('categorias/adicionaNovaCategoria')?>" method="post">
    <h2 class="form-title">Adicionar categoria</h2>
    <div class="form-group">
        <label class="form-label" for="">Categoria</label>
        <input class="form-control" type="text" name="nome" required value="<?=set_value('nome','')?>">
    </div>
    <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <button class="button" type="submit">Adicionar</button>
</form>
</div>