<?php
 // Create connection
 $conn = new mysqli("localhost", "root", "", "zebodo");
 if(!$conn){
 die('Could not connect: '.mysqli_connect_error());
 }

?>