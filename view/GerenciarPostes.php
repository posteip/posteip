<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/preencherDrops.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php'; ?>
    <title>Postes</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav("Postes")?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR POSTES</h2><br>
                <div class="row">
                    <div>
                        <table>
                            <tr>
                                <th>Descrição</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Instalação</th>
                                <th>Ações</th>
                                <?php
                                tabelaPostes();
                                ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php include '../helpers/footer.php';
            ?>
        </div>
    </body>
</html>
