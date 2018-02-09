<div class="form-container">
    <h2 class="form-title">Fazer Login</h2>
    <form action="<?=base_url('usuarios/fazLogin')?>" method = "post">
        <div class="form-group">
            <label class="form-label" for="inpute-email">Email</label>
            <input class="form-control" id="input-email" required type="email" name ="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label class="form-label" for="input-senha">Senha</label>
            <input class="form-control" id="input-senha" required type="password" name="senha" placeholder="Senha">
        </div>
        <input type="hidden" name="<?=$csrf['nome']?>" value="<?=$csrf['hash']?>">
        <button class="button btn-roxo" type="submit">Login</button>
    </form>
</div>