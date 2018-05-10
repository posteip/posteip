<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/nav.php';
include_once '../helpers/preencherDrops.php';
$idTela = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Consumo Energético</title>
    <body id="myPage" class="bg-grey"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php
        exibirNav2("Consumo Energético");
        include '../helpers/MenuNavegacao.php';
        ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container -->
            <div id="pesquisa" class="container-fluid bg-grey">
                <h2 class="text-center">Consumo Energético</h2>
                <div class="row">
                    <fieldset>
                        <form method="post" name="graficoConsumo" action="../graficos/filtrarGraficos.php">
                            <div class="col-sm-6 form-group" style="color: black; font-size: 16px">
                                <div class="col-sm-12 form-group">
                                    <input type="radio" name="periodo" value="dia" title="ano" required> Dia Específico <br>
                                    <?php 
                                        $data = date("Y-m-d");
                                        echo '<input class="form-control" id="data" name="dia" type="date" max="'.$data.'">'
                                    ?>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input type="radio" name="periodo" value="mes" title="mês" required> Mês do ano
                                    <select name="mes" class="form-control">
                                        <option value='01'>Janeiro
                                        <option value='02'>Fevereiro
                                        <option value='03'>Março
                                        <option value='04'>Abril
                                        <option value='05'>Maio
                                        <option value='06'>Junho
                                        <option value='07'>Julho
                                        <option value='08'>Agosto
                                        <option value='09'>Setembro
                                        <option value='10'>Outubro
                                        <option value='11'>Novembro
                                        <option value='12'>Dezembro
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group" style="color: black; font-size: 16px">
                                <div class="col-sm-12 form-group">
                                    <input type="radio" name="item" value="controlador" title="Filtrar por controlador" required> Plataformas vinculados ao controlador: <br>
                                    <select name="controlador" class="form-control">
                                        <?php vincularControlador() ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <input type="radio" name="item" value="plataforma" title="Filtrar por plataforma" required> Postes vinculados a plataforma: <br>
                                    <select name="plataforma" class="form-control">
                                        <?php dropPlataforma() ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button class="btn btn-default center-block" type="submit">Gerar Gráfico</button>
                            </div>
                            <div class="col-sm-12 form-group text-center text-uppercase" style="color: red">
                                <?php
                                if (isset($_SESSION['erroBuscaGrafico'])) {
                                    echo $_SESSION['erroBuscaGrafico'];
                                    unset($_SESSION['erroBuscaGrafico']);
                                }
                                ?>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
            
            <div id="divGrafico" class="container-fluid bg-grey">
                <?php
                if (isset($_SESSION['exibir'])) {
                    echo '<h2 class="text-center">Gráfico</h2>';
                    echo '<div class="row">';
                        echo '<img src="../graficos/exibirGraficoConsumo.php?exibir='.$_SESSION['exibir'].'&item='.$_SESSION['item'].'&periodo='.$_SESSION['periodo'].'" class="img-responsive center-block">';
                    unset($_SESSION['exibir']);
                    echo '</div>';
                }
                if(isset($_GET['semDado'])){
                    echo "Não há dados disponíveis para a combinação solicitada";
                }
                ?>
            </div>

            <?php include '../helpers/footer.php'; ?>
        </div>
    </body>
</html>

