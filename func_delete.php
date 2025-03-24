<?php
include "conexao.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    echo "ID recebido: " . $id;

    $sql = "DELETE FROM rastreamento WHERE id = $id";
    if (mysqli_query($mysqli, $sql)) {
        echo "Registro excluído com sucesso!";
    } else {
        echo "Erro ao excluir registro: " . mysqli_error($mysqli);
    }
} else {
    echo "ID do registro não especificado.";
}
?>