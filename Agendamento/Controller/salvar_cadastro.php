<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cpf = $_POST['cpf'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO registro (registro_nome, registro_email, registro_telefone, registro_sexo, registro_data, registro_cidade, registro_estado, registro_cpf, registro_senha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssss", $nome, $email, $telefone, $genero, $data_nascimento, $cidade, $estado, $cpf, $senha);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: /Eventos/login.html?message=Cadastro%20realizado%20com%20sucesso!");
        exit();
    } else {
        echo "Erro: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
