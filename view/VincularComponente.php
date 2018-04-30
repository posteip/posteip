<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
}
include_once '../helpers/preencherDrops.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <?php include '../helpers/header.php'; ?>
    <title>Componentes</title>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        
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
            <!-- Container (Cadastro) -->
            <div id="cadastro" class="container-fluid bg-grey">
                <h2 class="text-center">Vincular Componente - Tipo Dado</h2>
                <div class="row">
                    <div class="col-sm-5 text-center" style="float: left; width: 30%">
                        <img src="../midia/sensor-icon.png"  style="width: 240px; height: 240px" class="img-responsive center-block" title="Poste">
                    </div>
                    <div class="col-sm-7 slideanim" style="float: left; width: 70%">
                        <div class="row">
                            <form action="/tcc_v1/processamento/processaComponentes.php" method="post">
                                
                                    <?php 
                                    if (isset($_SESSION['nomeComponente'])){
                                        echo '<div class="col-sm-6 form-group" style="font-size: 16px; color: black">';
                                        echo "Componente: <strong>".$_SESSION['nomeComponente']."</strong>"; 
                                        echo "<input type='hidden' value='".$_SESSION['nomeComponente']."' name='componente'>";
                                        echo '</div>';
                                    }else{
                                        echo '<div class="col-sm-6 form-group">';
                                        echo '<p style="color: black">Componente:</p>
                                        <select name="componente" class="form-control" required>';
                                        dropComponente();
                                        echo '</select>';
                                        echo '</div>';
                                    }
                                    ?>
                                <?php
                                    if (isset($_SESSION['vincularExistentes'])){
                                    echo '<div class="col-sm-6 form-group">';
                                    echo '<p style="color: black">Tipo de Dado:</p>
                                    <select name="tipodado" class="form-control" required>';
                                    dropTipoDadoExistente();
                                    echo '</select>';
                                    }
                                    else if (isset($_SESSION['cadastrarTipo'])){//CASO TENHA OPTADO POR INSERIR UM NOVO TIPO DE DADO
                                        echo '<div class="col-sm-6 form-group" style="font-size: 16px; color: black">';
                                        echo "Novo Elemento:";
                                        echo '<input class="form-control" name="novoelemento" placeholder="Elemento" type="text" required>';
                                        echo "to aqui?";
                                    }else{//CASO JA TENHA SELECIONADO UM TIPO JA CADASTRADO
                                        echo '<div class="col-sm-6 form-group" style="font-size: 16px; color: black">';
                                        echo "Elemento: <strong>".$_SESSION['nomeTipoDado']."</strong>";
                                        echo '<input type="hidden" value="'.$_SESSION['nomeTipoDado'].'" name="elemento">';
                                    }
                                    unset($_SESSION['cadastrarTipo']);
                                    unset($_SESSION['nomeTipoDado']);
                                    unset($_SESSION['nomeComponente']);
                                    echo "</div>";
                                    ?>
                                
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Sequencia:</p>
                                    <input class="form-control" name="sequencia" placeholder="Sequencia" type="number" required>
                                    
                                </div>
                                <div class="col-sm-6 form-group">
                                    <p style="color: black">Unidade:</p>
                                    <input class="form-control" name="unidade" placeholder="Unidade" type="text" required>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <p style="color: black">Margem de Erro:</p>
                                    <input class="form-control" name="margem" placeholder="Margem de Erro" type="text" required>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button class="btn btn-default pull-left" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form><p class="fonte_erro" style="color:red">
                                <?php
                                //CASO O USUARIO TENTE CADASTRAR UM LOGIN JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                                if (isset($_SESSION['msgVinculoComponente'])) {
                                    echo $_SESSION['msgVinculoComponente'];
                                    unset($_SESSION['msgVinculoComponente']);
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

