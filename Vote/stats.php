<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta charset="UTF-8">
       <title>RESULT</title>
       <link rel="stylesheet" type="text/css" href="TabCSS.css">
       <script src="script/Chart.js"></script>
       
       <style>
	body{
	 padding: 0;
	 margin: 0;
	}
	
        #canvas-holder {
          position: absolute;
          left: 180px;
          top: 140px;
          height : 250px;
          width : 455px;
          background: white;
          -webkit-box-shadow: 0 10px 6px -6px #777;
          -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
        }
         #chart-area{
            position: absolute;
            right: 140px;
            
         }
         #canvas-holder11 {
          position: absolute;
          left: 715px;
          top: 140px;
          height : 250px;
          width : 455px;
          background: white;
          -webkit-box-shadow: 0 10px 6px -6px #777;
          -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
        }
         #chart-area11{
            position: absolute;
             right: 140px;
         }
         #canvas-holder12 {
          position: absolute;
          left: 180px;
          top: 420px;
          height : 250px;
          width : 455px;
          background: white;
          -webkit-box-shadow: 0 10px 6px -6px #777;
          -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
        }
         #chart-area12{
            position: absolute;
             right: 140px;
         }
         .logo > h1 {
               font-family: 'Lato', Calibri, Arial, sans-serif;
               text-align: center;
               color: #14c67d;
        }
        #head{
            //font-family: 'Lato', Calibri, Arial, sans-serif;
            color: #14c67d;
            position: relative;
            left: 220px;
        }
        #head1{
            //font-family: 'Lato', Calibri, Arial, sans-serif;
            color: #14c67d;
            position: relative;
            left: 150px;
        }
        #head2{
            //font-family: 'Lato', Calibri, Arial, sans-serif;
            color: #14c67d;
            position: relative;
            left: 150px;
        }
        .doughnut-legend {
            list-style: none;
            position: absolute;
            right: 8px;
            top: 0;
        }
        .doughnut-legend li {
            display: block;
            padding-left: 30px;
            position: relative;
            margin-bottom: 4px;
            border-radius: 5px;
            top : 100px;
            right: 110px;
            padding: 2px 8px 2px 28px;
            font-size: 18px;
            cursor: default;
             
            -webkit-transition: background-color 200ms ease-in-out;
            -moz-transition: background-color 200ms ease-in-out;
            -o-transition: background-color 200ms ease-in-out;
            transition: background-color 200ms ease-in-out;
        }

        .doughnut-legend li span {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 80%;
            border-radius: 5px;
               
        }
         #Bar {
          position: absolute;
          left: 720px;
          top: 420px;
          height : 250px;
          width : 455px;
          background: white;
          -webkit-box-shadow: 0 10px 6px -6px #777;
          -moz-box-shadow: 0 10px 6px -6px #777;
          box-shadow: 0 10px 6px -6px #777;
        }
	</style>
    </head>
   <body bgcolor="#d6d6d6">
        <div class="logo">
            <h1>VOTING SYSTEM</h1>
        </div>
        <div class="container">
           
             <ul class="nav">
                 <li id="selected"><a href="#">STATS</a>
                 <!--<li ><a href="partylist.php">ADD VOTER</a>--> 
                
            </ul> 
            </div>
        <?php
              $con = mysqli_connect("127.0.0.1", "root","root","vote");
              if (!$con) {
                       die("Connection failed: " . mysqli_connect_error());
              }
              $M = "select count(*) from voter where sex='Male'";
              $F = "select count(*) from voter where sex='Female'";
              $CM = "select count(*) from candidate where sex='Male'";
              $CF = "select count(*) from candidate where sex='Female'";
              $VM = "select count(*) from voter v,voting s where v.vid=s.vid and sex='Male'";
              $VF = "select count(*) from voter v,voting s where v.vid=s.vid and sex='Female'";
              $vote = "select pname,count(*) from party p,candidate c,voting v where v.cno=c.cno and p.pno=c.pno group by pname";
              $result = mysqli_query($con,$M);
              $result1 = mysqli_query($con,$F);
              $result2 = mysqli_query($con,$CM);
              $result3 = mysqli_query($con,$CF);
              $result5 = mysqli_query($con,$VM);
              $result6 = mysqli_query($con,$VF);
              $row=mysqli_fetch_array($result);
              $row1=mysqli_fetch_array($result1);
              $row2=mysqli_fetch_array($result2);
              $row3=mysqli_fetch_array($result3);
              $row5=mysqli_fetch_array($result5);
              $row6=mysqli_fetch_array($result6);
              if($result4 = mysqli_query($con,$vote)){
                  while($row4 = mysqli_fetch_array($result4)){
                      if($row4['pname'] == 'Bharatiya Janata Party')
                      {
                      $bjp= $row4['count(*)'];
                      }
                      if($row4['pname'] == 'Congress')
                      {
                      $con= $row4['count(*)'];
                      }
                      if($row4['pname'] == 'Janata Dal')
                      {
                      $jds= $row4['count(*)'];
                      }
                      if($row4['pname'] == 'Karnataka Janata Paksha')
                      {
                      $kjp= $row4['count(*)'];
                      }
                      if($row4['pname'] == 'Aam Aadmi Party')
                      {
                      $aap= $row4['count(*)'];
                      }
                  }
              }
              
                   
                       
                       
                          
                      
                   
              
              $m = $row['count(*)'];
              $f = $row1['count(*)'];    
        ?>
     <div id="canvas-holder">
         <div id="head"> <h3>Total Voters: <?php echo $m+$f ;?></h3></div>
          <ul class="doughnut-legend">
            <li><span style="background-color:#46BFBD"></span>Male: &nbsp;<?php echo $m;?></li>
            <li><span style="background-color:#F7464A"></span>Female:&nbsp;<?php echo $f;?></li>
          </ul>
         <canvas id="chart-area" width="600" height="180"/>
         
     </div>
       <div id="canvas-holder11">
           <ul class="doughnut-legend">
            <li><span style="background-color:#FDB45C"></span>Male: &nbsp;<?php echo $row2['count(*)'];?></li>
            <li><span style="background-color:#949FB1"></span>Female:&nbsp;<?php echo $row3['count(*)'];?></li>
          </ul>
           <div id="head"><h3>Total Candidates: <?php echo $row2['count(*)']+$row3['count(*)'];?></h3></div>
        <canvas id="chart-area11" width="600" height="180"/>
     </div>
       
       <div id="canvas-holder12">
           <ul class="doughnut-legend">
            <li><span style="background-color:#446CB3"></span>Male: &nbsp;<?php echo $row5['count(*)'];?></li>
            <li><span style="background-color:#CF000F"></span>Female:&nbsp;<?php echo $row6['count(*)'];?></li>
          </ul>
           <div id="head2"><h3>Total Voters Who Voted: <?php echo $row5['count(*)']+$row6['count(*)'];?>/17</h3></div>
        <canvas id="chart-area12" width="600" height="180"/>
     </div>
       
           <div id="Bar">
                <div id="head1"><h3>Party In Majority</h3></div>
		<canvas id="canvas" height="250" width="600"></canvas>
           </div>
      
     <script>
        var x = <?php echo $m;?>;
        var y = <?php echo $f;?>;
              
	var doughnutData = [
	{
	   value: x,
           // color: colours["Core"],
           color: "#46BFBD",
	   highlight: "#5AD3D1",
	   label: "MALE"
	},
	{
	    value: y,
	    color:"#F7464A",
	    highlight: "#FF5A5E",
	    label: "FEMALE"
	},
				
	];
        var doughnutData11 = [
	{
	   value: <?php echo $row2['count(*)'];?>,
           // color: colours["Core"],
           color: "#FDB45C",
	   highlight: "#FFC870",
	   label: "MALE"
	},
	{
	    value: <?php echo $row3['count(*)'];?>,
	    color:"#949FB1",
	    highlight: "#A8B3C5",
	    label: "FEMALE"
	},
				
	];
        var doughnutData12 = [
	{
	   value: <?php echo $row5['count(*)'];?>,
           // color: colours["Core"],
           color: "#446CB3",
	   highlight: "#567aba",
	   label: "MALE"
	},
	{
	    value: <?php echo $row6['count(*)'];?>,
	    color:"#CF000F",
	    highlight: "#d31926",
	    label: "FEMALE"
	},
				
	];
        var barChartData = {
		labels : ["BJP","CONGRESS","JDS","KJP","AAP"],
		datasets : [
			
			{
				fillColor : "#14c67d",
				//strokeColor : "rgba(151,187,205,0.8)",
				//highlightFill : "rgba(151,187,205,0.75)",
				//highlightStroke : "rgba(151,187,205,1)",
				data : [<?php echo $bjp;?>,<?php echo $con;?>,<?php echo $jds;?>,<?php echo $kjp;?>,<?php echo $aap;?>]
			}
                        
		]
                

	}            
	window.onload = function(){
	var ctx = document.getElementById("chart-area").getContext("2d");
        var ctx11 = document.getElementById("chart-area11").getContext("2d");
        var ctx13 = document.getElementById("chart-area12").getContext("2d");
        var ctx12 = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx12).Bar(barChartData, {responsive : true});
        window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
        window.myDoughnut = new Chart(ctx11).Doughnut(doughnutData11, {responsive : true});
        window.myDoughnut = new Chart(ctx13).Doughnut(doughnutData12, {responsive : true});
        };



	</script>  
      
    </body>
</html>

          