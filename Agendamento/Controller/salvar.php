<?php
    include_once "conexao.php";


    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $local = filter_input(INPUT_GET, "local", FILTER_SANITIZE_SPECIAL_CHARS);
    $data = filter_input(INPUT_GET, "data", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($codigo > 0){
        $sql = "UPDATE eventos SET eventos_nome ='$nome', eventos_local='$local', eventos_data='$data' where eventos_id = $codigo;";
    } else{
        $sql = "INSERT INTO eventos values (null, '$nome', '$local','$data');";
    }
    

    $inserir = mysqli_query($link, $sql);
    
    if ($inserir) {
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
    
    mysqli_close($link);
?>