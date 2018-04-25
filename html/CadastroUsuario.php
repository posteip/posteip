<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/html/AutenticacaoUsuario.php');
}
include_once '../processamento/preencherTabelas.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Usuarios</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Usuários</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroUsuario.php#cadastro">Cadastro</a></li>
                        <li><a href="#">Gerenciar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">NOVO USUÁRIO</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <i class="fa fa-user-plus logo" style="color: gray"></i>
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/tcc_v1/processamento/processaUsuario.php" method="post">
                                <div class="col-sm-12 form-group" style="font-size: 16px">
                                    Perfil do Usuário:         
                                    <input type="radio" name="isAdm" value=1 required> Administrador     
                                    <input type="radio" name="isAdm" value=0 required> Restrito
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="name" name="nome" placeholder="Nome" type="text" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" type="text" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="Username" name="usrname" placeholder="Usuario" type="text" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="UsrPass" name="senha" placeholder="Senha" type="password" required>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro" style="color:red">
                                <?php
                                //CASO O USUARIO TENTE CADASTRAR UM LOGIN JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                                if (isset($_SESSION['erroNomeLogin'])) {
                                    echo $_SESSION['erroNomeLogin'];
                                    unset($_SESSION['erroNomeLogin']);
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listagem de usuários já cadastrados -->
            <div id="listagem" class="container-fluid">
                <h2 class="text-center">USUÁRIOS CADASTRADOS</h2><br>
                <div class="row">
                    <div class="col-sm-8" style="width: 100%">
                        <form action="/tcc_v1/processamento/processaUsuario.php" method="post">
                            <table>
                                <tr>
                                    <th style="width: 10%">ID</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Administrador?</th>
                                    <th>E-mail</th>
                                    <th>Login</th>
                                    <th>Gerencie</th>
                                </tr>
                                <?php
                                    buscaUsuarios();
                                ?>
                            </table>
                        </form>
                        <p class="fonte_erro" style="color: red"><?php
                            if (isset($_SESSION['msgDeleteUser'])) {
                                print $_SESSION['msgDeleteUser'];
                                unset($_SESSION['msgDeleteUser']);
                            }
                            ?></p>
                    </div>
                </div>
            </div>
            <?php include '../helpers/footer.php';?>
        </div>
    </body>
</html>
