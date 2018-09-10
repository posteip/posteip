<?php
include './helpers/verificaLogin.php';
include_once './helpers/preencherTabelas.php';
include_once './helpers/preencherDrops.php';
include_once './helpers/nav.php';
$idTela = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include './helpers/header.php'; ?>
    <?php include './estilo/estiloTabela.php'; ?>
    <title>Lâmpadas</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav2("Lâmpadas") ?>

        <?php include './helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">Consulta Lâmpadas</h2><br>
                <form action="./processamento/processaLampadas.php" method="post">
                    <fieldset>
                        <div class="form-group col-sm-6">
                            <p> Selecione uma plataforma</p>
                            <select name="plataforma" class="form-control" required>
                                <?php dropPlataforma(); ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <div class="col-sm-6 ">
                                <p> Informe a data:</p>
                                <?php
                                $data = date("Y-m-d");
                                echo '<input class="form-control" id="data" name="data" type="date" max="' . $data . '"required>'
                                ?>
                            </div>
                            <div class="col-sm-6 ">
                                <p>Informe o horário</p>
                                <input class="form-control "type="time" name="hora">
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-default" type="submit">Buscar</button>
                            <?php
                            if (isset($_SESSION['msgLampada'])) {
                                echo $_SESSION['msgLampada'];
                                unset($_SESSION['msgLampada']);
                            }
                            ?>
                        </div>
                    </fieldset>
                </form>
                <div class="row">
                    <div>
                        <?php
                        if (isset($_SESSION['exibir'])) {
                            echo '<table>
                            <tr>
                                <th>Poste</th>
                                <th>Localização</th>
                                <th>Status</th>
                                <th>Intensidade</th>
                                <th>Ações</th>
                            </tr>';
                            tabelaLampadasAcessas($_SESSION['plataforma'], $_SESSION['data'], $_SESSION['hora']);
                            unset($_SESSION['exibir']);
                            echo '</table>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php include './helpers/footer.php';
            ?>
        </div>
    </body>
</html>
