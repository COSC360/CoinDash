<?php
session_start();


function retrieveAllCoins($con){
    $sql = "SELECT * FROM coin LIMIT 12;";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }
    
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

function updateCoinViews($con, $coinId){
    $updateSql = "UPDATE coin SET views = views + 1 WHERE Id = ?";

    $updateStmt = mysqli_stmt_init($con); 
    
    if (!mysqli_stmt_prepare($updateStmt, $updateSql)){
        return false;
    }
    // Set parameters for prepared statement
    mysqli_stmt_bind_param($updateStmt, "s", $coinId);
    // Execute prepared statement
    if (mysqli_stmt_execute($updateStmt)){
        return true;
    } else {
        return false;
    }
}

function retrieveCoinsByCategory($con, $fiat, $category, $sort, $perPage, $page){
    $validSortValues = array("views DESC", "views", "price_change_24h DESC", "price_change_24h", 
                    "price_change_7d DESC", "price_change_7d", "price_change_14d DESC", "price_change_14d",
                    "price_change_30d DESC", "price_change_30d", "price_change_60d DESC", "price_change_60d",
                    "price_change_200d DESC", "price_change_200d", "price_change_1yr DESC", "price_change_1yr");

    if (!in_array($sort, $validSortValues)){
        return false;
    }

    $sql = "SELECT * FROM coin WHERE id IN (SELECT coin FROM coinCategory WHERE category = ?) ORDER BY ".$sort." LIMIT ? OFFSET ?;";
    //ORDER BY ? LIMIT ? OFFSET ?;

    //WHERE id IN (SELECT coin_id FROM categoryCoin WHERE category = ?) LIMIT ? OFFSET ?
    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }
    
    $offset = ($page - 1) * $perPage;

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($stmt, "sii", $category, $perPage, $offset);
    
    // Execute prepared statement
    mysqli_stmt_execute($stmt);
    
    $results = mysqli_stmt_get_result($stmt);
    if ($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows;
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function retrieveCoinById($con, $coinId){
    $sql = "SELECT * FROM coin WHERE Id = ?";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($stmt, "s", $coinId);

    // Execute prepared statement
    mysqli_stmt_execute($stmt);
    
    $results = mysqli_stmt_get_result($stmt);

    if ($rows = $results -> fetch_all(MYSQLI_ASSOC)){

        // mysqli_stmt_close();
        return $rows;
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function retrieveCoinByLike($con, $like){
    
    $sql = "SELECT * FROM coin WHERE Id LIKE ?";

    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }
    
    $likePattern = "%".$like."%";
    // Set parameters for prepared statement
    mysqli_stmt_bind_param($stmt, "s", $likePattern);

    // Execute prepared statement
    mysqli_stmt_execute($stmt);
    
    $results = mysqli_stmt_get_result($stmt);

    if ($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows;
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function retrievePossibleCategories($con){

    $sql = "SELECT DISTINCT category FROM coinCategory;";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }

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

function uploadDashboard($con, $userId, $dashboardJSON){

    deleteDashboard($con, $userId);
    $dashboardSql = "INSERT INTO dashboard (user_id) VALUES (?);";
    $blockSql = "INSERT INTO block (dashboard_id, user_id) VALUES (?, ?);";
    $moduleSql = "INSERT INTO module (block_id, dashboard_id, user_id, category, fiat, sort) VALUES (?, ?, ?, ?, ?, ?);";

    try {
        uploadActivity($con, $userId, "editDashboard");
        $dashboardObject = json_decode($dashboardJSON);
        $blocks = $dashboardObject -> blocks;

        $dashboardStmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($dashboardStmt, $dashboardSql)){
            return false;
        }

        mysqli_stmt_bind_param($dashboardStmt, "i", $userId);
        mysqli_stmt_execute($dashboardStmt); 
        mysqli_stmt_close($dashboardStmt);

        $dashboardId = mysqli_insert_id($con);

        foreach($blocks as $block){

            $modules = $block -> modules;
            $blockStmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($blockStmt, $blockSql)){
                return false;
            }

            mysqli_stmt_bind_param($blockStmt, "ii", $dashboardId, $userId);
            mysqli_stmt_execute($blockStmt); 
            mysqli_stmt_close($blockStmt);

            $blockId = mysqli_insert_id($con);
            
            
            foreach($modules as $module){
                $category = $module -> category;
                $fiat = $module -> fiat;
                $sort = $module -> sort;

                $moduleStmt = mysqli_stmt_init($con);
                if (!mysqli_stmt_prepare($moduleStmt, $moduleSql)){
                    return false;
                }
                mysqli_stmt_bind_param($moduleStmt, "iiisss", $blockId, $dashboardId, $userId, $category, $fiat, $sort);
                mysqli_stmt_execute($moduleStmt); 
                mysqli_stmt_close($moduleStmt);
            }
        }
    } catch (Exception $e){
        return false;
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
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($dashboardStmt, "s", $userId);
    mysqli_stmt_bind_param($blockStmt, "s", $userId);
    mysqli_stmt_bind_param($moduleStmt, "s", $userId);

    mysqli_stmt_execute($moduleStmt);
    mysqli_stmt_execute($blockStmt);
    mysqli_stmt_execute($dashboardStmt);
}

function retrieveDashboard($con, $userId){
    $moduleSql = "SELECT id, block_id, category, fiat, sort FROM module WHERE user_id = ?;";

    $moduleStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($moduleStmt, $moduleSql)){
        return false;
    }

    mysqli_stmt_bind_param($moduleStmt, "i", $userId);
    mysqli_stmt_execute($moduleStmt);

    $result = mysqli_stmt_get_result($moduleStmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows; 
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function uploadComment($con, $userId, $coinId, $text, $parentId){
    $commentSql = "INSERT INTO comment (coin_id, user_id, text, parentId) VALUES (?, ?, ?, ?);";
    
    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        return false;
    }

    mysqli_stmt_bind_param($commentStmt, "sssi", $coinId, $userId, $text, $parentId);
    mysqli_stmt_execute($commentStmt);
    mysqli_stmt_close($commentStmt);
}

function deleteComment($con, $commentId){
    $commentSql = "DELETE FROM comment WHERE id = ?;";

    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        return false;
    }

    mysqli_stmt_bind_param($commentStmt, "i", $commentId);
    mysqli_stmt_execute($commentStmt);
    mysqli_stmt_close($commentStmt);
}

function retrievePostComment($con, $coinId){
    $commentSql = "SELECT c.id, coin_id, text, parentId, username, timestamp FROM comment c JOIN userAuth u ON c.user_id = u.id WHERE coin_id = ? AND parentId IS NULL ORDER BY timestamp DESC";
    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        return false;
    }

    mysqli_stmt_bind_param($commentStmt, "s", $coinId);
    mysqli_stmt_execute($commentStmt);

    $result = mysqli_stmt_get_result($commentStmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows; 
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function retrieveUserComment($con, $userId){
    $userCommentSql = "SELECT c.id AS `commentId`, coin_id, `text`, parentId, u.id AS `userId`, `timestamp`, x.img_url FROM comment c JOIN userAuth u ON c.user_id = u.id JOIN coin x ON x.Id = c.coin_id WHERE u.id = ? ORDER BY timestamp DESC";
    $userCommentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($userCommentStmt, $userCommentSql)){
        return false;
    }

    mysqli_stmt_bind_param($userCommentStmt, "i", $userId);
    mysqli_stmt_execute($userCommentStmt);

    $result = mysqli_stmt_get_result($userCommentStmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($userCommentStmt);
        return $rows; 
    } else {
        mysqli_stmt_close($userCommentStmt);
        return false;
    }
}

function retrieveCommentReplies($con, $parentId){
    $commentSql = "SELECT c.id, coin_id, text, parentId, username, timestamp FROM comment c JOIN userAuth u ON c.user_id = u.id WHERE parentId = ? ORDER BY timestamp DESC";
    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        return false;
    }
    
    mysqli_stmt_bind_param($commentStmt, "i", $parentId);
    mysqli_stmt_execute($commentStmt);

    $result = mysqli_stmt_get_result($commentStmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows; 
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

function loginUser($con,$loginID,$loginPassword){
    
    $loginSQL = "SELECT * FROM `userAuth` WHERE  (`email` = ? AND `password` = ?) OR (`username` = ? AND `password` = ?)";

    $loginStmt = mysqli_stmt_init($con); 

    if (!mysqli_stmt_prepare($loginStmt, $loginSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($loginStmt, "ssss", $loginID, md5($loginPassword),$loginID, md5($loginPassword));

    // Execute prepared statement
    mysqli_stmt_execute($loginStmt);

    $results = mysqli_stmt_get_result($loginStmt);

    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($loginStmt);
        //Creating session variables 
        $_SESSION["username"] = $rows['username'];
        $_SESSION["userType"] = $rows['userType'];
        $_SESSION["email"] = $rows['email'];
        $_SESSION["password"] = $loginPassword;
        $_SESSION["id"] = $rows['id'];
        $_SESSION["profilePicture"] = $rows['profilePicture'];
        
        uploadActivity($con, $rows['id'], "loggedIn");

        //Navigate to admin.php if user is of "admin" type
        if($rows['userType'] == 'admin'){
            header('location:account.php');
            
        //Navigate to account.php if user is of "user" type and status is "enabled"
        }elseif($rows['userType'] == 'user' && $rows['status'] == "enabled"){
            header('location: account.php');


        //Display an error if user is of "user" type and status is "disabled"            
        }elseif($rows['userType'] == 'user' && $rows['status'] == "disabled"){
            $_SESSION['statusMsg'] = "Your account has been disabled by the admin !";
            header('location:signIn.php');
        }
    }else{
        mysqli_stmt_close($loginStmt);
        header('location:signIn.php');
        $_SESSION['statusMsg'] = "Invalid login details !";
        return false;
    }

}

function adminLogin($con,$adminLoginID, $adminPassword){
    $adminLoginSQL = "SELECT * FROM `userAuth` WHERE  (`email` = ? AND `password` = ?) OR (`username` = ? AND `password` = ?)";

    $adminLoginStmt = mysqli_stmt_init($con); 

    if (!mysqli_stmt_prepare($adminLoginStmt, $adminLoginSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($adminLoginStmt, "ssss", $adminLoginID, md5($adminPassword),$adminLoginID, md5($adminPassword));

    // Execute prepared statement
    mysqli_stmt_execute($adminLoginStmt);

    $results = mysqli_stmt_get_result($adminLoginStmt);

    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        
        //Navigate to admin.php if user is of "admin" type
        if($rows['userType'] == 'admin'){
            $_SESSION['id'] = $rows['id'];
            $_SESSION['username'] = $rows['username'];
            $_SESSION['userType'] = $rows['userType'];
            header('location:admin.php');   
        }else{
            $_SESSION['statusMsg'] = "User is not admin !";
            header('location:adminlogin.php');
        }
    }else{
        // mysqli_stmt_close();
        header('location:adminlogin.php');
        $_SESSION['statusMsg'] = "User does not exist !";
        return false;
    }
}

function registerUser($con,$registerUsername,$registerEmail,$registerPassword,$registerVerifyPassword,$registerSelectedOption,$registerUserType,$registerUserStatus,$registerImage){
    
    $statusMsg = '';

    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `email` = ? OR `username` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        header('location:signUp.php');
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "ss", $registerEmail,$registerUsername);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        $_SESSION['statusMsg'] = 'User with that email/username already exists !';
        header('location:signUp.php');
        
    }else{
        if($registerPassword != $registerVerifyPassword){
            $_SESSION['statusMsg'] = 'Passwords do not match !';
            header('location:signUp.php');
        
        }else{
            $registerUserSQL = "INSERT INTO `userAuth` (`username`, `email`, `password`,`comingFrom`,`profilePicture`,`userType`,`status`) VALUES (?,?,?,?,?,?,?)";
            
            $registerUserStmt = mysqli_stmt_init($con);

            if (!mysqli_stmt_prepare($registerUserStmt, $registerUserSQL)){
                $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
                header('location:signUp.php');
                return false;
            }
        
            // Set parameters for prepared statement
            mysqli_stmt_bind_param($registerUserStmt, "sssssss", $registerUsername,$registerEmail,$registerPassword,$registerSelectedOption,$registerImage,$registerUserType,$registerUserStatus);
        
            // Execute prepared statement
            mysqli_stmt_execute($registerUserStmt);

            header('location:signIn.php');

        }
    }
}

function updateUser($con,$userEmail,$userPassword){
    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `email` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "s", $userEmail);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        $_SESSION['statusMsg'] = 'User with that email already exists !';
        header('location:account.php');
    }else{
        $updateSQL = "UPDATE `userAuth` SET `email` = ?, `password` = ? WHERE `id` = ?";

        $updateStmt = mysqli_stmt_init($con); 
    
        if (!mysqli_stmt_prepare($updateStmt, $updateSQL)){
            $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
            return false;
        }
    
    
        // Set parameters for prepared statement
        mysqli_stmt_bind_param($updateStmt, "ssi", $userEmail,$userPassword, $_SESSION['id']);
    
        // Execute prepared statement
        mysqli_stmt_execute($updateStmt);
    
        header('location:account.php');        
    }
}

function searchByUsername($con, $searchName){
    $searchSQL = "SELECT * FROM `userAuth` WHERE  `username`= ?";

    $searchStmt = mysqli_stmt_init($con); 

    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "s", $searchName);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($searchStmt);

        $_SESSION['RSId'] = $rows['id'];
        $_SESSION['RSUsername'] = $rows['username'];
        $_SESSION['RSEmail'] = $rows['email'];
        $_SESSION['RSPassword'] = $rows['password'];
        $_SESSION['RSComingFrom'] = $rows['comingFrom'];
        $_SESSION['RSUserType'] = $rows['userType'];
        $_SESSION['RSUserStatus'] = $rows['status'];
        $_SESSION['RSRegisterTimestamp'] = $rows['registerationTimestamp'];
        $_SESSION['RSProfilePicture'] = $rows['profilePicture'];
        $_SESSION['defaultTabID'] = "defaultUsername";
        header('location:admin.php');
    }else{
        $_SESSION['statusMsg'] = "User not found with the given username";
        header('location:admin.php'); 
        return false;
    }
}

