<html>
<head>
	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
	<script type='text/javascript'>
		google.load('visualization', '1', {packages:['table']});
		google.setonloadCallback(drawChart);
		
		function drawChart() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Name');
			data.addColumn('string', 'Manager');
			data.addcolumn('string', 'tooltip');

			data.addRows([
				<?php
				$myServer = "localhost";
				$myUser = "root";
				$myPass = "mjsk@100";
				$myDB = "org"; 

				//connection to the database
				$dbhandle = mssql_connect($myServer, $myUser, $myPass)
				  or die("Couldn't connect to SQL Server on $myServer");

				//select a database to work with
				$selected = mssql_select_db($myDB, $dbhandle)
				  or die("Couldn't open database $myDB"); 

				//declare the SQL statement that will query the database
				$query = "SELECT name,affiliate,toolotip";
				$query .= "FROM org ";
				
				$result = mssql_query("SELECT name,affiliate,tooltip FROM org");
				
				//execute the SQL query and return records
				$output = array();

				while($row = mssql_fetch_array($result)) {
					// create a temp array to hold the data
					$temp = array();
					 
					// add the data
					$temp[] = '"' . $row['name'] . '"';
					$temp[] = '"' . $row['affiliate'] . '"';
					$temp[] = '"' . $row['tooltip'] . '"';

					// implode the temp array into a comma-separated list and add to the output array
					$output[] = '[' . implode(', ', $temp) . ']';
				}

				// implode the output into a comma-newline separated list and echo
				echo implode(",\n", $output);

				mysql_close($con);
				?>
			]);

			var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
			chart.draw(data, {allowHtml:true});

		}

	</script>
</head>
	
<body>
	<div id='chart_div'></div>
</body>
</html>
