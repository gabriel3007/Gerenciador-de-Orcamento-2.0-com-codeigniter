<?php
function email_em_uso($email){
    $ci = get_instance();
    $emailsEmUso = $ci->UsuarioDao->busca('email');
    foreach ($emailsEmUso as $emailEmUso){
        if($emailEmUso['email'] == strtolower($email)){
            $ci->form_validation->set_message("email_em_uso", "Este email já está sendo utilizado");
            return FALSE;
        }
    }
    return TRUE;
}

function categoria_ja_existe($nome){
    $ci = get_instance();
    $usuario = $ci->login->usuarioLogado();
    $nomeCategoriasExistentes = $ci->CategoriaDao->busca('nome', $usuario->id);
    foreach($nomeCategoriasExistentes as $categoriaExistente){
        if(strtolower($categoriaExistente['nome']) == strtolower($nome)){
            $ci->form_validation->set_message("categoria_ja_existe", "Essa categoria já existe");
            return FALSE;
        }
    }
    return TRUE;
}