<?php
include '../helpers/verificaLogin.php';
include_once '../helpers/preencherDrops.php';
include_once '../helpers/nav.php';
$idTela = 6;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Conexoes</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <?php exibirNav("Conexoes")?>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">CADASTRAR CONEXOES</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <i class="fa fa-code-branch fa-10x img-responsive" style="color: black"></i>  
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/tcc_v1/processamento/processaConexao.php" method="post">
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Plataforma Vinculada:</p>
                                    <select name="plataforma" class="form-control" required>
                                        <?php dropPlataforma();?>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Poste:</p>
                                    <select name="poste" class="form-control" required>
                                        <?php dropPoste(); ?>
                                    </select>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Componente:</p>
                                    <select name="componente" class="form-control" required>
                                        <?php dropComponente(); ?>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Pino:</p>
                                    <input class="form-control" type="text" name="pino" placeholder="Pino vinculado" pattern=".{1,3}" title="Máximo de 3 dígitos"required>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro">
                                <?php
                                if (isset($_SESSION['msgCadastroConexao'])) {
                                    echo $_SESSION['msgCadastroConexao'];
                                    unset($_SESSION['msgCadastroConexao']);
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../helpers/footer.php';?>
        </div>
    </body>
</html>

