<?php
    session_start();
    include "DBconnection.php";

    $searchId = $_POST['searchId'];
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        if(isset($_POST['searchByName']) && $_POST['searchByEmail'] && $_POST['searchByCommentId']){
            $searchByName = $_POST['searchByName'];
            $searchByEmail = $_POST['searchByEmail'];
            $searchByCommentId = $_POST['searchByCommentId'];
            //Search user by name
            $selectUserByNamestmt = $con->prepare("SELECT * FROM user_auth WHERE `name` = ?");
            $selectUserByNamestmt->bind_param("s", $searchByName); 
            $selectUserByNamestmt->execute();
            $resultSetselectUserByNamestmt = $selectUserByNamestmt->get_result(); // get the mysqli result
            $resultselectUserByName = $resultSetselectUserByNamestmt->fetch_assoc();

            // //Search user by email
            $selectUserByEmailstmt = $con->prepare("SELECT * FROM user_auth WHERE `email` = ?");
            $selectUserByEmailstmt->bind_param("s", $searchByEmail); 
            $selectUserByEmailstmt->execute();
            $resultSetselectUserByEmailstmt = $selectUserByEmailstmt->get_result(); // get the mysqli result
            $resultselectUserByEmail = $resultSetselectUserByEmailstmt->fetch_assoc();

            // //Search user by comment
            $selectUserByCommentstmt = $con->prepare("SELECT * FROM `user_auth` AS `u` JOIN `comment` AS `c` ON `c.user_id` = `u.id` WHERE `c.id` = ?");
            $selectUserByCommentstmt->bind_param("i", $searchByCommentId); 
            $selectUserByCommentstmt->execute();
            $resultSetselectUserByCommentstmt = $selectUserByCommentstmt->get_result(); // get the mysqli result
            $resultselectUserByComment = $resultSetselectUserByCommentstmt->fetch_all(MYSQLI_ASSOC);
        }else{
            $error = "No data sent!";
            echo "<script>console.log(".$error.")</script>";
        }
        // $_SESSION['comment'] = $resultcmmt['text'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/individual.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
</head>
<body>
    <?php
        include "dashboard-header.php";
    ?> 
<main>    
    <article class="panel">
        <h1>Admin</h1>
        <form action="" method="POST">
            <input type="text" name ="searchByName" id="searchByName"><input type="submit" name="submit" value="search">
            <input type="text" name ="searchByEmail" id="searchByEmail"><input type="submit" name="submit" value="search">
            <input type="text" name ="searchByCommentId" id="searchByCommentId"><input type="submit" name="submit" value="search">

        </form>
        <div class="reviews">
            <h2>Comments</h2>
            <input type="text">
        </div>
    </article>
</main>    
</main>
</body>
</html>