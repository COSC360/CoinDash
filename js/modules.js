import { uploadDashboard } from "./uploadDashboard.js";
import { buildModule } from "./parser.js";
import { fiatLabels, fiats, sortLabels, sortValues } from "./utils.js";

var module_settings_btns = document.querySelectorAll(".module-settings-btn");
var modules = document.querySelectorAll(".module");
var editElements = document.querySelectorAll(".edit-ui");
var addModuleBtn = document.getElementById("add-module-btn");
var toggleEditBtn = document.getElementById("view-edit-btn");
var editBtnImage = document.querySelector("#view-edit-btn img");
var saveEditBtn = document.getElementById("save-edit-btn");

var moduleModal = document.getElementById("module-modal");
var moduleForm = document.getElementById("module-form");
var closeModalBtn = document.getElementById("modal-close-btn");
var cancelModalBtn = document.getElementById("modal-cancel-btn");
var confirmModalBtn = document.getElementById("modal-confirm-btn");
var currentModule = null;

closeModalBtn.addEventListener("click", (e) => {
    moduleModal.classList.add("hide");
})
cancelModalBtn.addEventListener("click", (e) => {
    moduleModal.classList.add("hide");
})

// Enables drag and drop of modules
module_settings_btns.forEach(btn => {
    // Grab connectedModule to be moved
    btn.addEventListener("dragstart", (e) => {
        e.dataTransfer.setData("draggedModule", btn.parentNode.id); 
        e.dataTransfer.setDragImage(btn.parentNode, 0, 0);
    })

    btn.addEventListener("click", (e) => {
        btn.parentNode.appendChild(moduleModal);
        moduleModal.classList.remove("hide");
        currentModule = btn.parentNode;
    })
})

// Recreates moduleHTML given new parameters for category, fiat, and sort
confirmModalBtn.addEventListener('click', (e) => {
    e.preventDefault();
    var categoryElement = document.querySelector("#" + currentModule.id + " .api-category");
    var fiatElement = document.querySelector("#" + currentModule.id + " .fiat");
    var sortElement = document.querySelector("#" + currentModule.id + " .sort");
    var moduleGallery = document.querySelector("#" + currentModule.id + " .module-gallery");

    var fiat = moduleForm.fiat.value;
    var category = moduleForm.category.value;
    var sort = moduleForm.sort.value;

    categoryElement.innerHTML = category;
    fiatElement.value = fiat;
    sortElement.value = sort;
    setModuleHTML(fiat, category, sort, moduleGallery);
    moduleModal.classList.add("hide");
})

// Detects drag and drops and moves module nodes
modules.forEach(module => {
    var dragCounter = 0;
    module.addEventListener("dragenter", (e) => {
        e.stopPropagation();
        e.preventDefault();
        var moduleDroppedOnBounds = module.getBoundingClientRect();

        var rightDist = moduleDroppedOnBounds.right - e.clientX;
        var leftDist = e.clientX - moduleDroppedOnBounds.left;

        // Determine which side to to highlight based on proximity to left/right
        if (leftDist < rightDist){
            module.classList.remove("right-border-highlight");
            module.classList.add("left-border-highlight");
        } else {
            module.classList.remove("left-border-highlight");
            module.classList.add("right-border-highlight");
        }
        dragCounter++;
    })

    module.addEventListener("dragleave", (e) => {
        e.stopPropagation();
        e.preventDefault();
        dragCounter--;
        if (dragCounter === 0){
            module.classList.remove("right-border-highlight");
            module.classList.remove("left-border-highlight");
        }
    })

    module.addEventListener("drop", (e) => {
        e.preventDefault();
        dragCounter = 0;
        var moduleToBeDroppedId = e.dataTransfer.getData("draggedModule");
        var moduleToBeDropped = document.getElementById(moduleToBeDroppedId)
        var moduleContainer = module.parentNode; 

        // Retrieves placement of module placed relative to its parent container
        var index = Array.prototype.indexOf.call(moduleContainer.children, module);

        var moduleDroppedOnBounds = module.getBoundingClientRect();
        var leftDist = e.clientX - moduleDroppedOnBounds.left;
        var rightDist = moduleDroppedOnBounds.right - e.clientX;

        // Determine which side to place module based on proximity to left/right
        module.classList.remove("right-border-highlight");
        module.classList.remove("left-border-highlight");
        if (leftDist < rightDist){
            moduleContainer.insertBefore(moduleToBeDropped, moduleContainer.children[index]);
        } else {
            moduleContainer.insertBefore(moduleToBeDropped, moduleContainer.children[index].nextSibling);
        }
    })

    module.addEventListener("dragover", (e) => {
        e.preventDefault();
    })
})

