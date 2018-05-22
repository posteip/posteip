<?php
session_start();
include_once "config.php";
include_once "Connection.php";
include_once './enviar_email.php';
//include_once "preencherDashboard.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header($url.'AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if ($_POST['isAdm']>=0  && !empty(trim($_POST['nome'])) && !empty(trim($_POST['sobrenome'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['usrname'])) && !empty(trim($_POST['senha']))) {        
        $usrName = htmlspecialchars($_POST['usrname']);
        $verifica = "SELECT id FROM usuario WHERE login = '" . $usrName . "'";
        $conexao->query($verifica);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['erroNomeLogin'] = "ERRO: Login já cadastrado";
            header($url.'CadastroUsuario.php');
        } else {
            $senha = md5($_POST['senha']);
            $string = "INSERT INTO usuario (nome, sobrenome, isadm, email, login, senha) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexao->link, $string);

            if($stmt == TRUE){
                mysqli_stmt_bind_param($stmt, "ssisss", $_POST['nome'], $_POST['sobrenome'], $_POST['isAdm'], $_POST['email'], $usrName, $senha);
                mysqli_stmt_execute($stmt);
                header($url.'processamento/enviar_email.php?adress='.$_POST['email'].'&usrname='.$_POST['usrname'].'&senha='.$_POST['senha']);
                
            }
            
            
        }
    }
    //TRATA O LOGIN DO USUARIO
    elseif (!empty($_POST['login']) && !empty($_POST['senha'])) {
        $login = htmlspecialchars($_POST['login']);
        $s = htmlspecialchars($_POST['senha']);
        $senha = md5($s);
        $string = "SELECT id, isadm FROM usuario WHERE login = '" . $login . "' and senha = '" . $senha . "' LIMIT 1";
        $conexao->query($string);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['userId'] = $dados[0];
            $_SESSION['userType'] = $dados[1];
            header($url.'DashboardRoot.php');
        } else {
            $_SESSION['erroLogin'] = "Usuario ou senha incorretos";
            header($url.'AutenticacaoUsuario.php');
        }
    }//EXCLUIR
    else if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
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

        header($url.'CadastroUsuario.php');
    }//LOGOUT
    else if (!empty ($_GET['sair']) && $_GET['sair']=="sim"){
        session_destroy();
        header($url.'Home.php');
        exit();
    }else{
        echo "Não entrou em nada, mano";
    }
}
$conexao->close();
unset($conexao);
?>

