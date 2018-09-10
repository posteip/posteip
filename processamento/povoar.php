<?php
include_once './Connection.php';
include_once './config.php';
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

//CONSUMO ENERGETICO
for ($idPC = 38; $idPC<65;$idPC++){
    for ($h=0; $h<24;$h++){
        if ($h<10){
            $hora = '0'.$h.':00:00';
        }else{
            $hora = $h.':00:00';
        }
        if ($h> 5 && $h<17){
            $dadoLido = 0;
        }else if ($h == 5 || $h==17){
            $dadoLido = random_int(50, 100);
        }
        else if ($h == 6 || $h == 18){
            $dadoLido = random_int(150, 200);
        }
        else{
            $dadoLido = 250;
        }
        $insereLeitura = "INSERT INTO `leituraDados`(`id_pinoConexao`, `sequencia`, `data`, `hora`, `dado_lido`) VALUES ($idPC, 1, '2018-06-01', '$hora', $dadoLido);";
        echo $insereLeitura.'<br>';
        //$conexao->query($insereLeitura);
    }
}
echo "<h4>FIM</h4>";
?>