<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($bd, "SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$extra="dashboard.php";
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");

exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
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
  <link rel="stylesheet" href="css/forAdmin.css" /> 
    <title>Zardent</title>
</head>
<body>
<nav class="navbar" style="background-color: black;
">
  <div class="navbar_container">
    <img src="images/logo1.png" class="navbar_logo" align="center" height="70" > </a>
    <div class="navbar_toggle" id="mobile_menu">
      <span class="bar"> </span> <span class="bar"> </span> <span class="bar"> </span>
    </div>
    <ul class="navbar_menu">
      
      <li class="navbar_item"> 
                            <a href="https://developers.aris-gail.com/21221ST_CS3101_G1/ZardentWeb" class="navbar_links" id="home-page" style="color:white">Back To Portal</a>


      </li>


    </ul>

  </div>
<!--  end navigation -->
</nav>

      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" class="sign-in-form">
          <h2 class="title">Sign in as Admin</h2>
          <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" id="inputEmail" name="username" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" id="inputPassword" name="password" placeholder="Password">
          </div>
          <input type="submit" name="submit" class="btn solid" />
          
        </form>
         
        </div>
      </div>
</body>
</html>