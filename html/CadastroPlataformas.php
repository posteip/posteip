<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/html/AutenticacaoUsuario.php');
}
include_once '../processamento/preencherDrops.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Plataformas</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Plataformas</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroPlataforma.php#cadastro">Cadastro</a></li>
                        <li><a href="#">Gerenciar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRO DE PLATAFORMAS</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="../midia/arduino-icon.png"  style="width: 240px; height: 240px" class="img-responsive center-block">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/tcc_v1/processamento/processaPlataforma.php" method="post">
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Descrição:</p>
                                    <input class="form-control" id="nome" name="descricao" placeholder="Descrição" type="text" value="" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Localização:</p>
                                    <input class="form-control" id="lat" name="latitude" placeholder="Latitude" type="number" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" id="long" name="longitude" placeholder="Longitude" type="number" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Data da Instalação:</p>
                                    <input class="form-control" id="desc" name="data_install" type="date" required>
                                </div><br>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Controlador Vinculado:</p>
                                    <select name="controlador" class="form-control" required>
                                        <?php
                                        dropControlador();
                                        ?>
                                    </select>
                                </div>
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
            <?php include '../helpers/footer.php';?>
        </div>
    </body>
</html>

