<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE && $_SESSION['userType'] == 0){
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
}
include_once '../helpers/preencherTabelas.php';
include_once '../helpers/preencherDrops.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <?php include '../estilo/estiloTabela.php';?>
    <title>Plataformas</title>
    
    <body id="myPage"  data-spy="scroll" data-target=".navbar" data-offset="60">
        
        <nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">Plataformas</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="CadastroPlataformas.php#cadastro">Cadastro</a></li>
                        <li><a href="GerenciarPlataformas.php">Gerenciar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <div class="w3-main" style="margin-left:300px;">
            <div id="listagem" class="container-fluid bg-grey">
                <h2 class="text-center">GERENCIAR PLATAFORMAS</h2><br>
                <form action="/tcc_v1/processamento/processaPlataforma.php" method="post">
                <div class="form-group col-sm-6" style="text-align: center">
                    <p style="color: black">Plataformas vinculadas em:</p>
                    <select name="controlador" class="form-control" required>
                        <?php
                        filtrarControlador();
                        ?>
                    </select>
                </div>
                    <div class="form-group col-sm-6">
                        <p style="color: black">Ativar filtro:</p>
                        <button class="btn btn-default pull-left" type="submit">Buscar</button>
                    </div>
                </form><br><br>
                <div class="row">
                    <div>
                            <table>
                                <tr>
                                    <th>Descrição</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Instalação</th>
                                    <th>Status</th>
                                    <th>Controlador</th>
                                    <th>Ações</th>
                            <?php
                                if (isset($_SESSION['filtro'])){
                                    $filtro = $_SESSION['filtro'];
                                    unset($_SESSION['filtro']);
                                }else{
                                    $filtro = -1;
                                }
                                tabelaPlataformas($filtro);
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
if (isset($_SESSION['msgEditarPlataforma'])){
        echo '<script>
        alert("'.$_SESSION['msgEditarPlataforma'].'");
        </script>';
}
unset($_SESSION['msgEditarPlataforma'])
?>
