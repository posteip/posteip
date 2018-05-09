<?php
    function exibirNav($nome){
        echo '<nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">'.$nome.'</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Cadastro'.$nome.'.php#cadastro">Cadastro</a></li>
                        <li><a href="Gerenciar'.$nome.'.php">Gerenciar</a></li>';
                        if ($nome == "Componentes") {
                            echo '<li><a href="TipoDado.php">Tipo dado</a></li>';
                        } 
                    echo '</ul>
                </div>
            </div>
        </nav>';
    }
    
    function exibirNav2($nome){
        echo '<nav class="w3-bar navbar navbar-default navbar-fixed-top" style="z-index:4;">
            <div class="container">
                <div class="navbar-header">
                    <button class=" navbar-brand w3-bar-item w3-button w3-hide-large w3-hover-none w3-text-white" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>    
                    <a class="navbar-brand">'.$nome.'</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>';
    }
?>

