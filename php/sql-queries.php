<?php
function retrieveAllCoins($con){
    $sql = "SELECT * FROM coin;";

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
function retrieveCoinsByCategory($con, $fiat, $category, $sort, $sortDirection, $perPage, $page){
    $sql = "SELECT symbol, img, ?, price_Change_24h, price_change_7d, price_change_14d, price_change_30d, price_change_60d, price_change_200d, price_change_1yr "
        + "FROM coin WHERE id IN (SELECT coin FROM categoryCoin WHERE category = ?) ORDER BY ? ? LIMIT ? OFFSET ?";
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
    mysqli_stmt_bind_param($stmt, "ssssii", $fiat, $category, $sort, $sortDirection, $perPage, $offset);

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

?>
