<?php
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM previsao";

    $stmt = $pdo->prepare($sql);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retrieve individual field value
                $dataPrevisao = $row["dataPrevisao"];
                $humiMax = $row["humiMax"];
                $humiMin = $row["humiMin"];
                $chuvaProbab = $row["chuvaProbab"];
                
            } else {
                echo "erro";
                exit();
            }
        } else {
            echo "Opa! Algo não funcionou como devia. Tente novamente mais tarde.";
        }
    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
?>