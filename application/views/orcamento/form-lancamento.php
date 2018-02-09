<?php
$erros = $this->session->flashdata("erros");
$dadosInseridos = $this->session->flashdata("dadosInseridos");
?>
<div class="form-container large-form">
    <form action="<?=base_url('orcamento/fazLancamento')?>" method="post">
        <h2 class="form-title">Fazer novo lançamento no Orçamento</h2>
        <div class="form-group">
            <label class="form-label" for="input-valor">Valor</label>
            <?=$erros['valor']?>
            <input class="form-control" id="input-valor" min="0" step="0.1" required type="number" name="valor" autofocus value="<?=$dadosInseridos['valor']?>">
        </div>
        <div class="form-group">
            <?=$erros['operacao']?>
            <input id="input-deposito" type="radio" name="operacao" value="deposito" required>
            <label class="form-label" for="input-deposito">Deposito</label>
            <br>
            <input id="input-retirada" type="radio" name="operacao" value="retirada" required> 
            <label class="form-label" for="input-retirada">Retirada</label>
        </div>
        <br>
        <div class="form-group">
            <label class="form-label" for="input-categoria">Categoria</label>
            <?=$erros['categoria_id']?>
            <select class="form-control" id="input-categoria" name="categoria_id">
                <?php foreach ($categorias as $categoria): ?>
                <option value="<?=$categoria->id?>"><?=$categoria->nome?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="">Descrição</label>
            <?=$erros['descricao']?>
            <textarea class="form-control" required maxlength="100" name="descricao"><?=$dadosInseridos['descricao']?></textarea>
        </div>
            <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
            <input type="hidden" name="usuario_id" value="<?=$usuario->id?>">
            <button class="button">Registrar</button>
    </form>
</div>