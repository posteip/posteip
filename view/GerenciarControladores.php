<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/nav.php';
$idTela = 2;    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php';?>
    <title>Controladores</title>
    
    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <?php exibirNav("Controladores")?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR CONTROLADORES</h2><br>
                <p class="fonte_erro" style="color:red">
                    <?php
                        if (isset($_SESSION['msgEditarControlador'])){
                            echo $_SESSION['msgEditarControlador'];
                            unset($_SESSION['msgEditarControlador']);
                        }
                    ?>
                </p>
                <div class="row">
                    <div>
                            <table>
                                <tr>
                                    <th>Nome</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Descrição</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                            <?php
                                tabelaGerenciarControladores();
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
<?php
if (isset($_SESSION['msgEditarControlador'])){
        echo '<script>
        alert("'.$_SESSION['msgEditarControlador'].'");
        </script>';
}
unset($_SESSION['msgEditarControlador'])
?>
