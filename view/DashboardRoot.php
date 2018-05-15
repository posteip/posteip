<?php
include_once '../processamento/preencherDashboard.php';
include_once '../helpers/verificaLogin.php';
include_once '../processamento/Connection.php';
include_once '../processamento/config.php';
$idTela = null;



?>
<!DOCTYPE html>
<html>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../estilo/w3.css">
    <link rel="stylesheet" href="../estilo/fonts/Raleway.css">
    <link rel="stylesheet" href="../estilo/font-awesome/css/fontawesome-all.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    </style>
    <body class="w3-light-grey">
        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4;">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <a href="Home.html"><span class="w3-bar-item w3-right">POSTeIP</span></a>
        </div>

        <?php include '../helpers/MenuNavegacao.php'; ?>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-tachometer-alt"></i> My Dashboard</b></h5>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><img src="../midia/rasp-icon.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[0] ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Controladores</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-teal w3-padding-16">
                        <div class="w3-left"><img src="../midia/arduino-icon.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[1]; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Plataformas</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><img src="../midia/poste-icon2.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[2]; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Postes</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-grey w3-text-white w3-padding-16">
                        <div class="w3-left"><img src="../midia/sensor-icon.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[3]; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Sensores/Atuadores</h4>
                    </div>
                </div>
            </div>

            <div class="w3-panel">
                <div class="w3-row-padding" style="margin:0 -16px"><br><br>
                    <div id="map" style="width:100%;height:500px;"></div>
                    <script>
                            function myMap() {
                            var myCenter = new google.maps.LatLng(-20.441962, -54.875053);
                            var mapCanvas = document.getElementById("map");
                            var mapOptions = {center: myCenter, zoom: 12};
                            var map = new google.maps.Map(mapCanvas, mapOptions);
                            <?php
                            $item = ["controlador", "plataforma", "poste"];
                            for ($j=0;$j<3;$j++){
                            $query = "SELECT * from ".$item[$j];
                            $conexao = new Connection();
                            $conexao->connect($host, $user, $password, $database);
                            $conexao->query($query);
                            $dados = $conexao->fetch_assoc();
                            if ($dados != null) {
                                $n = $conexao->num_rows();
                            }
                            $i = 0;
                            
                            while ($i<$n){?>
                                tipoMarker = <?php echo $j?>    
                                var latitude = <?php echo $dados['latitude'] ?>;
                                var longitude = <?php echo $dados['longitude'] ?>;
                                var posi = new google.maps.LatLng(latitude, longitude);
                                if (tipoMarker == 0){//Controlador
                                    var marker = new google.maps.Marker({
                                    position: posi,
                                    label: "C", });
                                }else if (tipoMarker == 1){//Plataforma
                                    var marker = new google.maps.Marker({
                                    position: posi,
                                    icon: 'green2.png'});
                                }
                                else {//POSTE
                                    var marker = new google.maps.Marker({
                                    position: posi,
                                    icon: 'streetLamp1.png'});
                                }
                                marker.setMap(map);
                                var infowindow = new google.maps.InfoWindow({
                                    content: "<?php echo $dados['descricao']?>"
                                });
                                infowindow.open(map, marker);
                            <?php $i++;$dados = $conexao->fetch_assoc();}}?>
                        }

                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-5FWIitattjt2KqfZcBIJ6tyhmKd3euQ&callback=myMap"></script>
                </div>
            </div>
            <!-- Footer -->
            <div style="text-align: center;">
                <?php include '../helpers/footer.php'; ?>
            </div>
            <!-- End page content -->
        </div>
    </body>
</html>

