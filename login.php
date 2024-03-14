<?php
session_start();


$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "Cadastro";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$email = $_POST['email_login'];
$senha = $_POST['senha_login'];


$sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc(); 
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $row['nome'];

    echo "Olá, ".$_SESSION['nome']."<br>";


    echo "<h2>Tabela de Usuários</h2>";
    echo "<table class='table'>";
    echo "<tr><th>Nome</th><th>Email</th></tr>";

    
    $sql_all_users = "SELECT * FROM usuarios";
    $result_all_users = $conn->query($sql_all_users);

    if ($result_all_users->num_rows > 0) {
        while ($row_all_users = $result_all_users->fetch_assoc()) {
            echo "<tr><td>".$row_all_users['nome']."</td><td>".$row_all_users['email']."</td></tr>";
        }
    } else {
        echo "Nenhum usuário encontrado.";
    }
    echo "</table>";
} else {
    echo "Login ou senha errado :(";
}

$conn->close();
?>
