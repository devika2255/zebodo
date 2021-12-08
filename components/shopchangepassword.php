<?php
session_start();
include ('connections.php');
if(isset($_POST['submitchange'])){
    $username=$_SESSION["username"];
    $password=$_POST['pass'];
    $newpassword=$_POST['new'];
    
    $sql="SELECT * FROM shopreg WHERE (email='$username' OR phone='$username') AND password='$password' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $mysql="UPDATE shopreg SET password='$newpassword' WHERE (email='$username' OR phone='$username') AND password='$password'";
        if(mysqli_query($conn,$mysql)){
            echo '<script>alert("Password Updated Succesfully")</script>';
        }
    }
    else{
        echo '<script>alert("Incorrect Password")</script>';
    }
}
?>
<html>
    <head>
        <title>
            Change Password
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/change.css">
        <script>
        function validateForm() {
        var x = document.forms["myForm"]["pass"].value;
        var y = document.forms["myForm"]["new"].value;
        
        if(x == "") {
            document.getElementById('oldval').innerHTML="Old passsword must be filled out";
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
    <body id="change-body">
        <?php include ('../components/shopheader.php'); ?>
        <div id="change-container">
        <h1 id="change-heading">Change Your Password</h1>
        <form method="POST" name="myForm" onsubmit="return validateForm()">
            <div id="change-content">
                <div id="change-details">
                    <div id="change-details-item">
                        <label>Current Password</label><br><input type="password" name="pass" id="password"><br>
                        <span id="oldval" class="val"></span>
                    </div>  
                    <div id="change-details-item">
                        <label>New Password</label> <br><input type="password" name="new" id="password"><br>
                        <span id="passval" class="val"></span>
                    </div>
                    <div id="change-details-item">
                        <input type="submit" name="submitchange" id="submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>