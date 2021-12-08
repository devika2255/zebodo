<?php
session_start();
include ('connections.php');
$username=$_SESSION["username"]; 
include ('connections.php');
if(isset($_POST['submit'])){
  $companyname=$_POST['companyname'];
  $details=$_POST['details'];
  $sql="INSERT INTO feedback(userid,companyname,details) VALUES ('$username','$companyname','$details')" ;
  if(mysqli_query($conn,$sql)){
      echo '<script>alert("Feedback submitted succesfully")</script>';
  }
  else{
      echo '<script>alert("There occured an error while submitting the feedback")</script>';
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            zebodo
       </title>
       <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/feedback.css">
       <script>
        function validateForm() {
        var x = document.forms["myForm"]["companyname"].value;
        var y = document.forms["myForm"]["details"].value;
        
        if(x == "") {
            document.getElementById('companyval').innerHTML="Company name  must be filled out";
            return false;
        }
        if(y == "") {
            document.getElementById('detailsval').innerHTML="Details must be filled out";
            return false;
        }
        }
        </script>
    </head>
    <body id="feedback-body">
        <?php include ('../components/headerhomepage.php'); ?>
        <div id="feedback-container">
          <div id="feedback-heading"><h1 id="heading-text">FEEDBACK</h1></div>
          <div id="feedback-details">
            <form method="POST" id="feedbackform" name="myForm" onsubmit="return validateForm()">
                <label id="feedbacklabel">company name</label><br>
                <input type="text" name="companyname" id="box1"><br>
                <span id="companyval" class="val"></span><br>
                <label id="feedbacklabel">details</label><br>
                <input type="text-box" name="details" id="box2">
                <span id="detailsval" class="val"></span><br>
        
         
            <hr>
            <div id="change-links">
            <input type="submit" id="change-pincode" value="submit" name="submit">
            </div>
</form>
        
          </div>
        
        </div>
        <?php include ('../components/footer.php'); ?>
</html>
