<?php
session_start();
require "../estilo/phplot.php";
include_once '../processamento/Connection.php';
include_once '../processamento/config.php';
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);


$titulo = "Consumo Energetico";
if (true) { 
    switch ($_GET['exibir']){
        case 1: //DIA E CONTROLADOR
            $titulo = "Consumo Energetico ".$_GET['periodo'];
            $query = 'SELECT SUM(dado_lido), p.descricao from leituraDados ld INNER JOIN pinoConexao pc on pc.id = ld.id_pinoConexao'
            . ' INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma '
            . 'INNER JOIN poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id'
            . ' INNER JOIN tipodado td on td.id = ctd.idTipoDado INNER JOIN controlador co on co.id = p.id_controlador'
            . ' WHERE co.id = '.$_GET['item'].' AND ld.data LIKE "'.$_GET['periodo'].'" AND c.nome = "Medidor" GROUP BY p.descricao';
        BREAK;
        case 2: //DIA E PLATAFORMA
            $titulo = "Consumo Energetico ".$_GET['periodo'];
            $query = 'SELECT dado_lido, po.descricao from leituraDados ld INNER JOIN pinoConexao pc on pc.id = ld.id_pinoConexao'
            . ' INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma '
            . 'INNER JOIN poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id '
            . 'INNER JOIN tipodado td on td.id = ctd.idTipoDado WHERE p.id = '.$_GET['item'].' AND ld.data LIKE "'.$_GET['periodo'].'" AND c.nome = "Medidor"';
        BREAK;
        case 3: //MES E CONTROLADOR
            $titulo = "Consumo Energetico ".$_GET['periodo']."/2018";
            $query = 'SELECT SUM(dado_lido), p.descricao from leituraDados ld INNER JOIN pinoConexao pc on pc.id = ld.id_pinoConexao'
            . ' INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma INNER JOIN'
            . ' poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id INNER JOIN'
            . ' tipodado td on td.id = ctd.idTipoDado INNER JOIN controlador co on co.id = p.id_controlador '
            . 'WHERE co.id = '.$_GET['item'].' AND ld.data LIKE "____-'.$_GET['periodo'].'-__" AND c.nome = "Medidor" GROUP BY p.descricao';
        BREAK;
        case 4: //MES E PLATAFORMA
            $titulo = "Consumo Energetico ".$_GET['periodo']."/2018";
            $query = 'SELECT SUM(dado_lido), po.descricao from leituraDados ld INNER JOIN pinoConexao pc on pc.id = ld.id_pinoConexao'
            . ' INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma INNER JOIN'
            . ' poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id INNER JOIN'
            . ' tipodado td on td.id = ctd.idTipoDado'
            . ' WHERE p.id = '.$_GET['item'].' AND ld.data LIKE "____-'.$_GET['periodo'].'-__" AND c.nome = "Medidor" GROUP BY po.descricao';
        BREAK;
    }
}
//BUSCA OS VALORES
$conexao->query($query);
$dados = $conexao->fetch_row();
$i=0;

while ($dados != null){
    $data[$i] = array($dados[1] , $dados[0]);
    $i++;
    $dados = $conexao->fetch_row();
}

 
$plot = new PHPlot(1000 , 500);     
  // Organiza Gráfico -----------------------------
$plot->SetTitle($titulo);
$plot->SetTitleFontSize(4);
# Precisão de uma casa decimal
$plot->SetPrecisionY(1);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
//MUDANDO AS CORES
//$plot->SetDataColors("cyan");//muda a cor das barras
//$plot->SetBackgroundColor("grey");//muda a cor do fundo
//----------------------------------------------
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel("");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(3);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
$plot->SetYLabel("Consumo Energetico (Wh)");
// -----------------------------------------------
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------

?>