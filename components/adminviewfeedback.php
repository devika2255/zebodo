<?php
session_start();
include ('connections.php');
?>
<html lang="en">
<head>
    <title>FEEDBACK</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/adminviewfeedback.css">
</head>
<body id="booking-body">
<?php include ('../components/adminheader.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <?php
        $sql="SELECT * FROM feedback";
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
                ?>
                    <tr id="tr">
                    <th id="booking-image-td" align="center"> 
                        <div  id="booking-name">serial no</div>
                        
                    </th>
                    <th id="booking-seller-td">
                        <div id="booking-seller">User id</div>
                    </th>
                    <th id="booking-cancel-td">
                    <div id="booking-price">Company name</div>
                    </th>
                    <th id="booking-details-td">
                    <div id="booking-price">Details</div>
                    </th>
                </tr>
<?php
        while($row=$result->fetch_assoc()){
          
            
        ?>
        <tr id="tr">
            <td id="booking-image-td" align="center"> 
                <div  id="booking-name"><?php echo $row['slno'];?></div>
                
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['userid'];?></div>
            </td>
            <td id="booking-cancel-td">
            <div id="booking-price"><?php echo $row['companyname'];?></div>
            </td>
            <td id="booking-details-td">
            <div id="booking-price"><?php echo $row['details'];?></div>
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