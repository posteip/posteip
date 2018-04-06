<?php
    if (isset($_SERVER['HTTP_REFERER']) == FALSE){
        header('location:/tcc_v1/html/AutenticacaoUsuario.php');
    }
    session_start();
    include_once '../processamento/preencherDashboard.php';
    $conexao = new Connection();
    $conexao->connect($host, $user, $password, $database);
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include '../helpers/header.php'; ?>
<title>Cadastro de Usuarios</title>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
            <a class="navbar-brand" href="DashboardRoot.php">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Container (Cadastro) -->
    <div id="cadastro" class="container-fluid bg-grey">
      <h2 class="text-center">CADASTRO</h2>
      <div class="row">
          <div class="col-sm-5 text-center" style="float: left; width: 30%">
              <i class="fa fa-user-plus logo" style="color: gray"></i>
        </div>
          <div class="col-sm-7 slideanim" style="float: left; width: 70%">
          <div class="row">
              <form action="/tcc_v1/processamento/processaUsuario.php" method="post">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="nome" placeholder="Nome" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="sobrenome" placeholder="Sobrenome" type="text" required>
            </div>
            <div class="col-sm-12 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          <div class="col-sm-6 form-group">
              <input class="form-control" id="Username" name="usrname" placeholder="Usuario" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
                <input class="form-control" id="UsrPass" name="senha" placeholder="Senha" type="password" required>
            </div><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-default pull-right" type="submit">Enviar</button>
            </div>
            </div>
              </form><p class="fonte_erro" style="color:red">
              <?php
                //CASO O USUARIO TENTE CADASTRAR UM LOGIN JÁ EXISTENTE, UMA MSG DE ERRO APARECERA
                if (isset($_SESSION['erroNomeLogin'])){
                    print "ERRO:".$_SESSION['erroNomeLogin'];
                    unset($_SESSION['erroNomeLogin']);
                }
                ?></p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Listagem de usuários já cadastrados -->
    <div id="cadastrados" class="container-fluid">
      <h2 class="text-center">LISTA</h2><br>
        <div class="row">
            <div class="col-sm-8" style="width: 100%">
            <table>
              <tr>
                  <th style="width: 10%">ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Login</th>
              </tr>
              <?php
                    buscaUsuarios();
              ?>
            </table>
        <!--</div>
            <div class="col-sm-4 text-center" style="width: 25%">
                <span class="glyphicon glyphicon-hdd" style="font-size: 120px" ></span>
        </div>-->
      </div>
    </div>
      
      <div id="excluir" class="container-fluid bg-grey">
          <h2 class="text-center">Excluir</h2><br>
          <div class="row">
            <div class="col-sm-8">
                <form method="POST" action="../processamento/processaUsuario.php">
                <div class="form-group col-sm-6">
                    <input class="form-control" name="exclua" placeholder="Login">
                    <p>Digite o login do usuario a ser excluido</p>
                </div>
                <div class="form-group col-sm-6">
                    <button class="btn btn-default" type="submit">Excluir</button>
                </div>  
                </form>
                <div class="col-sm-12 form-group">
                    <p class="fonte_erro" style="color: red"><?php
                        if (isset($_SESSION['msgDeleteUser'])){
                            print $_SESSION['msgDeleteUser'];
                            unset($_SESSION['msgDeleteUser']);
                        }
                    ?></p>
            </div>
            </div>
            <div class="col-sm-4 text-center" >
                <i class="fa fa-user-times logo" style="color: gray; font-size: 120px"></i>
            </div>
      </div>
          </div>
      </div>  
    
    <div class = "rodapé">
        <p>Desenvolvido por: Mudo, Pedro HCMDS e Lombinha</p>
    </div>  
</body>
</html>
