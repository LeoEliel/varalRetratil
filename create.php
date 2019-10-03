<?php
// Include config file
require_once "config.php";
require_once "json.php";

// Define variables and initialize with empty values
$dataPrevisao = $humiMax = $humiMin = $chuvaProbab = $cidade = "";
$dataPrevisao_err = $humiMax_err = $humiMin_err = $chuvaProbab_err = $cidade_err = "";

// Data Previsao
echo $json[data[date_br]];
//$dataPrevisao = trim($json[data[date_br]]); // JSON da API
// Humiadade maxima
$humiMax = trim($_POST["humiMax"]); // JSON da API
// Humiadade m+inima
$humiMin = trim($_POST["humiMin"]); // JSON da API
// Probabiliade de chuva
$chuvaProbab = trim($_POST["chuvaProbab"]); // JSON da API
//cidade
$cidade = trim($_POST["cidade"]); // JSON da API

// Prepare an insert statement
$sql = "INSERT INTO previsao (dataPrevisao, humiMax, humiMin, chuvaProbab, cidade) VALUES (:dataPrevisao, :humiMax, :humiMin, :chuvaProbab, :cidade)";

if ($stmt = $pdo->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":dataPrevisao", $param_dataPrev);
    $stmt->bindParam(":humiMax", $param_humiMax);
    $stmt->bindParam(":humiMin", $param_humiMin);
    $stmt->bindParam(":chuvaProbab", $param_chuvaProbab);
    $stmt->bindParam(":cidade", $param_cidade);


    // Set parameters
    $param_dataPrev = $dataPrevisao;
    $param_humiMax = $humiMax;
    $param_humiMin = $humiMin;
    $param_chuvaProbab = $chuvaProbab;
    $param_cidade = $cidade;

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        echo "Registros gravados com sucesso, redirecionando p/ Dashboard";
        header("location: index.php");
        exit();
    } else {
        echo "Algo nao funcionou como devia. Tente novamente mais tarde.";
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
}
