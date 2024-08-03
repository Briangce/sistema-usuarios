<?php
include "./Main.php";
session_start();
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('America/Sao_Paulo');
// ini_set('display_errors', 0);
// error_reporting(E_ALL);
$general = new Geral();
$instancia = new Action();

$acao = !empty($general->getParam("acao")) ? $general->getParam("acao") : (!empty($general->getParam("ACAO")) ? $general->getParam("ACAO") : null);
if ($acao) {
    call_user_func([$instancia, $acao]);
    exit;
}else{
  $instancia->showLogin();
}