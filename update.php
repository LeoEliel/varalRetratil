<?php
// Include config file
require_once "config.php";
require_once "json.php";

// Define variables and initialize with empty values
$dataPrevisao = $humiMax = $humiMin = $chuvaProbab = $cidade = "";
$dataPrevisao_err = $humiMax_err = $humiMin_err = $chuvaProbab_err = $cidade_err = "";

// Define o ID do registro que irá ser atualizado
$id = 0;

// Data Previsao
$dataPrevisao = trim($_POST["dataPrevisao"]); // JSON da API
// Humiadade maxima
$humiMax = trim($_POST["humiMax"]); // JSON da API
// Humiadade m+inima
$humiMin = trim($_POST["humiMin"]); // JSON da API
// Probabiliade de chuva
$chuvaProbab = trim($_POST["chuvaProbab"]); // JSON da API
//cidade
$cidade = trim($_POST["cidade"]); // JSON da API

// Prepare an update statement
$sql = "UPDATE previsao SET dataPrevisao=:dataPrev, humiMax=:humiMax, humiMin=:humiMin, chuvaProbab=:chuvaProbab, cidade =:cidade WHERE id=:id";

if ($stmt = $pdo->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":dataPrev", $param_dataPrev);
    $stmt->bindParam(":humiMax", $param_humiMax);
    $stmt->bindParam(":humiMin", $param_humiMin);
    $stmt->bindParam(":chuvaProbab", $param_chuvaProbab);
    $stmt->bindParam(":cidade", $param_cidade);
    $stmt->bindParam(":id", $param_id);

    // Set parameters
    $param_dataPrev = $dataPrevisao;
    $param_humiMax = $humiMax;
    $param_humiMin = $humiMin;
    $param_chuvaProbab = $chuvaProbab;
    $param_cidade = $cidade;
    $param_id = $id;

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Registros gravados com sucesso, redirecionando p/ Dashboard";
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
