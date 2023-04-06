<?php
    session_start();
?>
<header class="container">
    <div class="fill-container">
        <div class="left">
            <p class="logo">
                <div>
                    <img src="../images/sitelogo.png">
                    <p>Coindash</p>
                <div>
            </p>
        </div>
        <div class="middle">
            <nav>
                <?php
                    if(isset($_SESSION['id']) && $_SESSION['userType'] == "admin"){
                        echo
                        "  
                        <a href=\"https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/adminAnalytics.php\" id=\"stats\">
                            Analytics
                        </a>
                        <a href=\"https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/admin.php\">
                            Dashboard
                        </a>";
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
                        <a href=\"https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/dashboard.php\">My Dashboard</a>";
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
                        <p>Hi, ".$_SESSION["username"]." | </p>
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