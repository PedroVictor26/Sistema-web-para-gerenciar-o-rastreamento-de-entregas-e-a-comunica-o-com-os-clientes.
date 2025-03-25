<?php 

    $hostname = "localhost";
    $database = "gerenciamento";
    $user = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $user, $senha, $database);
    
    // if ($mysqli->connect_error) {
    //     die("Conexão falhou: " . $mysqli->connect_error);
    //     } else {
    //         echo "Conexão realizada com sucesso!";
    //     }  
?>