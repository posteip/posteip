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

function tabelaControladores(){
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

function tabelaPlataformas($filtro){
    if ($filtro > 0){
        $query = "SELECT controlador.nome, plataforma.id, plataforma.id_controlador, plataforma.latitude, plataforma.longitude, plataforma.data_instalacao, plataforma.descricao, plataforma.status FROM plataforma, controlador WHERE plataforma.id_controlador = ".$filtro." AND plataforma.id_controlador = controlador.id";
    }else{
        $query = "SELECT controlador.nome, plataforma.id, plataforma.id_controlador, plataforma.latitude, plataforma.longitude, plataforma.data_instalacao, plataforma.descricao, plataforma.status FROM plataforma, controlador WHERE plataforma.id_controlador = controlador.id";
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

?>