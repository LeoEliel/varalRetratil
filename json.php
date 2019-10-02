<?php
//url
$url = "http://apiadvisor.climatempo.com.br/api/v1/forecast/locale/5757/days/15?token=fcc72a6c209aa5e8b8d1e1954c00a0fd";
//  Initiate curl

$ch = curl_init();

// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set the url
curl_setopt($ch, CURLOPT_URL, $url);

// Execute
$result = curl_exec($ch);



// Closing
curl_close($ch);

// Will dump a beauty json :3
$json = json_decode($result, true);
