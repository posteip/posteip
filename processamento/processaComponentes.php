<?php
session_start();
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO DE UM NOVO COMPONENTE E REDIRECIONA PARA VINCULAR OU CADASTRAR UM (NOVO) TIPO DADO A ESSE COMPONENTE
    if (!empty(trim($_POST['nome'])) && !empty(trim($_POST['diretorio'])) && !empty($_POST['tipodado']) && !empty($_POST['tipo'])) {        
        $nome = htmlspecialchars($_POST['nome']);
        $verifica = "SELECT id FROM componente WHERE nome = '" . $nome . "'";
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
                $_SESSION['nomeTipoDado'] = $_POST['tipodado'];
                $_SESSION['nomeComponente'] = $_POST['nome'];
            }else{
                $_SESSION['cadastrarTipo']="";
                $_SESSION['nomeComponente'] = $_POST['nome'];
            }
            header($url.'VincularComponente.php');
        }else{
            $_SESSION['msgCadastroComponente'] = "ERRO: Nome informado já cadastrado";
            header('location:/tcc_v1/view/CadastroComponentes.php');
        }
    }
    else if(!empty($_POST['vincular'])){//TRATA SOLICITAÇÃO PARA VINCULAR SENSOR E TIPO DADO JÁ EXISTENTES
        $_SESSION['vincularExistentes'] = "sim";
        header('location:/tcc_v1/view/VincularComponente.php');
    }
    //VINCULAR UM COMPONENTE EXISTENTE A UM TIPO DADO EXISTENTE
    else if (!empty($_POST['unidade']) && !empty($_POST['margem']) && !empty($_POST['sequencia']) && !empty($_POST['tipodado']) && !empty($_POST['componente'])) {   
        $string = "INSERT INTO componente_tipodado (idComponente, idTipoDado, sequencia, unidade, margemErro) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexao->link, $string);
        if($stmt == TRUE){
            mysqli_stmt_bind_param($stmt, "iisss", $_POST['componente'], $_POST['tipodado'], $_POST['sequencia'], $_POST['unidade'], $_POST['margem']);
            mysqli_stmt_execute($stmt);
        }
        unset($_SESSION['vincularExistentes']);    
        header('location:/tcc_v1/view/GerenciarComponentes.php');
    }
    //VINCULAR TIPO DADO AO NOVO COMPONENTE
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
            header('location:/tcc_v1/view/GerenciarComponentes.php');
        }
    }
    else if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    }
    else{
        echo 'Deu ruim';
    }
//$conexao->close();
//unset($conexao);
}
?>