
<?php
    if($_SESSION['Id'] != null){
        echo "
        <div id=\"view-edit-btn\" class=\"icon-overlay\" href=\"#\">
            <img src=\"../svgs/view.svg\">
        </div>
        ";
    }
?>

<div id="save-edit-btn" class="icon-overlay edit-ui" href="#">
    <img src="../svgs/save.svg">
</div>