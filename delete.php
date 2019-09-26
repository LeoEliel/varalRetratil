<?php
// Include config file
require_once "config.php";


$id = 0;

// Prepare a delete statement
$sql = "DELETE FROM previsao WHERE id = :id";
if ($stmt = $pdo->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":id", $param_id);

    // Set parameters
    $param_id = id;

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        if ($stmt = $pdo->prepare($sql)) {
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "<p> Registros apagados com sucesso, redirecionando para o Dashboard";
                header("location: index.php");
                exit();
            } else {
                echo "Opa! Algo não funcionou como devia. Tente novamente mais tarde.";
            }

            // Close statement
            unset($stmt);

            // Close connection
            unset($pdo);
        }
    }
}
