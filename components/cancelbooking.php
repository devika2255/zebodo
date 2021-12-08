<?php
include ('connections.php');
  if(isset($_GET['id'])){
      $id=$_GET['id'];
    $sql="UPDATE product SET user_id=0, product_status=0 where product_id=$id";
    if(mysqli_query($conn, $sql)){
        header("location:http://localhost/zebodo/components/userbooking.php");
    }
}

?>