<?php
  session_start();
  include 'modules.php';

  retrieveRegSourceChartData($con);
  retrieveCommentCountChartData($con);
  retrieveUserStatusChartData($con);  
?>  
  <div class ="canvasData">
    <canvas id="doughnut"></canvas>
    <canvas id="bar"></canvas>
    <canvas id="pie"></canvas>
  </div>

  <?php
  echo
  "<script>

    var xValues = [];
    var yValues = [];
    var xCommentValues = [];
    var yCommentValues = [];
    var xStatusValues = [];
    var yStatusValues = [];";
    foreach($_SESSION['regSourceDataArray'] as $row){
        echo "xValues.push(\"".$row."\");";
    }
    foreach($_SESSION['regSourceCountDataArray'] as $row){
        echo "yValues.push(\"".$row."\");";
    }

    foreach($_SESSION['commentDataArray'] as $row){
      echo "xCommentValues.push(\"".$row."\");";
    }
    foreach($_SESSION['commentCountDataArray'] as $row){
        echo "yCommentValues.push(\"".$row."\");";
    }

    foreach($_SESSION['statusDataArray'] as $row){
      echo "xStatusValues.push(\"".$row."\");";
    }
    foreach($_SESSION['statusCountDataArray'] as $row){
        echo "yStatusValues.push(\"".$row."\");";
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
        legend: {display: true, position: 'right', align: 'center'},
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
          backgroundColor: \"rgba(255,99,132,0.2)\",
          borderColor: \"rgba(255,99,132,1)\",
          borderWidth: 2,
          hoverBackgroundColor: \"rgba(255,99,132,0.4)\",
          hoverBorderColor: \"rgba(255,99,132,1)\",
          data: yCommentValues
        }]
      },
      options: {
        legend: {display: true, position: 'right', align: 'center'},
        title: {
          display: true,
          text: \"User Comment Activity\"
        }
      }
    });

    new Chart(\"pie\", {
      type: \"pie\",
      data: {
        labels: xStatusValues,
        datasets: [{
          backgroundColor: chartColors,
          data: yStatusValues
        }]
      },
      options: {
        legend: {display: true, position: 'right', align: 'center'},
        title: {
          display: true,
          text: \"User Status Data\"
        }        
        subtitle: {
            display: true,
            text: \"Custom Chart Subtitle\"
        }
      }
    });
  </script>";
  ?>
