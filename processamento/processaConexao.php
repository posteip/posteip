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
    if (!empty($_POST['plataforma']) && !empty(trim($_POST['pino'])) && !empty($_POST['poste']) && !empty($_POST['componente']) ){
        $pino = htmlspecialchars($_POST['pino']);
        echo "".$_POST['poste'];
        //VERIFICA SE TODOS OS COMPONENTES ESTÃO CADASTRADOS
        if ($_POST['plataforma'] < 0){
            $_SESSION['msgCadastroConexao'] = "É necessário cadastrar uma Plataforma";
        }
        else if ($_POST['poste'] < 0){
            $_SESSION['msgCadastroConexao'] = "É necessário cadastrar um Poste";
        }
        else if ($_POST['componente'] < 0){
            $_SESSION['msgCadastroConexao'] = "É necessário cadastrar um Componente";
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
}
$conexao->close();
unset($conexao);
?>

