<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php session_start();
?>
        <meta charset="UTF-8">
        <title>VOTING SYSTEM</title>
        <link rel="stylesheet" type="text/css" href="TabCSS.css">
        <style>
            #section{
             position: absolute;
             left: 180px;
             top: 134px;
             width: 990px;
             height: 690px;
             background: white;
             //overflow: auto;
           }
           .flat-table {
            position: absolute;
            top: 70px;
            left: 0px;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 85%;
            }
            th{
            background-color: #14c67d;
            color: white;
            font-size: 14px;
            font-weight: normal;
            padding: 20px 30px;
            text-align: center;
            }
            td{
            font-size: 12.7px;
            font-weight: bold;
            background-color: rgb(238, 238, 238);
            color: rgb(111, 111, 111);
            padding: 20px 30px;
            }
            #ms {
            font-family: 'Lato', Calibri, Arial, sans-serif;
            text-align: center;
            color: #14c67d;
            }
            
        </style>
    </head>
    <body bgcolor="#d6d6d6">
        <div class="logo">
            <h1>VOTING SYSTEM</h1>
          <!--  <h4><?php echo $_SESSION['user'];?></h4> -->
        </div>
        <div class="container">
            <div>
             <ul class="nav">
                 <li><a href="second.php">VOTER PROFILE</a>
                 <li><a href="partylist.php">CONSTITUENCY</a>     
                <li id="selected"><a href="#">CANDIDATE PROFILE</a></li>
                <li><a href="castvote.php">CAST VOTE</a></li>
                <li><a href="Logout.php">LOGOUT</a></li>
            </ul> 
                <div id="section" >
                    
                        <?php
                         
                        $con = mysqli_connect("127.0.0.1", "root","root","vote");
                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }
                        $c = $_SESSION['city'];
                        $det = "select * from candidate c,party p where constituency='$c' and p.pno = c.pno";
                        
                        echo "<h2 id='ms'>Candidates Participating In"." ".$c."</h2>";
                        echo "<table class='flat-table'>";
                        echo "<tr><th>Party</th><th>Name</th><th>Age</th><th>Address</th><th>Qualification</th><th>Occupation</th></tr>";
                        if (($result = mysqli_query($con,$det))) 
                        {    
                            while($data = mysqli_fetch_object($result))
                           {
                               $fn = $data -> fname;
                               $ln = $data -> lnmae;
                               $name = $fn ." ".$ln;
                               $add = $data -> address;
                               $qua = $data -> qualification;
                               $occ = $data -> occupation;
                               $dob = $data -> dob;
                               $curr = date("Y/m/d");
                               $age= $curr - $dob;
                               $pname = $data -> pname;
                               echo "<tr><td>$pname</td><td>$name</td><td>$age</td><td>$add</td><td>$qua</td><td>$occ</td></tr>";
                               
                               
                            }
                            echo "</table>";
                             
                        }
                        ?>
                 </div>
            </div>
	</div>
    </body>
</html>
