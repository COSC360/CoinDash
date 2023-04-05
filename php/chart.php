<?php
  session_start();
  include 'modules.php';

  retrieveChartData($con);
?>  
<link rel="stylesheet" href="../css/admin.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div>
  <canvas id="myChart"></canvas>
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
    "
    console.log(xValues);
    console.log(yValues);
    var barColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\"];

    new Chart(\"myChart\", {
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
</div>