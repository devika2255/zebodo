<?php
session_start();
$username=$_SESSION["username"]; 
$password=$_SESSION["password"];
$id=$_GET['id'];

include ('connections.php');
     $sql="SELECT * FROM product  where product_id=$id";
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();
     if(isset($_POST['booksubmit'])){
         /*
        $sqlbook="SELECT phone FROM userreg  WHERE email='$username' OR phone='$username' AND password='$password'";
        $resultbook=$conn->query($sqlbook);
        $rowbook=$resultbook->fetch_assoc();
        $userid=$rowbook['phone'];
        */
        $sqlupdate="UPDATE product SET user_id='$username', product_status='1' where product_id=$id";
        if(mysqli_query($conn, $sqlupdate)){
            echo '<script>alert("Product Booked")</script>';

        }
     }
?>
<html lang="en"> 
<head>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/product.css">
</head>
<body id="product-body">
<?php include ('../components/headerhomepage.php'); ?>
    <div id="product-container">
    <div id="product-imagecontainer">
        <img src="<?php echo $row['product_image'];?>" id="product-image">
    </div>
    <div id="product-details">
        <h1 id="product-heading"><?php echo $row['product_name'];?></h1>
        <div id="product-spec">
            <label id="product-label">Price</label>
            <div id="product-spec-list">
             <h3 id="product-seller">₹<?php echo $row['product_price'];?></h3>
            </div>    
        </div>
        <div id="product-spec">
            <label id="product-label">Seller</label>
            <div id="product-spec-list">
             <h3 id="product-seller"><?php echo $row['product_seller'];?></h3>
            </div>    
        </div>
        <div id="product-spec1">
            <label id="product-label">Quantity</label>
            <div id="product-spec-list">
             <h3 id="product-seller"><?php echo $row['product_quantity'];?></h3>
            </div>    
        </div>
        <div id="product-spec1">
            <label id="product-label">Highlights</label>
            <ul id="product-spec-list">
                <li id="product-spec-item"><?php echo $row['product_details1'];?></li>
                <li id="product-spec-item"><?php echo $row['product_details2'];?></li>
                <li id="product-spec-item"><?php echo $row['product_details3'];?></li>
                <li id="product-spec-item"><?php echo $row['product_details4'];?></li>
                <li id="product-spec-item"><?php echo $row['product_details5'];?></li>
            </ul>    
        </div>
        <form method="POST" id="product-spec1">
        <button name="booksubmit" id="product-book">Book Now</button>  
        </form>
        
    </div>
    </div>
    <?php include ('../components/footer.php'); ?>
</body>
</html>