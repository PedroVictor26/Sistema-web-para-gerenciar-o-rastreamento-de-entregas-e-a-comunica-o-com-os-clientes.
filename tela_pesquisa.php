<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <?php include "conexao.php"; ?>

    <div class="container">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <form class="d-flex" id="pesquisaForm">
                    <input class="form-control me-2" type="search" placeholder="Número de Rastreio" aria-label="Search" id="buscaInput">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>

        <div id="resultados"></div>

        <a class="btn btn-primary btn lg" href="index.html">Cadastro</a>
    </div>

        <script>
        $(document).ready(function() {
            $("#buscaInput").on("input", function() {
                let busca = $(this).val();
                if (busca.length >= 1) {
                    $.ajax({
                        url: "pesquisar_rastreio.php",
                        method: "POST",
                        data: {
                            busca: busca    
                        },
                        success: function(data) {
                            $("#resultados").html(data);
                            setupDeleteButtons();
                        }
                    });
                } else {
                    $("#resultados").empty();
                }
            });

            $("#pesquisaForm").on("submit", function(event) {
                event.preventDefault();
                let busca = $("#buscaInput").val();
                if (busca.length >= 1) {
                    $.ajax({
                        url: "pesquisar_rastreio.php",
                        method: "POST",
                        data: {
                            busca: busca
                        },
                        success: function(data) {
                            $("#resultados").html(data);
                            setupDeleteButtons();
                        }
                    });
                } else {
                    $("#resultados").empty();
                }
            });

            function setupDeleteButtons() {
                $(".delete-btn").on("click", function() {
                    let id = $(this).data("id");
                    console.log('ID do registro a ser excluído:', id);
                    if (confirm("Tem certeza que deseja excluir este registro?")) {
                        $.ajax({
                            url: "func_delete.php",
                            method: "POST",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                console.log('Resposta do servidor:', response);
                                alert(response);
                                $("#buscaInput").trigger("input");
                            }
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>