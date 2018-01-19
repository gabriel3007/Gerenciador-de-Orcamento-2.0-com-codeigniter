<?php
function montaObjetos($objetoDao, $dadosObjetos){
    $objetos = [];
    foreach ($dadosObjetos as $arrayObjeto) {
        $objeto = $objetoDao->objeto($arrayObjeto);
        array_push($objetos, $objeto);
    }
    return $objetos;
}