function searchByEmail($con, $searchEmail){
    $searchSQL = "SELECT * FROM `userAuth` WHERE  `email`= ?";

    $searchStmt = mysqli_stmt_init($con); 
    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "s", $searchEmail);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($searchStmt);

        $_SESSION['RSId'] = $rows['id'];
        $_SESSION['RSUsername'] = $rows['username'];
        $_SESSION['RSEmail'] = $rows['email'];
        $_SESSION['RSPassword'] = $rows['password'];
        $_SESSION['RSComingFrom'] = $rows['comingFrom'];
        $_SESSION['RSUserType'] = $rows['userType'];
        $_SESSION['RSUserStatus'] = $rows['status'];
        $_SESSION['RSRegisterTimestamp'] = $rows['registerationTimestamp'];
        $_SESSION['RSProfilePicture'] = $rows['profilePicture'];
        $_SESSION['defaultTabID'] = "defaultEmail";
        header('location:admin.php');
    }else{
        $_SESSION['statusMsg'] = "User not found with the given email";
        header('location:admin.php'); 
        return false;
    }
}

function searchByCommentId($con, $searchCommentId){
    $searchSQL = "SELECT * FROM userAuth u JOIN comment c ON c.user_id = u.id WHERE c.id = ?";

    $searchStmt = mysqli_stmt_init($con); 

    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "i", $searchCommentId);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($searchStmt);

        $_SESSION['RSId'] = $rows['user_id'];
        $_SESSION['RSUsername'] = $rows['username'];
        $_SESSION['RSEmail'] = $rows['email'];
        $_SESSION['RSPassword'] = $rows['password'];
        $_SESSION['RSComingFrom'] = $rows['comingFrom'];
        $_SESSION['RSUserType'] = $rows['userType'];
        $_SESSION['RSUserStatus'] = $rows['status'];
        $_SESSION['RSRegisterTimestamp'] = $rows['registerationTimestamp'];
        $_SESSION['RSProfilePicture'] = $rows['profilePicture'];
        $_SESSION['defaultTabID'] = "defaultCommentId";
        header('location:admin.php');       
    }else{
        $_SESSION['statusMsg'] = "Coin with the given ID does not exist";
        header('location:admin.php'); 
        return false;
    }
}

