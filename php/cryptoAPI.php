<?php
session_start();
include "DBconnection.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    $stmt = $dbh->prepare("SELECT * FROM coin");
    $stmt->execute();
    
    /* Fetch all of the remaining rows in the result set */
    print("Fetch all of the remaining rows in the result set:\n");
    $result = $stmt->fetchAll();
    print_r($result);
}

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://coingecko.p.rapidapi.com/coins/the-sandbox?localization=true&tickers=true&market_data=true&community_data=true&developer_data=true&sparkline=false",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET",
//     CURLOPT_HTTPHEADER => [
//         "X-RapidAPI-Host: coingecko.p.rapidapi.com",
//         "X-RapidAPI-Key: a1cb3fec1emsh2a110a5809545d3p1e18a9jsn6d2c1e7dedd7"
//     ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }
?>