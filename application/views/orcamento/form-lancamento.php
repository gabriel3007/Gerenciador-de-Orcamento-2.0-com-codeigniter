<?php
$erros = $this->session->flashdata("erros");
$dadosInseridos = $this->session->flashdata("dadosInseridos");
?>
<h2>Fazer novo lançamento no Orçamento</h2>
<form action="<?=base_url('orcamento/fazLancamento')?>" method="post">
    <div class="form-group">
        <label for="input-valor">Valor</label>
        <?=$erros['valor']?>
        <input class="form-control" id="input-valor" min="0" step="0.1" required type="number" name="valor" autofocus value="<?=$dadosInseridos['valor']?>">
    </div>
    <div class="form-group">
        <?=$erros['operacao']?>
            <label class="radio-inline" for="input-deposito">
            <input id="input-deposito" type="radio" name="operacao" value="deposito" required>Deposito</label>
        
            <label class="radio-inline" for="input-retirada">
            <input id="input-retirada" type="radio" name="operacao" value="retirada" required> Retirada</label>
    </div>
    <div class="form-group">
        <label for="input-categoria">Categoria</label>
        <?=$erros['categoria_id']?>
        <select class="form-control" id="input-categoria" name="categoria_id">
            <?php foreach ($categorias as $categoria): ?>
            <option value="<?=$categoria->id?>"><?=$categoria->nome?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <?=$erros['descricao']?>
        <textarea class="form-control" required maxlength="100" name="descricao"><?=$dadosInseridos['descricao']?></textarea>
    </div>
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
    <button class="btn btn-success">Registrar</button>
</form>