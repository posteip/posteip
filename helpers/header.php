<?php

$requisicao = $_SERVER['REQUEST_URI'];

if ($requisicao == "/tcc_v1/html/Home.php" || $requisicao == "/tcc_v1/html/AutenticacaoUsuario.php") {
    echo '<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
        <link href="../css/fonts/Montserrat.css" rel="stylesheet" type="text/css">
        <link href="../css/fonts/Lato.css" rel="stylesheet" type="text/css">
        <script src="../css/jquery.min.js"></script>
        <script src="../css/bootstrap/bootstrap.min.js"></script>
        <link href="../css/MeuCSS.css" rel="stylesheet" type="text/css">';
} else {
    echo '<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome/css/fontawesome-all.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/w3.css">
  <link href="../css/fonts/Montserrat.css" rel="stylesheet" type="text/css">
  <link href="../css/fonts/Lato.css" rel="stylesheet" type="text/css">
  <script src="../css/jquery.min.js"></script>
  <script src="../css/bootstrap/bootstrap.min.js"></script>
  <link href="../css/MeuCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/fonts/Raleway.css">';
    if ($requisicao == "/tcc_v1/html/CadastroUsuario.php") {
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