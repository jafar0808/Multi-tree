<?php

# Grab the data from the database
$servername = "127.0.0.1";
$username = "root";
$password = "mjsk@100";
$dbname = "citycrown";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT name,manager,tooltip FROM orgtest";
$mysqli_result = mysqli_query($con,$query);
$data = array();



while (($row = $mysqli_result->fetch_assoc()) !== null)
{
    $data[] = $row;
}

# our converstion function given above.
function convertDataToChartForm($data)
{
    $newData = array();
    $firstLine = true;

    foreach ($data as $dataRow)
    {
        if ($firstLine)
        {
            $newData[] = array_keys($dataRow);
            $firstLine = false;
        }

        $newData[] = array_values($dataRow);
    }

    return $newData;
}

?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('visualization','1.0', {'packages':['orgchart']});
      google.charts.setOnLoadCallback(drawChart);



      function drawChart() {        
        var data = google.visualization.arrayToDataTable((<?= json_encode(convertDataToChartForm($data)); ?>));

        /*var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };*/

        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));

        chart.draw(data, {allowHtml:true});
      }
    </script>
  </head>
  <body>
    <div id="chart_div" ></div>
  </body>
</html>
</code></pre>

</body></html>