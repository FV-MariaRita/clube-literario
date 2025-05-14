<?php
include('conexao.php');
$nome = mysqli_real_escape_string($conexao, trim($_POST['nomeLivro']));


$sql = "select count(*) as total from livro where nome = '$nome' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 0) {
    $_SESSION['livro_naoexiste2'] = TRUE;
    header('Location: FerramentasAdm.php');
    exit;
}

session_start();
$nome = mysqli_real_escape_string($conexao, trim($_POST['nomeLivro']));

$sql_code = "SELECT * FROM livro WHERE nome = '$nome' ";
$sql_query = mysqli_query($conexao, $sql_code) or die('Erro ao consultar!' . $mysqli->error);
$resultado = $sql_query->fetch_assoc();
$livroId = $resultado['id'];

$sql_code = "DELETE FROM livro WHERE id='$livroId'";
$sql_query = mysqli_query($conexao, $sql_code) or die('Erro ao excluir!' . $mysqli->error);


if($sql_query === TRUE){
    $_SESSION['status_excluirLivro'] = TRUE;
}

$conexao->close;
header('Location: FerramentasAdm.php');
exit;
?>

