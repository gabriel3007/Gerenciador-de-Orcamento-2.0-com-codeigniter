<?php
$erros = $this->session->flashdata("erros");
$dadosInseridos = $this->session->flashdata("dadosInseridos");
?>
<h2>Fazer novo lançamento no Orçamento</h2>
<form action="<?=base_url('orcamento/fazLancamento')?>" method="post">
    <div class="form-group">
        <label for="">Valor</label>
        <?=$erros['valor']?>
        <input class="form-control "type="number" name="valor" value="<?=$dadosInseridos['valor']?>">
    </div>
    <div class="form-group">
        <label for="">Operação</label>
        <?=$erros['operacao']?>
        <select class="form-control" name="operacao">
            <option value="deposito">Depostio</option>
            <option value="retirada">Retirada</option>
        </select>   
    </div>
    <div class="form-group">
        <label for="">Categoria</label>
        <?=$erros['categoria_id']?>
        <select class="form-control" name="categoria_id">
            <?php foreach ($categorias as $categoria): ?>
            <option value="<?=$categoria->id?>"><?=$categoria->nome?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <?=$erros['descricao']?>
        <textarea class="form-control" name="descricao"><?=$dadosInseridos['descricao']?></textarea>
    </div>
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
    <button class="btn btn-success">Registrar</button>
</form>