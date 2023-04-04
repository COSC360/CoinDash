<?php
session_start();


function retrieveAllCoins($con){
    $sql = "SELECT * FROM coin LIMIT 12;";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
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

function retrieveCoinsByCategory($con, $fiat, $category, $sort, $perPage, $page){
    $validSortValues = array("price_change_24h DESC", "price_change_24h", "price_change_7d DESC", "price_change_7d", "price_change_14d DESC", "price_change_14d",
                    "price_change_30d DESC", "price_change_30d", "price_change_60d DESC", "price_change_60d",
                    "price_change_200d DESC", "price_change_200d", "price_change_1yr DESC", "price_change_1yr");

    if (!in_array($sort, $validSortValues)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
    }

    $sql = "SELECT * FROM coin WHERE id IN (SELECT coin FROM coinCategory WHERE category = ?) ORDER BY ".$sort." LIMIT ? OFFSET ?;";
    //ORDER BY ? LIMIT ? OFFSET ?;

    //WHERE id IN (SELECT coin_id FROM categoryCoin WHERE category = ?) LIMIT ? OFFSET ?
    $stmt = mysqli_stmt_init($con);
    
    if (!mysqli_stmt_prepare($stmt, $sql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
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
        // TODO:
        // header("location: REPLACE LATER");
        exit();
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
        // TODO:
        // header("location: REPLACE LATER");
        exit();
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
        // TODO:
        echo "<script>console.log('hasdasdi')</script>";
        // header("location: REPLACE LATER");
        exit();
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
        $dashboardObject = json_decode($dashboardJSON);
        $blocks = $dashboardObject -> blocks;

        $dashboardStmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($dashboardStmt, $dashboardSql)){
            // TODO:
            // header("location: REPLACE LATER");
            exit();
        }

        mysqli_stmt_bind_param($dashboardStmt, "i", $userId);
        mysqli_stmt_execute($dashboardStmt); 
        mysqli_stmt_close($dashboardStmt);

        $dashboardId = mysqli_insert_id($con);

        foreach($blocks as $block){

            $modules = $block -> modules;
            $blockStmt = mysqli_stmt_init($con);
            if (!mysqli_stmt_prepare($blockStmt, $blockSql)){
                // TODO:
                // header("location: REPLACE LATER");
                exit();
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
                    // TODO:
                    // header("location: REPLACE LATER");
                    exit();
                }
                mysqli_stmt_bind_param($moduleStmt, "iiisss", $blockId, $dashboardId, $userId, $category, $fiat, $sort);
                mysqli_stmt_execute($moduleStmt); 
                mysqli_stmt_close($moduleStmt);
            }
        }
    } catch (Exception $e){
        // TODO:
        echo "Failed";
        echo $e;
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

    mysqli_stmt_execute($moduleStmt);
    mysqli_stmt_execute($blockStmt);
    mysqli_stmt_execute($dashboardStmt);
}

function retrieveDashboard($con, $userId){
    $moduleSql = "SELECT id, block_id, category, fiat, sort FROM module WHERE user_id = ?;";

    $moduleStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($moduleStmt, $moduleSql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
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

function loginUser($con,$loginID,$loginPassword){
    
    $loginSQL = "SELECT * FROM `userAuth` WHERE  (`email` = ? AND `password` = ?) OR (`username` = ? AND `password` = ?)";

    $loginStmt = mysqli_stmt_init($con); 

    $statusMsg = '';

    if (!mysqli_stmt_prepare($loginStmt, $loginSQL)){
        
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($loginStmt, "ssss", $loginID,md5($loginPassword),$loginID,md5($loginPassword));

    // Execute prepared statement
    mysqli_stmt_execute($loginStmt);

    $results = mysqli_stmt_get_result($loginStmt);

    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        //Creating session variables 
        $_SESSION["username"] = $rows['username'];
        $_SESSION["userType"] = $rows['userType'];
        $_SESSION["email"] = $rows['email'];
        $_SESSION["password"] = $rows['password'];
        $_SESSION["id"] = $rows['id'];
        $_SESSION["profilePicture"] = $rows['profilePicture'];

        //Navigate to admin.php if user is of "admin" type
        if($rows['userType'] == 'admin'){
            header('location:admin.php');
            
        //Navigate to account.php if user is of "user" type and status is "enabled"
        }elseif($rows['userType'] == 'user' && $rows['status'] == "enabled"){
            header('location:account.php');


        //Display an error if user is of "user" type and status is "disabled"            
        }elseif($rows['userType'] == 'user' && $rows['status'] == "disabled"){
            $statusMsg = "Your account has been disabled by the admin !";
            echo "<script>window.alert(\"".$statusMsg."\")</script>";
        }
    }else{
        // mysqli_stmt_close();
        header('location:signIn.php');
        $statusMsg = "invalid Login Details !";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        return false;
    }

}

function adminLogin($con,$adminLoginID,$adminPassword){
    $adminLoginSQL = "SELECT * FROM `userAuth` WHERE  (`email` = ? AND `password` = ?) OR (`username` = ? AND `password` = ?)";

    $adminLoginStmt = mysqli_stmt_init($con); 

    $statusMsg = '';

    if (!mysqli_stmt_prepare($adminLoginStmt, $adminLoginSQL)){
        
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($adminLoginStmt, "ssss", $adminLoginID,md5($adminPassword),$adminLoginID,md5($adminPassword));

    // Execute prepared statement
    mysqli_stmt_execute($adminLoginStmt);

    $results = mysqli_stmt_get_result($adminLoginStmt);

    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();

        //Navigate to admin.php if user is of "admin" type
        if($rows['userType'] == 'admin'){
            header('location:admin.php');   
        }else{
            $statusMsg = "User is not admin !";
            echo "<script>window.alert(\"".$statusMsg."\")</script>";
        }
    }else{
        // mysqli_stmt_close();
        header('location:signIn.php');
        $statusMsg = "Invalid Login Details !";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        return false;
    }
}

function registerUser($con,$registerUsername,$registerEmail,$registerPassword,$registerVerifyPassword,$registerSelectedOption,$registerUserType,$registerUserStatus,$registerImage){
    
    $statusMsg = '';

    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `email` = ? OR `username` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "ss", $registerEmail,$registerUsername);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        $statusMsg = 'User already exists !';
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
    }else{
        if($registerPassword != $registerVerifyPassword){
            $statusMsg = 'Passwords do not match !';
            echo "<script>window.alert(\"".$statusMsg."\")</script>";
        }else{
            $registerUserSQL = "INSERT INTO `userAuth` (`username`, `email`, `password`,`comingFrom`,`profilePicture`,`userType`,`status`) VALUES (?,?,?,?,?,?,?)";
            
            $registerUserStmt = mysqli_stmt_init($con);

            if (!mysqli_stmt_prepare($registerUserStmt, $registerUserSQL)){
                // TODO:
                // header("location: REPLACE LATER");
                $statusMsg = "Unable to prepare the SQL statement.";
                echo "<script>window.alert(\"".$statusMsg."\")</script>";
                exit();
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
    $statusMsg = '';

    $existingUserSQL = "SELECT * FROM `userAuth` WHERE  `email` = ?";

    $existingUserStmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($existingUserStmt, $existingUserSQL)){
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($existingUserStmt, "s", $userEmail);

    // Execute prepared statement
    mysqli_stmt_execute($existingUserStmt);

    $results = mysqli_stmt_get_result($existingUserStmt);
    
    if($rows = $results -> fetch_assoc()){
        // mysqli_stmt_close();
        $statusMsg = 'User already exists !';
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
    }else{
        $updateSQL = "UPDATE `userAuth` SET `email` = ?, `password` = ? WHERE `id` = ?";

        $updateStmt = mysqli_stmt_init($con); 
    
        $statusMsg = '';
    
        if (!mysqli_stmt_prepare($updateStmt, $updateSQL)){
            // TODO:
            // header("location: REPLACE LATER");
            $statusMsg = "Unable to prepare the SQL statement.";
            echo "<script>window.alert(\"".$statusMsg."\")</script>";
            exit();
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

    $statusMsg = '';
    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "s", $searchName);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        $_SESSION['RSId'] = $rows['id'];
        $_SESSION['RSUsername'] = $rows['username'];
        $_SESSION['RSEmail'] = $rows['email'];
        $_SESSION['RSPassword'] = $rows['password'];
        $_SESSION['RSComingFrom'] = $rows['comingFrom'];
        $_SESSION['RSUserType'] = $rows['userType'];
        $_SESSION['RSUserStatus'] = $rows['status'];
        $_SESSION['RSRegisterTimestamp'] = $rows['registerationTimestamp'];
        $_SESSION['RSProfilePicture'] = $rows['profilePicture'];
        header('location:admin.php');
    }else{
        return false;
    }
}

function searchByEmail($con, $searchEmail){
    $searchSQL = "SELECT * FROM `userAuth` WHERE  `email`= ?";

    $searchStmt = mysqli_stmt_init($con); 

    $statusMsg = '';
    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "s", $searchEmail);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        header('location:admin.php');
    }else{
        return false;
    }
}

function searchByCommentId($con, $searchCommentId){

    $searchSQL = "SELECT * FROM `comment` WHERE  `id`= ?";

    $searchStmt = mysqli_stmt_init($con); 

    $statusMsg = '';
    
    if (!mysqli_stmt_prepare($searchStmt, $searchSQL)){
        // TODO:
        // header("location: REPLACE LATER");
        $statusMsg = "Unable to prepare the SQL statement.";
        echo "<script>window.alert(\"".$statusMsg."\")</script>";
        exit();
    }

    // Set parameters for prepared statement
    mysqli_stmt_bind_param($searchStmt, "i", $searchCommentId);

    // Execute prepared statement
    mysqli_stmt_execute($searchStmt);

    $results = mysqli_stmt_get_result($searchStmt);

    if($rows = $results -> fetch_assoc()){
        
    }else{
        return false;
    }
}
?>
