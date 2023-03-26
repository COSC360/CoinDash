import { uploadDashboard } from "./uploadDashboard.js";
import { setModuleHTML } from "./moduleListeners.js";
import { buildModule } from "./parser.js";

var module_settings_btns = document.querySelectorAll(".module-settings-btn");
var modules = document.querySelectorAll(".module");
var editElements = document.querySelectorAll(".edit-ui");
var toggleEditBtn = document.getElementById("view-edit-btn");
var saveEditBtn = document.getElementById("save-edit-btn");
var moduleModal = document.getElementById("module-modal");
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

confirmModalBtn.addEventListener('click', (e) => {
    e.preventDefault();
    var moduleObj = buildModule(currentModule);
    var moduleGallery = document.querySelector("#" + currentModule.id + " .module-gallery");

    setModuleHTML(moduleObj.fiat, moduleObj.category, moduleObj.sort, moduleGallery);
})

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

toggleEditBtn.addEventListener("click", (e) => {
    e.preventDefault();
    editElements.forEach(element => {
        if (element.classList.contains("hide")){
            element.classList.remove("hide");
        } else {
            element.classList.add("hide");
        }

    })
})

saveEditBtn.addEventListener("click", (e) => {
    e.preventDefault();
    uploadDashboard(1);
})