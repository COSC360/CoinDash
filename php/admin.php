<?php
    session_start();
    include "DBconnection.php";
    // include "updateUser.php";

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{

        if(isset($_POST['searchByName'])){
            $searchByName = $_POST['searchByName'];
            //Search user by name
            $selectUserByNamestmt = $con->prepare("SELECT * FROM user_auth WHERE Username = ?");
            $selectUserByNamestmt->bind_param("s", $searchByName); 
            $selectUserByNamestmt->execute();
            $resultSetselectUserByNamestmt = $selectUserByNamestmt->get_result(); // get the mysqli result
            $resultselectUserByName = $resultSetselectUserByNamestmt->fetch_assoc();
        }

        if(isset($_POST['searchByEmail'])){
            $searchByEmail = $_POST['searchByEmail'];
            // //Search user by email
            $selectUserByEmailstmt = $con->prepare("SELECT * FROM user_auth WHERE Email = ?");
            $selectUserByEmailstmt->bind_param("s", $searchByEmail); 
            $selectUserByEmailstmt->execute();
            $resultSetselectUserByEmailstmt = $selectUserByEmailstmt->get_result(); // get the mysqli result
            $resultselectUserByEmail = $resultSetselectUserByEmailstmt->fetch_assoc();
            
        }

        if(isset($_POST['searchByCommentId'])){
            $searchByCommentId = $_POST['searchByCommentId'];
            // //Search user by comment
            $selectUserByCommentstmt = $con->prepare("SELECT * FROM user_auth AS u JOIN comment AS c ON c.user_id = u.Id WHERE c.id = ?");
            $selectUserByCommentstmt->bind_param("i", $searchByCommentId); 
            $selectUserByCommentstmt->execute();
            $resultSetselectUserByCommentstmt = $selectUserByCommentstmt->get_result(); // get the mysqli result
            $resultselectUserByComment = $resultSetselectUserByCommentstmt->fetch_all(MYSQLI_ASSOC);
            $_SESSION["postId"] = $resultselectUserByComment[0]['id'];
            $_SESSION["commentText"] = $POST['comment'];
        }


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
    <style>
        .divider{
            margin-bottom: 2em;
        }
        
        #commentText{
            width: 118em;
        }
    </style>    
</head>
<body>
    <?php
        include "dashboard-header.php";
    ?> 
<main>    
    <article class="panel">
        <form action="" method="POST">
            Search by Name: <input type="text" name ="searchByName" id="searchByName"><input type="submit" name="submit" value="search">
            <div class="reviews divider">
                <h2>User Information</h2>
                <p>User Id : <?php echo $resultselectUserByName['Id']?></p>
                <p>User Username : <?php echo $resultselectUserByName['Username']?></p>
                <p>User Email : <?php echo $resultselectUserByName['Email']?></p>
                <p>User Status : <?php echo $resultselectUserByName['status']?></p>
            </div>

            Search by Email: <input type="text" name ="searchByEmail" id="searchByEmail"><input type="submit" name="submit" value="search">
            <div class="reviews divider">
                <h2>User Information</h2>
                <p>User Id : <?php echo $resultselectUserByEmail['Id']?></p>
                <p>User Username : <?php echo $resultselectUserByEmail['Username']?></p>
                <p>User Email : <?php echo $resultselectUserByEmail['Email']?></p>
                <p>User Status : <?php echo $resultselectUserByEmail['status']?></p>
            </div>

            Search by Comment ID: <input type="text" name ="searchByCommentId" id="searchByCommentId"><input type="submit" name="submit" value="search">
            <div class="reviews">
                <h2>User Information</h2>
                <p>User Id : <?php echo $resultselectUserByComment[0]['Id']?></p>
                <p>User Username : <?php echo $resultselectUserByComment[0]['Username']?></p>
                <p>User Email : <?php echo $resultselectUserByComment[0]['Email']?></p>
                <p>User Status : <?php echo $resultselectUserByComment[0]['status']?></p>
                    <form action="" method ="POST">
                        <input type="text" name ="commentText" id="commentText" value="<?php echo $resultselectUserByComment[0]['text']?>">
                        <input type="submit" name="submit" value="change">
                    </form>
            </div>
        </form>
    </article>
</main>    
</main>
</body>
</html>