<?php
include ('protect.php');
include('conexao.php');

$id = intval($_GET['id']);
$idUsuario = $_SESSION['id'];

$sql = "DELETE FROM leitura WHERE idLivro = '$id' AND idUsuario = '$idUsuario' ";
$enviar = mysqli_query($conexao, $sql);

$sql = "UPDATE usuarios SET livros_lidos = livros_lidos + 1 WHERE id = '$idUsuario' "; 
$enviar = mysqli_query($conexao, $sql);

$conexao->close;

if($idUsuario == 1){
    header('Location: HomeAdm.php');
} else if ($idUsuario == 2){
    header('Location: HomeAdm.php');
} else{
    header('Location: Home.php');
}
exit;
?>

 