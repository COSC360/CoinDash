<?php
session_start();
include "DBconnection.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    $stmt = $con->prepare("SELECT * FROM coin ORDER BY category ASC");
    $stmt->execute();
    $resultSet = $stmt->get_result(); // get the mysqli result
    $result = $resultSet->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $field) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coingecko.p.rapidapi.com/coins/".$field['Id']."?localization=false&tickers=false&market_data=true&community_data=false&developer_data=false&sparkline=false",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: coingecko.p.rapidapi.com",
                "X-RapidAPI-Key: a1cb3fec1emsh2a110a5809545d3p1e18a9jsn6d2c1e7dedd7"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        // Closing curl

    }
}

?>