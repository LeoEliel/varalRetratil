<?php
// Include config file
require_once "config.php";


// Define variables and initialize with empty values
    $dataPrevisao = $humiMax = $humiMin = $chuvaProbab = "";
    $dataPrevisao_err = $humiMax_err = $humiMin_err = $chuvaProbab_err = "";

    // Data Previsao
    $dataPrevisao = trim($_POST["dataPrevisao"]);// JSON da API
    // Humiadade maxima
    $humiMax = trim($_POST["humiMax"]);// JSON da API
    // Humiadade m+inima
    $humiMin = trim($_POST["humiMin"]);// JSON da API
    // Probabiliade de chuva
    $chuvaProbab = trim($_POST["chuvaProbab"]);// JSON da API

        // Prepare an insert statement
        $sql = "INSERT INTO previsao (dataPrevisao, humiMax, humiMin, chuvaProbab) VALUES (:dataPrevisao, :humiMax, :humiMin, :chuvaProbab)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":dataPrevisao", $param_dataPrev);
            $stmt->bindParam(":humiMax", $param_humiMax);
            $stmt->bindParam(":humiMin", $param_humiMin);
            $stmt->bindParam(":chuvaProbab", $param_chuvaProbab);
            

            // Set parameters
            $param_dataPrev = $dataPrevisao;
            $param_humiMax = $humiMax;
            $param_humiMin = $humiMin;
            $param_chuvaProbab = $chuvaProbab;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Algo nao funcionou como devia. Tente novamente mais tarde.";
            }
        }

        // Close statement
        unset($stmt);

    // Close connection
    unset($pdo);
?>