function enableUser($con, $userID){
    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `id` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "i", $userID);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($existingUserStmt);

        $updateSQL = "UPDATE `userAuth` SET `status` = ? WHERE `id` = ?";

        $userStatus = "enabled";

        $updateStmt = mysqli_stmt_init($con); 
    
    
        if (!mysqli_stmt_prepare($updateStmt, $updateSQL)){
            $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
            return false;
        }

        // Set parameters for prepared statement
        mysqli_stmt_bind_param($updateStmt, "si", $userStatus, $userID);

        // Execute prepared statement
        mysqli_stmt_execute($updateStmt);
    
        mysqli_stmt_close($updateStmt);   

        $_SESSION['statusMsg'] = "Status for user with ID : ".$userID." has been updated to ".$userStatus." !";

        header('location:admin.php');

    }else{
        $statusMsg = "User does not exist !";
        echo "<script>console.log(\"".$statusMsg."\")script>";
        return false;       
    }
}

function disableUser($con, $userID){
    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `id` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "i", $userID);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($existingUserStmt);
        $updateSQL = "UPDATE `userAuth` SET `status` = ? WHERE `id` = ?";

        $userStatus = "disabled";

        $updateStmt = mysqli_stmt_init($con); 

    
        if (!mysqli_stmt_prepare($updateStmt, $updateSQL)){
            $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
            return false;
        }

        // Set parameters for prepared statement
        mysqli_stmt_bind_param($updateStmt, "si", $userStatus, $userID);
        
        // Execute prepared statement
        mysqli_stmt_execute($updateStmt);

        mysqli_stmt_close($updateStmt);

        $_SESSION['statusMsg'] = "Status for user with ID : ".$userID." has been updated to ".$userStatus." !";

        header('location:admin.php');      
    }else{
        $_SESSION['statusMsg'] = "User does not exist !";
        return false;       
    }
}

