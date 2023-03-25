var dashboardDom = document.getElementById("dashboard");

function buildDashboard(dashboardDom){
    var blocks = [];

    var children = Array.from(dashboardDom.children);
    children.forEach(child => {
        blocks.push(buildBlock(child));
    })

    return new Dashboard(blocks);
}

function buildBlock(blockDom) {
    var modules = []

    var children = Array.from(blockDom.children);
    children.forEach(child => {
        modules.push(buildModule(child))
    });

    return new Block(modules);
}

function buildModule(moduleDom){
    var domId = moduleDom.id;
    var category = document.querySelector("#" + domId + " .api-category");
    var fiat = document.querySelector("#" + domId + " .fiat");
    var sort = document.querySelector("#" + domId + " .sort"); 

    return new Module(category, fiat, sort);
}

class Dashboard {
    constructor(blocks){
        this.blocks = blocks;
    }
}

class Block {
    constructor(modules){
        this.modules = modules;
    }
}

class Module {
    constructor(category, fiat, sort){
        this.category = category;
        this.fiat = fiat;
        this.sort = sort;
    }
}

console.log(buildDashboard(dashboardDom));