<?php

session_start();
include_once "config.php";
include_once "Connection.php";
include_once "preencherDashboard.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/html/AutenticacaoUsuario.php');
} else {

    //REALIZA O CADASTRO
    if (!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['usrname']) && !empty($_POST['senha'])) {
        $string = "INSERT INTO usuario (nome, sobrenome, email, login, senha) VALUES"
                . " ('" . $_POST['nome'] . "','" . $_POST['sobrenome'] . "', '" . $_POST['email'] . "','" . $_POST['usrname'] . "','" . $_POST['senha'] . "')";
        $verifica = "SELECT id FROM usuario WHERE login = '" . $_POST['usrname'] . "'";
        $conexao->query($verifica);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['erroNomeLogin'] = "true";
            header('location:/tcc_v1/html/CadastroUsuario.php');
        } else {
            $conexao->query($string);
            header('location:/tcc_v1/html/CadastroUsuario.php');
        }
    }
    //TRATA O LOGIN DO USUARIO
    elseif (!empty($_POST['login']) && !empty($_POST['senha'])) {
        $login = htmlspecialchars($_POST['login']);
        $senha = htmlspecialchars($_POST['senha']);
        $string = "SELECT id FROM usuario WHERE login = '" . $login . "' and senha = '" . $senha . "' LIMIT 1";
        $conexao->query($string);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['userId'] = $dados[0];
            header('location:/tcc_v1/html/DashboardRoot.php');
        } else {
            $_SESSION['erroLogin'] = "Usuario ou senha incorretos";
            header('location:/tcc_v1/html/AutenticacaoUsuario.php');
        }
    }//EXCLUIR
    else if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        if ($id != $userId) {
            $string = "DELETE FROM usuario WHERE id =" . $id;
            $isExcluido = $conexao->query($string);
            if (mysqli_affected_rows($conexao->link) == 1) {
                $_SESSION['msgDeleteUser'] = "Usuário Excluido com Sucesso";
            }
        } else {
            $_SESSION['msgDeleteUser'] = "ERRO: Você não pode excluir sua própria conta de usuário";
        }

        header('location:/tcc_v1/html/CadastroUsuario.php');
    }
}
$conexao->close();
?>
