<?php
session_start(); 
include 'auth.php'; 
include 'db.php';

// usuário está logado
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

// email do usuário logado
$email = $_POST['email'];

// deleta o usuário do banco de dados
$sql = "DELETE FROM usuarios WHERE email = :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);

if ($stmt->execute()) {
    // logout após a exclusão
    session_destroy(); // destroi a sessão
    header("Location: index.php"); // redireciona para home
    exit();
} else {
    // redireciona com uma mensagem de erro
    $_SESSION['msg'] = "Erro ao deletar a conta.";
    header("Location: perfil.php");
    exit();
}
?>
