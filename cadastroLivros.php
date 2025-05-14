<!--PHP de cadastro de livros-->
<?php
    session_start();
    include("conexao.php");

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nomelivro']));
    $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $ano = mysqli_real_escape_string($conexao, trim($_POST['ano']));
    $numPag = mysqli_real_escape_string($conexao, trim($_POST['numPag']));
    $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
    $nacionalidade = mysqli_real_escape_string($conexao, trim($_POST['nacionalidade']));
    $sinopse = mysqli_real_escape_string($conexao, trim($_POST['sinopse']));
    $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));
    
    $sql = "select count(*) as total from livro where nome = '$nome' ";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['livro_existe'] = TRUE;
        header('Location: FerramentasAdm.php');
        exit;
    }

    $sql = "select count(*) as total from livro where ISBN = '$isbn' ";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['isbn_existe'] = TRUE;
        header('Location: FerramentasAdm.php?id=<?php echo $_SESSION[\'id\']');
        exit;
    }

    if(isset($_FILES['arquivo'])) {
        echo ("Arquivo enviado");
        $arquivo = $_FILES['arquivo'];        

        if($arquivo['error']) {
            die("Falha ao enviar o arquivo");
        }
        if(($arquivo['size'] > 31457280)) {
            die ("Arquivo muito grande! Max: 30MB");
        }
        $pasta = "upload/livros/";
        $novoNomeDoArquivo = uniqid();
        $extensaoArquivo = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if($extensaoArquivo != "pdf"){
            die("Tipo de arquivo não aceito");
        }
        $pathArquivo = $pasta . $novoNomeDoArquivo . $extensaoArquivo;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pathArquivo );
        if($deu_certo){
            $sql = "INSERT INTO livro (nome, genero, autor, ano, numPaginas, isbn, nacionalidade, sinopse, qtdvisualizacoes, capa_path, livro_path, data_upload) VALUES ('$nome', '$genero', '$autor', '$ano', '$numPag', '$isbn', '$nacionalidade', '$sinopse', 0, '$capa', '$pathArquivo', NOW())";
            echo "<p>Arquivo enviado com sucesso! Para acessá-lo clique aqui: <a href=\"upload/livros/$novoNomeDoArquivo.$extensaoArquivo\">Clique aqui</a></p>";
        } else{
            echo("Falha ao enviar arquivo");
        }

    }
/*
    if(isset($_FILES['capa'])){
        echo ("Arquivo enviado");
        $capa = $_FILES['capa'];
        if($capa['error']) {
            die("Falha ao enviar o arquivo");
        }
        if(($capa['size'] > 2097152)) {
            die ("Arquivo muito grande! Max: 2MB");
        }
        $pasta = "upload/livros/"
        $novoNomeDaCapa =  uniqid();
        $extensaoCapa = strtolower(pathinfo($capa['name'], PATHINFO_EXTENSION));
        if($extensaoCapa != "jpg" && $extensaoCapa != "png" ){
            die("Tipo de arquivo não aceito");
        }
        $pathCapa = $pasta . $novoNomeDaCapa . $extensaoCapa
        $deu_certo2 = move_uploaded_file($capa["tmp_name"], $pathCapa);
        if($deu_certo2){
            
            echo "<p>Arquivo enviado com sucesso! Para acessá-lo clique aqui: <a href=\"upload/livros/$novoNomeDaCapa.$extensaoCapa\">Clique aqui</a></p>";
        } else{
            echo("Falha ao enviar arquivo");
        }

    } */   

    if($conexao->query($sql) === TRUE){
        $_SESSION['status_cadastroLivro'] = TRUE;
    }

    $conexao->close;
    header('Location: FerramentasAdm.php');
    exit;

?>