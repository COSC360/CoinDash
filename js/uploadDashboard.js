import { buildDashboard } from "./parser.js";
console.log("1");
var dashboardDom = document.getElementById("dashboard");
var dashboardObj = buildDashboard(dashboardDom);
console.log("2");
var test = function(){
    $.ajax({
        url: "/php/uploadDashboard.php",
        type: "POST",
        data: {userId: 0, dashboardJSON: JSON.stringify(dashboardObj)},
        success: function(response) {
            console.log(response);
        }
    })
}
console.log("3");
test();
console.log("4");