<?php
if (isset($_SERVER['HTTP_REFERER']) == FALSE) {  
    header($url . 'AutenticacaoUsuario.php');
}
/*if (!isset($_SESSION['userId']) || !isset($_SESSION['userType'])) {
    header('location:/tcc_v1/view/AutenticacaoUsuario.php?force=sim');
}*/
?>
