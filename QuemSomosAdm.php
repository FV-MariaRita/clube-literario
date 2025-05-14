<?php
include ('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    
    if(strlen($_POST['email'])==0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha'])==0) {
        echo "Preencha sua senha";
    } else {

        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: ".$conexao->error);

        $quantidade=$sql_query->num_rows;

        if($quantidade==1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['nomeusuario'] = $usuario['nomedeusuario'];

            if($_SESSION['id'] == 1) {
              header("Location: HomeAdm.php");
            } elseif ($_SESSION['id'] == 2) {
              header("Location: HomeAdm.php");
            } else {
              header("Location: Home.php");
            }            
            
        } else{
            echo "Falha ao logar! Email ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem somos?</title>
</head>
<body>
    <!DOCTYPE html>
<meta charset="UTF-8">
<meta charset lang="pt-br">
<html>
    <head>
        <title>Clube literário</title>
        <link rel="icon" type="image/x-icon" href="./images/IconSite.png">
        <link rel='stylesheet' href="bootstrap-grid.css">
        <link rel='stylesheet' href="styles1.css">
        <link rel='stylesheet' href="bootstrap copy2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Ahom&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <script type="text/javascript" src="ClubeLiterarioProjetoFinal2.js" ></script>
        <script type="text/javascript" src="bootstrap.bundle.min.js" ></script>
        
    </head>
<body class="bodyHome">
<!--Header-->
    <nav class="container-fluid">
                <ul class="row">
                  <a class="col-sm-4" href="ClubeLiterarioProjetoFinal.php" >
                    <img class="img-fluid" src="./images/LogoSite3.png">
                  </a>
                  <li class="col-sm-2">
                    <a class="nav-link" href="QuemSomos.php">Quem somos?</a>
                  </li>
                    <li class="col-sm-2">
                      <a class="nav-link" href="InscrevaSe.html">Inscreva-se</a>
                    </li>
                    <li class="col-sm-2">
                      <button onclick="Entrar()" class="btn">Entre</button> 
                    </li>
                </ul>
    </div>   
    </nav>

  
    <hr class="container-fluid"><br>
<!--Header-->
<!--Div a ser mostrada quando apertar o link de entrar-->
<div class="container-fluid" id="x7"><br><br>
  <h1 class="quicksand-regular" id="Entrar">Entrar</h1>
<form method="post" action="Login.php" class="quicksand-regular2">
    <label>@username ou E-mail:</label>
    <input class="form-control" type="text" name="Name" placeholder="Nome">
    <br><br>
    <label>Senha:</label>
    <input class="form-control" type="text" name="Senha" placeholder="senha123">
    <br><br>
    <button type="submit" value="Submit" class="btn btn-primary">Entrar</button><br><br>
</div>
  <!--Fim-->
<!--Body da página-->
    <div class="container-fluid"></div>
      <h1 class="quicksand-regular" id="x10">Quem somos?</h1><br>
    </div>
    <div class="container-fluid">
      <h3 class="quicksand-regular2" id="x10">O projeto “Clube Literário” foi criado com o objetivo de tornar a leitura mais acessível e prática na vida cotidiana. O site, que pode ser utilizado pelo celular e pelo computador, apresenta funcionalidades dinâmicas e eficientes, dando facilidade para o leitor acessar os livros que está lendo ou deseja ler.  
      </h3>
    </div><br>
    <div class="container-fluid">
      <h1 class="quicksand-regular" id="x10">O que o site fornece?</h1><br>
      <img class="container-fluid" id="x11" src="./images/bibliotecaOnline.avif">
      <ul>
        <li class="quicksand-regular2" id="x12">Leitura de +50 livros de graça!</li>
      </ul>    
      
      <ul>
        <li class="quicksand-regular2" id="x12">O usuário pode ter o seu próprio espaço:</li>
        <ul>
        <li class="quicksand-regular2" id="x12">Foto de perfil</li>
        </ul>
        <ul>
          <li class="quicksand-regular2" id="x12">Número de livros lidos</li>
        </ul>
        <ul>
          <li class="quicksand-regular2" id="x12">Lista de livros para ler</li>
        </ul>
    </div>
    <div class="container-fluid" id="divComoUsar"><br>
      <h1 class="quicksand-regular" id="x13">Como usar:</h1><br>
      <ul>
        <p class="quicksand-regular2" id="x12">Primeiramente, o usuário irá se inscrever no site para criar uma conta.</p>
      </ul>
      <div class="container-fluid">
        <img src="./images/./images/printInsc2.png" id="printInsc">
      </div><br>
      
      <ul>
        <hr class="linhaHome" id="linhaComoUsar"><br>
        <h3 class="quicksand-regular" id="x13">Página de catálogo</h3>
        <p class="quicksand-regular2" id="x12">Dessa forma, poderá ir para o home, onde terão múltiplos livros no catálogo à sua escolha.<br> 
       Os livros serão divididos em gêneros, e há a possibilidade<br>
        de o usuário observar no catálogo uma coleção de livros por cada gênero. Eles serão:
        <ul>
        <li class="quicksand-regular2" id="x12">Romance</li>
        <li class="quicksand-regular2" id="x12">Ficção científica</li>
        <li class="quicksand-regular2" id="x12">Comédia romântica</li>
        <li class="quicksand-regular2" id="x12">Biografia</li>
        <li class="quicksand-regular2" id="x12">Drama</li>
        <li class="quicksand-regular2" id="x12">Terror</li>
        <li class="quicksand-regular2" id="x12">Aventura</li>
        <li class="quicksand-regular2" id="x12">Mistério/Suspense</li><br>
        
        </ul>
        </p>
        <hr class="linhaHome" id="linhaComoUsar"><br>
        <h3 class="quicksand-regular" id="x13">Escolha e leitura dos livros</h3>
        <p class="quicksand-regular2" id="x12">Após clicar em um dos livros no catálogo, o usuário será redirecionado para um página em que<br>
          haverá mais informações sobre determinada obra, seu autor, seu gênero e a descrição deste livro.
        </p><br>
        <p class="quicksand-regular2" id="x12">Além disso, haverá um link para caso o leitor quiser ler este livro, que abrirá em uma página<br>
          com o arquivo PDF do mesmo. Nessa página, a pessoa poderá efetivamente ler o livro.
        </p><br>
        <hr class="linhaHome" id="linhaComoUsar"><br>
        <h3 class="quicksand-regular" id="x13">Página de perfil</h3>
        <p class="quicksand-regular2" id="x12">A página de perfil terá o número de livro lidos e livros que o usuário está lendo.</p><br>
        <div class="container-fluid">
          <img src="PrintPerfil.png" id="printInsc">
        </div><br>
    </div>
</body>
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
</html>
