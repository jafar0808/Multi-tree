
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPDATE</title>
        <style>
            .logo > h1 {
    font-family: 'Lato', Calibri, Arial, sans-serif;
    text-align: center;
    color: #14c67d;
    
}
            #section{
             position: absolute;
             left: 180px;
             top: 134px;
             width: 990px;
             height: 990px;
             background: white;
             //overflow: auto;
           }
           input[type=text]:focus, input[type=password]:focus {
    
                border: 2px solid;
                border-color: #14c67d;
                outline-color:#eff4f7;
                outline-offset: 0;
            }
           .flat-table {
            position: absolute;
            top: 150px;
            left: 480px;
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
            input[type=submit] {
   
                color: #fff;
                background:#14c67d;
                border: none;
                width: 140px;
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
            #button{
                position: absolute;
                top : 690px;
                left :500px;
            }
            #btn{
                position: absolute;
                top:690px;
                left:690px;
            }
        </style>
    </head>
    <body>
        
        
            <div class="logo">
            <h1>VOTING SYSTEM</h1>
            <hr>
        </div>
         <?php 
             session_start();
             $v = $_SESSION['Vid'];
             $con = mysqli_connect("127.0.0.1", "root","root","vote");
                        if (!$con) {
                        die("Connection failed: " . mysqli_connect_error());
                        }
             $details = "SELECT * FROM voter WHERE vid='$v'";
             echo "<h2 id='ms'>UPDATE INFORMATION</h2>";
             
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
                               
                           }
                          
                        }
            ?>
         <form action="FinalUpdate.php" method="post" >
           <table class='flat-table'>
                <tr><th>First Name</th><td><input type='text' name='FN' placeholder=<?php echo $fn;?>></td></tr>
                <tr><th>Last Name</th><td><input type='text' name='LN' placeholder=<?php echo $ln; ?>></td></tr>
                <tr><th>Date Of Birth</th><td><input type='text' name='DOB' placeholder=<?php echo $dob;?>></td></tr>
                <tr><th>Address</th><td><input type='text' name='ADD' placeholder=<?php echo $add;?>></td></tr>
                <tr><th>City</th><td><input type='text' name='CITY' placeholder=<?php echo $city;?>></td></tr>
                <tr><th>Pincode</th><td><input type='text' name='PIN' placeholder=<?php echo $pin;?>></td></tr>
                <tr><th>Gender</th><td><input type='text' name='GEN' placeholder=<?php echo $sex;?>></td></tr>
                <tr><th>Occupation</th><td><input type='text' name='OCC' placeholder=<?php echo $occ;?>></td></tr>
           </table>
             <div id="button"><input type="submit" value="UPDATE"></div>
             
        </form>
        <div id="btn"><a href="second.php"><input type="submit" value="CANCEL"></a></div>
    </body>
</html>
