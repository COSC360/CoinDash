import { buildDashboard } from "./parser.js";

var dashboardDom = document.getElementById("dashboard");

var uploadDashboard = function(userId){

    var dashboardObj = buildDashboard(dashboardDom);
    console.log(dashboardObj);
    $.ajax({
        url: "./php/uploadDashboard.php",
        type: "POST",
        data: {userId: userId, dashboardJSON: JSON.stringify(dashboardObj)},
        success: function(response) {
            console.log(response);
        }
    })
}

export {uploadDashboard};
