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
        echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Cadastro realizado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/Eventos/login.html';
                        }
                    });
                </script>
            </body>
            </html>
        ";
    } else {
        echo "
            <html>
            <head>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        title: 'Erro!',
                        text: 'Erro ao realizar o cadastro!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/Eventos/cadastro.html';
                        }
                    });
                </script>
            </body>
            </html>
        ";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
