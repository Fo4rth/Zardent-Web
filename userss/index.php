<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['signin']))
{
$ret=mysqli_query($bd, "SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="register-complaint.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($bd, "insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];  
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($bd, "insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$errormsg="Invalid username or password";
$extra="login.php";

}
}


if(isset($_POST['signup']))
{
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$contactno=$_POST['contactno'];
	$status=1;
	$query=mysqli_query($bd, "insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	$msg="Registration successfull. Now You can login !";
}

if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=$_POST['password'];
$query=mysqli_query($bd, "SELECT * FROM users WHERE userEmail='$email' and contactNo='$contact'");
$num=mysqli_fetch_array($query);
if($num>0)
{
mysqli_query($bd, "update users set password='$password' WHERE userEmail='$email' and contactNo='$contact' ");
$msg="Password Changed Successfully";

}
else
{
$errormsg="Invalid email id or Contact no";
}
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
  <link rel="stylesheet" href="CSS/style.css?v=<?php echo time(); ?>" />
  <title>Zardent</title>
  <script type="text/javascript">
function valid()
{
 if(document.forgot.password.value!= document.forgot.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.forgot.confirmpassword.focus();
return false;
}
return true;
}
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>

<body>
  <nav class="navbar" style="background: black;">
  <div class="navbar_container">
    <img src="img/logo1.png" class="navbar_logo" align="center" height="70" > </a>
    <div class="navbar_toggle" id="mobile_menu">
      <span class="bar"> </span> 
      <span class="bar"> </span> 
      <span class="bar"> </span>
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
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" name="login" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <p style="padding-left:4%; padding-top:2%;  color:red">
              <?php if($errormsg){
echo htmlentities($errormsg);
                }?></p>

                <p style="padding-left:4%; padding-top:2%;  color:green">
              <?php if($msg){
echo htmlentities($msg);
                }?></p>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="username"  required autofocus/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <input type="submit" name="signin" class="btn solid" />
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px ;"><a data-toggle="modal" href="login.html#myModal" style="color: #4590ef;">Forgot Password?</a></p>
        </form>


        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" class="form-control" placeholder="Email" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" class="form-control" maxlength="11" name="contactno" placeholder="Contact Number" required="required" autofocus>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
          </div>
          
          <input type="submit" class="btn" name="signup" value="Sign up" />
        </form>



      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Sign up here !
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/man_at_work_square.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Log in here !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/Caution_UFO.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>

</html>