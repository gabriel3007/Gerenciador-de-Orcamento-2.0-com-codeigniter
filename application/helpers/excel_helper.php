<?php

function geraTabelaLancamentos($lancamentos){
    $html = "";
    $html .= "<table>";
    $html .= "<tr></tr>";
    $html .= "<tr>";
    $html .= "<td></td>";
    $html .= "<td>Valor</td>";
    $html .= "<td>".utf8_decode("Operação")."</td>";
    $html .= "<td>Caregoria</td>";
    $html .= "<td colspan='3'>".utf8_decode("Descrição")."</td>";
    $html .= "<td>Data</td>";
    $html .= "</tr>";
    foreach($lancamentos as $lancamento){
        $html .= "<tr>";
        $html .= "<td></td>";
        $html .= "<td>".utf8_decode($lancamento->valor)."</td>";
        $html .= "<td>".utf8_decode($lancamento->operacao)."</td>";
        $html .= "<td>".utf8_decode($lancamento->categoria->nome)."</td>";
        $html .= "<td colspan='3'>".utf8_decode($lancamento->descricao)."</td>";
        $html .= "<td>".dataParaPtBr($lancamento->data)."</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}

function geraTabelaCategorias($categorias){
    $html = "";
    $html .= "<table>";
    $html .= "<tr></tr>";
    $html .= "<tr>";
    $html .= "<td></td>";
    $html .= "<td>Nome</td>";
    $html .= "<td>Saldo</td>";
    $html .= "</tr>";
    foreach ($categorias as $categoria){
        $html .= "<tr>";
        $html .= "<td></td>";
        $html .= "<td>".utf8_decode($categoria->nome)."</td>";
        $html .= "<td>".utf8_decode($categoria->saldo)."</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}