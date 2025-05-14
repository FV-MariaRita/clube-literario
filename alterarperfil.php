<?php 
include ('protect.php');
include('conexao.php');
$id = intval($_GET['id']);

$novoNomeUsuario = mysqli_real_escape_string($conexao, trim($_POST['novoNomeUsuario']));
$novoNome = mysqli_real_escape_string($conexao, trim($_POST['novoNome']));
$novoEmail = mysqli_real_escape_string($conexao, trim($_POST['novoEmail']));
$novaSenha = mysqli_real_escape_string($conexao, trim(md5($_POST['novaSenha'])));

       
$sql = "select count(*) as total from usuarios where nome = '$novoNomeUsuario' ";       
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
    $_SESSION['usuarioNovo_existe'] = TRUE;
    if($id===1 || $id===2){
        header('Location: EditarPerfilAdm.php?id=<?php echo $id; ?>');
    } else {
        header('Location: EditarPerfil.php?id=<?php echo $id; ?>');
    }
    exit;
}
/*
$sql = "select count(*) as total from usuarios where email = '$novoEmail'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] != 0){
    $_SESSION['emailNovo_existe'] = TRUE;
    if($id===1 || $id===2){
        header('Location: EditarPerfilAdm.php?id=<?php echo $id; ?>');
    } else {
        header('Location: EditarPerfil.php?id=<?php echo $id; ?>');
    }
    exit;
}
*/

if(isset($_FILES['novaFoto'])) {
    echo ("Arquivo enviado");
    $arquivo = $_FILES['novaFoto'];        

    if($arquivo['error']) {
        die("Falha ao enviar o arquivo");
    }
    if(($arquivo['size'] > 2097152)) {
        die ("Arquivo muito grande! Max: 2MB");
    }
    $pasta = "upload/usuarios/";
    $novoNomeDaFoto = uniqid();
    $extensaoFoto = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    if($extensaoFoto != "png"){
        die("Tipo de arquivo não aceito");
    }
    
    $pathFoto = $pasta . $novoNomeDaFoto . $extensaoFoto;
    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pathFoto );
    if($deu_certo){
        $sql = "UPDATE usuarios SET nomedeusuario = '$novoNomeUsuario', nome = '$novoNome', email = '$novoEmail', senha = '$novaSenha', foto_path = '$pathFoto'  WHERE id = '$id'";
        echo "<p>Arquivo enviado com sucesso! Para acessá-lo clique aqui: <a href=\"upload/livros/$novoNomeDoArquivo.$extensaoArquivo\">Clique aqui</a></p>";
    } else{
        echo("Falha ao enviar arquivo");
    }

} 


if($conexao->query($sql) === TRUE){
    $_SESSION['status_alterarPerfil'] = TRUE;
}

$conexao->close;
if($id===1 || $id===2){
    header('Location: ClubeLiterarioProjetoFinal.php');
} else {
    header('Location: ClubeLiterarioProjetoFinal.php');
}

exit;

?>