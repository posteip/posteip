<?php
include_once "config.php";
include_once "Connection.php";
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);
session_start();

if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header($url.'AutenticacaoUsuario.php');
} else {
    //REALIZA O CADASTRO
    if (!empty($_POST['plataforma']) && !empty(trim($_POST['pino'])) && !empty($_POST['poste']) && !empty($_POST['componente']) ){
        $pino = htmlspecialchars($_POST['pino']);
        //VERIFICA SE TODOS OS COMPONENTES ESTÃO CADASTRADOS
        if ($_POST['plataforma'] < 0 || $_POST['poste'] < 0 || $_POST['componente'] < 0){
            $_SESSION['msgCadastroConexao'] = "Cadastre os componentes necessários";
        }
        else{
            //VERIFICA SE EXISTE UMA CONEXÃO ATIVA COM TODOS OS DADOS DA QUE SE DESEJA CADASTRAR
            $query = "SELECT status FROM pinoConexao WHERE id_poste =". $_POST['poste']." and id_plataforma = ".$_POST['plataforma']." and id_componente = ".$_POST['componente']." and pino = '".$pino."'";
            $conexao->query($query);
            $dados = $conexao->fetch_row();
            while ($dados != null){
                if ($dados[0] == 1){
                    $conflito = true;
                    $_SESSION['msgCadastroConexao'] = "ERRO: Já existe uma conexão idêntica ativada. Desative-a caso deseje sobrepor";
                }
                $dados = $conexao->fetch_row();
            }
            if (!$conflito){//REALIZA O CADASTRO, SE FOR VÁLIDO
                $string = "INSERT INTO pinoConexao (id_plataforma, id_poste, id_componente, pino) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conexao->link, $string);
                if($stmt == TRUE){
                    mysqli_stmt_bind_param($stmt, "iiis", $_POST['plataforma'], $_POST['poste'], $_POST['componente'], $_POST['pino']);
                    mysqli_stmt_execute($stmt);
                    $_SESSION['msgCadastroConexao'] = "Conexao inserida com sucesso";
                }
            }    
        }
        header($url.'CadastroConexoes.php');
    }
    else if (!empty($_GET['id']) && is_numeric($_GET['id']) && !empty ($_GET['acao'])) {
        $id = htmlspecialchars($_GET['id']);
        if ($_GET['acao'] == 'Ativar'){ 
            $sql = "SELECT plataforma.status FROM plataforma, pinoConexao pc WHERE pc.id_plataforma = plataforma.id AND pc.id = ".$id;
            $conexao->query($sql);   
            $dados = $conexao->fetch_row();
            if ($dados[0] == 1){
                $sql = "UPDATE `pinoConexao` SET `status`= 1 WHERE id = ".$id;
                $conexao->query($sql);   
                $_SESSION['msgEditarConexao'] = "Conexao Ativada";
            }
            else{
                $_SESSION['msgEditarConexao'] = "ERRO ao ativar conexao: Plataforma Desativada";
            }
        }
        else if ($_GET['acao'] == 'Desativar'){
            $sql = "UPDATE `pinoConexao` SET `status`= 0 WHERE id = ".$id;
            $conexao->query($sql);
            $_SESSION['msgEditarConexao'] = "Conexão Desativada";
        }
        header($url.'GerenciarConexoes.php');
    }
}
$conexao->close();
unset($conexao);
?>

