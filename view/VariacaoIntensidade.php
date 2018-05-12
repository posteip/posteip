<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/nav.php';
$idTela = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php'; ?>
    <title>Itensidade</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav2("Variação de Intensidade") ?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">Variação de Intensidade Luminosa</h2><br>
                <form action="../processamento/processaLampadas.php" method="post">
                    <fieldset>
                        <?php
                        echo '<input type="hidden" name="idPoste" value=' . $_GET['id'] . '>';
                        echo '<input type="hidden" name="desc" value=' . $_GET['desc'] . '>';
                        ?>
                        <div class="form-group col-sm-6" style="float: left; width: 40%">
                            <div class="col-sm-6 ">
                                <p> Selecionar a data:</p>
                                <?php
                                $data = date("Y-m-d");
                                echo '<input class="form-control" id="data" name="data" type="date" max="' . $data . '"required>'
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <p>Ativar filtro <p>
                                    <button class="btn btn-default" type="submit">Buscar</button>
                            </div>
                        </div>
                        <div class="form-group col-sm-6" style="font-size: 22px">
                            <div class="col-sm-6">
                                <p>Poste: <strong><?php echo $_GET['desc'] ?></strong></p>
                                <p>Data: <strong><?php echo $_GET['data'] ?></strong></p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="divGrafico" class="container-fluid bg-grey">
                <div class="row">
                    <?php
                    if (isset($_GET['exibir'])) {
                        echo '<h2 class="text-center">Gráfico</h2>';
                        echo '<div class="row">';
                        echo '<img src="../graficos/GraficoVariacao.php?idPoste=' . $_GET['id'] . '&data=' . $_GET['data'] . '" class="img-responsive center-block">';
                        echo '</div>';
                    }
                    if (isset($_SESSION['graficoVazio'])) {
                        echo "GRAFICO VAZIO";
                        unset($_SESSION['graficoVazio']);
                    }
                    ?>   
                </div>
            </div>
            <?php include '../helpers/footer.php'; ?>
        </div>
    </body>
</html>

