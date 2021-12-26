<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


?><html lang="en">
  <head>
  	<title>Admin| Closed Reports</title>
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
        <span class="dashboard">Dashboard</span>
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
						<table class="table table-striped">
						  <thead>
						    <tr>
						      <th>Hazard Number</th>
						      <th>Hazard Name</th>
						      <th>Reg Date</th>
						      <th>Type of Hazard</th>
						      <th>SubCategory</th>
						      <th>City</th>
						    </tr>
						  </thead>
						  <tbody>
             <?php 

             $st='closed';
$query=mysqli_query($bd, "select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{

?>						
						    <tr>
											<<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td> <?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['regDate']);?>
											</td>
											<td><?php echo htmlentities($row['catname']);?></td>
											<td> <?php echo htmlentities($row['subcategory']);?></td>
											<td><?php echo htmlentities($row['complaintType']);?>
											</td>


											</tr>
</tbody>
						</table>
                    <table class="table table-striped">
						  <thead>
						  	<td><b>Brgy </b></td>
											<td><?php echo htmlentities($row['state']);?></td>
											<td ><b>House no./ Street</b></td>
											<td colspan="3"> <?php echo htmlentities($row['noc']);?></td>
											
										</tr>
<tr>
											<td><b>Hazard Details </b></td>
											
											<td colspan="5"> <?php echo htmlentities($row['complaintDetails']);?></td>
											
										</tr>

											</tr>
<tr>
											<td><b>File(if any) </b></td>
											
											<td colspan="5"> <?php $cfile=$row['complaintFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" ?> View File</a>
<?php } ?></td>
</tr>
<?php $ret=mysqli_query($bd, "select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date <?php echo  htmlentities($rw['rdate']); ?></b></td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
</tr>
<?php }?>

<tr>
<td><b>Final Status</b></td>
											
											<td colspan="5"><?php if($row['status']=="")
											{ echo "Not Process Yet";
} else {
										 echo htmlentities($row['status']);
										 }?></td>
											
										</tr>



<tr>
											<td><b>Action</b></td>
											
											<td> 
											<?php if($row['status']=="closed"){

												} else {?>
<a href="javascript:void(0);" onClick="popUpWindow('https://developers.aris-gail.com/21221ST_CS3101_G1/ZardentWeb/admin/updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button></td>
											</a><?php } ?></td>
											<td colspan="4"> 
											<a href="javascript:void(0);" onClick="popUpWindow('https://developers.aris-gail.com/21221ST_CS3101_G1/ZardentWeb/admin/userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">View User Details</button></a></td>
											
										</tr>
										<?php  } ?>
									

                   
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