<?php
  session_start();
  include 'modules.php';

  retrieveCommentCountChartData($con);
?>  
  <canvas id="bar"></canvas>
  <?php
  echo
  "<script>

    var xValues = [\""hi"\"];
    var yValues = [\""1"\"];";
    // foreach($_SESSION['commentDataArray'] as $row){
    //     echo "xValues.push(\"".$row."\");";
    // }
    // foreach($_SESSION['commentCountDataArray'] as $row){
    //     echo "yValues.push(\"".$row."\");";
    // }
  echo 
    "var barColors = [\"#00aba9\", \"#2b5797\",\"#b91d47\", \"#1e7145\",\"#e8c3b9\",\"#063970\",\"#48249c\"];

    new Chart(\"bar\", {
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
          text: \"User Comment Activity\"
        }
      }
    });
  </script>";
  ?>
