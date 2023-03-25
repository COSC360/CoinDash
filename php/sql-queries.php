<?php
session_start();
function retrieveAllCoins($con){
    $sql = "SELECT * FROM coin;";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        // TODO:
        // header("location: REPLACE LATER");
        echo "Error 1";
        exit();
    }

    // Reject if parameters are invalid
    // if (!isset($category) || !isset($fiat) || !isset($sort) || !isset($sortDirection)){
    //     exit();
    // }

    // Execute prepared statement
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows; 
    } else {
        // mysqli_stmt_close();
        return false;
    }

}

function retrieveCoinsByCategory($con, $fiat, $category, $sort, $perPage, $page){
    $sql = "SELECT symbol, img, ?, price_Change_24h, price_change_7d, price_change_14d, price_change_30d, price_change_60d, price_change_200d, price_change_1yr "
        + "FROM coin WHERE id IN (SELECT coin FROM categoryCoin WHERE category = ?) ORDER BY ? LIMIT ? OFFSET ?";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
    }

    // Reject if parameters are invalid
    // if (!isset($category) || !isset($fiat) || !isset($sort) || !isset($sortDirection)){
    //     exit();
    // }

    $offset = ($page - 1) * $perPage;

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($stmt, "ssssii", $fiat, $category, $sort, $perPage, $offset);

    // Execute prepared statement
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);

    if ($rows = $results -> fetch_all(MYSQL_ASSOC)){
        // mysqli_stmt_close();
        return $rows;
    } else {
        // mysqli_stmt_close();
        return false;
    }

}

function createCoinCategory($con, $coinId, $coinCategory){
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        $createStmt = $con->prepare("CREATE TABLE coinCategory(coin VARCHAR(225) NOT NULL, category VARCHAR(255) NOT NULL,PRIMARY KEY(coin), PRIMARY KEY(category))");
        $createStmt->execute();
        $insertStmt = $con->prepare("INSERT INTO `coinCategory` (`coin`, `category`) VALUES (?,?)");
        $insertStmt->bind_param("ss", $coinId,$coinCategory); 
        $insertStmt->execute();
    }
}

function uploadDashboard($con, $userId, $dashboardObject){

    $dashboardSql = "INSERT INTO dashboard (user_id) VALUES (?);";
    $blockSql = "INSERT INTO block (dashboard_id) VALUES (?);";
    $moduleSql = "INSERT INTO module (block_id, dashboard_id, category, fiat, spot) VALUES (?, ?, ?, ?, ?);";
    echo "<script>console.log('Hello')</script>";
    $dashboardStmt = mysqli_stmt_init($con);
    mysqli_stmt_bind_param($dashboardStmt, "s", $userId);

    try {
        mysqli_stmt_execute($dashboardStmt);

        $dashboardObject = json_decode($dashboardObject);
        echo "<script>console.log('".$dashboardObject."')</script>";
    } catch (Exception $e){

    }
}

function deleteDashboard($con, $userId){
    $dashboardSql = "DELETE FROM dashboard WHERE user_id = ?;";
    $blockSql = "DELETE FROM block WHERE user_id = ?;";
    $moduleSql = "DELETE FROM module WHERE user_id = ?;";

    $dashboardStmt = mysqli_stmt_init($con);
    $blockStmt = mysqli_stmt_init($con);
    $moduleStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($dashboardStmt, $dashboardSql) || !mysqli_stmt_prepare($blockStmt, $blockSql) || !mysqli_stmt_prepare($moduleStmt, $moduleSql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($dashboardStmt, "s", $userId);
    mysqli_stmt_bind_param($blockStmt, "s", $userId);
    mysqli_stmt_bind_param($moduleStmt, "s", $userId);

    try {
        // Delete in reverse order to maintain constraints
        mysqli_stmt_execute($moduleStmt);
        mysqli_stmt_execute($blockStmt);
        mysqli_stmt_execute($dashboardStmt);
        return true;
    } catch (Exception $e){
        return false;
    }
}

function retrieveDashboard(){

}

?>
