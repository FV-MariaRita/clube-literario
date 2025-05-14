<?php
session_start();
include('protect.php');
include('conexao.php');
$id = intval($_GET['id']);

$sql_code = "SELECT * FROM usuarios WHERE id='$id'";
$sql_query = mysqli_query($conexao, $sql_code) or die($mysqli->error);
$resultado = mysqli_fetch_all($sql_query, MYSQLI_ASSOC);

foreach ($resultado as $usuario){
  $nome = $usuario['nome'];
  $nomeusuario = $usuario['nomedeusuario'];
  $email = $usuario['email'];
  $dataNasc = $usuario['dataNasc'];
  $foto = $usuario['foto_path'];

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/IconSite.png">
    <link rel='stylesheet' href="bootstrap-grid.css">
    <link rel='stylesheet' href="styles1.css">
    <link rel='stylesheet' href="bootstrap copy2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Ahom&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="ClubeLiterarioProjetoFinal2.js"></script>
    <script type="text/javascript" src="bootstrap.bundle.min.js" ></script>
    
    <title>Perfil</title>
</head>
<body class="bodyPP">
    <nav class="container-fluid">
        <ul class="row">
          <a class="col-sm-3">
            <img class="img-fluid" src="./images/LogoSite3.png">
          </a>
          <li class="col-sm-2">
            <a class="nav-link" href="Home.php">Home</a>
          </li>
            <li class="col-sm-2">
              <a class="nav-link" href="PaginaDePerfil.php?id=<?php echo $_SESSION['id'];?>">Página de Perfil</a>
            </li>
            <li class="col-sm-2">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gêneros
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Romance</a></li>
                <li><a class="dropdown-item" href="#">Ficção centífica</a></li>
                <li><a class="dropdown-item" href="#">Comédia Romântica</a></li>
                <li><a class="dropdown-item" href="#">Biografia</a></li>
                <li><a class="dropdown-item" href="#">Terror</a></li>
                <li><a class="dropdown-item" href="#">Aventura</a></li>
                <li><a class="dropdown-item" href="#">Comédia</a></li>
                <li><a class="dropdown-item" href="#">Suspense</a></li>
                <li><a class="dropdown-item" href="#">Mistério</a></li>

              </ul>
            </li>
            <!--Botão da nav lateral-->
            <div class="col-sm-1">
            <button class="btn btn-outline-secondary" type="submit" id="" onclick="openNav2()"><img id="x2" src="./images/menu.png"></button>
            </div>
      </nav>
            <hr class="linhaHome">
            <br><br>
            <!--Nav lateral (diferente da nav do home, por isso há o número 2)-->
            <div id="mySidenav2" class="sidenav">
                <a class="quicksand-regular2" href="javascript:void(0)" class="closebtn" onclick="closeNav2()"><img id="fechar" src="./images/fechar.png"></a><br><br>
                <a href="PaginaDePerfil.php?id=<?php echo $_SESSION['id'];?>"><?php 
                  if($foto==""):
                  ?>
                    <img id="ProfilePicNav" src="./images/profile picture.jpg" class="rounded-circle me-3" alt="User Avatar">
                  <?php 
                  endif;
                  ?>
                  <?php 
                  if($foto!=""):
                  ?>
                    <img id="ProfilePicNav" src="<?php echo $foto; ?>" class="rounded-circle me-3" alt="User Avatar">
                  <?php 
                  endif;
                  ?></a><br>
                <p class="quicksand-regular2"><?php echo $_SESSION['nome']; ?></p><br>
              <form class="form-inline">
              <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><img id="BotaoPesquisa" src="./images/SearchIcon1.png"></button>
              </form>
                <a class="quicksand-regular2" href="QuemSomos.php">Quem Somos?</a><br><br>
                <a class="quicksand-regular2" href="continuarLendo.php">Continuar lendo</a><br><br>
                <a class="quicksand-regular2" href="#">Editar Perfil</a><br><br>
                <a class="quicksand-regular2" href="ExcluirPerfil.php?id=<?php echo $_SESSION['id']; ?>">Excluir Perfil</a><br><br>
                <a class="quicksand-regular2" href="logout.php">Sair</a><br><br>
            </div>
        <!--Divs para editar perfil-->
        <h1 id="x10" class="quicksand-regular">Editar perfil:</h1>
        <!-- Mensagens de email existe / usuario  existe / alterações salvas-->
        <?php 
        if(isset($_SESSION['usuarioNovo_existe'])):
        ?>  
        <div class="usuarioNovo_existe">   
            <h5 class="quicksand-regular">O nome de usuário inserido já existe no sistema<br>Tente novamente</h5>
        </div>
        <?php 
        endif;
        unset($_SESSION['usuarioNovo_existe'])
        ?>

        <?php 
        if(isset($_SESSION['emailNovo_existe'])):
        ?>  
        <div class="emailNovo_existe">   
            <h5 class="quicksand-regular">O email inserido já existe no sistema<br>Tente novamente</h5>
        </div>
        <?php 
        endif;
        unset($_SESSION['emailNovo_existe'])
        ?>

        <?php 
        if(isset($_SESSION['status_alterarPerfil'])):
        ?>  
        <div class="status_alterarPerfil">   
            <h5 class="quicksand-regular">Perfil alterado com sucesso!<br>Saia do site e faça login novamente parq as alterações serem carregadas</a></h5>
        </div>
        <?php 
        endif;
        unset($_SESSION['status_alterarPerfil'])
        ?>
        <div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header"><h3 class="quicksand-regular">Detalhes da conta:</h3></div>
                <div class="card-body">
                    <form method="post" action="alterarperfil.php?id=<?php echo $_SESSION['id']; ?>" enctype="multipart/form-data">                    
                            <div class="mb-3">
                                <label  class="quicksand-regular2" for="novoNomeUsuario">@nomedeusuario (como seu nome aparecerá no seu perfil)</label><br><br>
                                <input  class="form-control" id="novoNomeUsuario" type="text" placeholder="Enter your username" value="username" name="novoNomeUsuario">
                            </div><br>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="quicksand-regular2" for="novoNome">Nome:</label>
                                <input class="form-control" id="novoNome" type="text" placeholder="Nome:" name="novoNome">
                            </div>
                            <div class="col-md-6">
                                <label class="quicksand-regular2" for="email">Endereço de e-mail:</label><br>
                                <input class="form-control" id="email" type="text" placeholder="nome@email.com"  name="novoEmail">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="mb-3">
                                <label class="quicksand-regular2" for="senha">Nova senha:</label><br><br>
                                <input type="password" class="form-control" name="novaSenha" id="senha" placeholder="senha"></button>
                            </div>
                        </div>
                        
                    <br>
                        <div id="cardHeaderProfile" class="card-header"><h4 class=quicksand-regular>Foto de Perfil (somente com a extensão .png)</h4></div>
                            <div class="card-body text-center">
                                <img id="ProfilePic2" src="./images/profile picture.jpg"><br><br>
                                <!-- Botão para dar upload na foto de perfil-->
                                <input type="file" class="btn btn-primary" name="novaFoto" id="novaFoto"></button><br><br>
                                <button id="x10" class="btn btn-primary" type="submit" name="submit">Salvar mudanças</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      <!--footer-->
<footer class="container-fluid"><br>
        <h3 class="quicksand-regular">
          Informações gerais:
        </h3><br>
        <h5 class="quicksand-regular">
          Contato:
        </h5>
        <p  class="quicksand-regular2">
          <img id="iconRedes" src="./images/whatsapp.png">  (21)91989-1304
        </p><br>
        <p  class="quicksand-regular2">
          <img id="iconRedes" src="./images/google.png">  clubeliterario@gmail.com
        </p><BR>
        <h5   class="quicksand-regular">
          Redes sociais:
        </h5>
        <p class="quicksand-regular2">
          <img id="iconRedes" src="./images/x-social-media-round-icon.png">  @Clube_literario
        </p><br>
        <p  class="quicksand-regular2">
          <img id="iconRedes" src="./images/Instagram.png">  @Clubeliterarioficial
        </p><br>
        <h5 class="quicksand-regular">
          Endereço: 
        </h5>
        <p class="quicksand-regular2">Bairro, rua e número.</p><br>
      </footer>
    
</body>
</html>