
<?php
    if($_SESSION['id'] != null){
        echo "
        <div id=\"save-edit-btn\" class=\"icon-overlay edit-ui\" href=\"#\">
            <img src=\"../svgs/save.svg\">
        </div>
        ";
    }
?>
<div id="view-edit-btn" class="icon-overlay" href="#">
    <img src="../svgs/view.svg">
</div>
