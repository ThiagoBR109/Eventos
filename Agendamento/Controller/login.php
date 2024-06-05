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
                header("Location: /Eventos/home.php?login=success");
                exit();
            } else {
                header("Location: /Eventos/login.html?message=Senha+incorreta!");
                exit();
            }
        } else {
            header("Location: /Eventos/login.html?message=Nenhum+usuário+encontrado+com+esse+email.");
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: /Eventos/login.html?message=Por+favor,+preencha+todos+os+campos.");
        exit();
    }

    mysqli_close($link);
}
?>
