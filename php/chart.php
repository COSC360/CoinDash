<?php
  session_start();
  include 'modules.php';

  retrieveChartData($con);

  // print_r($_SESSION['dataArray']);

  // print_r($_SESSION['countDataArray']);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/admin.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
  <?php
    foreach($_SESSION['countDataArray'] as $row){
      echo "console.log(".$row.")";
    }
  ?>
  var xValues = ["", "France", "Spain", "USA", "Argentina"];
  var yValues = [55, 49, 44, 24, 15];
  var barColors = ["red", "green","blue","orange","brown"];

  new Chart("myChart", {
    type: "bar",
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
        text: "World Wine Production 2018"
      }
    }
  });
</script>

</body>