<?php
include ('connections.php');
if (isset($_POST['submit'])) {
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $owner=$_POST['owner'];
        $district=$_POST['district'];
        $locality=$_POST['locality'];
        $pincode=$_POST['pincode'];
        $password=$_POST['password'];

         // Check if file was uploaded without errors

       $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
       $filename = $_FILES["photo"]["name"];
       $filetype = $_FILES["photo"]["type"];
       $filesize = $_FILES["photo"]["size"];

       // Verify file extension
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
       if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

       // Verify file size - 5MB maximum
       $maxsize = 5 * 1024 * 1024;
       if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

       // Verify MYME type of the file
       if(in_array($filetype, $allowed)){
           // Check whether file exists before uploading it
            $target="../images/";
            $tar="http://localhost/zebodo/images/";
           if(file_exists($target. $filename)){

               echo $filename . " is already exists.";
           } 
           else{
               move_uploaded_file($_FILES["photo"]["tmp_name"], $target . $filename);
               $s=$tar.$filename;
               $sql="INSERT INTO shopreg (name,ownername,phone,email,district,locality,pincode,password,picture) VALUES('$name','$owner','$phone','$email','$district','$locality','$pincode','$password','$s')";

            if(mysqli_query($conn, $sql)){
            echo '<script>alert("Registered Succesfully")</script>';
            }
            else{
            echo "Could not insert record: ". mysqli_error($conn);
            }

            mysqli_close($conn);
           }
        } 
        else{
           echo '<script>alert("There was a problem uploading your file. Please try again")</script>';
        }
    } 
    else{
//      echo "Error: 1 " . $_FILES["photo"]["error"];
    }

}
?>
<html>
    <head>
        <title>Shop Registration</title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/shopreg.css">


        <script>
        function validateForm() {
        var v = document.forms["myForm"]["name"].value;
        var w = document.forms["myForm"]["email"].value;
        var x = document.forms["myForm"]["phone"].value;
        var y = document.forms["myForm"]["pincode"].value;
        var z = document.forms["myForm"]["password"].value;
        var a = document.forms["myForm"]["owner"].value;
        var b = document.forms["myForm"]["district"].value;
        var c = document.forms["myForm"]["locality"].value;
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
        if(a == "") {
            document.getElementById('ownerval').innerHTML="Name must be filled out";
            return false;
        }
        if(b == "") {
            document.getElementById('districtval').innerHTML="Name must be filled out";
            return false;
        }
        if(c == "") {
            document.getElementById('localityval').innerHTML="Name must be filled out";
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
    <body id="registration-body">
    <?php include ('../components/loginheader.php'); ?>
        <div id="regitration-container">
            <h1 id="regitration-heading">Shop Registration</h1>
            <form method="POST" id="regitration-form" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                <div id="row">
                    <label id="registration-label">Name</label><input  id="registration-input" type="text"  name="name">
                    <span id="nameval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Email</label><input type="text" id="registration-input" name="email">
                    <span id="emailval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Phone Number</label><input type="text" id="registration-input" name="phone">
                    <span id="phoneval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Owner Name</label><input type="text" id="registration-input" name="owner">
                    <span id="ownerval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">District</label><input type="text" id="registration-input" name="district">
                    <span id="districtval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Locality</label><input type="text" id="registration-input" name="locality">
                    <span id="localityval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Pincode</label><input type="text" id="registration-input" name="pincode">
                    <span id="pinval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="registration-label">Picture</label><input type="file" name="photo"  data-error="Image should be selected" id="registration-input">
                </div>
                <div id="row">
                    <label id="registration-label">Password</label><input type="password" id="registration-input" name="password">
                    <span id="passval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <input type="submit" id="registration-button" name="submit" value="submit">
                </div>
                <p id="register-now">Already Registered ?<a href="http://localhost/zebodo/components/shoplogin.php" id="register-link">Login Now</a></p>
            </form>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>