import { buildDashboard } from "./parser.js";

var dashboardDom = document.getElementById("dashboard");

var uploadDashboard = function(){

    var dashboardObj = buildDashboard(dashboardDom);

    $.ajax({
        url: "./uploadDashboard.php",
        type: "POST",
        data: {dashboardJSON: JSON.stringify(dashboardObj)},
        success: function(response) {
            console.log(response);
        }
    })
}

export {uploadDashboard};
