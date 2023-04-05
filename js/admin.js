const infoDisplayForm = document.forms["infoDisplayForm"];
document.getElementById("editUserBtn").addEventListener("click", enableField);
const enableUserBtn = document.getElementById("enableUserBtn");
const disableUserBtn = document.getElementById("disableUserBtn");
const deleteUserBtn = document.getElementById("deleteUserBtn");
const saveUserBtn = document.getElementById("saveUserBtn");

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  