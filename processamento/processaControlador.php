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
            $_SESSION['erroNomeControlador'] = "ERRO: O nome digitado já está cadastrado";
            header('location:/tcc_v1/html/CadastroControladores.php');
        } else {
            $conexao->query($string);
            header('location:/tcc_v1/html/CadastroControladores.php');
        }
    }
    //EXCLUIR
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

        header('location:/tcc_v1/html/CadastroUsuario.php');
    }//LOGOUT
    else if (!empty ($_GET['sair']) && $_GET['sair']=="sim"){
        session_destroy();
        header('location:/tcc_v1/html/Home.html');
        exit();
    }else{
        echo "Não entrou em nada, mano";
    }
}
$conexao->close();
?>

