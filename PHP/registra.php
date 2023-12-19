<?php

function conectaBanco($servidor, $usuario, $senha) {
    $bancoDeDados = 'cadastrorn';
    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados $conexao->connect_error");
    }
    return $conexao;
}

$nomeCompleto = $_POST['nome-completo'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$criasenha = $_POST['cria-senha'];
$confirmasenha = $_POST['confima-senha'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$localidade = $_POST['localidade'];
$uf = $_POST['uf'];



$sql = "INSERT INTO usuarios2 (nome_completo, usuario, email, numero, senha, genero, cep, rua, bairro, cidade, estado) VALUES ('$nomeCompleto', '$usuario', '$email', '$numero', '$criasenha', 'teste','$cep', '$logradouro', '$bairro', '$localidade', '$uf');";

$conectaBanco = conectaBanco('localhost', 'root', 'root');

$conectaBanco->query($sql);

$conectaBanco->close();

header("Location: ../index.php");

exit;
