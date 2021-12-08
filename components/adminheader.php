<?php
include ('connections.php');

if(isset($_POST['searchbutton'])){
    $search=$_POST['search'];
    $_SESSION["search"] = $search;       
    header("Location: http://localhost/zebodo/search/");
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/headerhomepage.css">  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
        <a  href="http://localhost/zebodo/components/adminlandingpage.php">
            <img src="http://localhost/zebodo/images/logo.png" id="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/zebodo/components/adminviewuser.php">Users<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/zebodo/components/adminviewbooking.php">Bookings</a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/zebodo/components/addbanner.php">Banner</a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/zebodo/components/adminviewfeedback.php">Feedback</a>
                </li>
                
                <li class="nav-item dropdown" id="navbar-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Shops
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://localhost/zebodo/components/adminviewregisteredshops.php" style="color:black;">Registered Shops</a>
                    <a class="dropdown-item" href="http://localhost/zebodo/components/admincheckregistrationpending.php" style="color:black;">Registration Pending</a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a class="nav-link" href="http://localhost/zebodo/components/logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</body>
</html>