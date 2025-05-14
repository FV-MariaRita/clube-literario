<?php
include('protect.php')
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
    
    <title>Continuar Lendo</title>
</head>
<body class="bodyAv">
    <nav class="container-fluid">
        <ul class="row">
          <a class="col-sm-4">
            <img class="img-fluid" src="./images/LogoSite3.png">
          </a>
          <li class="col-sm-2">
            <a class="nav-link" href="HomeAdm.php">Home</a>
          </li>
            <li class="col-sm-2">
              <a class="nav-link" href="paraLerAdm.php">Livros para ler</a>
            </li>
            <li class="col-sm-2">
              <a class="nav-link" href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id']; ?>" role="button">
                Página de perfil
              </a>
            </li>
            <!--Botão para abrir a nav lateral-->
            <div class="col-sm-1">
            <button class="btn btn-outline-secondary" type="submit" id="" onclick="openNav2()"><img id="x2" src="./images/menu.png"></button>
            </div>
       </nav>
            <hr class="linhaHome">
            <br><br>
            <!--Nav lateral (diferente da nav do home, por isso há o número 2)-->
            <div id="mySidenav2" class="sidenav">
                <a class="quicksand-regular2" href="javascript:void(0)" class="closebtn" onclick="closeNav2()"><img id="fechar" src="./images/fechar.png"></a><br><br>
                <a href="PaginaDePerfilAdm.php?id=<?php echo $_SESSION['id']; ?>"><img id="ProfilePicNav" src="./images/profile picture.jpg" class="rounded-circle me-3" alt="User Avatar"></a><br>
                <p class="quicksand-regular2"><?php echo $_SESSION['nome']; ?></p><br>
                <a class="quicksand-regular2" href="QuemSomosAdm.php">Quem Somos?</a><br><br>
                <a class="quicksand-regular2" href="#">Continuar Lendo</a><br><br>
                
                <a class="quicksand-regular2" href="EditarPerfilAdm.php?id=<?php echo $_SESSION['id']; ?>">Editar Perfil</a><br><br>
                <a class="quicksand-regular2" href="FerramentasAdm.php">Ferramentas do Administrador</a><br><br>
                <a class="quicksand-regular2" href="logout.php">Sair</a><br><br>
            </div>
<!--Leituras do usuário-->
<div class="container-fluid">
    <h1 id="x10" class="quicksand-regular">Leituras de <?php echo $_SESSION['nome']; ?></h1><br>
    <div id="DivAv" class="row">
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
                <div class="col-lg-3">
                  <div id="cardLivro" class="card" style="width: 15rem;">
                    <img id="fotoLivro"  class="card-img-top" src="<?php echo $pathcapa; ?>" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $nome; ?></h5>
                      <a href="PáginasDeLeituraLivroAdm.php?id=<?php echo $id; ?>" class="btn btn-primary">Continuar lendo</a>
                    </div>
                  </div>
                </div>
                <?php 
                }
              }
              ?>
              
</div>               
</div><br><br>
</body>
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