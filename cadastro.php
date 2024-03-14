<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "Cadastro";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
if ($conn->query($sql) === TRUE) {

    header("Location: login.html");
    exit();
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}

$conn->close();
?>
