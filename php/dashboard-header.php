<?php
session_start();

?>
<header class="container">
    <div class="fill-container">
        <div class="left">
            <p class="logo">
                <img src="../images/sitelogo.png" style = "position:relative; height:40px; width: 40px; margin-left: 0.75em">
            </p>
        </div>
        <div class="middle">
            <nav>
                <a href="#">Search</a>
                <a href="#">My Dashboard</a>
                <a href="#">Community</a>
                <a href="#">Help</a>
            </nav>
        </div>
        <div class="right settings">
            <div class="horizontal-container fit-width">
                <p>English-US</p>
                <img src="../images/canada-flag.png">
                <img src="../svgs/arrow-down.svg">
            </div>
            <div class="horizontal-container fit-width">
                <p>Hi, <?php echo $_SESSION['user']?></p>
                <img src="../images/profile-picture.png">
                <img src="../svgs/arrow-down.svg">
            </div>
        </div>
    </div>
</header>