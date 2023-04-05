<?php
  session_start();
  include 'modules.php';

  retrieveChartData($con);
?>  
  <canvas id="doughnut"></canvas>
  <canvas id="bar"></canvas>
  <?php
  echo
  "<script>

    var xValues = [];
    var yValues = [];";
    foreach($_SESSION['dataArray'] as $row){
        echo "xValues.push(\"".$row."\");";
    }
    foreach($_SESSION['countDataArray'] as $row){
        echo "yValues.push(\"".$row."\");";
    }
  echo 
    "var barColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\"];

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

    new Chart(\"doughnut\", {
      type: \"bar\",
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
