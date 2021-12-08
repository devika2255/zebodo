<?php
session_start();
include ('connections.php');
?>
<html lang="en">
<head>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/adminviewuser.css">
</head>
<body id="booking-body">
<?php include ('../components/adminheader.php'); ?>
    <div id="booking-container">
    <table id="booking-table">
        <tr>
            <th id="table-index">Name</th>
            <th id="table-index">Email</th>
            <th id="table-index">Phone Number</th>
            <th id="table-index">Pincode</th>
        </tr>
        <?php
        $sql="SELECT * FROM userreg";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            
        ?>
        <tr>
            <td id="booking-seller-td">
            <div  id="booking-name"><?php echo $row['name'];?></div><br>
            </td>
            <td id="booking-seller-td">
            <div id="booking-price"><?php echo $row['email'];?></div>
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['phone'];?></div>
            </td>
            <td id="booking-seller-td">
                <div id="booking-seller"><?php echo $row['pincode'];?></div>
            </td>
        </tr>
        <?php
            }
        ?>
      
    </table>
    
    </div>
    <?php include ('../components/footer.php'); ?>
        
</body>
</html>