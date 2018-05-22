<?php

$requisicao = $_SERVER['REQUEST_URI'];

if ($requisicao == "/posteip/Home.php" || $requisicao == "/posteip/AutenticacaoUsuario.php") {
    echo '<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./estilo/bootstrap/bootstrap.min.css">
        <link href="./estilo/fonts/Montserrat.css" rel="stylesheet" type="text/css">
        <link href="./estilo/fonts/Lato.css" rel="stylesheet" type="text/css">
        <script src="./estilo/jquery.min.js"></script>
        <script src="./estilo/bootstrap/bootstrap.min.js"></script>
        <link href="./estilo/MeuCSS.css" rel="stylesheet" type="text/css">';
} else {
    echo '<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./estilo/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="./estilo/font-awesome/css/fontawesome-all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="./estilo/w3.css">
  <link href="./estilo/fonts/Montserrat.css" rel="stylesheet" type="text/css">
  <script src="./estilo/jquery.min.js"></script>
  <script src="./estilo/bootstrap/bootstrap.min.js"></script>
  <link href="./estilo/MeuCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="./estilo/fonts/Raleway.css">
  <style>
        html,body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
        p{color: black}
   </style>
 </head>';
}
?>