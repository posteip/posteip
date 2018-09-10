<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);
session_start();

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header($url.'AutenticacaoUsuario.php');
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
        header($url.'Lampadas.php');
    }
    if (!empty($_POST['data']) && !empty(($_POST['idPoste'])) && !empty($_POST['desc'])){
        header($url. "VariacaoIntensidade.php?id=".$_POST['idPoste']."&desc=".$_POST['desc']."&data=".$_POST['data']."&exibir");
        
    }
    
}
$conexao->close();
unset($conexao);
?>

