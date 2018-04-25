<?php
session_start();
include_once 'config.php';
include_once 'Connection.php';
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

//Busca o nome do usuário
$userId = $_SESSION['userId'];
$tipoUsuario = $_SESSION['userType'];
$string = "SELECT login FROM usuario WHERE id =" . $userId;
$conexao->query($string);
$dados = $conexao->fetch_row();
$userName = $dados[0];

$item = ["controlador", "plataforma", "poste", "sensor"];
for ($i=0;$i<3;$i++){
    $string = "SELECT COUNT(*) FROM ".$item[$i];
    $conexao->query($string);
    $dados = $conexao->fetch_row();
    $qntdItem[$i] = $dados[0];
}
$conexao->close();
unset($conexao);
?>