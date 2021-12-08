<?php
include ('connections.php');
  if(isset($_GET['id'])){
      $id=$_GET['id'];
    $sql="UPDATE shopreg SET status=1 where shop_id=$id";
    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/zebodo/components/admincheckregistrationpending.php");
    }
}

?>