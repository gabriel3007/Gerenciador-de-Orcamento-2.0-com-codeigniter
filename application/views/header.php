<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <title>Orçamento</title>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Gerenciador</a>
                </div>
                <div>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($this->login->usuarioEstaLogado()):?>
                            <li><a href="<?=base_url('/orcamento')?>">Orcamento</a></li>
                            <li><a href="<?=base_url('/orcamento/novoLancamento')?>">Fazer Lançameto</a></li>
                            <li><a href="<?=base_url('/categorias')?>">Categorias</a></li>
                            <li><a href="<?=base_url('/usuarios/logout')?>">Logout</a></li>
                        <?php else: ?>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/criarconta">Criar Conta</a></li>
                        <?php endif?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top:150px">
        <p class="alert-success"><?=$this->session->flashdata("success")?></p>
        <p class="alert-danger"><?=$this->session->flashdata("danger")?></p>