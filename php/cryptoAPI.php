<?php
session_start();
include "DBconnection.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else{
    $stmt = $con->prepare("SELECT * FROM coin LIMIT 10 OFFSET 30");
    $stmt->execute();
    $resultSet = $stmt->get_result(); // get the mysqli result
    $result = $resultSet->fetch_all(MYSQLI_ASSOC);
    foreach ($result as $field) {
    
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://coingecko.p.rapidapi.com/coins/".$field['Id']."?localization=false&market_data=true",
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
                    $desc = $json['description']['en'];
                    $img_url = $json['image']['large'];
                    $usd = $json['market_data']['current_price']['usd'];
                    $cad = $json['market_data']['current_price']['cad'];
                    $eur = $json['market_data']['current_price']['eur'];
                    $php = $json['market_data']['current_price']['php'];
                    $jpy = $json['market_data']['current_price']['jpy'];
                    $price_change_24h = $json['market_data']['price_change_percentage_24h'];
                    $price_change_7d = $json['market_data']['price_change_percentage_7d']; 
                    $price_change_14d = $json['market_data']['price_change_percentage_14d']; 
                    $price_change_30d = $json['market_data']['price_change_percentage_30d']; 
                    $price_change_60d = $json['market_data']['price_change_percentage_60d']; 
                    $price_change_200d = $json['market_data']['price_change_percentage_200d']; 
                    $price_change_1yr = $json['market_data']['price_change_percentage_1yr'];
                     
                    $updateStmt = $con->prepare("UPDATE coin SET `description` = ?,img_url = ?, usd = ?,cad = ?,eur = ?,php = ?,jpy = ?,price_change_24h = ?,price_change_7d = ?,price_change_14d = ?,price_change_30d = ?,price_change_60d = ?,price_change_200d = ?,price_change_1yr = ? WHERE Id = ?");
                    $updateStmt->bind_param("ssdddddddddddss",$desc, $img_url, $usd, $cad, $eur, $php, $jpy, $price_change_24h, $price_change_7d, $price_change_14d, $price_change_30d, $price_change_60d, $price_change_200d, $price_change_1yr, $field['Id']); 
                    $updateStmt->execute();
                    echo "Update success !";

                    $categoryResultSet = $json['categories'];
                    foreach($categoryResultSet as $category){
                        $insertStmt = $con->prepare("INSERT INTO coinCategory(coin,category) VALUES (?,?)"); 
                        $insertStmt->bind_param("ss",$field['Id'],$category); 
                        $insertStmt->execute(); 
                    } 
                    echo "Insert success !";

                    $selectStmt = $con->prepare("SELECT `name` FROM category");
                    $selectStmt->execute();
                    $SelectResultSet = $selectStmt->get_result(); // get the mysqli result
                    $selectRS = $SelectResultSet->fetch_all(MYSQLI_ASSOC);
                    if($selectRS != null){
                        $newSelectRS = array();
                        foreach($selectRS as $field){
                            array_push($newSelectRS,$field['name']);
                        }      
                        $arrDiff = array_diff($categoryResultSet,$newSelectRS);

                        foreach($arrDiff as $newCategory){
                            $insertCategoryStmt = $con->prepare("INSERT INTO category(`name`) VALUES (?)");
                            $insertCategoryStmt->bind_param("s",$newCategory);
                            $insertCategoryStmt->execute();
                        }
                    }else{
                        foreach($categoryResultSet as $category){
                            $insertCategoryStmt = $con->prepare("INSERT INTO category(`name`) VALUES (?)");
                            $insertCategoryStmt->bind_param("s",$category);
                            $insertCategoryStmt->execute(); 
                        }                    
                    }     
                }
            }
        }

    }

?>