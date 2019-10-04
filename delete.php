<?php
// Include config file
require_once "config.php";

// Prepare a delete statement
$sql = "DELETE FROM previsao";


    if ($stmt = $pdo->exec($sql)) {
        echo "<p> Registros apagados com sucesso, redirecionando para o Dashboard</p>";
        header("location: index.php");
        exit();
    } else {
        echo "<p>Opa! Algo não funcionou como devia. Tente novamente mais tarde.</p>";
    }
// Close connection
unset($pdo);
?>
