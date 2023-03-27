<?php
    include "DBconnection.php";
    include "sql-queries.php";
    session_start();
    $searchId = $_POST['searchId'];

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        $cmmtstmt = $con->prepare("SELECT * FROM `comment` WHERE  `user_id` = ?");
        $cmmtstmt->bind_param("i", $searchId); 
        $cmmtstmt->execute();
        $resultSetcmmt = $cmmtstmt->get_result(); // get the mysqli result
        $resultcmmt = $resultSetcmmt->fetch_assoc();
        
        echo "<script>console.log(".$resultcmmt.")</script>";
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
            <input type="text" name ="searchId" id="searchId"><input type="submit" name="submit" id ="submit" value="search">
        </form>
        <div class="reviews">
            <h2>Comments</h2>
            <input type="text">
        </div>
    </article>
</main>    
    <script src="../js/comment.js"></script>
    <script src="../js/updateComments.js"></script>
</main>
</body>
</html>