<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        
        <title>Varal Retrátil</title>
        
        <script src="https://kit.fontawesome.com/7709f9c408.js" crossorigin="anonymous"></script>
        

        <link rel="shortcut icon" href="img/lavanderia.png"/>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="page-header clearfix">
                            <img src="img/lavanderia.png" alt="icone varal" id="img-title" class=" float-left img-fluid">
                            <h1 id="titulo" class="title float-left">Dashboard</h1>
                        </div>

                        <?php
                            // Include config file
                            require_once "config.php";

                            // Attempt select query execution
                            $sql = "SELECT * FROM previsao";
                            if ($result = $pdo->query($sql)) {
                                if ($result->rowCount() > 0) { 
                                        echo "<div class='table-responsive'>";
                                        echo "<table class='table table-bordered table-striped table-hover table-sm'>";
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
                                                    // echo "<a href='read.php' title='Ver Registro' 
                                                    //data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                    // echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";
                                        echo "</table>";                                    
                                        echo "</div>";
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
                        <a href="delete.php" id="btn-deletar" class="btn btn-danger btn-sm pull-right" onclick="showAlert()">
                            Deletar Tudo
                        </a> 
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>    
    
</html>