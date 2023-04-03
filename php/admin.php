<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/admin.js"></script>
    </head>
        <?php
            include 'dashboardHeader.php'
        ?>
        
        <body>
            <main>
                <div class="tabswitcher">       
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'username')" id="defaultOpen">By Username</button>
                        <button class="tablinks" onclick="openCity(event, 'email')">By Email ID</button>
                        <button class="tablinks" onclick="openCity(event, 'commentId')">By Comment ID</button>
                    </div>
                    
                    <div id="username" class="tabcontent" >
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search.." name="username">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div id="email" class="tabcontent">
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search.." name="email">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div id="commentId" class="tabcontent">
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search.." name="commentId">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </main>
        </body>
        
</html> 