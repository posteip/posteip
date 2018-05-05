<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/preencherDrops.php';
include_once '../helpers/nav.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php'; ?>
    <title>Conexões</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav("Conexoes")?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR CONEXOES</h2><br>
                <div class="row">
                    <div>
                        <table>
                            <tr>
                                <th>Plataforma</th>
                                <th>Poste</th>
                                <th>Componente</th>
                                <th>Pino</th>
                                <th>Status</th>
                                <th>Ações</th>
                                <?php tabelaGerenciarConexoes(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php include '../helpers/footer.php';
            ?>
        </div>
    </body>
</html>
