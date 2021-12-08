<?php
session_start();
include ('connections.php');
?>
<html lang="en">
<head>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/adminviewbooking.css">
</head>
<body id="booking-body">
<?php include ('../components/adminheader.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <?php
        $sql="SELECT * FROM product  WHERE product_status='1'";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)<=0){
            ?>
                <div id="no-items" align="center">
                    <img src="http://localhost/zebodo/images/noitems.png" id="no-items-image">
                    <a href="http://localhost/zebodo/components/adminlandingpage.php" id="shop-now">No item found</a>
                </div>
            <?php
                }
                else{

        while($row=$result->fetch_assoc()){
            $id=$row['product_id'];
            
        ?>
        <tr>
            <td id="booking-image-td">
                <img src="<?php echo $row['product_image'];?>" id="product-image">
            </td>
            <td id="booking-details-td"> 
                <div  id="booking-name"><?php echo $row['product_name'];?></div>
                
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['product_seller'];?></div>
            </td>
            <td id="booking-cancel-td">
            <div id="booking-price">₹<?php echo $row['product_price'];?></div>
            </td>
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