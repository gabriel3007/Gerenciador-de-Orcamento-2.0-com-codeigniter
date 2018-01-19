<h2>Fazer Login</h2>
<form action="<?=base_url('usuarios/fazLogin')?>" method = "post">
    <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" name ="email">
    </div>
    <div class="form-group">
        <label for="">Senha</label>
        <input class="form-control" type="password" name="senha">
    </div>
        <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
        <button class="btn btn-primary" type="submit">Login</button>
</form>