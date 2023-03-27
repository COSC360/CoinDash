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
                <a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/dashboard.php">My Dashboard</a>
                <a href="#">Community</a>
                <a href="#">Help</a>
            </nav>
        </div>
        <div class="right settings">
            <div class="horizontal-container fit-width">
                <a href="../php/logout.php"><p>Logout</p></a>
            </div>
            <div class="horizontal-container fit-width">
                <p>Hi, <?php echo $_SESSION['user']?></p>
                <img src="<?php echo $_SESSION['pfp']?>" style="width: 40px;height:40px;">
                <img src="../svgs/arrow-down.svg">
            </div>
        </div>
    </div>
</header>
