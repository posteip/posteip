<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['data']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['descricao'])){
        $string = "INSERT INTO poste (latitude, longitude, data_instalacao, descricao) VALUES"
        . " ('" . $_POST['latitude']  ."',".$_POST['longitude'].",'" . $_POST['data'] . "','".$_POST['descricao']."')";
        $conexao->query($string);
        header('location:/tcc_v1/view/CadastroPostes.php');
        $_SESSION['msgCadastroPoste'] = "Poste Cadastrado com Sucesso";
    }
    //EXCLUIR
    else if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        
    }//SE DER RUIM
    else{
        echo "Não entrou em nada, mano";
    }
}
$conexao->close();
?>

