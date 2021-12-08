<?php
$id=$_GET['id'];
$userid=1;
include ('connections.php');
     $sql="SELECT * FROM product  where product_id=$id";
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();
     if(isset($_POST['booksubmit'])){
        $sqlupdate="UPDATE product SET user_id=$userid, product_status='1' where product_id=$id";
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
<?php include ('../components/shopheader.php'); ?>
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
        
    </div>
    </div>
    <?php include ('../components/footer.php'); ?>
</body>
</html>