<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
   <?php session_start();
?>
    <head>
        <title>VOTING SYSTEM</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="FrontCSS.css">
    </head>
    <body>
        
        
        <div class="color-1">
            <div class="container">
                <header><h1>Multi Level Marketing</h1></header>
                <hr style=" color:white;"/>
            </div>
            
            <section class="smwin">
                <div class="login">
                    <h1>Login to Vote</h1>
                    <form  action="Login.php" method="post">
                        <p><input type="text" name="name" placeholder="Name"></p>
                        <p><input  type="password" name="voterid" placeholder="Voter ID"></p>
                        
                        <p align="center" ><input type="submit" name="commit" value="Login"></p>
                        <p align="center" ><input type="submit" name="regi" value="Register"></p>
                        <p align="center"><label style="font-family: 'Lato', Calibri, Arial, sans-serif;color:red;"><?php echo $_SESSION['alert']; $_SESSION['alert']="";?></label></p>
                        
                    </form>
                </div>
            </section>
        </div>
        
    </body>
</html>

