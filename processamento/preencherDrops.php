<?php
include_once "Connection.php";
include_once "config.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

function dropControlador() {
    global $conexao, $dados;
    $string = "SELECT id, nome FROM controlador";
    $conexao->query($string);
    $dados = $conexao->fetch_row();
    while ($dados != null) {
        echo "<option value=$dados[0]>$dados[1]";
        $dados = $conexao->fetch_row();
    }
}
$conexao->close();
?>