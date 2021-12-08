<?php
include ('connections.php');
if (isset($_POST['submit'])) {
 
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){

         // Check if file was uploaded without errors

       $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
       $filename = $_FILES["photo"]["name"];
       $filetype = $_FILES["photo"]["type"];
       $filesize = $_FILES["photo"]["size"];
       $pincode=$_POST['pincode'];
       $shop_id=$_POST['shopid'];

       // Verify file extension
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
       if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

       // Verify file size - 5MB maximum
       $maxsize = 5 * 1024 * 1024;
       if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

       // Verify MYME type of the file
       if(in_array($filetype, $allowed)){
           // Check whether file exists before uploading it
           $target="../images/banner/";
            $tar="http://localhost/zebodo/images/banner/";
           if(file_exists($target. $filename)){

               echo $filename . " is already exists.";
           } 
           else{
               move_uploaded_file($_FILES["photo"]["tmp_name"], $target . $filename);
               $s=$tar.$filename;
               $sql="INSERT INTO banner (picture,pincode,shop_id) VALUES('$s','$pincode','$shop_id')";

            if(mysqli_query($conn, $sql)){
            echo '<script>alert("Record inserted successfully")</script>';
            }
            else{
            echo "Could not insert record: ". mysqli_error($conn);
            }

            mysqli_close($conn);
           }
        } 
        else{
           echo "Error: There was a problem uploading your file. Please try again.";
        }
    } 
    else{
       echo "Error: " . $_FILES["photo"]["error"];
    }

}
?>
<html>
    <head>
        <title>add product</title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/addbanner.css"> 
    </head>
    <body>
    <?php include ('../components/adminheader.php'); ?>
        <div id="regitration-container">
            <h1 id="regitration-heading">Add banner</h1>
            <form method="POST" id="regitration-form" enctype="multipart/form-data">
                <div id="row">
                    <label id="registration-label">Shop id</label><input  id="registration-input" type="text"  name="shopid">
                </div>
                <div id="row">
                    <label id="registration-label">Pincode</label><input type="text" id="registration-input" name="pincode">
                </div>
                <div id="row">
                    <label id="registration-label">Banner image</label><input type="file" name="photo"  data-error="Image should be selected" id="registration-input">
                </div>
                <div id="row">
                    <input type="submit" id="registration-button" name="submit" value="submit">
                </div>
            </form>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>