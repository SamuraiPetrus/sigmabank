<?php

require_once 'src/Conta.php';

$conta = new Conta('123.456.789-10', 'Lelouch Lamperouge Gameshi');
var_dump($conta->recuperarDataCriacao());