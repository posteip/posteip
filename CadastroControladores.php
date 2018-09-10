<?php
include './helpers/verificaLogin.php';
include_once './helpers/nav.php';
$idTela = 2;    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include './helpers/header.php'; ?>
    <link rel="icon" type="imagem/png" href="./midia/rasp-icon.png"/>
    <link rel="shortcut icon" type="imagem/png" href="./midia/rasp-icon.png"/>
    <title>Controladores</title>
    <body id="myPage" class="bg-grey"  data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <?php exibirNav("Controladores")?>

        <?php include './helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRO DE CONTROLADORES</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="./midia/rasp-icon.png"  style="width: 240px; height: 240px" class="img-responsive center-block">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/posteip/processamento/processaControlador.php" method="post">
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Nome:</p>
                                    <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Localização: Precisão de 4 a 6 casas decimais</p>
                                    <input class="form-control" id="lat" name="latitude" placeholder="Latitude" type="text" pattern="[0-9-]+\.[0-9]{4,6}" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" id="long" name="longitude" placeholder="Longitude" type="text" pattern="[0-9-]+\.[0-9]{4,6}" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Descrição:</p>
                                    <input class="form-control" id="desc" name="descricao" placeholder="Descricao" type="text"  pattern=".{1,100}" title="Máximo de 100 caracteres" required>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro">
                                <?php
                                //CASO O USUARIO TENTE CADASTRAR UM NOME DE CONTROLADOR JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                                if (isset($_SESSION['msgCadastroControlador'])) {
                                    echo $_SESSION['msgCadastroControlador'];
                                    unset($_SESSION['msgCadastroControlador']);
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './helpers/footer.php';?>
        </div>
    </body>
</html>

