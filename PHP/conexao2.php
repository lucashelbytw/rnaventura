<?php

function conectaBanco($servidor, $usuario, $senha) {
    $bancoDeDados = 'cadastrorn';
    $conexao = new mysqli($servidor, $usuario, $senha, $bancoDeDados);
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados " . $conexao->connect_error);
    }
    return $conexao;
}

$nomeCompleto = $_POST['nome-completo'];
$numero = $_POST['numero'];
$data = $_POST['data'];
$destino = $_POST['destino'];

// Evitar SQL injection usando prepared statements
$sql = "INSERT INTO reservas (nome_completo_usuario, numeros_pessoas, data_checkin, destino, id_usuario) VALUES (?, ?, ?, ?, ?)";
$conexao = conectaBanco('localhost', 'root', 'root');

// Preparar e executar a declaração SQL
$stmt = $conexao->prepare($sql);
$stmt->bind_param('ssssi', $nomeCompleto, $numero, $data, $destino, $id_usuario);

// Definir $id_usuario conforme necessário
$id_usuario = 1;

$stmt->execute();
$stmt->close();

$conexao->close();

header("Location: ../index.php");
exit;
?>
