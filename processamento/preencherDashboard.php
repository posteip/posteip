<?php
session_start();
include_once 'config.php';
include_once 'Connection.php';
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

//Busca o nome do usuário
$userId = $_SESSION['userId'];
$string = "SELECT login FROM usuario WHERE id =" . $userId;
$conexao->query($string);
$dados = $conexao->fetch_row();
$userName = $dados[0];
?>