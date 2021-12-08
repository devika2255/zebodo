<?php
include ('connections.php');
  if(isset($_GET['id'])){
      $id=$_GET['id'];
    $sql="DELETE FROM shopreg where shop_id=$id";

    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/zebodo/components/admincheckregistrationpending.php");
    }
}

?>