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
             height: 990px;
             background: white;
             //overflow: auto;
           }
           .flat-table {
            position: absolute;
            top: 70px;
            left: 255px;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 85%;
            }
            th{
            background-color: #14c67d;
            color: white;
            font-weight: normal;
            padding: 20px 30px;
            text-align: center;
            }
            td{
             font-size: 15px;
            background-color: rgb(238, 238, 238);
            color: rgb(111, 111, 111);
            padding: 20px 30px;
            }
            #ms {
            font-family: 'Lato', Calibri, Arial, sans-serif;
            text-align: center;
            color: #14c67d;
            }
            #ima{
                position: absolute;
                top: 72px;
                left: 125px;
               
            }
            #button{
                position: absolute;
                top : 800px;
                left :530px;
            }
            
            input[type=submit] {
   
                color: #fff;
                background:#14c67d;
                border: none;
                width: 240px;
                height: 30px;
                font-size: 12px;
                font-weight: bold;
                border-radius: 4px;
            }
            input[type=submit]:hover {
              color:#fff;
              background: #5ad7a4;
              border-color: #14c67d;

            }
            input[type=submit]:active {
              color:#14c67d;
              background: #fff;
              border-color: #14c67d;

            }
            
        </style>
    </head>
    <body bgcolor="#d6d6d6">
        <div class="logo">
            <h1>Multi Level Marketing</h1>
          <!--  <h4><?php echo $_SESSION['user'];?></h4> -->
        </div>
        <div class="container">
            <div>
             <ul class="nav">
                 <li id="selected"><a href="#">VOTER PROFILE</a>
                 <li ><a href="partylist.php">CONSTITUENCY</a>     
                 <li><a href="candprofile.php">  CANDIDATE PROFILE</a></li>
                 <li><a href="castvote.php">CAST VOTE</a></li>
                 <li><a href="Logout.php">LOGOUT</a></li>
            </ul> 
                <div id="section" >
                    <img id="ima" src="image/user-128.png">
                        <?php
                         
                        $con = mysqli_connect("127.0.0.1", "root","mjsk@100","vote");
                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }
                        $v = $_SESSION['Vid'];
                        $details = "SELECT * FROM voter WHERE vid='$v'";
                        echo "<h2 id='ms'>MEMBER INFORMATION</h2>";
                        echo "<table class='flat-table'>";
                        
                        if (($result = mysqli_query($con,$details))) 
                        {
                            while($data = mysqli_fetch_object($result))
                           {
                                $fn = $data -> fname;
                                $ln = $data -> lname;
                                $dob = $data -> dob;
                                $add = $data -> address;
                                $city = $data -> city;
                                $pin = $data -> pincode;
                                $sex = $data -> sex;
                                $occ = $data -> occupation;
                               
                                $curr = date("Y/m/d");
                                $age= $curr - $dob;
                                echo "<tr><th>First Name</th><td>$fn</td></tr>";
                                echo "<tr><th>Last Name</th><td>$ln</td></tr>";
                                echo "<tr><th>Date Of Birth</th><td>$dob</td></tr>";
                                echo "<tr><th>Age</th><td>$age</td></tr>";
                                echo "<tr><th>Address</th><td>$add</td></tr>";
                                echo "<tr><th>City</th><td>$city</td></tr>";
                                echo "<tr><th>Pincode</th><td>$pin</td></tr>";
                                echo "<tr><th>Gender</th><td>$sex</td></tr>";
                                echo "<tr><th>Occupation</th><td>$occ</td></tr>";
                                
                            }
                             echo "</table>";
                             
                        }
                        ?>
                    
                 </div>
            </div>
	</div>
        <div id="button"><a href="UpdateVoter.php"><input type="submit" value="UPDATE"></a></div>
    </body>
</html>
