<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>PosteIP</title>
        <?php include './helpers/header.php';?>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#myPage">PosteIP</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">Sobre</a></li>
                        <li><a href="#SIPAtual">O atual SIP</a></li>
                        <li><a href="#services">Vantagens</a></li>
                        <li><a href="AutenticacaoUsuario.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron text-center">
            <h1>POSTeIP</h1> 
            <p>A inovação em Iluminação Pública</p> 
        </div>

        <!-- Container (About Section) -->
        <div id="about" class="container-fluid">
            <div class="row">
                <div class="col-sm-8">
                    <h2>O que é?</h2><br>
                    <h3>O <b>P</b>rojeto de <b>O</b>timização do <b>S</b>istema e das <b>Te</b>cnologias da <b>I</b>luminação <b>P</b>ública é uma pesquisa acadêmica, incentivada pelo IFMS e pelo CNPq, cujo objetivo é propor um <i>software</i> para gerenciar, de forma inteligente e sustentável, este importante componente de uma cidade</h3>
                    <br>
                </div>
                <div class="col-sm-4 text-center" >
                    <span class="glyphicon glyphicon-info-sign logo" ></span>
                </div>
            </div>
        </div>

        <div id="SIPAtual" class="container-fluid bg-grey">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <span class="glyphicon glyphicon-question-sign logo slideanim" ></span><br><br>
                    <a href="https://drive.google.com/file/d/1pgwsufDceCOrlEKoX_Tmy7-qags0F56s/view?usp=sharing" class="btn btn-default btn-lg text-center" target="_blank">Documento Completo</a>
                </div>
                <div class="col-sm-8 text-justify">
                    <h2>O que pode ser melhorado?</h2>
                    <h4>	No modelo atual, o valor cobrado pelas concessionárias de energia não é pautado no consumo real de energia elétrica proveniente dos Sistemas de Iluminação Pública (SIP), mas sim, em uma estima feita considerando o número de pontos ativos durante determinado período. Segundo a ANEEL (2010, p.23), “para fins de faturamento da energia elétrica destinada à iluminação pública ou à iluminação de vias internas de condomínios, o tempo a ser considerado para consumo diário deve ser de 11 (onze) horas e 52 (cinquenta e dois) minutos”.
                        Tal modo operacional se mostra ineficaz pois desconsidera tanto as luminárias queimadas quanto os diversos tipos de lâmpadas que compõem o SIP, sendo assim, é cobrado o consumo dos postes inativos e ignorada a significante diferença de consumo que pode ocorrer entre dois modelos distintos de lâmpadas. 
                        Além disso, não há um sistema que auxilie a reportar erros que afetam SIP. Tal tarefa cabe a técnicos que precisam percorrer as vias iluminadas para identificar postes com mau funcionamento.
                    </h4>
                </div>
            </div>
        </div>

        <div id="smartCities" class="container-fluid">
            <div class="row">
                <div class="col-sm-8 text-justify">
                    <h2>Solução baseada em Smart Cities</h2><br>
                    <h4>Cidades inteligentes (CI) são projetos nos quais um determinado espaço urbano é palco de experiências de uso intensivo de tecnologias de comunicação e informação sensíveis ao contexto (IoT), de gestão urbana e ação social dirigidos por dados (Data-Driven Urbanism). Esses projetos agregam, portanto, três áreas principais: Internet das Coisas (objetos com capacidades infocomunicacionais avançadas), Big Data (processamento e análise de grandes quantidades de informação) e Governança Algorítmica (gestão e planejamento com base em ações construídas por algoritmos aplicados à vida urbana). O objetivo maior é criar condições de sustentabilidade, melhoria das condições de existência das populações e fomentar a criação de uma economia criativa pela gestão baseada em análise de dados.</h4>

                    <h4>As cidades nunca estiveram tão populosas. Há 200 anos apenas Londres, Tóquio e Pequim tinham mais de um milhão de habitantes. Hoje são 442 metrópoles que bateram os sete dígitos. Mais de metade da população mundial já vive em centros urbanos e, segundo estimativas da ONU, até 2030, esse percentual deve subir para 70%. Com tanta gente aglomerada, surgem problemas — de trânsito, poluição, falta de moradia e acesso à saúde —, mas também inovações — e elas estão cada vez mais hi-tech.</h4>

                    <h4>“Soluções tecnológicas para cidades estão sendo criadas em todos os cantos do mundo, desde por pequenas empresas e indivíduos a multinacionais e governos”, afirma Anthony Townsend, diretor de pesquisa do Instituto para o Futuro, em Palo Alto, Vale do Silício.</h4>
                    <br>
                </div>
                <div class="col-sm-4">
                    <video class="img-responsive" width="560" height="560" controls > <source src = "./midia/Video.mp4"></video>
                </div>
            </div>
        </div>



        <!-- Container (Services Section) -->
        <div id="services" class="container-fluid text-center bg-grey">
            <h2>VANTAGENS</h2>
            <h4>O que pretendemos oferecer</h4>
            <br>
            <div class="row slideanim">
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-piggy-bank logo-small"></span>
                    <h4>ECONOMIA</h4>
                    <p>Ajustando a intesidade que cada luminária fica acessa, pode-se reduzir o gasto de energia diminuindo a potência de funcionamento quando necessário</p>
                </div>
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-lock logo-small"></span>
                    <h4>CONFIANÇA</h4>
                    <p>Ao calcular qual o consumo energético real de cada poste, o valor a ser pago no final do mês será exatamente aquilo que foi gasto pelas lâmpadas</p>
                </div>
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-home logo-small"></span>
                    <h4>COMODIDADE</h4>
                    <p>Com base no monitoramento das falhas ocorridas, o próprio sistema consegue informar onde os reparos são necessários, evitando o disperdício de tempo para encontrá-los</p>
                </div>
            </div><br><br>
        </div>


        <div class="text-center">
            <a href="#myPage" title="To Top">
                <span class="glyphicon glyphicon-chevron-up">Inicio</span>
            </a> 
        </div>

        <div class = "rodapé">
            <h5>POSTe IP - Projeto Incentivado pelo IFMS</h5>
        </div>  
    </body>
</html>

