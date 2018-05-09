<?php
session_start();
include_once '../processamento/config.php';
require_once '../estilo/phplot.php';

if (isset($_SERVER['HTTP_REFERER'])) {
    //VERIFICA A VALIDADE DOS DADOS
    if ($_POST['periodo'] == "dia" && empty($_POST['dia'])){
        $_SESSION['erroBuscaGrafico'] = "Informe um dia";
        header($url.'ConsumoEnergetico.php');
    }
    if ($_POST['controlador'] < 0 && $_POST['item'] == "controlador"){
        $_SESSION['erroBuscaGrafico'] = "É preciso cadastrar um controlador";
        header($url.'ConsumoEnergetico.php');
    }
    if ($_POST['plataforma'] < 0 && $_POST['item'] == "plataforma"){
        $_SESSION['erroBuscaGrafico'] = "É preciso cadastrar uma plataforma";
        header($url.'ConsumoEnergetico.php');
    }
    //TRATA A COMBINAÇÃO INFORMADA
    if ($_POST['periodo'] == "dia" && !empty($_POST['dia'])){
        $_SESSION['periodo'] = $_POST['dia'];
        if ($_POST['item'] == "controlador"){
            $_SESSION['exibir'] = 1;
            $_SESSION['item'] = $_POST['controlador'];
        }
        else if ($_POST['item'] == "plataforma"){
            $_SESSION['exibir'] = 2;
            $_SESSION['item'] = $_POST['plataforma'];
        }
    }
    else if ($_POST['periodo'] == "mes"){
        $_SESSION['periodo'] = $_POST['mes'];
        if ($_POST['item'] == "controlador"){
            $_SESSION['exibir'] = 3;
            $_SESSION['item'] = $_POST['controlador'];
        }
        else if ($_POST['item'] == "plataforma"){
            $_SESSION['exibir'] = 4;
            $_SESSION['item'] = $_POST['plataforma'];
        }
    }
    header($url.'ConsumoEnergetico.php#divGrafico');
} else {
    header($_SERVER['REQUEST_URI']);
}
?>