<?php
// Include config file
require_once "config.php";


// $id = 0;

// Prepare a delete statement
$sql = "DELETE FROM previsao"; //  WHERE id = :id";
// Bind variables to the prepared statement as parameters
// $stmt->bindParam(":id", $param_id);
// Set parameters
//$param_id = $id;






    if ($stmt = pdo->query(sql)) {
        echo "<p> Registros apagados com sucesso, redirecionando para o Dashboard</p>";
        header("location: index.php");
        exit();
    } else {
        echo "<p>Opa! Algo não funcionou como devia. Tente novamente mais tarde.</p>";
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
?>
