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
    if (!empty($_POST['data']) && !!empty(trim($_POST['latitude'])) && !empty(trim($_POST['longitude'])) && !empty(trim($_POST['descricao'])) && !empty($_POST['controlador']) ){
        $string = "INSERT INTO plataforma (id_controlador, latitude, longitude, data_instalacao, descricao) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao->link, $string);
        if($stmt == TRUE){
            mysqli_stmt_bind_param($stmt, "iddss", $_POST['controlador'], $_POST['latitude'], $_POST['longitude'], $_POST['data'] ,$_POST['descricao']);
            mysqli_stmt_execute($stmt);
        }
        $_SESSION['msgCadastroPlataforma'] = "Plataforma cadastrada com sucesso";
        header('location:/tcc_v1/view/CadastroPlataformas.php');
    }
    else if (!empty($_POST['controlador'])){
        $_SESSION['filtro'] = $_POST['controlador'];
        header('location:/tcc_v1/view/GerenciarPlataformas.php');
    }
    else if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty ($_GET['acao'])) {
        $id = htmlspecialchars($_GET['id']);
        if ($_GET['acao'] == 'Ativar'){ 
            $sql = "SELECT controlador.status FROM plataforma, controlador WHERE controlador.id = plataforma.id_controlador AND plataforma.id = ".$id;
            $conexao->query($sql);   
            $dados = $conexao->fetch_row();
            if ($dados[0] == 1){
                $sql = "UPDATE `plataforma` SET `status`= 1 WHERE id = ".$id;
                $conexao->query($sql);   
                $_SESSION['msgEditarPlataforma'] = "Plataforma Ativada";
            }
            else{
                $_SESSION['msgEditarPlataforma'] = "ERRO ao ativar plataforma: Controlador Desativado";
            }
        }
        else if ($_GET['acao'] == 'Desativar'){
            $sql = "UPDATE `plataforma` SET `status`= 0 WHERE id = ".$id;
            $conexao->query($sql);
            $_SESSION['msgEditarPlataforma'] = "Plataforma Desativada";
        }
        header('location:/tcc_v1/view/GerenciarPlataformas.php');
    }
}
$conexao->close();
unset($conexao);
?>

