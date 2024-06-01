<?php
include_once "conexao.php";
session_start();

$usuario_id = $_SESSION['usuario_id'];
$codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$local = filter_input(INPUT_GET, "local", FILTER_SANITIZE_SPECIAL_CHARS);
$data = filter_input(INPUT_GET, "data", FILTER_SANITIZE_SPECIAL_CHARS);

if ($codigo > 0) {
    $sql = "UPDATE eventos SET eventos_nome = ?, eventos_local = ?, eventos_data = ? WHERE eventos_id = ? AND usuario_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('sssii', $nome, $local, $data, $codigo, $usuario_id);
} else {
    $sql = "INSERT INTO eventos (usuario_id, eventos_nome, eventos_local, eventos_data) VALUES (?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('isss', $usuario_id, $nome, $local, $data);
}

if ($stmt->execute()) {
    echo "
        <script>
            alert('Salvo com sucesso!');
            window.location.href = '../index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Erro ao Salvar!');
            window.location.href = '../index.php';
        </script>
    ";
}

$stmt->close();
$link->close();
?>
