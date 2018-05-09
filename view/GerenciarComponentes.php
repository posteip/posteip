<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/preencherDrops.php';
include_once '../helpers/nav.php';
$idTela = 5;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php'; ?>
    <title>Componentes</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <?php exibirNav("Componentes")?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR COMPONENTES</h2><br>
                <form action="/tcc_v1/processamento/processaComponentes.php" method="post">
                    <div class="form-group text-center">
                        <input type="hidden" value="Vincular" name="vincular">
                        <p style="color: black">Vincular Componente e Tipo Dado já cadastrados:</p>
                        <button class="btn btn-default center-block" type="submit">Vincular</button>
                    </div>
                </form>
                <div class="row">
                    <div>
                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Sequencia</th>
                                <th>Elemento</th>
                                <th>Unidade</th>
                                <th>Margem de Erro</th>
                                <th>Ações</th>
                                <?php
                                tabelaGerenciarComponentes();
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
