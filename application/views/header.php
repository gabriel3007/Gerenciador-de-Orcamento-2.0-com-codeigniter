<!DOCTYPE html>
<html lang="pt-br">
    <?php $this->load->view("head.php");?>
    <body>
        <header class="logado-header">
            <h1 class="logado-main-title">Dev Money</h1>
            <nav>
                <ul class="logado-menu-list">
                    <li class="logado-item-menu"><a class="logado-link-menu" href="<?=base_url('/orcamento')?>">Orcamento</a></li>
                    <li class="logado-item-menu"><a class="logado-link-menu" href="<?=base_url('/categorias')?>">Categorias</a></li>
                    <li class="logado-item-menu"><a class="logado-link-menu" href="<?=base_url('/usuarios/logout')?>">Logout</a></li>
                </ul>
            </nav>
        </header> 
        <div class="container">
        <p class="alert-success"><?=$this->session->flashdata("success")?></p>
        <p class="alert-danger"><?=$this->session->flashdata("danger")?></p>