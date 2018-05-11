<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);
session_start();

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //TRATA OS DADOS RECEBIDOS DO FORMULÁRIO
    if (!empty($_POST['data']) && !empty(($_POST['plataforma'])) && !empty($_POST['hora'])){
        if ($_POST['plataforma'] < 0){
            $_SESSION['msgTabelaLampadas'] = "É necessário cadastrar um Controlador";
        } else {
            $_SESSION['data'] = $_POST['data'];
            $_SESSION['plataforma'] = $_POST['plataforma'];
            $_SESSION['hora'] = $_POST['hora'].':00';
            $_SESSION['exibir'] = true;
            echo $_SESSION['hora'];
        }
        header('location:/tcc_v1/view/Lampadas.php');
    }
}
$conexao->close();
unset($conexao);
?>

