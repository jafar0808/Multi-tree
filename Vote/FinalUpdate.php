<?php

session_start();
$v = $_SESSION['Vid'];
$con = mysqli_connect("127.0.0.1", "root","root","vote");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$GET = "SELECT * FROM voter WHERE vid='$v'";
if ($res = mysqli_query($con,$GET))
{
    while($data = mysqli_fetch_object($res))
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
$FN = $_POST['FN'];
$LN = $_POST['LN'];
$DOB = $_POST['DOB'];
$ADD = $_POST['ADD'];
$CIT = $_POST['CITY'];
$PIN = $_POST['PIN'];
$GEN = $_POST['GEN'];
$OCC = $_POST['OCC'];
if($FN != null)
{
    $update = "UPDATE voter SET fname='$FN',lname='$ln',dob='$dob',address='$add',city='$city',pincode='$pin',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($LN != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$LN',dob='$dob',address='$add',city='$city',pincode='$pin',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($DOB != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$DOB',address='$add',city='$city',pincode='$pin',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($ADD != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$dob',address='$ADD',city='$city',pincode='$pin',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($CIT != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$dob',address='$add',city='$CIT',pincode='$pin',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($PIN != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$dob',address='$add',city='$city',pincode='$PIN',sex='$sex',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($GEN != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$dob',address='$add',city='$city',pincode='$pin',sex='$GEN',occupation='$occ' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }  
}
else if($OCC != null)
{
    $update = "UPDATE voter SET fname='$fn',lname='$ln',dob='$dob',address='$add',city='$city',pincode='$pin',sex='$sex',occupation='$OCC' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else if($FN !=null && $LN !=null && $DOB !=null && $ADD !=null && $CIT !=null && $PIN !=null && $GEN != null && $OCC != null)
{
    $update = "UPDATE voter SET fname='$FN',lname='$LN',dob='$DOB',address='$ADD',city='$CIT',pincode='$PIN',sex='$GEN',occupation='$OCC' WHERE vid='$v'";
    if ($result = mysqli_query($con,$update))
    {
        echo "<script> alert('Success');</script>";
        header("Location: http://localhost/Vote/second.php");
    }
    
}
else
{
    echo "<script> alert('Fill Form');</script>";
    header("Location: http://localhost/Vote/UpdateVoter.php");
    
}
