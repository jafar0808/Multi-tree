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
        <script language="javascript">
          
        </script>
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
            left: 100px;
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
            font-size: 14px;
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
                 <li><a href="candprofile.php">CANDIDATE PROFILE</a></li>
                 <li id="selected"><a href="#">CAST VOTE</a></li>
                 <li><a href="Logout.php">LOGOUT</a></li>
            </ul> 
                <div id="section" >
                    
                        <?php
                         
                        $con = mysqli_connect("127.0.0.1", "root","root","vote");
                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }
                        $v = $_SESSION['Vid'];
                        $c = $_SESSION['city'];
                        $det = "SELECT pname,fname,lnmae,cno FROM party p,candidate c WHERE p.pno=c.pno AND constituency='$c'";
                        
                      
                        echo "<table class='flat-table'>";
                      
                        if (($result = mysqli_query($con,$det))) 
                        {    
                            while($data = mysqli_fetch_object($result))
                           {
                               $fn = $data -> fname;
                               $ln = $data -> lnmae;
                               $name = $fn ." ".$ln;
                               $pname = $data-> pname;
                               $cno = $data ->cno;
                               if($pname == 'Congress'){
                               echo "<tr><td><img src='image/congress.png' width='70'></td><td>$pname</td><td>$name</td>";
                               }
                               if($pname == 'Bharatiya Janata Party'){
                               echo "<tr><td><img src='image/BJP.jpg' width='70'></td><td>$pname</td><td>$name</td>";
                               }
                               if($pname == 'Janata Dal'){
                               echo "<tr><td><img src='image/jds.jpg' width='70'></td><td>$pname</td><td>$name</td>";
                               }
                               if($pname == 'Karnataka Janata Paksha'){
                               echo "<tr><td><img src='image/kjp.png' width='70'></td><td>$pname</td><td>$name</td>";
                               }
                               if($pname == 'Aam Aadmi Party'){
                               echo "<tr><td><img src='image/aap.png' width='70'></td><td>$pname</td><td>$name</td>";
                               }
                               //echo "<tr><td>$pname</td><td>$name</td>";
                               
                               ?>
                               <td><a href="addvote.php?cnum=<?php echo $cno; ?>">VOTE</a></td>
                              <?php
                               echo "</tr>";
                            }
                            echo "</table>";
                             
                        }
                        ?>
                 </div>
            </div>
	</div>
    </body>
</html>
