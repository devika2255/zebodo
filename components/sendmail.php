<?php 
      session_start();
      $pincode=$_SESSION['pincode'];
      
      ?>
<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      

      <?php
      $conn=mysqli_connect('localhost','root','','zebodo');
      if(!$conn){
          echo "not connected";
      }
      else{
         $sql = "SELECT email FROM userreg WHERE pincode=$pincode";
         $result = mysqli_query($conn,$sql);

         while($rows = mysqli_fetch_assoc($result))
         {       
            $image = $rows['email'];           

      $to_email = "$image;";
      $subject ="Best offers for you";
      $body = '
      <html>
        <head>
          <style>
            #mail-body{
              background-color:#ed4370;
            }
            #mail-logo{
              height: 150px;
              margin: 40px 110px;
            }
            #mail-heading-container{
              width: 80%;
              margin-left: 10%;
              text-align: center;
            }
            #mail-heading{
              color: white;
              font-size: 6rem;
              font-weight: 800;
            }
            #mail-seller-name{
              background-color: #FCD283;
              color: black;
              height: 90px;
              margin: 0 auto;
              min-width: 50%;
              font-size: 4rem;
              text-align: center;
            }
            #mail-offer-date{
              background-color: white;
              color: black;
            
              margin: 0 auto;
              width: 80%;
              font-size: 4rem;
              text-align: center;
            }
            #mail-image{
              height:800px;
              margin-top: 150px;
              margin-left: 30%;
            }
            #mail-offer-price{
              background-color:black;
              color: white;
              height: 90px;
              margin: 0 auto;
              width: 50%;
              margin-top: 150px;
              font-size: 4rem;
              text-align: center;
            }
          </style>
        </head>
        <body id="mail-body">
        <img src="https://photos.smugmug.com/photos/i-SK8Z6hX/0/14614e9b/S/i-SK8Z6hX-S.png" id="mail-logo">
        <div id="mail-heading-container">
          <h1 id="mail-heading">'. $_SESSION['heading'] .'</h1>
        </div>
        <div id="mail-seller-name">'. $_SESSION['name'] .'</div>
        <div id="mail-offer-date">'. $_SESSION['date'] .'</div>
        <img  src="'. $_SESSION['image'] .'"  id="mail-image">
        <div id="mail-offer-price">Just  '. $_SESSION['price'] .'</div>
        </body>
      </html>
      
      
      
      ';
      $headers = "From:zebodo@gmail.com";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      
      if (mail($to_email, $subject, $body, $headers)) {
         echo "Email successfully sent to $to_email...";
      } else {
         echo "Email sending failed...";
      }
   }
   }
      ?>
      
   </body>
</html>