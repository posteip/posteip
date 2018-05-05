<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);
session_start();

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['data']) && !empty(trim($_POST['latitude'])) && !empty(trim($_POST['longitude'])) && !empty(trim($_POST['descricao']))){
        $string = "INSERT INTO poste (latitude, longitude, data_instalacao, descricao) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao->link, $string);
        $data=$_POST['data'];
        if($stmt == TRUE){
            mysqli_stmt_bind_param($stmt, "ddss", $_POST['latitude'], $_POST['longitude'], $data ,$_POST['descricao']);
            mysqli_stmt_execute($stmt);
        }
        $_SESSION['msgCadastroPoste'] = "Poste Cadastrado com Sucesso";
        header('location:/tcc_v1/view/CadastroPostes.php');
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

