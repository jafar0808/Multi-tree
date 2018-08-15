<?php
          
         session_start();
         $cno = $_GET["cnum"];
         $v = $_SESSION['Vid'];
         $con = mysqli_connect("127.0.0.1", "root","root","vote");
         if(isset($_GET['cnum'])){
         $check = "SELECT * FROM voting where vid='$v'";
         $res = mysqli_query($con,$check);
         $checkrows = mysqli_num_rows($res);
         if($checkrows>0){echo "Already Voted";}  
        else{
            $query = "INSERT IGNORE INTO voting(vid,cno) VALUES('$v','$cno')";

            $result = mysqli_query($con, $query) or die('Error querying database.');

          mysqli_close($con);
          echo "voted";
        } 
        
      }
          
  ?>
   