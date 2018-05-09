<?php
include_once "../processamento/Connection.php";
include_once "../processamento/config.php";
$conexaoD = new Connection();
$conexaoD->connect($host, $user, $password, $database);

function vincularControlador() {
    global $conexaoD;
    $string = "SELECT id, nome FROM controlador";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    if ($dados != null ){
        while ($dados != null) {
            echo "<option value=$dados[0]>$dados[1]";
            $dados = $conexaoD->fetch_row();
        }
    }else{
        echo "<option value=-1>Não há Controladores cadastrados";
    }
    //$conexaoD->close();
    //unset($conexaoD);
}

function filtrarControlador() {
    global $conexaoD;
    $string = "SELECT id, nome FROM controlador";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    echo "<option value=-1>Todos os controladores";
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

function dropTipoDadoExistente(){
    global $conexaoD;
    $string = "SELECT id, elemento FROM tipodado";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    if ($dados != null ){
        while ($dados != null) {
            echo "<option value=$dados[0]>$dados[1]";
            $dados = $conexaoD->fetch_row();
        }
    }else{
        echo "<option value=-1>Não há Tipo Dado cadastrados";
    }
    $conexaoD->close();
    unset($conexaoD);
}

function dropComponente(){
    global $conexaoD;
    $string = "SELECT id, nome FROM componente";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    if ($dados != null ){
        while ($dados != null) {
            echo "<option value=$dados[0]>$dados[1]";
            $dados = $conexaoD->fetch_row();
        }
    }else{
        echo "<option value=-1>Não há Componentes cadastrados";
    }
}

function dropPoste(){
    global $conexaoD;
    $string = "SELECT id, descricao FROM poste";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    if ($dados != null ){
        while ($dados != null) {
            echo "<option value=$dados[0]>$dados[1]";
            $dados = $conexaoD->fetch_row();
        }
    }else{
        echo "<option value=-1>Não há Postes cadastrados";
    }
    
}

function dropPlataforma(){
    global $conexaoD;
    $string = "SELECT id, descricao FROM plataforma";
    $conexaoD->query($string);
    $dados = $conexaoD->fetch_row();
    if ($dados != null ){
        while ($dados != null) {
            echo "<option value=$dados[0]>$dados[1]";
            $dados = $conexaoD->fetch_row();
        }
    }else{
        echo "<option value=-1>Não há Plataformas cadastrados";
    }
}

?>