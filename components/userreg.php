<?php
include('connections.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $pincode=$_POST['pincode'];
    $sql="INSERT INTO userreg VALUES ('$name','$email','$phone','$pincode','$password')" ;
    if(mysqli_query($conn,$sql)){
        echo '<script>alert("Registered Succesfully")</script>';
    }
    else{
        echo '<script>alert("Could not be Registered")</script>';
    }
}
?>
<html>
    <head>
        <title>user Registration</title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/userreg.css">
        <script>
        function validateForm() {
        var v = document.forms["myForm"]["name"].value;
        var w = document.forms["myForm"]["email"].value;
        var x = document.forms["myForm"]["phone"].value;
        var y = document.forms["myForm"]["pincode"].value;
        var z = document.forms["myForm"]["password"].value;
        var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
        
        if(v == "") {
            document.getElementById('nameval').innerHTML="Name must be filled out";
            return false;
        }
        if(w == "") {
            document.getElementById('emailval').innerHTML="Email must be filled out";
            return false;
        }
    
        if(!regex.test(w)){
            document.getElementById('emailval').innerHTML="Not a valid email id";
            return false;
        }
        if(x == "") {
            document.getElementById('phoneval').innerHTML="Phone number must be filled out";
            return false;
        }
        if(isNaN(x)){
            document.getElementById('phoneval').innerHTML="Phone number should be only digits";
            return false;
        }
        if(x.length!=10) {
            document.getElementById('phoneval').innerHTML="Phone number should be 10 digits";
            return false;
        }
        if(y == "") {
            document.getElementById('pinval').innerHTML="Pincode must be filled out";
            return false;
        }
        if(isNaN(y)){
            document.getElementById('pinval').innerHTML="Pincode should be only digits";
            return false;
        }
        if(z == "") {
            document.getElementById('passval').innerHTML="Password must be filled out";
            return false;
        }
       if(z.length < 8) {
            document.getElementById('passval').innerHTML="password must be atleast 8 letters";
            return false;
        }
        }
        </script>
    </head>
    <body id="login-body">
    <?php include ('../components/loginheader.php'); ?>
        <div id="login">
            <h1  id="main-heading">User Registration</h1>
            <form method="POST"  class="form" id="login-form" name="myForm" onsubmit="return validateForm()">
                <div id="row">
                    <label id="login-label">Name</label><input id="login-input" onkeypress="return fk()" type="text" class="input" name="name">
                    <span id="nameval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="login-label">Email</label><input id="login-input" type="text" class="input" name="email">
                    <span id="emailval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="login-label">Phone Number</label><input id="login-input" type="text" class="input" name="phone">
                    <span id="phoneval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="login-label">Pincode</label><input id="login-input" type="text" class="input" name="pincode">
                    <span id="pinval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="login-label">Password</label><input id="login-input" type="password" class="input" name="password">
                    <span id="passval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <input id="login-button" type="submit" name="submit" value="submit">
                </div>
                <p id="register-now">Already Registered ?<a href="http://localhost/zebodo/components/login.php" id="register-link">Login Now</a></p>

            </form>
            
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>