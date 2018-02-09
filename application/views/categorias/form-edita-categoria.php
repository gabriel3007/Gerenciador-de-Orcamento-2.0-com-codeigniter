<?=$this->session->flashdata("erros")?>
<div class="form-container large-form">
    <form action="<?=base_url('categorias/editaCategoria')?>" method="post">
        <h2 class="form-title">Editar Categoria</h2>
        <div class="form-group">
            <label class="form-label" for="">Categoria</label>
            <input class="form-control" type="text" name="nome" required value="<?=$categoria->nome?>">
        </div>
        <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
        <input type="hidden" name="id" value="<?=$categoria->id?>">
        <input type="hidden" name="saldo" value="<?=$categoria->saldo?>">
        <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
        <button class="button" type="submit">Editar</button>
    </form>
</div>