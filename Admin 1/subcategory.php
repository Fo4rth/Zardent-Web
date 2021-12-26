
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $subcat=$_POST['subcategory'];
$sql=mysqli_query($bd, "insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
$_SESSION['msg']="SubCategory Created !!";

}

if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from subcategory where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="SubCategory deleted !!";
      }

?><!doctype html>
<html lang="en">
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
        <span class="dashboard">Closed</span>
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

            <div class="module">
              <div class="module-head">
                <h3>Sub Category</h3>
              </div>
              <div class="module-body">

                  <?php if(isset($_POST['submit']))
{?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                  </div>
<?php } ?>


                  <?php if(isset($_GET['del']))
{?>
                  <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Oh snap!</strong>   <?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
                  </div>
<?php } ?>

                  <br />

      <form class="form-horizontal row-fluid" name="subcategory" method="post" >

<div class="control-group">
<label class="control-label" >Category</label>
<div class="controls">
<select name="category" required="" style="
    height: 42px;
    width: 202px;
">

<option value="">Select Category</option> 
<?php $query=mysqli_query($bd, "select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>

                  
<div class="control-group">
<label class="control-label" for="basicinput">SubCategory Name</label>
<div class="controls">
<input type="text" placeholder="Enter SubCategory Name"  name="subcategory" class="span8 tip" required>
</div>
</div>



  <div class="control-group">
                      <div class="controls">
                        <button type="submit" name="submit" class="btn btn-primary">Create</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>


  <div class="module">
              <div class="module-head">
                <h3>Sub Category</h3>
              </div>
              <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Creation date</th>
                      <th>Last Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($bd, "select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($row['categoryName']);?></td>
                      <td><?php echo htmlentities($row['subcategory']);?></td>
                      <td> <?php echo htmlentities($row['creationDate']);?></td>
                      <td><?php echo htmlentities($row['updationDate']);?></td>
                      <td>
                      <a href="edit-subcategory.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
                      <a href="subcategory.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
                    </tr>
                    <?php $cnt=$cnt+1; } ?>
                    
                </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <script src="js/jquery.min.js"></script>
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