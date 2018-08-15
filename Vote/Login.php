<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            $servername = "127.0.0.1";
            $username = "root";
            $password = "mjsk@100";
            $dbname = "vote";
           
            $con = mysqli_connect($servername, $username, $password, $dbname);
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
           
            $sql = "SELECT * FROM voter";
            $flag=0;
            if (($result = mysqli_query($con,$sql))) 
            {
                while($data = mysqli_fetch_object($result))
                {
                    $fname = $data -> fname;
                    $vid = $data ->vid;
                    $cit = $data ->city;
                    if($fname == $_POST['name'] && $vid == $_POST['voterid'])
                    {
                        header("Location: http://localhost/Vote/second.php");
                        $_SESSION['user'] = $_POST['name'] ;
                        $_SESSION['Vid'] = $_POST['voterid'];
                        $_SESSION['city'] = $cit; 
                        $flag=1;
                    }
                    else{
                      $_SESSION['alert']="User Name or Password is Incorrect";
                    }
                }
            }
          if($flag!=1)
          {
             header("Location: http://localhost/Vote/Frontpage.php");
          }
         
        ?>
    </body>
</html>
