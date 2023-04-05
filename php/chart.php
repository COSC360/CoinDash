<?php
  session_start();
  include 'modules.php';

  retrieveChartData($con);
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
  var xValues = [];
  <?php
    foreach($_SESSION['countDataArray'] as $row){
      echo "xValues.push(".$row.")";
    }
  ?>
  var yValues = [];

  <?php
    foreach($_SESSION['countDataArray'] as $row){
      echo "yValues.push(".$row.")";
    }
  ?>

  var barColors = ["red", "green","blue"];

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