<?php
include "./helpers/verificaLogin.php"
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Recuperar Senha</title>
        <?php include './helpers/header.php';?>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">                        
                    </button>
                    <a class="navbar-brand" href="Home.php">PosteIP</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="AutenticacaoUsuario.php">Login</a></li>
                        <li><a href="#recuperar">Recuperar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="recuperar" class="container-fluid bg-grey text-center">
            <?php 
            if (!isset($_GET['login']) && !isset($_GET['novaSenha'])){
                echo '<h3 class="margin"><b>Confirme suas informações</b></h3>
            <br><br>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="/posteip/processamento/processaUsuario.php" method="post">        
                    <input type="hidden" name="recuperar" value="sim">
                    <div class="form-group col-sm-12">
                        <p>Nome de usuário</p>
                        <input class="form-control" name="login" placeholder="Usuario" type="text" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <p>Email:</p>
                        <input class="form-control" name="email" placeholder="Email" type="email" required>
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default" type="submit">Recuperar Senha</button>
                    </div>
                </form>';
            }else{
                echo '<h3 class="margin"><b>Insira sua nova senha</b></h3>
            <br><br>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="/posteip/processamento/processaUsuario.php" method="post">
                    <input type="hidden" name="novaSenha" value="sim">
                    <input type="hidden" name="login" value='.$_GET['login'].'>
                    <div class="form-group col-sm-12">
                        <p>Nova Senha</p>
                        <input class="form-control" name="senha" placeholder="Senha" type="password" pattern=".{8,}" title="Mínimo de 8 caracteres" required>
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default" type="submit">Alterar Senha</button>
                    </div>
                </form>';
            }
            echo 
                '<p class="fonte_erro">';
                    if (isset($_SESSION['msgRecuperar'])) {
                        print $_SESSION['msgRecuperar'];
                        unset($_SESSION['msgRecuperar']);
                    }
                    
                echo '</p></div>';
              ?>
            </div>

        <?php include './helpers/footer.php';?>
        
    </body>
</html>
