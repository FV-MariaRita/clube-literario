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
  $livros_lidos = $usuario['livros_lidos'];

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
          <a class="col-sm-4">
            <img class="img-fluid" src="./images/LogoSite3.png">
          </a>
          <li class="col-sm-2">
            <a class="nav-link" href="HomeAdm.php">Home</a>
          </li>
            <li class="col-sm-2">
              <a class="nav-link" href="#">Página de Perfil</a>
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
            <div class="col-sm-1">
            <button class="btn btn-outline-secondary" type="submit" id="" onclick="openNav2()"><img id="x2" src="./images/menu.png"></button>
            </div>
       </nav>
            <hr class="linhaHome">
            <br><br>
            <div id="mySidenav2" class="sidenav">
                <a class="quicksand-regular2" href="javascript:void(0)" class="closebtn" onclick="closeNav2()"><img id="fechar" src="./images/fechar.png"></a><br><br>
                <a href="PaginaDePerfilAdm.php?id=<?php echo $id; ?>">
                  <?php 
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
                  ?>
                </a><br>
                <p class="quicksand-regular2"><?php echo $_SESSION['nome']; ?></p><br>
              <form class="form-inline">
              <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><img id="BotaoPesquisa" src="./images/SearchIcon1.png"></button>
              </form>
                <a class="quicksand-regular2" href="QuemSomosAdm.php">Quem Somos?</a><br><br>
                <a class="quicksand-regular2" href="continuarLendoAdm.php">Continuar lendo</a><br><br>
                <a class="quicksand-regular2" href="EditarPerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">Editar Perfil</a><br><br>
                <a class="quicksand-regular2" href="ExcluirPerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">Excluir Perfil</a><br><br>
                <a class="quicksand-regular2" href="FerramentasAdm.php">Ferramentas do Administrador</a><br><br>
                <a class="quicksand-regular2" href="logout.php">Sair</a><br><br>
            </div>
            <!--Informações do perfil-->
        <div class="container-fluid">
            <div class="HeaderUser">
            <?php 
              if($foto==""):
                ?>
                <img  id="ProfilePic1" class= "col-sm-2" src="./images/profile picture.jpg">
              <?php
              endif;
              ?>
              <?php 
              if($foto!=""):
                ?>
                <img  id="ProfilePic1" class= "col-sm-2" src="<?php echo $foto; ?>">
              <?php
              endif;
              ?>
            </div><br><br><br><br>
            <ul>
              <h3 id="x17" class="quicksand-regular"><?php echo $_SESSION['nome']; ?></h3>
            <p id="x17" class="quicksand-regular2">@<?php echo $_SESSION['nomeusuario']; ?></p>
          </ul><br><br>
          <div class="row">
              <div class="col-lg">
                    <h4 id="x21" class="quicksand-regular">Livros lidos:</h4>
                    <h3 id="x21" class="quicksand-regular2"><?php echo $livros_lidos; ?></h3>
                    
             </div><br>
            
              
         </div><br><br>
         <div class="col-lg">
              <h3 id="x17"class="quicksand-regular">Continuar lendo:</h3><br>
              <div id="contLendo" class="card" style="width: 20rem; height:15rem;">
                <div class="card-body">
                  <h5 class="card-title">Livros:</h5><br>
                  <?php 
                  include ('conexao.php');

                  $idUsuario = $_SESSION['id'];
              
                  $sql = "SELECT * FROM leitura WHERE idUsuario = '$idUsuario' ";
                  $enviar = mysqli_query($conexao, $sql);
                  $resultado = mysqli_fetch_all($enviar, MYSQLI_ASSOC);
              
                  foreach ($resultado as $livroespecifico) {
                  $id = $livroespecifico['idLivro'];
                
                  $sql = "SELECT * FROM livro WHERE id = '$id' ";
                  $enviar = mysqli_query($conexao, $sql);
                  $resultado = mysqli_fetch_all($enviar, MYSQLI_ASSOC);

                  foreach ($resultado as $livroespecifico) {
                    $id = $livroespecifico['id'];
                    $nome = $livroespecifico['nome'];
                    $genero = $livroespecifico['genero'];
                    $auto = $livroespecifico['autor'];
                    $ano = $livroespecifico['ano'];
                    $numPag = $livroespecifico['numPaginas'];
                    $isbn = $livroespecifico['ISBN'];
                    $pathcapa = $livroespecifico['capa_path'];
                    $pathlivro = $livroespecifico['livro_path'];
                  ?>
                    <a class="col-lg-3" href="continuarLendoAdm.php"><img id="x6" src="<?php echo $pathcapa; ?>" alt="Livro1"></a><br><br>
                  <?php 
                  }
                }
                ?>
                  <!--<p class="quicksand-regular2">Nome Livro</p>-->
                </div>
              </div>
        </div>
</div>
    <br><br>
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