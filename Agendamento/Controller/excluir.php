<?php
    include_once "conexao.php";


    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM eventos WHERE eventos_id = $codigo;";

    $inserir = mysqli_query($link, $sql);
    
    if ($inserir) {
        echo "
            <script>
                alert('Evento excluído com sucesso!');
                window.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Erro ao excluir!');
                window.location.href = '../index.php';
            </script>
        ";
    }
    
    mysqli_close($link);
    
?>