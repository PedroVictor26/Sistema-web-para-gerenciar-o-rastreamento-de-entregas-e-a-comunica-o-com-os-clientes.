<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de cadastro</title>
</head>
<body>
<?php 
    include 'conexao.php';

    $numero_rastreio = $_POST['numero_rastreio'] ?? '';
    $nome_produto = $_POST['nome_produto'] ?? '';
    $email = $_POST['email'] ?? '';
    $status = "preparando";
    $tabela = "rastreamento";

    $sql = "INSERT INTO $tabela (numero_rastreio, nome_produto, email, status) VALUES ('$numero_rastreio', '$nome_produto', '$email', '$status')";

    if (mysqli_query($mysqli, $sql)){
        echo "$nome_produto foi cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar $nome_produto: " . mysqli_error($mysqli);
    }
?>
    <a class="btn btn-primary btn lg" href="index.html">voltar</a>
    
</body>
</html>