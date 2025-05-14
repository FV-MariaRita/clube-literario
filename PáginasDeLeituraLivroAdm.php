<?php
include ('protect.php');

if(isset($_GET['id'])) {
  $id = intval($_GET['id']);

  include('conexao.php');

  $sql = "SELECT * FROM livro WHERE id=$id";
  $query  = mysqli_query($conexao, $sql);

  if(mysqli_num_rows($query) > 0){
    $livroespecifico = mysqli_fetch_assoc($query);

    $id = $livroespecifico['id'];
    $nome = $livroespecifico['nome'];
    $genero = $livroespecifico['genero'];
    $autor = $livroespecifico['autor'];
    $ano = $livroespecifico['ano'];
    $numPag = $livroespecifico['numPaginas'];
    $isbn = $livroespecifico['ISBN'];
    $isbn = $livroespecifico['nacionalidade'];
    $isbn = $livroespecifico['sinopse'];
    $pathcapa = $livroespecifico['capa_path'];
    $pathlivro = $livroespecifico['livro_path'];

    $idUsuario = $_SESSION['id'];
    $sql = "SELECT * FROM leitura WHERE idLivro = '$id' AND idUsuario = '$idUsuario' ";
    $query = mysqli_query($conexao, $sql);
    if(mysqli_num_rows($query) == 0) {
      $sql = "INSERT INTO leitura (idLivro, idUsuario) VALUES ('$id', '$idUsuario')";
      $query = mysqli_query($conexao, $sql);
    }   
    

  } else {
    echo "Livro não encontrado!";
  }

  

}
?>
<!DOCTYPE html>
<html lang="pt-br">
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

    <title>Página de leitura - Nome do livro</title>

</head>
<body>
        <body class="bodyRoxo">
            <nav class="container-fluid">
              <ul class="row">
                <a class="col-sm-4">
                  <img class="img-fluid" src="./images/LogoSite3.png">
                </a>
                <li class="col-sm-2">
                  <a class="nav-link" href="HomeAdm.php">Home</a>
                </li>
                  <li class="col-sm-2">
                    <a class="nav-link" href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">Página de Perfil</a>
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
                    <button class="btn btn-outline-secondary" type="submit" id="" onclick="openNav()"><img id="x2" src="./images/menu.png"></button>
                  </div>
                  
                </ul>
            </nav>
            <hr class="linhaHome"><br><br><br>
            <div class="container-fluid">
                <div id="DivPags" style="height:100vh;" class="col-sm-6"> 
                  <iframe height="100%" width=100% src="<?php echo $pathlivro; ?>"></iframe> 
                </div><br><br>
                <form action="finalizarLeitura.php?id=<?php echo  $id; ?>" method = "post">
                <button type = "submit" name = "Submit"  class="btn btn-primary">Finalizar leitura</button><br><br>
                </form>

    
              <div id="mySidenav" class="sidenav">
                    <a class="quicksand-regular2" href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img id="fechar" src="./images/fechar.png"></a><br><br>
                    <a href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">
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
                    ?></a><br>
                    <p class="quicksand-regular2"><?php echo $_SESSION['nome']; ?></p><br>
                    <form class="form-inline">
                    <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><img id="BotaoPesquisa" src="./images/SearchIcon1.png"></button>
                    </form>
                    <a class="quicksand-regular2" href="QuemSomosAdm.php">Quem Somos?</a><br><br>
                    <a class="quicksand-regular2" href="continuarLendoAdm.php">Continuar lendo</a><br><br>
                    <a class="quicksand-regular2" href="FerramentasAdm.php">Ferramentas do Administrador</a><br><br>
                    <a class="quicksand-regular2" href="logout.php">Sair</a><br><br>
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