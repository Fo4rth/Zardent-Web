<?php 

session_start();


?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    
<link href="CSS/style.css" rel="stylesheet" type="text/css" />
    <title>Zardent</title>
</head>
<body>
<nav class="navbar" style="background-color: black;">
  <div class="navbar_container"> 
    <img src="img/logo1.png" class="navbar_logo" align="center" height="70" > </a>
    <div class="navbar_toggle" id="mobile_menu">
      <span class="bar"> </span> <span class="bar"> </span> <span class="bar"> </span>
    </div>
    <ul class="navbar_menu">
      <li class="navbar_item"> 
                            <a href="homepage.php" class="navbar_links" id="home-page" style="color:white;">Home</a>
      </li>
      <li class="navbar_item"> 
                            <a href="about.php" class="navbar_links" id="home-page" style="color:white;">About</a>
      </li>
      <li class="navbar_item"> 
                            <a href="contacts.php" class="navbar_links" id="home-page" style="color:white">Contacts</a>
      </li>
      <li class="navbar_item"> 
                            <a href="index.php" class="navbar_links" id="home-page" style="color:white">User login</a>


      </li>
      <li class="navbar_item"> 
                            <a href="https://developers.aris-gail.com/21221ST_CS3101_G1/ZardentWeb/admin/" class="navbar_links" id="home-page" style="color:white">Admin login</a>
      </li>


    </ul>

  </div>

<!--  end navigation -->
</nav> 
<link rel="stylesheet" type="text/css" href="users/CSS/style.css" >
<div class="hero-section" style="background-color" >

 <div class="hero-section-content">
   <h1>Welcome</h1>

   <h3>To Zardent Website</h3>
   <hr>
   <p> <h4 style="color:orange;">Safety begins with teamwork.</h4></p>
 <button class="btn btn1" style="background-color:black;">EXPLORE</button>
 <button class="btn btn2" style="background-color:orange;">Watch US</button>
 <div class="social-media" style="width: 300px;">
   <i class="fa fa-facebook"></i>
   <i class="fa fa-instagram"></i>
   <i class="fa fa-twitter"></i>
 </div>
</div>

<div class="hero-section-img">
  <img src="img/city.svg" width="500" height="500">
</div>
<!--hero-->



<!--  slides begin -->


</body>
</html>