function deleteUser($con, $userID){
    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `id` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "i", $userID);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($existingUserStmt);
        $deleteSQL = "DELETE FROM `userAuth` WHERE `id` = ?";

        $deleteStmt = mysqli_stmt_init($con); 

    
        if (!mysqli_stmt_prepare($deleteStmt, $deleteSQL)){
            $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
            return false;
        }

        // Set parameters for prepared statement
        mysqli_stmt_bind_param($deleteStmt, "i", $userID);

        // Execute prepared statement
        mysqli_stmt_execute($deleteStmt);

        mysqli_stmt_close($deleteStmt);
    
        $_SESSION['statusMsg'] = "User with ID : ".$userID." has been deleted !";

        header('location:admin.php');      
    }else{
        $_SESSION['statusMsg'] = "User does not exist !";
        return false;       
    }
}

function saveUser($con, $userID, $username, $password, $email, $comingFrom, $userType, $status, $regTimestamp){
    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `id` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "i", $userID);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        mysqli_stmt_close($existingUserStmt);

        $updateSQL = "UPDATE `userAuth` SET `username` = ?, `password` = ?, `email` = ?, `comingFrom` = ?, `userType` = ?, `status` = ?, `registerationTimestamp` = ? WHERE `id` = ?";

        $userStatus = "enabled";

        $updateStmt = mysqli_stmt_init($con); 
    
    
        if (!mysqli_stmt_prepare($updateStmt, $updateSQL)){
            $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
            return false;
        }

        // Set parameters for prepared statement
        mysqli_stmt_bind_param($updateStmt, "sssssssi", $username, md5($password), $email, $comingFrom, $userType, $status, $regTimestamp, $userID);

        // Execute prepared statement
        mysqli_stmt_execute($updateStmt);
    
        mysqli_stmt_close($updateStmt);   

        $_SESSION['statusMsg'] = "New details for user with ID : ".$userID." have been updated !";

        header('location:admin.php');

    }else{
        $_SESSION['statusMsg'] = "User does not exist !";
        return false;
    }
}

