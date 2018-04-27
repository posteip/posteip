<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['data']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['descricao']) && !empty($_POST['controlador']) ){
        $string = "INSERT INTO plataforma (id_controlador, latitude, longitude, data_instalacao, descricao) VALUES"
        . " ('" . $_POST['controlador'] . "','" . $_POST['latitude']  ."',".$_POST['longitude'].",'" . $_POST['data'] . "','".$_POST['descricao']."')";
        $conexao->query($string);
        header('location:/tcc_v1/view/CadastroPlataforma.php');
        $_SESSION['msgCadastroPlataforma'] = "Plataforma cadastrada com sucesso";
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

