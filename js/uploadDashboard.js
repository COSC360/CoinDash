import { buildDashboard } from "./parser.js";

var dashboardDom = document.getElementById("dashboard");
var dashboardObj = buildDashboard(dashboardDom);

var uploadDashboard = function(userId){
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
