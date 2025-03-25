<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php 
    include 'conexao.php';
    $id = $_GET['id'] ?? '';

    // var_dump($id);

    $sql = "SELECT * FROM rastreamento WHERE id = $id";
    $dados = mysqli_query($mysqli, $sql);
    $linha = mysqli_fetch_assoc($dados);

    if (!$dados) {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    }
?>

<main id="form_container">
    <div id="form_header">
        <h1 id="form_title">Edição</h1>
    </div>

    <form action="edit_produto.php" id="form" method="post">
        <div id="input_container">
            <div class="input-box">
                <label for="numero_rastreio" class="form-label">Número de rastreio</label>
                <div class="input-field">
                    <input type="text" name="numero_rastreio" id="numero_rastreio" class="form-control" value="<?php echo $linha['numero_rastreio'] ?? ''; ?>">
                    <i class="fa-solid fa-barcode"></i>
                </div>
                <span class="error"></span>
            </div>

            <div class="input-box">
                <label for="nome_produto" class="form-label">Nome do produto</label>
                <div class="input-field">
                    <input type="text" name="nome_produto" id="nome_produto" class="form-control" value="<?php echo $linha['nome_produto'] ?? ''; ?>">
                    <i class="fa-solid fa-box"></i>
                </div>
                <span class="error"></span>
            </div>

            <div class="input-box">
                <label for="email" class="form-label">E-mail</label>
                <div class="input-field">
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $linha['email'] ?? ''; ?>">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <span class="error"></span>
            </div>
        </div>

        <a class="btn btn-info" href="index.html">Voltar para o inicio</a>
        <input type="submit" class="btn btn-sucess" value="Salvar alterações">
        <input type="hidden" name="id" value="<?php echo $linha['id'] ?? ''; ?>">
    </form>
</main>

</body>
</html>