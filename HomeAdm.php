<?php
session_start();
include('protect.php');
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clube literário - Home</title>
    <link rel="icon" type="image/x-icon" href="./images/IconSite.png">
    <link rel='stylesheet' href="bootstrap-grid.css">
    <link rel='stylesheet' href="styles1.css">
    <link rel='stylesheet' href="bootstrap copy2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Ahom&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="ClubeLiterarioProjetoFinal2.js"></script>
    <script type="text/javascript" src="bootstrap.bundle.min.js" ></script>
</head>
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
                <li><a class="dropdown-item" href="#">Drama</a></li> 
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
        <hr class="linhaHome">
        <br><br>
        <h1 class="quicksand-regular">Bem vindo ao Clube Literario, <?php echo $_SESSION['nome']; ?></h1><br>
        <!--Carrossel de fotos-->
        <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="container-fluid">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img id="x5" src="./images/Harry Potter banner.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./images/2.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./images/4.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./images/5.png" class="d-block w-100" alt="...">
              </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div><br><br>
        <!--Nav lateral (coloquei aqui pois o carrossel estava atrapalhando)-->
            <div id="mySidenav" class="sidenav">
              <a class="quicksand-regular2" href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img id="fechar" src="./images/fechar.png"></a><br><br>
              <a href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">
                <img id="ProfilePicNav" src="./images/profile picture.jpg" class="rounded-circle me-3" alt="User Avatar">
              </a><br>
              <p class="quicksand-regular2"><?php echo $_SESSION['nome']; ?></p><br>
              <form class="form-inline" action="pesquisaAdm.php" method="get">
              <input class="form-control col-sm-10" type="search" placeholder="Search" aria-label="Search" name="busca">
              <button class="btn btn-outline-success" type="submit"><img id="BotaoPesquisa" src="./images/SearchIcon1.png"></button>
              </form>
              <a class="quicksand-regular2" href="QuemSomosAdm.php">Quem Somos?</a><br><br>
              <a class="quicksand-regular2" href="continuarLendoAdm.php">Continuar lendo</a><br><br>
            
              <a class="quicksand-regular2" href="FerramentasAdm.php">Ferramentas do Administrador</a><br><br>
              <a href="logout.php" class="quicksand-regular2">Sair</a><br><br>
            </div>
      <!--Fim nav lateral-->
        <!--Catálogo de livros-->
        <div class="container-fluid" id="divLivros"><br>
          <div id="divLiv" class="container-fluid">
            <h1 class="quicksand-regular">
              Livros
            </h1>
          </div><br>
          <ul class="row sm-3">
          <h3 id="x17" class="quicksand-regular">
            Filtros:
          </h3>
          <form class="row gx-3 mb-6" method="get" action="pesquisaAdm.php">
            <li class="col-sm-2">
                <a id="TamanhoFilt" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gêneros
                </a>
                <ul class="dropdown-menu">
                  <label for="romance" class="dropdown-item">Romance</label>
                  <input type="radio" class="dropdown-item" id="romance" name="genero" value="Romance" style="text-align: justify">
                  <label for="ficcient" class="dropdown-item">Ficção Científica</label>
                  <input type="radio" class="dropdown-item" id="ficcient" name="genero" value="Ficção Científica">
                  <label for="poesia" class="dropdown-item">Poesia</label>
                  <input type="radio" class="dropdown-item" id="poesia" name="genero" value="Poesia">
                  <label for="fantasia" class="dropdown-item">Fantasia</label>
                  <input type="radio" class="dropdown-item" id="biogradia" name="genero" value="Fantasia">
                  <label for="drama" class="dropdown-item">Drama</label>
                  <input type="radio" class="dropdown-item" id="drama" name="genero" value="Drama">
                  <label for="terror" class="dropdown-item">Terror</label>
                  <input type="radio" class="dropdown-item" id="terror" name="genero" value="Terror">
                  <label for="aventura" class="dropdown-item">Aventura</label>
                  <input type="radio" class="dropdown-item" id="aventura" name="genero" value="Aventura">
                  <label for="comedia" class="dropdown-item">Comédia</label>
                  <input type="radio" class="dropdown-item" id="comedio" name="genero" value="Comédia">
                  <label for="suspense" class="dropdown-item">Suspense</label>
                  <input type="radio" class="dropdown-item" id="suspense" name="genero" value="Suspense">
                  <label for="misterio" class="dropdown-item">Mistério</label>
                  <input type="radio" class="dropdown-item" id="misterio" name="genero" value="Mistério">
                </ul>
              </li>
              <li class="col-sm-2">
                <a id="TamanhoFilt" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nacionalidade
                </a>
                <ul class="dropdown-menu">
                <label for="nacional" class="dropdown-item">Nacional</label>
                <input type="radio" class="dropdown-item" id="nacional" name="nacionalidade" value="Nacional" style="text-align: justify">
                <label for="internacional" class="dropdown-item">Internacional</label>
                <input type="radio" class="dropdown-item" id="romance" name="nacionalidade" value="Internacional" style="text-align: justify">
              </ul>
              </li>
              <li class="col-sm-2">
                <a id="TamanhoFilt" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Ano
                </a>
                <ul class="dropdown-menu">
                  <label for="ate1800" class="dropdown-item">até 1800</label>
                  <input type="radio" class="dropdown-item" id="ate1800" name="ano" value="ano<1800" style="text-align: justify">
                  <label for="ate1900" class="dropdown-item">1800-1900</label>
                  <input type="radio" class="dropdown-item" id="ate1900" name="ano" value="1800<=ano AND ano<1900" style="text-align: justify">
                  <label for="ate1950" class="dropdown-item">1900-1950</label>
                  <input type="radio" class="dropdown-item" id="ate1950" name="ano" value="1900<=ano AND ano<1950" style="text-align: justify">
                  <label for="ate2000" class="dropdown-item">1950-2000</label>
                  <input type="radio" class="dropdown-item" id="ate2000" name="ano" value="1950<=ano AND ano<2000" style="text-align: justify"> 
                  <label for="depois2000" class="dropdown-item">2000-Dias atuais</label>
                  <input type="radio" class="dropdown-item" id="depois2000" name="ano" value="ano>=2000" style="text-align: justify">
                </ul>
              </li>
              <li class="col-sm-2">
                <a id="TamanhoFilt" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tamanho
                </a>
                <ul class="dropdown-menu">
                <label for="maiorlivro" class="dropdown-item">Maior Livro</label>
                <input type="radio" class="dropdown-item" id="maiorlivro" name="tamanho" value="ORDER BY numPaginas DESC LIMIT 10" style="text-align: justify">
                <label for="menorlivro" class="dropdown-item">Menor Livro</label>
                <input type="radio" class="dropdown-item" id="menorlivro" name="tamanho" value="ORDER BY numPaginas ASC LIMIT 1 " style="text-align: justify">
              </ul>
              <li class="col-sm-2">
              <button type="submit" value="submit" class=" btn btn-primary">Filtrar</button><br><br>
              </li>
              </ul>
            </li>
            
          </form>

          

            <br><br><br>
            <div class="row">
            <?php
            include('conexao.php');

            $comando = "SELECT * FROM livro ORDER BY id";
            $enviar = mysqli_query($conexao, $comando);
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
              <div class="col-lg-3">
                <div id="cardLivro" class="card" style="width: 15rem;">
                    <img id="fotoLivro" class="card-img-top" src="<?php echo $pathcapa;?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title" id="nomeLivro"><?php echo $nome;?></h5>
                    <a href="LivroEspecificoAdm.php?id=<?php echo $id; ?>" class="btn btn-primary">Veja mais</a>
                  </div>
                </div>
              </div>
            
          <?php
          }
          ?>
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