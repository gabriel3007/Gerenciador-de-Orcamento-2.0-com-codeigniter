<?php

function getCsrf(){
        $ci = get_instance();
        $csrf = [
            'nome' => $ci->security->get_csrf_token_name(),
            'hash' => $ci->security->get_csrf_hash()
                ];
        return $csrf;
    }