<?php
// Include config file
require_once "config.php";


// Prepare a statement
$sql = "SELECT * FROM previsao";

if ($result = $pdo->query($sql)) {
    while ($row = $result->fetch()) {
        $dataPrevisao = $row["dataPrevisao"];
        $humiMax = $row["humiMax"];
        $humiMin = $row["humiMin"];
        $chuvaProbab = $row["chuvaProbab"];
        $cidade = $row["cidade"];
        exit();
    }
} else {
    echo "Opa! Algo não funcionou como devia. Tente novamente mais tarde.";
}
// Close statement
unset($result);

// Close connection
unset($pdo);
?>