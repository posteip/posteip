<?php
include_once "Connection.php";
include_once "config.php";  
$conexaoT = new Connection();
$conexaoT->connect($host, $user, $password, $database);

function buscaUsuarios() {
    global $conexaoT;
    $string = "SELECT * FROM usuario";
    $conexaoT->query($string);
    $dados = $conexaoT->fetch_row();
    while ($dados != null) {
        if ($dados[3] == 1){
            $isAdm = "Sim";
        }else{
            $isAdm = "Nao";
        }
        echo "<tr>" .
        "<td>$dados[0]</td>" .
        "<td>$dados[1]</td>" .
        "<td>$dados[2]</td>" .
        "<td>$isAdm</td>" .
        "<td>$dados[4]</td>" .
        "<td>$dados[5]</td>" .
        "<td><a href='/tcc_v1/processamento/processaUsuario.php?id=$dados[0]' class='btn btn-default'><i class='fa fa-trash'></i> Excluir</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_row();
    }
    $conexaoT->close();
    unset($conexaoT);
}
?>