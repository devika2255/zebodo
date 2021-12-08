<?php
session_start();
include ('connections.php');
if(isset($_POST['submit'])){
    $_SESSION['heading']=$_POST['heading'];
    $_SESSION['name']=$_POST['name'];
    $_SESSION['date']=$_POST['date'];
    $_SESSION['image']=$_POST['image'];
    $_SESSION['price']=$_POST['price'];
    $_SESSION['pincode']=$_POST['pincode'];
    header("Location: http://localhost/zebodo/components/sendmail.php"); 
}
?>
<html>
    <head>
        <title>
            Send Notifications
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/send_notfications.css">
    </head>
    <body id="notification-body">
    <?php include ('../components/adminheader.php'); ?>
    <div id="notification-container">
            <div id="notification-content">
            <h1  id="main-heading">Email details</h1>
            <form method="POST" class="form" id="login-form">
                <div id="row">
                    <label id="login-label">Heading</label><input id="login-input" type="text" class="input" name="heading">
                </div>
                <div id="row">
                    <label id="login-label">Shop name</label><input id="login-input" type="text" class="input" name="name">
                </div>
                <div id="row">
                    <label id="login-label">Date</label><input id="login-input" type="text" class="input" name="date">
                </div>
                <div id="row">
                    <label id="login-label">image</label><input id="login-input" type="text" class="input" name="image">
                </div>
                <div id="row">
                    <label id="login-label">price</label><input id="login-input" type="text" class="input" name="price">
                </div>
                <div id="row">
                    <label id="login-label">pincode</label><input id="login-input" type="text" class="input" name="pincode">
                </div>
                <div id="row">
                    <input id="login-button" type="submit" name="submit" value="submit">
                </div>
            </form>
            </div>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>