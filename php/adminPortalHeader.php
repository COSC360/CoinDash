<?php
    session_start();
?>
<header class="container">
    <div class="fill-container">
        <div class="left">
            <p class="logo">
                <img src="../images/sitelogo.png">
                <h4>CoinDash</h4>
            </p>
        </div>
        <div class="middle">
            <nav>
                <?php
                    if(isset($_SESSION['id']) && $_SESSION['userType'] == "admin" && $_SESSION['currentPage'] == "admin.php"){
                        echo
                        "  
                        <a href=\"adminAnalytics.php\" id=\"stats\">
                            Analytics
                        </a>
                        <a href=\"admin.php\">
                            Portal
                        </a>
                        <a href=\"account.php\">
                            My Account
                        </a>";
                    }
                ?>
            </nav>
        </div>
        <div class="right settings">
            <div class="horizontal-container fit-width">
                <?php
                    if (isset($_SESSION["id"])){
                        echo 
                        "<div class=\"horizontal-container fit-width\">
                        <p>Hi&nbsp;&nbsp;".$_SESSION["username"]."!&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                        <a href=\"../php/logout.php\">Logout</a>
                        </div>";                
                    }else{
                        echo  "<a href=\"signIn.php\">Sign In</a>/<a href=\"signUp.php\">Sign Up</a>";
                    }            
                ?>
            </div>
        </div>
    </div>
</header>