<?php
// set database connection parameters
$databaseName = 'citycrown';
$username = 'root';
$password = 'mjsk@100';
try {
    $db = new PDO("mysql:dbname=$databaseName", $username, $password);
}
catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare('SELECT name, affiliate, tooltip FROM org');
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$flag = true;
$table = array();
$table['cols'] = array(
    array('label' => 'name', 'type' => 'string'),
    array('label' => 'affiliate', 'type' => 'string'),
    array('label' => 'tooltip', 'type' => 'string')
);
$table['rows'] = array();

foreach ($results as $row) {
    $temp = array();
    $temp[] = array('v' => (int) $row['name']);
    $temp[] = array('v' => $row['affiliate']);
    $temp[] = array('v' => (int) $row['tooltip']);
    $table['rows'][] = array('c' => $temp);
}
$jsonTable = json_encode($table);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>
        Google Visualization API Sample
        </title>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

                // Create and draw the visualization.
                new google.visualization.OrgChart(document.getElementById('visualization')).
                draw(data, {allowHtml: true});
            }

            google.setOnLoadCallback(drawVisualization);
            google.load('visualization', '1', {packages: ['orgchart']});
        </script>
    </head>
    <body style="font-family: Arial;border: 0 none;">
        <div id="visualization" style="width: 300px; height: 300px;"></div>
    </body>
</html>