<?php

 include"red.php";
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />


<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
<div class="left-content">
<div class="mother-grid-inner">
<?php 


session_start();






include("../connect.php");

 

?>

	<ol class="breadcrumb">
	            
                <center><li class="breadcrumb-item centered"><h4><a href="">User Profile</a></h4></li></center>
            </ol>
<!--grid
 	<div class="validation-system">
 		
 		<div class="validation-form">
 	-->
  	    

<div class="agile-grids">
<div class="agile-tables">
<div class="w3l-table-info">
      <div class="grid_3 grid_5 ">
      
				<div class="col-md-7 agileits-w3layouts">
					
					<table class="table table-bordered w3-center">
						<thead>
							<tr>
								<th>Title</th>
								<th>Information</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Photo</td>
								<!-- <td><span class=" "><?php echo($my_file!=NULL)?'<img src="images/'.$my_file.'" width="50" height="50">' :'' ;?></span></td> -->
							</tr>
							<tr>
								<td>First Name</td>
								<td><span class=""><?php echo $_SESSION['user']['username'];?>  </span></td>
							</tr>
							
							
							<tr>
								<td>email</td>
								<td><span><?php echo $_SESSION['user']['email'];?> </span></td>
							</tr>
							
							
						</tbody>
					</table>                    
				</div>
				<form class="form-inline">
  <div class="form-group">
    <!-- <label for="inputPassword6"> Old Password</label>
    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
    <small id="passwordHelpInline" class="text-muted">
     -->
    </small>
    <label for="inputPassword6"> New Password</label>
    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
    <small id="passwordHelpInline" class="text-muted">
    
    </small>
    <label for="inputPassword6"> Confirm Password</label>
    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
    <small id="passwordHelpInline" class="text-muted">
    
    </small>
  </div>

  <button type="submit" class="btn btn-primary " name="save">Update</button>
              <button type="reset" class="btn btn-warning "  name="reset">Reset</button>
            </div>
</form>
              
			
            
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
              <button type="reset" class="btn btn-warning"  name="reset">Reset</button>
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

<!-- 
<?php include("footer.php"); ?>
</div></div>

	<?php include("sidebar.php"); 

	?> -->
	
	</div>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>