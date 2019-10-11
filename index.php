<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <title>Varal Retrátil</title>
        <link rel="shortcut icon" href="img/lavanderia.png"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">    
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>        
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="page-header clearfix">
                            <img src="img/lavanderia.png" alt="imagem de título" id="img-title" class="pull-left img-fluid">
                            <h1 id="titulo" class="pull-left title">Dashboard</h1>
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
                                                    // echo "<th>#</th>";
                                                        echo "<th>Data</th>";
                                                        echo "<th>Humidade Max</th>";
                                                        echo "<th>Humidade Min</th>";
                                                        echo "<th>Chuva (%)</th>";
                                                        echo "<th>Cidade</th>";
                                                    echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                            while ($row = $result->fetch()) {
                                                echo "<tr>";
                                                    // echo "<td>" . $row['id'] . "</td>";
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
                                echo "ERRO: Não foi possível executar a query SQL. " . $mysqli->error;
                            }
                            // Close connection
                            unset($pdo);
                        ?>
                        <a href="delete.php" id="btn-deletar" class="btn btn-danger btn-sm pull-right" onclick="showAlert()">Deletar Tudo</a> 
                        <a href="update.php" id="btn-atualizar" class="btn btn-success btn-sm pull-right">Atualizar</a>
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