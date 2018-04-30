<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE && $_SESSION['userType'] == 0) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
}
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/preencherDrops.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php'; ?>
    <title>Componentes</title>

    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">

        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Componentes</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroComponentes.php#cadastro">Cadastro</a></li>
                        <li><a href="GerenciarComponentes.php">Gerenciar</a></li>
                        <li><a href="TipoDado.php">Tipo dado</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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
                                tabelaComponentes();
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
