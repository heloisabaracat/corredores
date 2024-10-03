<?php
$host = 'localhost';
$db = 'corredores';
$user = 'heloisa';
$pass = '123456789';
$port = 3307; 

try {
    
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
