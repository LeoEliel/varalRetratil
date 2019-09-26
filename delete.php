<?php
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $sql = "DELETE * FROM previsao";
    
    if($stmt = $pdo->prepare($sql)){    
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "<p> Registros apagados com sucesso, redirecionando para o Dashboard";
            header("location: index.php");
            exit();
        } else{
            echo "Opa! Algo não funcionou como devia. Tente novamente mais tarde.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
?>