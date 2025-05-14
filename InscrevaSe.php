<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscreva-se</title>
    <link rel="icon" type="image/x-icon" href="./images/IconSite.png">
    <link rel='stylesheet' href="styles1.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Ahom&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap copy2.css">
    <link rel="stylesheet" href="bootstrap-grid.css"> 
</head>
<!--Modificar seriamente-->
<!--Problema: IncrevaSe.php só funciona diretamente no htdocs, e não possui permissão quando está dentro da pasta do trabalho-->
<body class="bodyInsc"><br><br>
    <hr class="container-fluid"><br><br>
    <div class="container-fluid">
    <div class="Insc">
    <h1 class="quicksand-regular">Inscreva-se</h1>
    <!-- Mensagens de nome de usuario já existente no sistema / email já existente no sistema / usuario cadastrado -->
    <?php 
    if(isset($_SESSION['usuario_existe'])):
    ?>  
    <div class="usuario_existe">   
        <h5 class="quicksand-regular">Este nome de usuário já está sendo utilizado<br>Tente novamente ou faça login <a href="ClubeLiterarioProjetoFinal.php">aqui</a></h5>
    </div>
    <?php 
    endif;
    unset($_SESSION['usuario_existe'])
    ?>

    <?php 
    if(isset($_SESSION['email_existe'])):
    ?>
    <div class="email_existe"> 
        <h5 class="quicksand-regular">Este email já está sendo utilizado<br>Tente novamente ou faça login <a href="ClubeLiterarioProjetoFinal.php">aqui</a></h5>
    </div>
    <?php 
    endif;
    unset($_SESSION['email_existe'])
    ?>

    <?php 
    if(isset($_SESSION['status_cadastro'])):
    ?> 
    <div class="status_cadastro">
        <h5 class="quicksand-regular">Cadastro realizado com sucesso faça login <a href="ClubeLiterarioProjetoFinal.php">aqui</a></h5>
    </div>
    <?php 
    endif;
    unset($_SESSION['status_cadastro'])
    ?>
    <!--Formulário-->
    <form method="post" action="cadastro.php" class="quicksand-regular2">
        <label>Nome:</label>
        <input class="form-control" type="text" name="Name" placeholder="Nome" required>
        <br><br>
        <label>Data de Nascimento:</label>
        <input id="Dt" class="form-control" type="date" name="DataNasc"><br><br>
        <label>E-mail:</label>
        <input class="form-control" type="text" name="Email" placeholder="nomeemail@email.com" required>
        <br><br>
        <label>@username:</label>
        <input class="form-control" type="text" name="Username" placeholder="@nomedeusuario" required>
        <br><br>
        <label>Senha:</label>
        <input class="form-control" type="password" name="Senha" placeholder="senha123" required>
        <br><br>
        <button type="submit" value="Submit" class=" btn btn-primary">Inscrever-se</button><br><br>
    </form><br>
    
</body>
</html>