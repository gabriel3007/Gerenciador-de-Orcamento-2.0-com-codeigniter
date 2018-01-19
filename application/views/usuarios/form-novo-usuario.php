<h2>Criar conta</h2>
<?php 
$erros = $this->session->flashdata("erros");
$dadosInseridos = $this->session->flashdata("dadosInseridos");
?>
<form action="<?=base_url('usuarios/novo')?>" method="post">
    <div class="form-group">
        <label for="">Nome</label>
        <?=$erros['nome']?>
        <input class="form-control" type="text" name="nome" value="<?=$dadosInseridos["nome"]?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <?=$erros['email']?>
        <input class="form-control" type="email" name="email" value="<?=$dadosInseridos["email"]?>">
    </div>
     <div class="form-group">
        <label for="">Corfirmar Email</label>
        <?=$erros['confirm-email']?>
        <input class="form-control" type="email" name="confirm-email" value="<?=$dadosInseridos["confirm-email"]?>">
    </div>
    <div class="form-group">
        <label for="">Senha</label>
        <?=$erros['senha']?>
        <input class="form-control" type="password" name="senha" value="<?=$dadosInseridos["senha"]?>">
    </div>
     <div class="form-group">
        <label for="">Confirmar Senha</label>
        <?=$erros['confirm-senha']?>
        <input class="form-control" type="password" name="confirm-senha" value="<?=$dadosInseridos["confirm-senha"]?>">
    </div>
    <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
    <button class="btn btn-primary" type="submit">Criar conta</button>
</form>