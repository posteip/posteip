<?php
include_once "Connection.php";
include_once "config.php";
$conexaoD = new Connection();
$conexaoD->connect($host, $user, $password, $database);

function dropControlador() {
    global $conexaoD;
    $string = "SELECT id, nome FROM controlador";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    while ($dados != null) {
        echo "<option value=$dados[0]>$dados[1]";
        $dados = $conexaoD->fetch_row();
    }
    $conexaoD->close();
    unset($conexaoD);
}

function dropTipoDado(){
    echo "<option value=-1>Criar Novo Tipo Dado";
    global $conexaoD;
    $string = "SELECT id, elemento FROM tipodado";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    while ($dados != null) {
        echo "<option value=$dados[1]>$dados[1]";
        $dados = $conexaoD->fetch_row();
    }
    $conexaoD->close();
    unset($conexaoD);
}
//$conexao->close();
?>