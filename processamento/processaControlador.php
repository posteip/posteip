<?php
//session_start();
include_once "config.php";
include_once "Connection.php";
//include_once "preencherDashboard.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/html/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['nome']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['descricao']) ){
        $string = "INSERT INTO controlador (nome, latitude, longitude, descricao) VALUES"
        . " ('" . $_POST['nome'] . "','" . $_POST['latitude']  ."',".$_POST['longitude'].",'" . $_POST['descricao'] . "')";
        $verifica = "SELECT id FROM controlador WHERE nome = '" . $_POST['nome'] . "'";
        $conexao->query($verifica);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['msgCadastroControlador'] = "ERRO: O nome digitado já está cadastrado";
            header('location:/tcc_v1/html/CadastroControladores.php');
        } else {
            $_SESSION['msgCadastroControlador'] = "Controlador Cadastrado com sucesso";
            $conexao->query($string);
            header('location:/tcc_v1/html/CadastroControladores.php');
        }
    }
    //EXCLUIR
    else if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        
    }//LOGOUT
    else{
        echo "Não entrou em nada, mano";
    }
}
$conexao->close();
?>

