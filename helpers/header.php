<?php

$requisicao = $_SERVER['REQUEST_URI'];

if ($requisicao == "/tcc_v1/view/Home.php" || $requisicao == "/tcc_v1/view/AutenticacaoUsuario.php") {
    echo '<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../estilo/bootstrap/bootstrap.min.css">
        <link href="../estilo/fonts/Montserrat.css" rel="stylesheet" type="text/css">
        <link href="../estilo/fonts/Lato.css" rel="stylesheet" type="text/css">
        <script src="../estilo/jquery.min.js"></script>
        <script src="../estilo/bootstrap/bootstrap.min.js"></script>
        <link href="../estilo/MeuCSS.css" rel="stylesheet" type="text/css">';
} else {
    echo '<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../estilo/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/font-awesome/css/fontawesome-all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../estilo/w3.css">
  <link href="../estilo/fonts/Montserrat.css" rel="stylesheet" type="text/css">
  <link href="../estilo/fonts/Lato.css" rel="stylesheet" type="text/css">
  <script src="../estilo/jquery.min.js"></script>
  <script src="../estilo/bootstrap/bootstrap.min.js"></script>
  <link href="../estilo/MeuCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../estilo/fonts/Raleway.css">';
    if ($requisicao == "/tcc_v1/view/CadastroUsuario.php") {
        echo'<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    color: black;
}

td, th {
    border: 0px solid #dddddd;	
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
    }
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    </style>';}
    else{
        echo '<style>html,body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}</style>';
    }
    echo '</head>';
}
?>