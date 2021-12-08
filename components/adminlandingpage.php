<?php
include ('connections.php');
$sql="SELECT COUNT(*) AS `count` FROM `userreg`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
$row1 = $result->fetch_assoc();

}

$sql1="SELECT COUNT(*) AS `count` FROM `shopreg` WHERE status=1";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // output data of each row
$row2 = $result->fetch_assoc();
}


$sql2="SELECT COUNT(*) AS `count` FROM `shopreg` WHERE status=0";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // output data of each row
$row3 = $result->fetch_assoc();
}
?>
<html>
    <head>
        <title>
            Home page
        </title>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/adminlandingpage.css">
    </head>
    <body id="admin-body">
    <?php include ('../components/adminheader.php'); ?>
    <div id="admin-container">
            <div id="admin-content">
                    <a href="#" id="admin-details-item">
                        <label id="admin-label">Registered Users</label><br><p id="admin-count"><?php print($row1['count']);?></p>
                    </a>  
                    <a href="#" id="admin-details-item">
                        <label id="admin-label">Registered Shops</label> <br><p id="admin-count"><?php print($row2['count']);?></p>
                    </a>
                    <a href="#" id="admin-details-item">
                        <label id="admin-label"> Registration Pending</label><br><p id="admin-count"><?php print($row3['count']);?></p>
                    </a>
            </div>
            <a id="send-button" href="http://localhost/zebodo/components/send_notifications.php">Send Notifications</a>
        </div>
        <?php include ('../components/footer.php'); ?>
    </body>
</html>