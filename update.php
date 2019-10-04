<?php
// Include config file
require_once "config.php";
require_once "json.php";

// Define variables and initialize with empty values
$dataPrevisao = $humiMax = $humiMin = $chuvaProbab = $cidade = "";
$dataPrevisao_err = $humiMax_err = $humiMin_err = $chuvaProbab_err = $cidade_err = "";

// Data Previsao
$dataPrevisao = $json["data"][0]["date_br"]; 
// Humidade maxima  
$humiMax = $json["data"][0]["humidity"]["max"];
// Humidade minima
$humiMin = $json["data"][0]["humidity"]["min"];
// Probabiliade de chuva
$chuvaProbab = trim($json["data"][0]["rain"]["probability"]);
//cidade
$cidade = $json["name"]." ".$json["state"]; 

// Prepare an update statement
$sql = "UPDATE previsao SET dataPrevisao=:dataPrev, humiMax=:humiMax, humiMin=:humiMin, chuvaProbab=:chuvaProbab, cidade =:cidade";

if ($stmt = $pdo->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bindParam(":dataPrev", $param_dataPrev);
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
}

// Close statement
unset($stmt);

// Close connection
unset($pdo);
