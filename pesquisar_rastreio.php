<?php
include "conexao.php";

$pesquisa = $_POST['busca'] ?? '';

if (!empty($pesquisa)) {

    $sql = "SELECT * FROM rastreamento WHERE numero_rastreio LIKE '%$pesquisa%'";
    $dados = mysqli_query($mysqli, $sql);

    if ($dados) {
        if (mysqli_num_rows($dados) > 0) {
            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Numero de rastreio</th>
                            <th scope="col">Nome do produto</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($linha = mysqli_fetch_assoc($dados)) {
                $id = $linha['id'];
                $numero_rastreio = $linha['numero_rastreio'];
                $nome_produto = $linha['nome_produto'];
                $email = $linha['email'];
                echo "<tr>
                        <th scope='row'>$numero_rastreio</th>
                        <td>$nome_produto</td>
                        <td>$email</td>
                        <td>Preparando</td>
                        <td>
                        <a href='cadastro_edit.php?id=$id' class='btn btn-success'>Editar</a>
                        <a href='excluir.php?id=$id' class='btn btn-danger'>Excluir</a> </td>
                    </tr>";
            }

            echo '</tbody></table>';
        } else {
            echo "<p>Nenhum resultado encontrado para '$pesquisa'.</p>";
        }
    } else {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    }


}

?>