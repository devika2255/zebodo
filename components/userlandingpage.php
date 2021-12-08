<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"]; 
$password=$_SESSION["password"];
$sql="SELECT * FROM userreg WHERE email='$username' OR phone='$username' AND password='$password' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$_SESSION['pincode']=$row['pincode'];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            zebodo
       </title>
    </head>
    <body>
        <?php include ('headerhomepage.php'); ?>
        <?php include ('carousel.php'); ?>
      <?php include ('category.php');?>
      <?php include ('footer.php');?>


    </body>
</html>
