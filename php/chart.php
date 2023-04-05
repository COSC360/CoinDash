<?php
  session_start();
  include 'modules.php';

  retrieveRegSourceChartData($con);
  retrieveCommentCountChartData($con);  
?>  
  <div class ="canvasData">
    <canvas id="doughnut"></canvas>
    <canvas id="bar"></canvas>
  </div>

  <?php
  echo
  "<script>

    var xValues = [];
    var yValues = [];
    var xCommentValues = [];
    var yCommentValues = [];";
    foreach($_SESSION['dataArray'] as $row){
        echo "xValues.push(\"".$row."\");";
    }
    foreach($_SESSION['countDataArray'] as $row){
        echo "yValues.push(\"".$row."\");";
    }
    foreach($_SESSION['commentDataArray'] as $row){
      echo "xCommentValues.push(\"".$row."\");";
    }
    foreach($_SESSION['commentCountDataArray'] as $row){
        echo "yCommentValues.push(\"".$row."\");";
    }
  echo 
    "
    var chartColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\",\"#e8c3b9\",\"#1e7145\",\"#993366\",\"#009999\"];

    new Chart(\"doughnut\", {
      type: \"doughnut\",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: chartColors,
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

    new Chart(\"bar\", {
      type: \"bar\",
      data: {
        labels: xCommentValues,
        datasets: [{
          backgroundColor: chartColors,
          data: yCommentValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: \"User Comment Activity\"
        }
      }
    });
  </script>";
  ?>
