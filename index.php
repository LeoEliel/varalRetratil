<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="shortcut icon" href="http://www.seusite.com.br/favicon.ico" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }



        #btn-atualizar {
            margin-right: 5px;
        }
        #btn-deletar {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Varal Retrátil - Dashboard</h2>
                        <a href="update.php" id="btn-atualizar" class="btn btn-success pull-right">Atualizar</a>                                               
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM previsao";
                    if ($result = $pdo->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Data</th>";
                            echo "<th>Humid Max</th>";
                            echo "<th>Humid Min</th>";
                            echo "<th>Chuva(%)</th>";
                            echo "<th>Cidade</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['dataPrevisao'] . "</td>";
                                echo "<td>" . $row['humiMax'] . "</td>";
                                echo "<td>" . $row['humiMin'] . "</td>";
                                echo "<td>" . $row['chuvaProbab'] . "</td>";
                                echo "<td>" . $row['cidade'] . "</td>";
                                // echo "<td>";
                                // echo "<a href='read.php' title='Ver Registro' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                // echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else {
                            // Caso não haja nenhum registro, a aplicação cria um, redirecionando para create.php.
                            header("location: create.php");
                        }
                    } else {
                        echo "ERROR: Não foi possível executar a query SQL. " . $mysqli->error;
                    }

                    // Close connection
                    unset($pdo);
                    ?>
                    <a href="delete.php" id="btn-deletar" class="btn btn-danger pull-right" onclick="showAlert()">Deletar Tudo</a> 
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        function showAlert(){
            confirm("Todos os dados serão apagados.\nProsseguir?");
        }
    </script>
</body>

</html>