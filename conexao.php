<?php 

    $hostname = "localhost";
    $database = "gerenciamento";
    $user = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $user, $senha, $database);
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        echo "Conectado!";
    };
?>