<?php
session_start();
include "DBconnection.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    $stmt = $con->prepare("SELECT * FROM coin LIMIT 10 OFFSET 0");
    $stmt->bind_param("i", $i);
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
                "X-RapidAPI-Key: acc5ef0728msha8eb6b12a17ba4fp16bac1jsnc1cafc01b039"
            ],
        ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }else{
                    $json = json_decode($response,true);
                    foreach($json as $item) {
                        echo $item['market_data']['current_price']['usd'];
                    }
                    // foreach($json as $item) {
                    //     $img_url = $item['image']['large'];
                    //     $usd = $item['market_data']['current_price']['usd'];
                    //     $cad = $item['market_data']['current_price']['cad'];
                    //     $eur = $item['market_data']['current_price']['eur'];
                    //     $php = $item['market_data']['current_price']['php'];
                    //     $jpy = $item['market_data']['current_price']['jpy'];
                    //     $price_change_24h = $item['market_data']['price_change_percentage_24h'];
                    //     $price_change_7d = $item['market_data']['price_change_percentage_7d'] 
                    //     $price_change_14d = $item['market_data']['price_change_percentage_14d'] 
                    //     $price_change_30d = $item['market_data']['price_change_percentage_30d'] 
                    //     $price_change_60d = $item['market_data']['price_change_percentage_60d'] 
                    //     $price_change_200d = $item['market_data']['price_change_percentage_200d'] 
                    //     $price_change_1yr = $item['market_data']['price_change_percentage_1yr'] 
                    // $insertStmt = $con->prepare("INSERT INTO `coin` (`img_url`, `usd`,`cad`,`eur`,`php`,`jpy`,`price_change_24h`,`price_change_7d`,`price_change_14d`,`price_change_30d`,`price_change_60d`,`price_change_200d`,`price_change_1yr`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) WHERE `Id` = ?");
                    // $insertStmt->bind_param("sdddddddddddds", $img_url,$usd, $cad,$eur,$php,$jpy,$price_change_24h,$price_change_7d,$price_change_14d,$price_change_30d,$price_change_60d,$price_change_200d,$price_change_1yr,$field['Id']); 
                    // $insertStmt->execute();
                }
            }
        }
    }

?>