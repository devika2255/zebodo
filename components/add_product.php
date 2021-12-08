<?php
session_start();
$shop_id=$_SESSION["shop_id"];
$shop_name=$_SESSION["shop_name"];
$pincode=$_SESSION['pincode'];
include ('connections.php');
if (isset($_POST['submit'])) {
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $name=$_POST['name'];
        $category=$_POST['category'];
        $quantity=$_POST['quantity'];
        $brand=$_POST['brand'];
        $price=$_POST['price'];
        $details1=$_POST['details1'];
        $details2=$_POST['details2'];
        $details3=$_POST['details3'];
        $details4=$_POST['details4'];
        $details5=$_POST['details5'];

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
               echo '<script>alert("File already exists")</script>';
           } 
           else{
               move_uploaded_file($_FILES["photo"]["tmp_name"], $target . $filename);
               $s=$tar.$filename;
               $sql="INSERT INTO product (product_name,product_category,product_quantity,product_brand,product_seller,product_price,shop_id,product_details1,product_details2,product_details3,product_details4,product_details5,product_image,product_pincode) VALUES('$name','$category','$quantity','$brand','$shop_name','$price','$shop_id','$details1','$details2','$details3','$details4','$details5','$s','$pincode')";

            if(mysqli_query($conn, $sql)){
                echo '<script>alert("Record inserted succesfully")</script>';
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
       echo "Error: " . $_FILES["photo"]["error"];
    }

}
?>
<html>
    <head>
        <title>add product</title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/add_product.css">
        <script>
        function validateForm() {
        var v = document.forms["myForm"]["name"].value;
        var w = document.forms["myForm"]["category"].value;
        var x = document.forms["myForm"]["quantity"].value;
        var y = document.forms["myForm"]["brand"].value;
        var z = document.forms["myForm"]["price"].value;
        var a = document.forms["myForm"]["details1"].value;
        var b = document.forms["myForm"]["details2"].value;
        var c = document.forms["myForm"]["details3"].value;
        var d = document.forms["myForm"]["details4"].value;
        var e = document.forms["myForm"]["details5"].value;
        
      
        if(v == "") {
            document.getElementById('nameval').innerHTML="Name must be filled out";
            return false;
        }
        if(w == "") {
            document.getElementById('categoryval').innerHTML="Category must be filled out";
            return false;
        }
        if(x == "") {
            document.getElementById('quantityval').innerHTML="Quantity must be filled out";
            return false;
        }
        if(isNaN(x)){
            document.getElementById('quantityval').innerHTML="Quantity should be only digits";
            return false;
        }
       
        if(y == "") {
            document.getElementById('brandval').innerHTML="Brand must be filled out";
            return false;
        }
     
        if(z == "") {
            document.getElementById('priceval').innerHTML="Price must be filled out";
            return false;
        }
        if(isNaN(z)){
            document.getElementById('priceval').innerHTML="Price should be only digits";
            return false;
        }
        if(a == "") {
            document.getElementById('details1val').innerHTML="Details must be filled out";
            return false;
        }
        if(b == "") {
            document.getElementById('details2val').innerHTML="Details must be filled out";
            return false;
        }
        if(c == "") {
            document.getElementById('details3val').innerHTML="Details must be filled out";
            return false;
        }
        if(d == "") {
            document.getElementById('details4val').innerHTML="Details must be filled out";
            return false;
        }
        if(e == "") {
            document.getElementById('details5val').innerHTML="Details must be filled out";
            return false;
        }
        }
        </script>
    </head>
    <body id="add_productbody">
    <?php include ('../components/shopheader.php'); ?>
        <div id="add_productcontainer">
            <h1 id="add_productheading">Product Details</h1>
            <form  id="add_productform" action=" " method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                <div id="row">
                    <label id="form-label"> Product Name</label><input id="form-input" type="text" name="name" >
                    <span id="nameval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Category</label><input id="form-input" type="text" name="category" >
                    <span id="categoryval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Quantity</label><input id="form-input" type="text" name="quantity">
                    <span id="quantityval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Brand</label><input id="form-input" type="text" name="brand">
                    <span id="brandval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Price</label><input id="form-input" type="text" name="price">
                    <span id="priceval" class="val" style="color:red"></span>
                </div>
                <div id="row">
                        <label for="is" id="form-label">Image Source</label>
                        <input id="image-input" type="file" name="photo" id="fileSelect" required="required" data-error="Image should be selected">
                </div>
                <div id="row">
                    <label id="form-label">Product Details1</label><input id="form-input" type="text" name="details1">
                    <span id="details1val" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Product Details2</label><input id="form-input" type="text" name="details2">
                    <span id="details2val" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Product Details3</label><input id="form-input" type="text" name="details3">
                    <span id="details3val" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Product Details4</label><input id="form-input" type="text" name="details4">
                    <span id="details4val" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <label id="form-label">Product Details5</label><input id="form-input" type="text" name="details5">
                    <span id="details5val" class="val" style="color:red"></span>
                </div>
                <div id="row">
                    <input id="form-button" type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>