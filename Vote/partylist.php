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
             height: 1590px;
             background: white;
             //overflow: auto;
             
           }
           .flat-table {
            position: absolute;
            top: 70px;
            left: 80px;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 85%;
            }
            th{
            background-color: #14c67d;
            color: white;
            font-size: 15px;
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
                <li id="selected"><a href="#">CONSTITUENCY</a>     
                <li><a href="candprofile.php">  CANDIDATE PROFILE</a></li>
                <li><a href="castvote.php">CAST VOTE</a></li>
                <li><a href="Logout.php">LOGOUT</a></li>
            </ul> 
                <div id="section" >
                    
                        <?php
                         
                        $con = mysqli_connect("127.0.0.1", "root","mjsk@100","vote");
                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }
                       
                        $det = "select constituency from candidate group by constituency";
                        
                        echo "<h2 id='ms'>CONSTITUENCY INFORMATION</h2>";
                        echo "<table class='flat-table'>";
                        
                        if (($result = mysqli_query($con,$det))) 
                        {    
                            while($data = mysqli_fetch_object($result))
                           {
                               $cons = $data -> constituency;
                               echo "<tr><th colspan='4'>$cons</th></tr>";
                               echo "<tr><th>Party No</th><th>Party Name</th><th>Candidate Name</th><th>Candidate No</th></tr>";
                               $details = "SELECT p.pno,pname,cno,fname,lnmae FROM candidate c,party p WHERE c.pno=p.pno and constituency='$cons' and c.pno in(Select pno from party)";
                                if (($result1 = mysqli_query($con,$details))) 
                                {
                                     while($data1 = mysqli_fetch_object($result1))
                                     {
                                        $fn = $data1 -> fname;
                                        $ln = $data1 -> lname;
                                        $name = $fn." ".$ln;
                                        $cno = $data1 -> cno;
                                        $pn = $data1 -> pname;
                                        $pno = $data1 -> pno;
                                        echo "<tr><td>$pno</td><td>$pn</td><td>$name</td><td>$cno</td></tr>";
                                     }
                                    
                                } 
                            }
                             echo "</table>";
                             
                        }
                        ?>
                 </div>
            </div>
	</div>
    </body>
</html>
