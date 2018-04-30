<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE && $_SESSION['userType'] == 0){
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
}
include_once '../helpers/preencherTabelas.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php';?>
    <title>Controladores</title>
    
    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Controladores</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroControladores.php#cadastro">Cadastro</a></li>
                        <li><a href="GerenciarControladores.php">Gerenciar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR CONTROLADORES</h2><br>
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
                                tabelaControladores();
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