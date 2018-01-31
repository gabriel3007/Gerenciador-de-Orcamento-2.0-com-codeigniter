<h2>Fazer Login</h2>
<form action="<?=base_url('usuarios/fazLogin')?>" method = "post">
    <div class="form-group">
        <label for="inpute-email">Email</label>
        <input class="form-control" id="input-email" required type="email" name ="email">
    </div>
    <div class="form-group">
        <label for="input-senha">Senha</label>
        <input class="form-control" id="input-senha" required type="password" name="senha">
    </div>
        <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
        <button class="btn btn-primary" type="submit">Login</button>
</form>