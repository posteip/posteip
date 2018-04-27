<?php
include_once '../processamento/preencherDrops.php';
if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/html/AutenticacaoUsuario.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Componentes</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Componentes</a> 
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroComponentes.php#cadastro">Cadastro</a></li>
                        <li><a href="#">Gerenciar</a></li>
                        <li><a href="#">Tipo dado</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRO DE COMPONENTES</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="../midia/sensor-icon.png"  style="width: 240px; height: 240px" class="img-responsive center-block" title="Poste">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/tcc_v1/processamento/processaComponentes.php" method="post">
                                <div class="col-sm-12 form-group" style="font-size: 16px; color: black">
                                    Tipo:         
                                    <input type="radio" name="tipo" value="Sensor" required> Sensor
                                    <input type="radio" name="tipo" value="Atuador" required> Atuador
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Nome:</p>
                                    <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text" value="" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Diretório:</p>
                                    <input class="form-control" id="dir" name="diretorio" placeholder="Diretório" type="text" height="200px" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Tipo de Dado:</p>
                                    <select name="tipodado" class="form-control" required>
                                        <?php
                                        dropTipoDado();
                                        ?>
                                    </select>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-left" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro" style="color:red">
                                <?php
                                //CASO O USUARIO TENTE CADASTRAR UM LOGIN JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                                if (isset($_SESSION['msgCadastroComponente'])) {
                                    echo $_SESSION['msgCadastroComponente'];
                                    unset($_SESSION['msgCadastroComponente']);
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