function retrieveRegSourceChartData($con){
    $chartDataSQL = "SELECT comingFrom, COUNT(id) AS userCount FROM `userAuth` WHERE userType = 'user' GROUP BY comingFrom";

    $chartDataStmt = mysqli_stmt_init($con); 

    $regSourceDataArray = array();
    $regSourceCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);
        
        foreach($rows as $row){
            array_push($regSourceDataArray, $row['comingFrom']);
            array_push($regSourceCountDataArray, $row['userCount']);
        }

        $_SESSION['regSourceDataArray'] = $regSourceDataArray;
        $_SESSION['regSourceCountDataArray'] = $regSourceCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }  
}

function retrieveCommentCountChartData($con){
    $chartDataSQL = "SELECT u.username, c.user_id, COUNT(c.id) AS commentCount FROM `userAuth` AS u JOIN `comment` AS c ON u.id = c.user_id GROUP BY c.user_id";

    $chartDataStmt = mysqli_stmt_init($con); 

    $commentDataArray = array();
    $commentCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);
        foreach($rows as $row){
            array_push($commentDataArray, $row['username']);
            array_push($commentCountDataArray, $row['commentCount']);
        }

        $_SESSION['commentDataArray'] = $commentDataArray;
        $_SESSION['commentCountDataArray'] = $commentCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }  
}