addModuleBtn.addEventListener("click", (e) => {
    var dashboardDom = document.getElementById("dashboard");
    var newBlock = generateDefaultBlock();
    dashboardDom.innerHTML += newBlock;
})

toggleEditBtn.addEventListener("click", (e) => {
    e.preventDefault();
    editElements.forEach(element => {
        if (element.classList.contains("hide")){
            element.classList.remove("hide");
            editBtnImage.src = "../svgs/edit-white.svg";
        } else {
            element.classList.add("hide");
            editBtnImage.src = "../svgs/view.svg";
        }
    })
})

// For registered users
if (saveEditBtn != null){
    saveEditBtn.addEventListener("click", (e) => {
        e.preventDefault();
        uploadDashboard();
    })
}


var fiatSelects = document.querySelectorAll(".fiat");
var sortSelects = document.querySelectorAll(".sort");

// Change product cards by fiat
fiatSelects.forEach(fiatSelect => {
    fiatSelect.addEventListener('change', (e) => {
        var newFiat = fiatSelect.value;
        var module = fiatSelect.parentNode.parentNode.parentNode;
        var moduleObj = buildModule(module);
        var moduleGallery = document.querySelector("#" + module.id + " .module-gallery");

        setModuleHTML(newFiat, moduleObj.category, moduleObj.sort, moduleGallery);
    })
});

// Change product cards by sort
sortSelects.forEach(sortSelect => {
    sortSelect.addEventListener('change', (e) => {
        var newSort = sortSelect.value;
        var module = sortSelect.parentNode.parentNode.parentNode;
        var moduleObj = buildModule(module);
        var moduleGallery = document.querySelector("#" + module.id + " .module-gallery");

        setModuleHTML(moduleObj.fiat, moduleObj.category, newSort, moduleGallery);
    })
})

// Generates module HTML based on fiat, category, sort. Places HTML at target location
function setModuleHTML(fiat, category, sort, target){
    $.ajax({
        url: "./retrieveModuleItems.php",
        type: "POST",
        async: true,
        data: {fiat: fiat, category: category, sort: sort},
        success: function(response) {
            var coinData = JSON.parse(response);
            let newModule = "";
            
            coinData.forEach((coin) => {
                newModule += `
                    <div class="product-card">
                        <div class="icon-container">
                            <a href="individual.php?coinId=${coin.Id}" class="icon-overlay">
                                <img src="../svgs/goto.svg">
                            </a>
                        </div>
                            <div class="product-image-mask">
                            <div class="product-image" style="background-image: url(${coin.img_url});"></div>
                        </div><div class="product-info-container">
                            <h3>${coin.name}</h3>
                            <strong class="product-price">${coin[fiat].toFixed(4)}${fiat.toUpperCase()} ${coin.price_change_24h.toFixed(2)}%</strong>
                            <div class="price-trend-container">
                                <p>7D: ${coin.price_change_7d.toFixed(2)}%</p>
                                <p>14D: ${coin.price_change_14d.toFixed(2)}%</p>
                                <p>30D: ${coin.price_change_30d.toFixed(2)}%</p>
                                <p>60D: ${coin.price_change_60d.toFixed(2)}%</p>
                                <p>200D: ${coin.price_change_200d.toFixed(2)}%</p>
                                <p>1Y: ${coin.price_change_1yr.toFixed(2)}%</p>
                            </div>
                        </div>
                    </div>
                    `;
            })
            target.innerHTML = newModule;
        }
    })
}

function generateDefaultBlock(){
    var defaultFiat = "usd";
    var defaultCategory = "Ethereum Ecosystem";
    var defaultSort = "views DESC";

    var newBlock = `
        <div class="block panel">
            <div class="module small" id="module-".$dashboardModules[$currentCount]["id"].""> 
            <div class="module-header">
                <div class="api-details">
                    <div class="api-category">".$dashboardModules[$currentCount]["category"]."</div>
                </div>
                <div class="dropdowns">
                    <select class="dropdown fiat">" `
                        for (let i = 0; i < fiats.length; i++){
                            newBlock += `<option value=${fiats[i]} ${fiats[i] == defaultFiat ? "selected" : ""}> ${fiatLabels[i]} </option>`
                        }
    newBlock +=     `</select>
                    <select class="dropdown sort">"`
                        for (let i = 0; i < sortValues.length; i++){
                            newBlock += `<option value=${sortValues[i]} ${sortValues[i] == defaultSort ? "selected" : ""}> ${sortLabels[i]} </option>`
                        }
    newBlock +=     `</select>
                </div>
            </div>
            <div class="module-gallery">";
            </div>
            <div draggable=\"true\" class=\"module-settings-btn edit-ui\">
                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                </div>
            </div>
        </div>
    `

    return newBlock;
}