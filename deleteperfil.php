<?php 
include('protect.php');
include('conexao.php');
$id = intval($_GET['id']);

$sql_code = "DELETE FROM usuarios WHERE id = '$id'";
$sql_query = mysqli_query($conexao, $sql_code);

$conexao->close;
header('Location: ClubeLiterarioProjetoFinal.php');
exit;

?>