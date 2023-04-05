<?php
  session_start();
  include 'modules.php';

  retrieveRegSourceChartData($con);
  retrieveCommentCountChartData($con);

  echo
  "
  <canvas id=\"doughnut\"></canvas>
  <canvas id=\"bar\"></canvas>

  <script>

    var xRegSourceValues = [];
    var yRegSourceValues = [];";
    foreach($_SESSION['regSourceDataArray'] as $row){
        echo "xRegSourceValues.push(\"".$row."\");";
    }
    foreach($_SESSION['regSourceCountDataArray'] as $row){
        echo "yRegSourceValues.push(\"".$row."\");";
    }
  echo 
    "var doughnutColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\", \"#1e7145\",\"#e8c3b9\",\"#063970\",\"#48249c\"];

    new Chart(\"doughnut\", {
      type: \"doughnut\",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: doughnutColors,
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
    });";

    echo 
    "
    var xCommentValues = [];
    var yCommentValues = [];";
    foreach($_SESSION['commentDataArray'] as $row){
      echo "xCommentValues.push(\"".$row."\");";
    }
    foreach($_SESSION['commentCountDataArray'] as $row){
        echo "yCommentValues.push(\"".$row."\");";
    }
    echo
    "var barColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\", \"#1e7145\",\"#e8c3b9\",\"#063970\",\"#48249c\"];

    new Chart(\"bar\", {
      type: \"bar\",
      data: {
        labels: xCommentValues,
        datasets: [{
          backgroundColor: barColors,
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
