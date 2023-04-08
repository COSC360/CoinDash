<?php
  session_start();
  include 'modules.php';

  retrieveRegSourceChartData($con);
  retrieveCommentCountChartData($con);
  retrieveUserStatusChartData($con);  
  retrieveRegisteredUserActivityChartData($con);
  retrieveUnregisteredUserActivityChartData($con);
  retrieveRegisteredUserLoginActivityChartData($con);
?>  
  <div class ="canvasData">
    <canvas id="doughnut"></canvas>
    <canvas id="bar"></canvas>
    <canvas id="pie"></canvas>
    <canvas id="line-1"></canvas>
    <canvas id="line-2"></canvas>
    <canvas id="pie-2"></canvas>
  </div>

  <?php
  echo
  "<script>
    Chart.defaults.global.defaultFontColor = \"#fff\";

    var xValues = [];
    var yValues = [];

    var xCommentValues = [];
    var yCommentValues = [];

    var xStatusValues = [];
    var yStatusValues = [];

    var registeredUserActivityTypeValues = [];
    var registeredUserActivityCountValues = [];

    var unregisteredUserActivityTypeValues = [];
    var unregisteredUserActivityCountValues = [];

    var loginActivityDataValues = [];
    var loginActivityCountDataValues = [];
    ";
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

    foreach($_SESSION['registeredUserDataArray'] as $row){
      echo "registeredUserActivityTypeValues.push(\"".$row."\");";
    }

    foreach($_SESSION['registeredUserCountDataArray'] as $row){
    echo "registeredUserActivityCountValues.push(\"".$row."\");";
    }

    foreach($_SESSION['unregisteredUserDataArray'] as $row){
      echo "unregisteredUserActivityTypeValues.push(\"".$row."\");";
    }

    foreach($_SESSION['unregisteredUserCountDataArray'] as $row){
    echo "unregisteredUserActivityCountValues.push(\"".$row."\");";
    }

    foreach($_SESSION['loginActivityDataArray'] as $row){
      echo "loginActivityDataValues.push(\"".$row."\");";
    }

    foreach($_SESSION['loginActivityCountDataArray'] as $row){
      echo "loginActivityCountDataValues.push(\"".$row."\");";
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
      }
    });

    new Chart(\"line-1\", {
      type: \"doughnut\",
      data: {
        labels: registeredUserActivityTypeValues,
        datasets: [{
          backgroundColor:chartColors,
          data: registeredUserActivityCountValues
        }]
      },
      options:{
        legend: {display: true, position: 'right', align: 'center'},
        title: {
          display: true,
          text: \"Registered User Activity Data\"
        } 
      }
    });

    new Chart(\"line-2\", {
      type: \"scatter\",
      data: {
        labels: unregisteredUserActivityTypeValues,
        datasets: [{
          backgroundColor: chartColors ,
          data: unregisteredUserActivityCountValues
        }]
      },
      options:{
        legend: {display: true, position: 'right', align: 'center'},
        title: {
          display: true,
          text: \"Unregistered User Activity Data\"
        } 
      }
    });

    new Chart(\"pie-2\", {
      type: \"pie\",
      data: {
        labels: loginActivityDataValues,
        datasets: [{
          backgroundColor: chartColors,
          data: loginActivityCountDataValues
        }]
      },
      options: {
        legend: {display: true, position: 'right', align: 'center'},
        title: {
          display: true,
          text: \"Login Activity Data\"
        }        
      }
    });

  </script>";
  ?>
