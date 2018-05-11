<?php
include_once "../processamento/Connection.php";
include_once "../processamento/config.php";
$conexaoT = new Connection();
$conexaoT->connect($host, $user, $password, $database);

function buscaUsuarios() {
    global $conexaoT;
    $string = "SELECT * FROM usuario";
    $conexaoT->query($string);
    $dados = $conexaoT->fetch_row();
    while ($dados != null) {
        if ($dados[3] == 1)$isAdm = "Sim";else$isAdm = "Nao";
        echo "<tr>" .
        "<td>$dados[0]</td>" .
        "<td>$dados[1]</td>" .
        "<td>$dados[2]</td>" .
        "<td>$isAdm</td>" .
        "<td>$dados[4]</td>" .
        "<td>$dados[5]</td>" .
        "<td><a href='/tcc_v1/processamento/processaUsuario.php?id=$dados[0]' class='w3-red btn btn-default'><i class='fa fa-trash'></i> Excluir</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_row();
    }
    $conexaoT->close();
    unset($conexaoT);
}

function buscaTipoDado() {
    global $conexaoT;
    $string = "SELECT idTipoDado, elemento, COUNT(*) FROM `componente_tipodado`, `tipodado` WHERE tipodado.id = componente_tipodado.idTipoDado GROUP BY (idTipoDado)";
    $conexaoT->query($string);
    $dados = $conexaoT->fetch_row();
    while ($dados != null) {
        echo "<tr>" .
        "<td>$dados[0]</td>" .
        "<td>$dados[1]</td>" .
        "<td>$dados[2]</td>" .
        "<td><a href='/tcc_v1/processamento/processaTipoDado.php?up=$dados[0]&elemento=$dados[1]' class='btn btn-default'><i class='fa fa-edit'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_row();
    }
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaGerenciarControladores(){
    global $conexaoT;
    $query = "SELECT * FROM controlador";
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_row();
    while ($dados != null){
        if ($dados[5]==1){
            $status='Ativado';
            $acao='Desativar';
        }else{
            $status='Desativado';
            $acao='Ativar';
        }
        echo "<tr>" .
        "<td>$dados[1]</td>" .
        "<td>$dados[2]</td>" .
        "<td>$dados[3]</td>" .
        "<td>$dados[4]</td>" .
        "<td>$status</td>" .
        "<td><a href='/tcc_v1/processamento/processaControlador.php?id=$dados[0]&acao=$acao' class='btn btn-default'><i class='fa fa-power-off'></i> $acao</a>" .
        "<a href='/tcc_v1/processamento/processaControlador.php?id=$dados[0]&up=sim' class='btn btn-default'><i class='fa fa-pencil-alt'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_row();
    }
    echo '</table>';
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaGerenciarPlataformas($filtro){
    if ($filtro > 0){
        $query = "SELECT c.nome, p.id, p.id_controlador, p.latitude, p.longitude, DATE_FORMAT(p.data_instalacao,'%d-%m-%Y') as data_instalacao, p.descricao, p.status FROM plataforma p, controlador c WHERE p.id_controlador = ".$filtro." AND p.id_controlador = c.id";
    }else{
        $query = "SELECT c.nome, p.id, p.id_controlador, p.latitude, p.longitude, DATE_FORMAT(p.data_instalacao,'%d-%m-%Y') as data_instalacao, p.descricao, p.status FROM plataforma p, controlador c WHERE p.id_controlador = c.id";
    }
    global $conexaoT;
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_assoc();
    while ($dados != null){
        if ($dados['status']==1){
            $status='Ativado';
            $acao='Desativar';
        }else{
            $status='Desativado';
            $acao='Ativar';
        }
        echo "<tr>" .
        "<td>".$dados['descricao']."</td>" .
        "<td>".$dados['latitude']."</td>" .
        "<td>".$dados['longitude']."</td>" .
        "<td>".$dados['data_instalacao']."</td>" .
        "<td>$status</td>" .
        "<td>".$dados['nome']."</td>" .
        "<td><a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&acao=$acao' class='btn btn-default'><i class='fa fa-power-off'></i> $acao</a>" .
        "<a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&up=sim' class='btn btn-default'><i class='fa fa-pencil-alt'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_assoc();
    }
    echo '</table>';
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaGerenciarPostes(){
    global $conexaoT;
    $query = "SELECT * FROM poste";
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_assoc();
    while ($dados != null){
        echo "<tr>" .
        "<td>".$dados['descricao']."</td>" .
        "<td>".$dados['latitude']."</td>" .
        "<td>".$dados['longitude']."</td>" .
        "<td>".$dados['data_instalacao']."</td>" .
        "<td><a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&up=sim' class='btn btn-default'><i class='fa fa-pencil-alt'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_assoc();
    }
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaGerenciarComponentes(){
    global $conexaoT;
    $query = "SELECT c.id, c.nome, c.tipo, ct.sequencia, td.elemento, ct.unidade, ct.margemErro FROM componente_tipodado ct, componente c, tipodado td WHERE ct.idComponente = c.id and ct.idTipoDado = td.id ORDER BY c.id DESC";
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_assoc();
    while ($dados != null){
        echo "<tr>" .
        "<td>".$dados['nome']."</td>" .
        "<td>".$dados['tipo']."</td>" .
        "<td>".$dados['sequencia']."</td>" .
        "<td>".$dados['elemento']."</td>" .
        "<td>".$dados['unidade']."</td>" .
        "<td>".$dados['margemErro']."</td>" .
        "<td><a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&up=sim' class='btn btn-default'><i class='fa fa-pencil-alt'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_assoc();
    }
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaGerenciarConexoes(){
    global $conexaoT;
    $query = "SELECT * from pinoConexao";
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_assoc();
    while ($dados != null){
        if ($dados['status']==1){
            $status='Ativado';
            $acao='Desativar';
        }else{
            $status='Desativado';
            $acao='Ativar';
        }
        echo "<tr>" .
        "<td>".$dados['id_plataforma']."</td>" .
        "<td>".$dados['id_poste']."</td>" .
        "<td>".$dados['id_componente']."</td>" .
        "<td>".$dados['pino']."</td>" .
        "<td>".$status."</td>" .
        "<td><a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&acao=$acao' class='btn btn-default'><i class='fa fa-power-off'></i> $acao</a>" .
        "<a href='/tcc_v1/processamento/processaPlataforma.php?id=".$dados['id']."&up=sim' class='btn btn-default'><i class='fa fa-pencil-alt'></i> Editar</a></td>" .
        "</tr>";
        $dados = $conexaoT->fetch_assoc();
    }
    $conexaoT->close();
    unset($conexaoT);
}

function tabelaLampadasAcessas($idP, $data, $hora){
    global $conexaoT;
    $query = "SELECT po.descricao, po.latitude, po.longitude, ld.dado_lido, ctd.unidade, po.id FROM leituraDados ld INNER JOIN pinoConexao pc ON ld.id_pinoConexao = pc.id INNER JOIN componente c on c.id = pc.id_componente INNER JOIN plataforma p on p.id = pc.id_plataforma INNER JOIN poste po on po.id = pc.id_poste INNER JOIN componente_tipodado ctd on ctd.idComponente = c.id INNER JOIN tipodado td on td.id = ctd.idTipoDado WHERE p.id = $idP AND ld.data LIKE '$data' AND ld.hora LIKE '$hora' AND c.nome LIKE 'Lum Artificial'";
    $conexaoT->query($query);
    $dados = $conexaoT->fetch_assoc();
    while ($dados != null){
        if ($dados['dado_lido']==0){
            $status='Apagado';
        }else{$status='Acesso';}
        echo "<tr>" .
        "<td>".$dados['descricao']."</td>" .
        "<td>Lat: ".$dados['latitude']." | Long: ".$dados['longitude']."</td>" .
        "<td>".$status."</td>" .
        "<td>".$dados['dado_lido']." ".$dados['unidade']."</td>" .
        "<td><a href='VariacaoIntensidade.php?id=".$dados['id']."&desc=".$dados['descricao']."&data=$data&exibir' class='btn btn-default'><i class='fa fa-chart-bar'></i> Variação</a></td>" .
        "<tr>";
        $dados = $conexaoT->fetch_assoc();
    }
    $conexaoT->close();
    unset($conexaoT);
}
?>