<?php
include './helpers/verificaLogin.php';
include_once './helpers/nav.php';
$idTela = 4;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include './helpers/header.php'; ?>
    <title>Postes</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav("Postes")?>

        <?php include './helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRO DE POSTES</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="./midia/poste-icon2.png"  style="width: 240px; height: 240px" class="img-responsive center-block" title="Poste">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/posteip/processamento/processaPoste.php" method="post">
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Descrição:</p>
                                    <input class="form-control" id="nome" name="descricao" placeholder="Descrição" type="text" pattern=".{1,100}" title="Máximo de 100 caracteres" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Localização:</p>
                                    <input class="form-control" id="lat" name="latitude" placeholder="Latitude" type="text" pattern="[0-9-]+\.[0-9]{4,6}" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input class="form-control" id="long" name="longitude" placeholder="Longitude" type="text" pattern="[0-9-]+\.[0-9]{4,6}" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Data da Instalação:</p>
                                    <?php 
                                        $data = date("Y-m-d");
                                        echo '<input class="form-control" id="data" name="data" type="date" max="'.$data.'"required>'
                                    ?>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-left" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro" style="color:red">
                                <?php
                                //CASO O USUARIO TENTE CADASTRAR UM LOGIN JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                                if (isset($_SESSION['msgCadastroPoste'])) {
                                    echo $_SESSION['msgCadastroPoste'];
                                    unset($_SESSION['msgCadastroPoste']);
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './helpers/footer.php'; ?>
        </div>
    </body>
</html>

