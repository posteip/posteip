<?php
include_once  '../processamento/preencherDashboard.php';
echo '<!-- Sidebar/menu -->';
if (($_SERVER['REQUEST_URI'] == "/tcc_v1/view/DashboardRoot.php")) {
    echo '<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>';
}else{
    echo '<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;padding-top:30px" id="mySidebar"><br>';
}
  echo '<div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../midia/Usuario.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Bem vindo, <strong>' . $userName . '</strong></span><br>
      <a href="/tcc_v1/processamento/processaUsuario.php?sair=sim" class="w3-bar-item w3-button"><i class="fa fa-sign-out-alt" title="SAIR"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>';
if ($tipoUsuario == 1){
    if (($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroUsuario.php")) {
        echo'<a href="CadastroUsuario.php" class="w3-bar-item w3-button w3-blue"><i class="fa fa-user-plus" title="Usuários"></i></a>';
    } else {
        echo '<a href="CadastroUsuario.php" class="w3-bar-item w3-button"><i class="fa fa-user-plus" title="Usuários"></i></a>';
    }
}
echo'</div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Menu de Navegação</h5>
  </div>
  <div class="w3-bar-block">
  <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
  </div>
  <div class="w3-container">
    <h6><strong>Funcionalidades</strong></h6>
  </div>
  <div class="w3-bar-block">';
//DASHBOARD
if (($_SERVER['REQUEST_URI'] == "/tcc_v1/view/DashboardRoot.php")) {
    echo '<a href="DashboardRoot.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-map fa-fw"></i>  Visão Geral</a>';
} else {
    echo '<a href="DashboardRoot.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-map fa-fw"></i>  Visão Geral</a>';
}
echo'<a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bolt fa-fw"></i>  Consumo Energético</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-lightbulb fa-fw"></i>  Lâmpadas Acessas/Apagadas</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chart-bar fa-fw"></i>  Variação de Intensidade</a>
  </div>';
   //MOSTRA AS FERRAMENTAS EXCLUSIVAS DO ADMINISTRADOR 
if ($tipoUsuario == 1){
   echo'
  <div class="w3-container">
    <h6><strong>Ferramentas Administrativas</strong></h6>
  </div>
  <div class="w3-bar-block">';
    //CADASTRO CONTROLADORES
    if($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroControladores.php" || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/GerenciarControladores.php") {
        echo '<a href="CadastroControladores.php" class="w3-bar-item w3-button w3-padding w3-blue"><img src="../midia/rasp-icon.png" class="fa-fw">  Controladores Centrais</a>';
    }else{
        echo '<a href="CadastroControladores.php" class="w3-bar-item w3-button w3-padding"><img src="../midia/rasp-icon.png" class="fa-fw">  Controladores Centrais</a>';
    }
    //CADASTRO DE PLATAFORMAS
    if(($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroPlataformas.php") || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/GerenciarPlataformas.php"){
        echo '<a href="CadastroPlataformas.php" class="w3-bar-item w3-button w3-padding w3-blue"><img src="../midia/arduino-icon.png" class="fa-fw">  Plataformas</a>';
    }
    else{
        echo '<a href="CadastroPlataformas.php" class="w3-bar-item w3-button w3-padding"><img src="../midia/arduino-icon.png" class="fa-fw">  Plataformas</a>';
    }
    //POSTES
    if(($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroPostes.php") || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/GerenciarPostes.php"){
        echo '<a href="CadastroPostes.php" class="w3-bar-item w3-button w3-padding w3-blue"><img src="../midia/poste-icon2.png" class="fa-fw">  Postes</a>';
    }
     else {
         echo '<a href="CadastroPostes.php" class="w3-bar-item w3-button w3-padding"><img src="../midia/poste-icon2.png" class="fa-fw">  Postes</a>';
    }
    //COMPONENTES
    if ($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroComponentes.php" || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/GerenciarComponentes.php" || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/TipoDado.php"){
        echo '<a href="CadastroComponentes.php" class="w3-bar-item w3-button w3-padding w3-blue"><img src="../midia/sensor-icon.png" class="fa-fw">  Sensores</a>';
    }else{
        echo '<a href="CadastroComponentes.php" class="w3-bar-item w3-button w3-padding"><img src="../midia/sensor-icon.png" class="fa-fw">  Sensores</a>';
    }
    //CONEXOES
    if(($_SERVER['REQUEST_URI'] == "/tcc_v1/view/CadastroConexoes.php") || $_SERVER['REQUEST_URI'] == "/tcc_v1/view/GerenciarConexoes.php"){
        echo '<a href="CadastroConexoes.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-code-branch fa-fw"></i>  Conexoes</a>';
    }
     else {
         echo '<a href="CadastroConexoes.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-code-branch fa-fw"></i>  Conexoes</a>';
    }
    echo '<br><br>
    </div>';
}
echo '</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    //Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === "block") {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = "block";
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
</script>';

?>
