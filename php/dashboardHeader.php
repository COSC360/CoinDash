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
                    }elseif(isset($_SESSION['id']) && $_SESSION['userType'] == "admin" && $_SESSION['currentPage'] == "account.php"){
                        echo
                        "
                        <div class=\"relative-container\">
                            <a href=\"#\" id=\"search\">
                                Search
                            </a>
                            <div style=\"position: absolute; left: 0; bottom:-2em;\">
                                <form id=\"search-modal\" class=\"hide\">
                                    <input type=\"text\" name=\"like\" placeholder=\"What are you looking for?\">
                                </form>
                            </div>
                        </div>
                        <a href=\"dashboard.php\">Dashboard</a> 
                        <a href=\"admin.php\">Admin Portal</a>";
                    }elseif(isset($_SESSION['id']) && $_SESSION['userType'] == "user"){
                        echo
                        "
                        <div class=\"relative-container\">
                            <a href=\"#\" id=\"search\">
                                Search
                            </a>
                            <div style=\"position: absolute; left: 0; bottom:-2em;\">
                                <form id=\"search-modal\" class=\"hide\">
                                    <input type=\"text\" name=\"like\" placeholder=\"What are you looking for?\">
                                </form>
                            </div>
                        </div>
                        <a href=\"dashboard.php\">Dashboard</a>";   
                    }else{
                        echo
                        "
                        <div class=\"relative-container\">
                            <a href=\"#\" id=\"search\">
                                Search
                            </a>
                            <div style=\"position: absolute; left: 0; bottom:-2em;\">
                                <form id=\"search-modal\" class=\"hide\">
                                    <input type=\"text\" name=\"like\" placeholder=\"What are you looking for?\">
                                </form>
                            </div>
                        </div>
                        <a href=\"dashboard.php\">Dashboard</a>";                        
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
                        <p>Hi&nbsp;&nbsp;<span id=\"usernameDashboard\">".$_SESSION["username"]."</span>&nbsp;&nbsp;|&nbsp;&nbsp;</p>
                        <a href=\"../php/logout.php\">Logout</a>
                        </div>";                
                    }else{
                        echo  "<a href=\"#\" onclick=navigateToSignIn()>Sign In</a>/<a href=\"#\" onclick=navigateToSignUp()>Sign Up</a>";
                    }            
                ?>
            </div>
        </div>
    </div>
</header>
<script src="../js/search.js"></script>