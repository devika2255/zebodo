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
        <link type="text/css" rel="stylesheet" href="http://localhost/zebodo/css/searchheader.css">  
    </head>
<body>
    <div id="navbar">
        <a  href="http://localhost/zebodo/components/userlandingpage.php">
            <img src="http://localhost/zebodo/images/logo.png" id="logo">
        </a>
        <div  id="navbarNavDropdown">
            <ul class="navbar-nav" >
                <li  id="navbar-item" >
                    <a  id="nav-link" href="http://localhost/zebodo/components/userprofile.php">Profile<span class="sr-only">(current)</span></a>
                </li>
                <li id="navbar-item">
                    <a  id="nav-link" href="http://localhost/zebodo/components/userbooking.php">Bookings</a>
                </li>
                <li class="nav-item" id="navbar-item">
                    <a id="nav-link" href="http://localhost/zebodo/components/feedback.php" >Feedback</a>
                </li>
                <li id="navbar-item">
                    <a id="nav-link" href="http://localhost/zebodo/components/logout.php">Logout</a>
                </li>
                
            </ul>
        </div>
        <form id="form-search" method="POST">
            <input id="form-search-input" type="search" placeholder="Search" name="search" aria-label="Search">
            <button id="form-search-button" type="submit"  name="searchbutton" id="search-button">Search</button>
        </form>
    </div>
</body>
</html>