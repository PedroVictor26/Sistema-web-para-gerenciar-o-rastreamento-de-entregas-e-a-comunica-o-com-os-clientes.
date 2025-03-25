<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    include 'conexao.php';

    $id = $_POST['id'] ?? '';
    $numero_rastreio = $_POST['numero_rastreio'] ?? '';
    $nome_produto = $_POST['nome_produto'] ?? '';
    $email = $_POST['email'] ?? '';
    $tabela = "rastreamento";

    $tabela = "rastreamento";

    // var_dump($id);

    $sql = "UPDATE $tabela SET numero_rastreio = '$numero_rastreio', nome_produto = '$nome_produto', email  = '$email' WHERE id = $id";

    if (mysqli_query($mysqli, $sql)){
        echo "$nome_produto foi alterado com sucesso!";
    } else {
        echo "Erro ao alterar $nome_produto: " . mysqli_error($mysqli);
    }

?>
    <a class="btn btn-primary btn lg" href="index.html">voltar</a>
</body>
</html>
