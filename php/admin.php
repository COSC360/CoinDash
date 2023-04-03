<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
    </head>
        <body>
            <h2>Tabs</h2>
            <p>Click on the buttons inside the tabbed menu:</p>

            <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')">By Username</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">By Email ID</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">By Comment ID</button>
            </div>

            <div id="London" class="tabcontent">
            <h3>London</h3>
            <p>London is the capital city of England.</p>
            </div>

            <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p> 
            </div>

            <div id="Tokyo" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
            </div>

            <script>
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
            </script>
        
        </body>
</html> 