<?php
include_once '../processamento/preencherDashboard.php';
if (isset($_SERVER['HTTP_REFERER']) == FALSE || isset($_SESSION['userId']) == FALSE) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php');
}
$longitude = -54.6478;
$latitude = -20.4435;
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
                            <h3><?php echo $qntdItem[0]?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Controladores</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-teal w3-padding-16">
                        <div class="w3-left"><img src="../midia/arduino-icon.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[1];?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Plataformas</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><img src="../midia/poste-icon2.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[2];?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Postes</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-grey w3-text-white w3-padding-16">
                        <div class="w3-left"><img src="../midia/sensor-icon.png" style="width: 50px; height: 50px"></div>
                        <div class="w3-right">
                            <h3><?php echo $qntdItem[3];?></h3>
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
                        var latitude = "<?php echo $latitude;?>";
                        var myCenter = new google.maps.LatLng(latitude,-54.6478);
                        var mapCanvas = document.getElementById("map");
                        var mapOptions = {center: myCenter, zoom: 5};
                        var map = new google.maps.Map(mapCanvas, mapOptions);
                        var marker = new google.maps.Marker({position:myCenter});
                        marker.setMap(map);
                    }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-5FWIitattjt2KqfZcBIJ6tyhmKd3euQ&callback=myMap"></script>
                    
                    <div class="w3-twothird">
                        <h5>Feeds</h5>
                        <table class="w3-table w3-striped w3-white">
                            <tr>
                                <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
                                <td>New record, over 90 views.</td>
                                <td><i>10 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
                                <td>Database error.</td>
                                <td><i>15 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
                                <td>New record, over 40 users.</td>
                                <td><i>17 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
                                <td>New comments.</td>
                                <td><i>25 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
                                <td>Check transactions.</td>
                                <td><i>28 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
                                <td>CPU overload.</td>
                                <td><i>35 mins</i></td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
                                <td>New shares.</td>
                                <td><i>39 mins</i></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="w3-container">
                <h5>General Stats</h5>
                <p>New Visitors</p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
                </div>

                <p>New Users</p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
                </div>

                <p>Bounce Rate</p>
                <div class="w3-grey">
                    <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
                </div>
            </div>
            <hr>

            <div class="w3-container">
                <h5>Countries</h5>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                    <tr>
                        <td>United States</td>
                        <td>65%</td>
                    </tr>
                    <tr>
                        <td>UK</td>
                        <td>15.7%</td>
                    </tr>
                    <tr>
                        <td>Russia</td>
                        <td>5.6%</td>
                    </tr>
                    <tr>
                        <td>Spain</td>
                        <td>2.1%</td>
                    </tr>
                    <tr>
                        <td>India</td>
                        <td>1.9%</td>
                    </tr>
                    <tr>
                        <td>France</td>
                        <td>1.5%</td>
                    </tr>
                </table><br>
                <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
            </div>
            <hr>
            <div class="w3-container">
                <h5>Recent Users</h5>
                <ul class="w3-ul w3-card-4 w3-white">
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Mike</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jill</span><br>
                    </li>
                    <li class="w3-padding-16">
                        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                        <span class="w3-xlarge">Jane</span><br>
                    </li>
                </ul>
            </div>
            <hr>

            <div class="w3-container">
                <h5>Recent Comments</h5>
                <div class="w3-row">
                    <div class="w3-col m2 text-center">
                        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
                    </div>
                    <div class="w3-col m10 w3-container">
                        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
                        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                    </div>
                </div>

                <div class="w3-row">
                    <div class="w3-col m2 text-center">
                        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
                    </div>
                    <div class="w3-col m10 w3-container">
                        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
                    </div>
                </div>
            </div>
            <br>
            <div class="w3-container w3-dark-grey w3-padding-32">
                <div class="w3-row">
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
                        <p>Language</p>
                        <p>Country</p>
                        <p>City</p>
                    </div>
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-red">System</h5>
                        <p>Browser</p>
                        <p>OS</p>
                        <p>More</p>
                    </div>
                    <div class="w3-container w3-third">
                        <h5 class="w3-bottombar w3-border-orange">Target</h5>
                        <p>Users</p>
                        <p>Active</p>
                        <p>Geo</p>
                        <p>Interests</p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center">
                <?php include '../helpers/footer.php';?>
            </div>

            <!-- End page content -->
        </div>
    </body>
</html>

