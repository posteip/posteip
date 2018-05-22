<?php
session_start();
if (isset($_GET['force']) and $_GET['force'] == "sim"){
    echo '<script>
            alert("Voce precisa estar logado");
        </script>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login</title>
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
                        <li><a href="#login">Login</a></li> 
                    </ul>
                </div>
            </div>
        </nav>

        <div id="login" class="container-fluid bg-grey text-center">
            <h3 class="margin"><b>Login</b></h3>
            <img src="./midia/Usuario.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="250" height="250"><br>
            <br>
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="/posteip/processamento/processaUsuario.php" method="post">        
                    <input type="hidden" name="realizaLogin" value="sim">
                    <div class="form-group col-sm-12">
                        <input class="form-control" id="name" name="login" placeholder="Usuario" type="text" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <input class="form-control" id="password" name="senha" placeholder="Senha" type="password" required>
                        Esqueceu a senha?<a href="RecuperarSenha.php"> Clique aqui</a>
                    </div>
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default" type="submit">Entrar</button>
                    </div>
                </form>
                <p class="fonte_erro">
                    <?php
                    if (isset($_SESSION['erroLogin'])) {
                        print $_SESSION['erroLogin'];
                        unset($_SESSION['erroLogin']);
                    }
                    ?>
                </p>

            </div>
        </div>

        <?php include './helpers/footer.php';?>
        
    </body>
</html>
