import { buildDashboard } from "./parser.js";

var dashboardDom = document.getElementById("dashboard");
var dashboardObj = buildDashboard(dashboardDom);

var uploadDashboard = function(){
    $.ajax({
        url: "./php/uploadDashboard.php",
        type: "POST",
        data: {userId: 0, dashboardJSON: JSON.stringify(dashboardObj)},
        success: function(response) {
            console.log(response);
        }
    })
}

uploadDashboard();
