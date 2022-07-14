<?php
header('refresh:5');
$servername="localhost";
$username="root";
$dbpassword="";
$dbname="mca";
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
//if(!$conn){
//    echo "Connection failure";
//}
//echo "Connection established";
$sql = "SELECT Excellent FROM feedback";
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Excellent'];
$a = $row['Excellent'];
$sql = "SELECT Good FROM feedback";
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Good'];
$b = $row['Good'];
$sql = "SELECT Poor FROM feedback";
$result =mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//echo $row['Poor'];
$c= $row['Poor'];
mysqli_close($conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback_Form</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Feedback', 'votes'],
          ['Excellent', <?php echo $a ?>],
          ['Good', <?php echo $b ?>],
          ['Poor',<?php echo $c ?>]
        ]);

        var options = {
          title: 'FeedBack Form',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>    
</body>
</html>
