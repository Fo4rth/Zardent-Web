<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?><!doctype html>
<html lang="en">
  <head>
  	<title>Admin| Manage Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
<?php
include 'style_css.php';
?>
	</head>
	<body>
    <?php
include 'sidebar.php';
?>
	<section class="home-section">
     <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Users</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Table #09</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped" cellpadding="0" cellspacing="0" border="0" width="100%">
						  <thead>
						    <tr>
						      <th>#</th>
											<th> Name</th>
											<th>Email </th>
											<th>Contact no</th>
											<th>Reg. Date </th>
											<th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
  
<?php $query=mysqli_query($bd, "select * from users");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['fullName']);?></td>
											<td><?php echo htmlentities($row['userEmail']);?></td>
											<td> <?php echo htmlentities($row['contactNo']);?></td>
										
											<td><?php echo htmlentities($row['regDate']);?></td>

											<td><a href="javascript:void(0);" onClick="popUpWindow('http://localhost/ZardentWeb/admin/userprofile.php?uid=<?php echo htmlentities($row['id']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View Details</button>
											</a></td>
											
										<?php $cnt=$cnt+1; } ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
  

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

	</body>
</html>


<?php } ?>