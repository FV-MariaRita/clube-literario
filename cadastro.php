<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['Name']));
$datanasc = mysqli_real_escape_string($conexao, trim($_POST['DataNasc']));
$email = mysqli_real_escape_string($conexao, trim($_POST['Email']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['Username']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['Senha'])));;

$sql = "select count(*) as total from usuarios where nomedeusuario = '$usuario' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = TRUE;
    header('Location: InscrevaSe.php');
    exit;
}

$sql = "select count(*) as total from usuarios where email = '$email' ";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['email_existe'] = TRUE;
    header('Location: InscrevaSe.php');
    exit;
}

$sql = "INSERT INTO usuarios (nomedeusuario, nome, dataNasc, email, senha, data_cadastro,  foto_path) VALUES ('$usuario', '$nome', '$datanasc', '$email', '$senha', NOW(), './images/profile picture.jpg')";

if($conexao->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = TRUE;
}

$conexao->close;
header('Location: InscrevaSe.php');
exit;
?>