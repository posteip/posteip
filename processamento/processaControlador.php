<?php
session_start();
include_once "config.php";
include_once "Connection.php";
//include_once "preencherDashboard.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header($url.'AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty(trim($_POST['nome'])) && !empty(trim($_POST['latitude'])) && !empty(trim($_POST['longitude'])) && !empty(trim($_POST['descricao'])) ){
        $nome = htmlspecialchars($_POST['nome']);
        $verifica = "SELECT id FROM controlador WHERE nome = '" . $nome . "'";
        $conexao->query($verifica);
        $dados = $conexao->fetch_row();
        if ($dados[0] != null) {
            $_SESSION['msgCadastroControlador'] = "ERRO: O nome digitado já está cadastrado";
        } else {
            $string = "INSERT INTO controlador (nome, latitude, longitude, descricao) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexao->link, $string);
            if($stmt == TRUE){
                mysqli_stmt_bind_param($stmt, "sdds", $nome, $_POST['latitude'], $_POST['longitude'], $_POST['descricao']);
                mysqli_stmt_execute($stmt);
            }
            $_SESSION['msgCadastroControlador'] = "Controlador Cadastrado com sucesso";
        }
        header($url.'CadastroControladores.php');
    }
    //EXCLUIR
    else if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty ($_GET['acao'])) {
        if ($_GET['acao'] == 'Ativar'){ 
            $sql = "UPDATE `controlador` SET `status`= 1 WHERE id = ".$_GET['id'];
            $conexao->query($sql);   
            $_SESSION['msgEditarControlador'] = "Controlador Ativado";
            /*if(mysqli_affected_rows($conexao->link) == 1){
                $_SESSION['msgEditarControlador'] = "Controlador Ativado";
            }else{
                $_SESSION['msgEditarControlador'] = "ERRO: A ação não obteve sucesso";
            }*/
        }
        else if ($_GET['acao'] == 'Desativar'){
            $id = htmlspecialchars($_GET['id']);
            $sql = "UPDATE `controlador` SET `status`= 0 WHERE id = ".$id;
            $conexao->query($sql);
            $_SESSION['msgEditarControlador'] = "Controlador Desativado";
            /*if(mysqli_affected_rows($conexao->link) == 1){
                $_SESSION['msgEditarControlador'] = "Controlador Desativado";
            }else{
                $_SESSION['msgEditarControlador'] = "ERRO: A ação não obteve sucesso";
            }*/
            $sql = "UPDATE `plataforma` SET `status`= 0 WHERE id_controlador = ".$id;
            $conexao->query($sql);
        }
        
        header($url.'GerenciarControladores.php');
    }
    else{
        echo "Não entrou em nada, mano";
    }
}
$conexao->close();
unset($conexao);
?>