function retrieveUserStatusChartData($con){
    $chartDataSQL = "SELECT `status`, COUNT(id) AS userCount FROM `userAuth` GROUP BY `status`";

    $chartDataStmt = mysqli_stmt_init($con); 

    $statusDataArray = array();
    $statusCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);
        
        foreach($rows as $row){
            array_push($statusDataArray, $row['status']);
            array_push($statusCountDataArray, $row['userCount']);
        }

        $_SESSION['statusDataArray'] = $statusDataArray;
        $_SESSION['statusCountDataArray'] = $statusCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }      
}

function retrieveRegisteredUserActivityChartData($con){
    $chartDataSQL = "SELECT activity, COUNT(userid) AS userCount FROM `userActivity` WHERE userId != 0 GROUP BY activity";

    $chartDataStmt = mysqli_stmt_init($con); 

    $registeredUserDataArray = array();
    $registeredUserCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);

        foreach($rows as $row){
            array_push($registeredUserDataArray, $row['activity']);
            array_push($registeredUserCountDataArray, $row['userCount']);
        }

        $_SESSION['registeredUserDataArray'] = $registeredUserDataArray;
        $_SESSION['registeredUserCountDataArray'] = $registeredUserCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }      
}

function retrieveUnregisteredUserActivityChartData($con){
    $chartDataSQL = "SELECT activity, COUNT(userid) AS userCount FROM `userActivity` WHERE userId = 0 GROUP BY activity";

    $chartDataStmt = mysqli_stmt_init($con); 

    $unregisteredUserDataArray = array();
    $unregisteredUserCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);
        
        foreach($rows as $row){
            array_push($unregisteredUserDataArray , $row['activity']);
            array_push($unregisteredUserCountDataArray, $row['userCount']);
        }

        $_SESSION['unregisteredUserDataArray'] = $unregisteredUserDataArray;
        $_SESSION['unregisteredUserCountDataArray'] = $unregisteredUserCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }     
}

function retrieveRegisteredUserLoginActivityChartData($con){
    $chartDataSQL = "SELECT DATE(timestamp) AS `loginDate`, COUNT(userid) AS userCount FROM `userActivity` WHERE userId != 0 && activity = \"loggedIn\"";

    $chartDataStmt = mysqli_stmt_init($con); 

    $loginActivityDataArray = array();
    $loginActivityCountDataArray = array();

    if (!mysqli_stmt_prepare($chartDataStmt, $chartDataSQL)){
        $_SESSION['statusMsg'] = "Unable to prepare the SQL statement.";
        return false;
    }

    // Execute prepared statement
    mysqli_stmt_execute($chartDataStmt);

    $results = mysqli_stmt_get_result($chartDataStmt);

    if($rows = $results -> fetch_all(MYSQLI_ASSOC)){
        mysqli_stmt_close($chartDataStmt);
        
        foreach($rows as $row){
            array_push($loginActivityDataArray , $row['loginDate']);
            array_push($loginActivityCountDataArray, $row['userCount']);
        }

        $_SESSION['loginActivityDataArray'] = $loginActivityDataArray;
        $_SESSION['loginActivityCountDataArray'] = $loginActivityCountDataArray;
    }else{
        mysqli_stmt_close($chartDataStmt);
        return false;
    }     
}


function uploadActivity($con, $userId, $activity){
    $activitySql = "INSERT INTO userActivity (userId, activity) VALUES (?, ?)";

    $activityStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($activityStmt, $activitySql)){
        return false;
    }

    mysqli_stmt_bind_param($activityStmt, "is", $userId, $activity);
    if (mysqli_stmt_execute($activityStmt)){
        return true;
    } else {
        return false;
    }
}

?>

