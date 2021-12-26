<?php 

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Zardent</title>
  </head>
  <body>
    <nav class="navbar" style="background: black;">
  <div class="navbar_container">
    <img src="logo1.png" class="navbar_logo" align="center" height="70" > </a>
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
</body>
</html>