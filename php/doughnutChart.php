<?php
  session_start();
  include 'modules.php';

  retrieveRegSourceChartData($con);

  echo
  "
  <canvas id=\"doughnut\"></canvas>
  <script>

    var xValues = [];
    var yValues = [];";
    foreach($_SESSION['regSourceDataArray'] as $row){
        echo "xValues.push(\"".$row."\");";
    }
    foreach($_SESSION['regSourceCountDataArray'] as $row){
        echo "yValues.push(\"".$row."\");";
    }
  echo 
    "var barColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\", \"#1e7145\",\"#e8c3b9\",\"#063970\",\"#48249c\"];

    new Chart(\"doughnut\", {
      type: \"doughnut\",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: \"User Registeration Source\"
        }
      }
    });
  </script>";
  ?>
