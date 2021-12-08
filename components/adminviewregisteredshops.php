<?php
session_start();
include ('connections.php');
?>
<html lang="en">
<head>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/adminviewregisteredshops.css">
</head>
<body id="booking-body">
<?php include ('../components/adminheader.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <?php
        $sql="SELECT * FROM shopreg  WHERE status='1'";
        $result=$conn->query($sql);
        if(mysqli_num_rows($result)<=0){
            ?>
                <div id="no-items" align="center">
                    <img src="http://localhost/zebodo/images/noitems.png" id="no-items-image">
                    <a href="http://localhost/zebodo/components/adminlandingpage.php" id="shop-now">No Registered Shops</a>
                </div>
            <?php
                }
                else{

        while($row=$result->fetch_assoc()){            
        ?>
        <tr>
        <form method="POST">
        <td id="booking-details-td">
            <?php
            $id=$row['shop_id'];
            ?>
               <div  id="booking-price"><?php echo $row['name'];?></div><br>
            </td>
            <td id="booking-details-td"> 
                <div id="booking-price">+91 &nbsp; <?php echo $row['phone'];?></div>
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['district'];?></div>
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['pincode'];?></div>
            </td>
            <td id="booking-cancel-td">
            <?php
               echo "<div class='product-spec1'>
                   <a href='http://localhost/zebodo/components/adminsuspendshops.php?id=$id' id='cancel-book'>Suspend shops</a>
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