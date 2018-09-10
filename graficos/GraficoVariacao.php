<?php

session_start();
require "../estilo/phplot.php";
include_once '../processamento/Connection.php';
include_once '../processamento/config.php';
$conexao = new Connection();
$conexao->connect($host, $user, $password, $database);

$titulo = "Luminosidade Artificial";

    $query = 'SELECT dado_lido, DATE_FORMAT(ld.hora, "%H:%i") from leituraDados ld INNER JOIN pinoConexao pc on pc.id = ld.id_pinoConexao INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma INNER JOIN poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id INNER JOIN tipodado td on td.id = ctd.idTipoDado WHERE po.id = ' . $_GET['idPoste'] . ' AND ld.data LIKE "' . $_GET['data'] . '" AND c.nome = "Lum Artificial" ORDER BY ld.hora ASC';
//BUSCA OS VALORES
$conexao->query($query);
$dados = $conexao->fetch_row();
$i = 0;

if ($dados != null) {
    while ($dados != null) {
        $data[$i] = array($dados[1], $dados[0]);
        $i++;
        $dados = $conexao->fetch_row();
    }
} else {
    $_SESSION['graficoVazio'] = "Não foram encontrados registros para o período solicitado";
}

$plot = new PHPlot(1280, 720);
// Organiza Gráfico -----------------------------
$plot->SetTitle($titulo);
$plot->SetTitleFontSize(5);
# Precisão de uma casa decimal
$plot->SetPrecisionY(1);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("linepoints");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);


// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel("");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(3);
$plot->SetAxisFontSize(4);
$plot->SetLineStyles('solid');
$plot->SetLineWidths('6px');
// -----------------------------------------------
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
$plot->SetYLabel("Luminosidade Ariticial (lux)");
// -----------------------------------------------
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>