<?php
$usuario = "root";
$senha = "root";
$database = "cadastrorn";
$host = "localhost";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli -> error){
    die ("Conexão com banco de dados falhou!" . $mysqli->error); 
}
if (isset($_POST['e-mail']) && isset($_POST['senha'])) {
    if (empty($_POST['e-mail'])) {
        echo "Preencha seu e-mail";
    } elseif (empty($_POST['senha'])) {
        echo "Preencha corretamente sua senha!";
    } else {
        $email = $mysqli->real_escape_string($_POST['e-mail']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../index.html");
            exit;
        } else {
            echo "Falha ao efetuar o login! E-mail ou senha incorretos";
        }
    }
}