<?php
include_once "Controller/check_login.php";
include_once "Controller/conexao.php"; 

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT * FROM eventos WHERE usuario_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Evento - EventPro Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" href="../img/favicon.png">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="row align-items-center">
                <div class="col">
                    <h2>Cadastro de Eventos</h2>
                </div>
                <div class="col text-end">
                    <a href="../home.php" class="btn btn-primary">Home</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="imagens/logo.png" alt="" class="img-produto">
            </div>
            <div class="col-8">
                <form method="GET" action="Controller/salvar.php">
                    <div class="mt-3 form-floating">
                        <input type="hidden" class="form-control desabilitado" id="codigo" name="codigo" readonly
                        value="<?php echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="codigo" class="form-label">Código</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="nome" name="nome"
                        value="<?php echo filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="nome" class="form-label">Nome do Evento</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="local" name="local"
                        value="<?php echo filter_input(INPUT_GET, "local", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="local" class="form-label">Local</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="datetime-local" class="form-control" id="data" name="data"
                        value="<?php echo filter_input(INPUT_GET, "data", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="data" class="form-label">Data</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <div class="row">
                            <div class="col">
                                <a href="index.php">
                                    <button type="button" class="btn btn-primary form-control botaoLimpar">Limpar</button>
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control botaoSalvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2>Eventos cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do evento</th>
                            <th>Local</th>
                            <th>Data</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($linha = $result->fetch_assoc()) {
                                echo 
                                    "<tr>
                                        <td>".$linha['eventos_id']."</td>
                                        <td>".$linha['eventos_nome']."</td>
                                        <td>".$linha['eventos_local']."</td>
                                        <td>".$linha['eventos_data']."</td>
                                        <td>
                                            <a href='?codigo=".$linha['eventos_id']."&nome=".$linha['eventos_nome']."&local=".$linha['eventos_local']."&data=".$linha['eventos_data']."'>
                                                <img src='imagens/editar.png' class='imgtabela'>
                                            </a>
                                        </td>
                                        <td>
                                            <a href='Controller/excluir.php?codigo=".$linha['eventos_id']."'>
                                                <img src='imagens/excluir.png' class='imgtabela'>
                                            </a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
