<?php
session_start();
include ('connections.php');

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=="admin"&&$password=="adminadmin"){
        header("Location: http://localhost/zebodo/components/adminlandingpage.php");
    }
    $sql="SELECT * FROM userreg WHERE (email='$username' OR phone='$username') AND password='$password' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location: http://localhost/zebodo/components/userlandingpage.php");
    }
    else{
        echo '<script>alert("Username and Password does not match")</script>';
    }
    
} 
?>

<html>
    <head>
        <title>
            login page
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/login.css">
        <script>
        function validateForm() {
        var x = document.forms["myForm"]["username"].value;
        var y = document.forms["myForm"]["password"].value;
        
        if(x == "") {
            document.getElementById('userval').innerHTML="Name must be filled out";
            return false;
        }
        if(y == "") {
            document.getElementById('passval').innerHTML="Password must be filled out";
            return false;
        }
       if(y.length < 8) {
            document.getElementById('passval').innerHTML="password must be atleast 8 letters";
            return false;
        }
        }
        </script>
    </head>
    <body id="login-body">
    <?php include ('../components/loginheader.php'); ?>
    <div id="login-container">
            <div id="login">
                <h1 id="main-heading">LOGIN</h1>
                <form action="" method="post" id="login-form" name="myForm" onsubmit="return validateForm()">
                    <div id="row">
                        <label id="login-label" >Username</label><input type="text" placeholder="Email or Phone number" id="login-input" name="username"><br>
                        <span id="userval" class="val"></span>
                    </div>
                    <div id="row">
                        <label id="login-label">Password</label><input type="password" placeholder="Password" id="login-input" name="password">
                    <br>
                    <span id="passval" class="val"></span>
                    </div>
                    <div id="row">
                    <input id="login-button" type="submit" name="submit" value="login">
                    </div>
                    <p id="register-now">Not a user?<a href="http://localhost/zebodo/components/userreg.php" id="register-link">Register Now</a></p>
                    
                </form>
            </div>  
</div>
            <?php include ('../components/footer.php'); ?>    
    </body>
</html>