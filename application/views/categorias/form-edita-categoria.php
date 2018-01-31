<h2>Editar Categoria</h2>
<?=$this->session->flashdata("erros")?>
<form action="<?=base_url('categorias/editaCategoria')?>" method="post">
    <div class="form-group">
        <label for="">Categoria</label>
        <input class="form-control" type="text" name="nome" required value="<?=$categoria->nome?>">
    </div>
    <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
    <input type="hidden" name="id" value="<?=$categoria->id?>">
    <input type="hidden" name="saldo" value="<?=$categoria->saldo?>">
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <button class="btn btn-default btn-block" type="submit">Editar</button>
</form>