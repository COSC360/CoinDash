<div class="modal hide" id="module-modal">
    <form>
        <i class="fa-solid fa-xmark fa-xl" id="modal-close-btn"></i>
        <h3>Module Settings</h3>
        <fieldset>
            <select name="category" class="dropdown">
                <?php
                    $categories = retrievePossibleCategories($con);
                    foreach($categories as $category){
                        echo "<option>".$category["category"]."</option>";
                    }
                ?>
            </select>
            <select name="fiat" class="dropdown">
                <?php
                    for ($i = 0; $i < sizeof($fiats); $i++){
                        echo "<option value=\"".$fiats[$i]."\">".$fiatLabels[$i]."</option>";
                    }
                ?>
            </select>
            <select name="sort" class="dropdown">
                <?php
                    for ($i = 0; $i < sizeof($sortValues); $i++){
                        echo "<option value=\"".$sortValues[$i]."\">".$sortLabels[$i]."</option>";
                    }
                ?>
            </select>
            <p>
                <button type="submit" id="modal-confirm-btn">Update Module</button>
            </p>
            <p>
                <button type="button" id="modal-cancel-btn">Cancel Changes</button>
            </p>
        </fieldset>
    </form>
</div>