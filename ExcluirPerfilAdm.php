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
            <a class="nav-link" href="HomeAdm.php?id=<?php echo $_SESSION['id'];?>">Home</a>
          </li>
            <li class="col-sm-2">
              <a class="nav-link" href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id'];?>">Página de Perfil</a>
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
                <a href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id'];?>"><?php 
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
                <a class="quicksand-regular2" href="QuemSomosAdm.php">Quem Somos?</a><br><br>
                
                <a class="quicksand-regular2" href="continuarLendoAdm.php">Continuar lendo</a><br><br>
                <a class="quicksand-regular2" href="EditarPerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">Editar Perfil</a><br><br>
                <a class="quicksand-regular2" href="#">Excluir Perfil</a><br><br>
                <a class="quicksand-regular2" href="FerramentasAdm.php">Ferramentas do Administrador</a><br><br>
                <a class="quicksand-regular2" href="logout.php">Sair</a><br><br>
            </div>
            <!--Mensagem que irá aparecer-->
    <div class="container-fluid" id="ExcluirPerfil"><br><br>
      <h1 class="quicksand-regular" id="ExcluirPerfil">Excluir seu perfil no Clube Literário</h1><br><br>
      <form method="post" action="deleteperfil.php?id=<?php echo $_SESSION['id']; ?>" class="quicksand-regular2">
      <h4 class="quicksand-regular">Tem certeza que deseja excluir sua conta?<br>
       Para acessar nosso site após essa ação será necessário realizar um novo cadastro </h4> <br><br>     
        <button type="submit" class="btn btn-primary" value="Submit">Excluir perfil</button><br><br>
      </form>
    </div>