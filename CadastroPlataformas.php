<?php
include './helpers/verificaLogin.php';
include_once './helpers/preencherDrops.php';
include_once './helpers/nav.php';
$idTela = 3;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include './helpers/header.php'; ?>
    <title>Plataformas</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <?php exibirNav("Plataformas")?>

        <?php include './helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRO DE PLATAFORMAS</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="./midia/arduino-icon.png"  style="width: 240px; height: 240px" class="img-responsive center-block">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/posteip/processamento/processaPlataforma.php" method="post">
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Descrição:</p>
                                    <input class="form-control" id="nome" name="descricao" placeholder="Descrição" type="text" pattern=".{1,100}" title="Máximo de 100 caracteres" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Localização:</p>
                                    <input class="form-control" id="lat" name="latitude" placeholder="Latitude" type="text" pattern="[0-9-]+\.[0-9]{4,8}" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" id="long" name="longitude" placeholder="Longitude" type="text" pattern="[0-9-]+\.[0-9]{4,8}" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Data da Instalação:</p>
                                    <?php 
                                        $data = date("Y-m-d");
                                        echo '<input class="form-control" id="data" name="data" type="date" max="'.$data.'"required>'
                                    ?>
                                </div><br>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Controlador Vinculado:</p>
                                    <select name="controlador" class="form-control" required>
                                        <?php
                                        vincularControlador();
                                        ?>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro">
                                <?php
                                if (isset($_SESSION['msgCadastroPlataforma'])) {
                                    echo $_SESSION['msgCadastroPlataforma'];
                                    unset($_SESSION['msgCadastroPlataforma']);
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

