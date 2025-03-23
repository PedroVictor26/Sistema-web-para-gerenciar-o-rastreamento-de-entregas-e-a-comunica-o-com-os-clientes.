<?php
include 'conexao.php'; // Inclui o arquivo de conexão


if (isset($_GET['numero_rastreio'])) {
    $numeroRastreio = $_GET['numero_rastreio'];


    if (strlen($numeroRastreio) !== 5) {
        echo "Número de rastreio inválido.";
        exit;
    }


    // Consulta preparada para evitar injeção SQL
    $stmt = $mysqli->prepare("SELECT * FROM rastreamento WHERE numero_rastreio = ?");
    $stmt->bind_param("s", $numeroRastreio);
    $stmt->execute();
    $result = $stmt->get_result();



    if ($result->num_rows > 0) {
        echo "Número de rastreio válido.";
    } else {

        echo "Número de rastreio não encontrado.";
    }

    $stmt->close(); // Fecha a consulta preparada
    $mysqli->close(); // Importante: fecha a conexão com o banco de dados



}
