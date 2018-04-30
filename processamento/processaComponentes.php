<?php
session_start();
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);
$cadastrarTipo=""; $tipoDado=""; $nomeComponente="";

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['nome']) && !empty($_POST['diretorio']) && !empty($_POST['tipodado']) && !empty($_POST['tipo'])) {        
        $verifica = "SELECT id FROM componente WHERE nome = '" . $_POST['nome'] . "'";
        $conexao->query($verifica);
        $dados = $conexao->fetch_row();
        if ($dados[0] == null) {
            $string = "INSERT INTO componente (tipo, nome, diretorio) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conexao->link, $string);
            if($stmt == TRUE){
                mysqli_stmt_bind_param($stmt, "sss", $_POST['tipo'], $_POST['nome'], $_POST['diretorio']);
                mysqli_stmt_execute($stmt);
            }
            if ($_POST['tipodado']>=0){//CASO O USUARIO DESEJE UTILIZAR UM TIPO DE DADO JÁ EXISTENTE
                global $tipoDado, $nomeComponente, $cadastrarTipo;
                $_SESSION['nomeTipoDado'] = $_POST['tipodado'];
                $_SESSION['nomeComponente'] = $_POST['nome'];
                header('location:/tcc_v1/view/VincularComponente.php');
            }else{
                global $tipoDado, $nomeComponente, $cadastrarTipo;
                $_SESSION['cadastrarTipo']="";
                $_SESSION['nomeComponente'] = $_POST['nome'];
                header('location:/tcc_v1/view/VincularComponente.php');
            }   
        }else{
            $_SESSION['msgCadastroComponente'] = "ERRO: Nome informado já cadastrado";
            header('location:/tcc_v1/view/CadastroComponentes.php');
        }
    }
    //VINCULAR TIPO DADO AO COMPONENTE
    else if (!empty($_POST['unidade']) && !empty($_POST['margem']) && !empty($_POST['sequencia']) && !empty($_POST['componente'])) {   
        if (!empty($_POST['novoelemento'])){
            $string = "INSERT INTO tipodado (elemento) VALUES ('".$_POST['novoelemento']."')";
            $conexao->query($string);
        }
        if (!empty($_POST['elemento'])){
            $buscaId = "SELECT id FROM tipodado WHERE elemento = '" . $_POST['elemento'] . "'";
            $conexao->query($buscaId);
            $dados = $conexao->fetch_row();
            $idTipoDado = $dados[0];
            $buscaId = "SELECT id FROM componente WHERE nome = '" . $_POST['componente'] . "'";
            $conexao->query($buscaId);
            $dados = $conexao->fetch_row();
            $idComponente = $dados[0];
            //REALIZA A INSERÇÃO
            $string = "INSERT INTO componente_tipodado (idComponente, idTipoDado, sequencia, unidade, margemErro) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexao->link, $string);
            if($stmt == TRUE){
                mysqli_stmt_bind_param($stmt, "iisss", $idComponente, $idTipoDado, $_POST['sequencia'], $_POST['unidade'], $_POST['margem']);
                mysqli_stmt_execute($stmt);
            }
            header('location:/tcc_v1/view/CadastroComponentes.php');
        }
    }
    //EXCLUIR
    else if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
        
    }//LOGOUT
    
}
$conexao->close();
unset($conexao);
?>

