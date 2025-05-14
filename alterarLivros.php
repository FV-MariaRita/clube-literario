<?php
        include('conexao.php');
        $nome = mysqli_real_escape_string($conexao, trim($_POST['nomeLivro']));    

        $sql = "select count(*) as total from livro where nome = '$nome' ";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 0) {
            $_SESSION['livro_naoexiste'] = TRUE;
            header('Location: FerramentasAdm.php');
            exit;
        }
        
        session_start();
        $novoNome = mysqli_real_escape_string($conexao, trim($_POST['novonomelivro']));
        $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
        $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
        $ano = mysqli_real_escape_string($conexao, trim($_POST['ano']));
        $numPag = mysqli_real_escape_string($conexao, trim($_POST['numPag']));
        $isbn = mysqli_real_escape_string($conexao, trim($_POST['isbn']));
        $nacionalidade = mysqli_real_escape_string($conexao, trim($_POST['nacionalidade']));
        $sinopse = mysqli_real_escape_string($conexao, trim($_POST['sinopse']));
        $capa = mysqli_real_escape_string($conexao, trim($_POST['capa']));

        $sql = "select count(*) as total from livro where ISBN = '$isbn' ";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        /*
        if($row['total'] == 1){
            $_SESSION['isbnnovo_existe'] = TRUE;
            header('Location: FerramentasAdm.php');
            exit;
        }

        $sql = "select count(*) as total from livro where nome = '$novoNome' ";
        $result = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['total'] == 1){
            $_SESSION['nomenovo_existe'] = TRUE;
            header('Location: FerramentasAdm.php');
            exit;
        }
        */


        if(isset($_FILES['arquivo'])) {
            echo ("Arquivo enviado");
            $arquivo = $_FILES['arquivo'];        
            
            if($arquivo['error']) {
                die("Falha ao enviar o arquivo");
            }
            if(($arquivo['size'] > 2097152)) {
                die ("Arquivo muito grande! Max: 2MB");
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
                $sql = "UPDATE livro SET  nome ='$novoNome', genero = '$genero', autor = '$autor', ano = '$ano', numPaginas = '$numPag', isbn = '$isbn', qtdvisualizacoes = 0, capa_path = '$capa', livro_path ='$pathArquivo' WHERE nome = '$nome' ";
                echo "<p>Arquivo enviado com sucesso! Para acessá-lo clique aqui: <a href=\"upload/livros/$novoNomeDoArquivo.$extensaoArquivo\">Clique aqui</a></p>";
            } else{
                echo("Falha ao enviar arquivo");
                header('Location: FerramentasAdm.php');
            }
        }    
 

    if($conexao->query($sql) === TRUE){
        $_SESSION['status_alterarLivro'] = TRUE;
    }

    $conexao->close;
    header('Location: FerramentasAdm.php');
    exit;

?>