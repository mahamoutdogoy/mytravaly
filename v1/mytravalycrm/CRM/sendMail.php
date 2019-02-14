
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script >
	
$(document).ready(function(){
    $('.client').click(function(){
        var id=$(this).attr("text");
        var temp=confirm("Are You Sure! \n You Want's To Remove This Client!");
		
	if (temp== true) {
	   $('#'+id).prop( "disabled", true );
        $('#'+id).closest('div').hide();
	}
	 
    });
});

</script>

<style>
	select,input[type=text] {
			
			border-radius: 5px;
			height: 30px;
			
		}
		td{
			font-weight: bold;
			font-family: times;
		}
</style>
   
</head>
<body>
	<form action='' method='post'>
	<div class="row">

		<?php include("../dbConnect.php"); 
		include("header.php"); ?>
	</div>
			<!-- send mail form-->

		<div class="row">
			<div class="col-md-3">
				 <?php include("sidebar.php"); ?>
			</div>
			<div class="col-md-5">
				<div class="form-group">
    				<label >Subject </label>
   					<input type="text" name="subject" class="form-control" placeholder="Subject"/>
 				</div>
 				<div class="form-group">
    				<label >Body</label>
    				<textarea class="form-control" name="body"  rows="3" placeholder="Body"></textarea>
  				</div>
  				<div class="">
  					<input type="submit" class="btn btn-info" style="width: 100px" name="sendmail" value="Send" onclick="javascript: form.action='sendMail_code.php'" />
  				</div>
			</div>

	
			<!--selected client details-->
				<div class="col-md-2">
				<?php
			
					if(!empty($_POST['client_check_list']))
					{
					
						$no_clients=sizeof($_POST['client_check_list']);
						echo "<div><b style='font-size:18px'>Selected Clients :</b></div><hr>";
						$i=0;
						foreach($_POST['client_check_list'] as $selected)
						{

							$list=mysqli_query($conn,"select FirstName,LastName from client_details where ClientId='".$selected."';") or 	die(mysqli_error($conn));
							$row=mysqli_fetch_assoc($list);
							echo "<div><input type='checkbox' name='list[]' hidden value='$selected' id='$i' checked/><p class='close client' text='".$i."' data-dismiss='alert' aria-label='close'>&times;</p>".$row['FirstName']." ".$row['LastName']." <hr/></div>";
							$i++;
						}

					}
					else {
						echo "<script>
						alert('Oops!  You Are Not Selected Any Clients ....');
						document.location='leadtablepage.php'
						</script>";
					}
			

				?>
			</div>
		</div>
	</div>

	</form>
</body>
</html>
