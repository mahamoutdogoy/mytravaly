
<!DOCTYPE HTML>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 


session_start();


if($_SESSION["studentid"]==true)
{

include("header.php");

include("checkstud.php");
include("connect.php");
 

?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item"><h4><a href="">user Profile</a></h4></li></center>
            </ol>
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      <h3> Student Profile</h3>
				<div class="col-md-6 agileits-w3layouts">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Title</th>
								<th>Information</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Photo</td>
								<td><span class=" "><?php echo($my_file!=NULL)?'<img src="uploaded/'.$my_file.'" width="50" height="50">' :'' ;?></span></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><span class=""><?php echo $my_fname ?> </span></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><span class=""><?php echo $my_lname ?></span></td>
							</tr>
							
							
							
							<tr>
								<td>property</td>
								<td><span class=""><?php echo $my_property ?></span></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><span class=""><?php echo $my_email ?></span></td>
							</tr>
							<tr>
								<td>country</td>
								<td><span class=""><?php echo $my_country ?></span></td>
							</tr>
							
						</tbody>
					</table>                    
				</div>
				<div class="col-md-6 agileits-w3layouts">
					<br>
					<p><b> <h4>Change Password </h4></b></p>
					<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_pwd.php" enctype="multipart/form-data">
         	<div class="vali-form vali-form1">
            <div class="col-md-6 form-group1">
              <label class="control-label">Enter Password</label>
              <input type="password" placeholder="password" name="pass" required="">
            </div>
			<div class="col-md-6 form-group1 form-last">
              <label class="control-label">Repeated password</label>
              <input type="password" placeholder="Repeated password" name="cpass" required="">
            </div>
			<div class="clearfix"> </div>
            </div>
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save">Update</button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			
            
			</form>
            </div>
			
			 <div class="clearfix"> </div>
			<p><b> <h4>Change Profile Picture </h4></b></p>
			<div class="list-group list-group-alternate"> 
		    <form method="post" action="new_dp.php" enctype="multipart/form-data">
         	 <div class="col-md-12 form-group1 group-mail">
              <label class="control-label ">File</label>
              <input type="file"  name="ufile" required="">
            </div>
			
            <div class="col-md-6 form-group">
              <button type="submit" class="btn btn-primary" name="save">Update</button>
              <button type="reset" class="btn btn-default"  name="reset">Reset</button>
            </div>
			</form>
            
            
			</form>
            </div>
			
			</div>
				
            <div class="clearfix"> </div>
			
            </div>
			
			   

</div>
</div>
</div>


<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); 

	?>
	<?php }
else
	header('location:login.php');
?>
	</div>
</body>
</html>