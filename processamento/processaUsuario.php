<?php
    session_start();
    include_once "config.php";
    include_once "Connection.php";

    $conexao = new Connection();
    
    $conexao->connect($host, $user, $password, $database);
    if (isset($_SERVER['HTTP_REFERER']) == FALSE){
        header('location:/tcc_v1/html/AutenticacaoUsuario.php');
    }else{
        //REALIZA O CADASTRO
        if (!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['usrname']) && !empty($_POST['senha'])){
            echo "entrei aqui";
            $string = "INSERT INTO usuario (nome, sobrenome, email, login, senha) VALUES"
            . " ('".$_POST['nome']."','".$_POST['sobrenome']."', '".$_POST['email']."','".$_POST['usrname']."','".$_POST['senha']."')";
            $verifica = "SELECT id FROM usuario WHERE login = '".$_POST['usrname']."'";
            $conexao->query($verifica);
            $dados = $conexao->fetch_row();
            if ($dados[0]!=null){
                $_SESSION['erroNomeLogin'] = "Nome de usuário já cadastrado";
                header('location:/tcc_v1/html/AutenticacaoUsuario.php');
            }
            else{
                $conexao->query($string);
                $_SESSION['usrName']=$_POST['login'];
                header('location:/tcc_v1/html/DashboardAdmin.php');
            }
        }
        //TRATA O LOGIN DO USUARIO
        elseif (!empty($_POST['login']) && !empty ($_POST['senha'])){
            $login = htmlspecialchars($_POST['login']);
            $senha = htmlspecialchars($_POST['senha']);
            $string = "SELECT id FROM usuario WHERE login = '".$login."' and senha = '".$senha."' LIMIT 1";
            $conexao->query($string);
            $dados = $conexao->fetch_row();
            if ($dados[0]!=null){
                $_SESSION['usrName']=$_POST['login'];
                header('location:/tcc_v1/html/DashboardAdmin.php');
            }
            else{
                $_SESSION['erroLogin'] = "Usuario ou senha incorretos";
                header('location:/tcc_v1/html/AutenticacaoUsuario.php');
            }
        }
    }
    $conexao->close();
     
?>