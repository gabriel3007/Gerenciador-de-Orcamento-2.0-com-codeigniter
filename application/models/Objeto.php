<?php
defined('BASEPATH') OR exit('No direct script access allowed');

interface Objeto{
    
    #converte objeto em array para registrar no banco de dados
    public function toArray();
}