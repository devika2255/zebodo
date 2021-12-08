<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"];
$password=$_SESSION["password"];
$sql="SELECT shop_id,name,pincode FROM shopreg WHERE email='$username' OR phone='$username' AND password='$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION["shop_id"]=$row['shop_id'];
$_SESSION["shop_name"]=$row['name'];
$_SESSION["pincode"]=$row['pincode'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            zebodo
       </title>
    </head>
    <body>
        <?php include ('shopheader.php'); ?>
        <?php include ('shoplandingcontent.php'); ?>
      <?php include ('footer.php');?>


    </body>
</html>
