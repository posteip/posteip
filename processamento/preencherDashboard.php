<?php
    session_start();
    include_once 'config.php';
    include_once 'Connection.php';
    $conexao = new Connection();
    $conexao->connect($host, $user, $password, $database);
    
    //Busca o nome do usuário
    $userId = $_SESSION['userId'];
    $string = "SELECT login FROM usuario WHERE id =".$userId;
    $conexao->query($string);
    $dados = $conexao->fetch_row();
    $userName = $dados[0];
    
     function buscaUsuarios(){
        global $conexao, $dados;
        $string = "SELECT * FROM usuario";
        $conexao->query($string);
        $dados = $conexao->fetch_row();
        while($dados!=null){
            echo "<tr>".
            "<td>$dados[0]</td>".
            "<td>$dados[1]</td>".
            "<td>$dados[2]</td>".
            "<td>$dados[3]</td>".
            "<td>$dados[4]</td>".
            "</tr>";
            $dados = $conexao->fetch_row();
        }
        
    }
    
?>