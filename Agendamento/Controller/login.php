<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM registro WHERE registro_email = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($senha, $row['registro_senha'])) {
                $_SESSION['usuario_id'] = $row['registro_id'];
                $_SESSION['usuario_logado'] = $row['registro_email'];
                echo "
                    <html>
                    <head>
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    </head>
                    <body>
                        <script>
                            Swal.fire({
                                title: 'Sucesso!',
                                text: 'Login realizado com sucesso!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/Eventos/home.php';
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
                                text: 'Senha incorreta!',
                                icon: 'error',
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
            }
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
                            text: 'Nenhum usuário encontrado com esse email.',
                            icon: 'error',
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
        }

        mysqli_stmt_close($stmt);
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
                        text: 'Por favor, preencha todos os campos.',
                        icon: 'error',
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
    }

    mysqli_close($link);
}
?>
