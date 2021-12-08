<?php
session_start();
$shop_id=$_SESSION["shop_id"];;
include ('connections.php');
?>
<html lang="en">
<head>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/userbooking.css">
</head>
<body id="booking-body">
<?php include ('../components/shopheader.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <?php
        $sql="SELECT * FROM product  WHERE product_status='1' AND shop_id='$shop_id'";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)<=0){
            ?>
                <div id="no-items" align="center">
                    <img src="http://localhost/zebodo/images/noitems.png" id="no-items-image">
                    <a href="http://localhost/zebodo/components/shoplandingpage.php" id="shop-now">No booking</a>
                </div>
            <?php
                }
                else{

        while($row=$result->fetch_assoc()){
            $id=$row['product_id'];
            
        ?>
        <tr>
        <form method="POST">
        <td id="booking-image-td">
            <?php
            $id=$row['product_id'];
			echo "
                <a href='http://localhost/zebodo/components/shop_view_product.php?id=$id'>
                ";
                ?>
                <img src='<?php echo $row['product_image'];?>' id='product-image'></a>
               
            </td>
            <td id="booking-details-td"> 
                <div  id="booking-name"><?php echo $row['product_name'];?></div><br>
                <div id="booking-price">₹<?php echo $row['product_price'];?></div>
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['user_id'];?></div>
            </td>
            <td id="booking-cancel-td">
            <?php
               echo "<div class='product-spec1'>
                   <a href='http://localhost/zebodo/components/shopcancelbooking.php?id=$id' id='cancel-book'>cancel booking</a>
                    </div>";
                ?>
            </td>
          
            </form>
        </tr>
        <?php
            }
        }
        ?>
      
    </table>
    
    </div>
    <?php include ('../components/footer.php'); ?>
        
</body>
</html>