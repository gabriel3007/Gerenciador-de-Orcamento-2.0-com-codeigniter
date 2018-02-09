<?php 
$erros = $this->session->flashdata("erros");
$dadosInseridos = $this->session->flashdata("dadosInseridos");
?>
<div class="form-container">
    <h2 class="form-title">Criar conta</h2>
    <form id="form-novo-usuario" action="<?=base_url('usuarios/novo')?>" method="post">
        <div class="form-group">
            <label class="form-label" for="input-nome">Nome</label>
            <?=$erros['nome']?>
            <input class="form-control" id="input-nome" type="text" name="nome" required autofocus value="<?=$dadosInseridos["nome"]?>">
        </div>
        <div class="form-group">
            <label class="form-label" for="input-email">Email</label>
            <?=$erros['email']?>
            <input class="form-control" id="input-email" type="email" name="email" required value="<?=$dadosInseridos["email"]?>">
        </div>
        <div class="form-group">
            <label class="form-label" for="input-confirm-email">Corfirmar Email</label>
            <?=$erros['confirm-email']?>
            <input class="form-control" id="input-confirm-email" type="email" name="confirm-email" required value="<?=$dadosInseridos["confirm-email"]?>">
        </div>
        <div class="form-group">
            <label class="form-label" for="input-senha">Senha</label>
            <?=$erros['senha']?>
            <input class="form-control" id="input-senha" type="password" name="senha" required value="<?=$dadosInseridos["senha"]?>">
        </div>
        <div class="form-group">
            <label class="form-label" for="input-confirm-senha">Confirmar Senha</label>
            <?=$erros['confirm-senha']?>
            <input class="form-control" id="input-confirm-senha" type="password" name="confirm-senha" required value="<?=$dadosInseridos["confirm-senha"]?>">
        </div>
        <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
        <button class="button btn-roxo" id="botao-adicionar" type="submit">Criar conta</button>
    </form>
</div>

