<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?php include 'propertymenus.php';
include 'Property_DB.php';
?>

<?php 


	if(isset($_POST['submit']))
	{
		
		$user_id='abhi';
		$property_id=$_POST['property'];
		$in_certificate=addslashes(file_get_contents($_FILES['in_certificate']['tmp_name']));
		$tax_certificate=addslashes(file_get_contents($_FILES['tax_certificate']['tmp_name']));
		//$pan_identifcation=addslashes(file_get_contents($_FILES['pan_identifcation']['name']));
		$cancel_cheque=addslashes(file_get_contents($_FILES['cancel_cheque']['tmp_name']));

		if(!empty($_FILES['pan_identifcation']['name']))
			$pan_identifcation=addslashes(file_get_contents($_FILES['pan_identifcation']['tmp_name']));
		else
			$pan_identifcation="";




	mysqli_query($con,"insert into documents(user_id,property_id,in_certificate,tax_certificate,pan_identifcation,cancel_cheque) values('$user_id','$property_id','$in_certificate','$tax_certificate','$pan_identifcation','$cancel_cheque');");
	echo "<script type='text/javascript'>

				alert('Incorporation Certificats/Trade Uploaded Successfully');
				 
				
				</script>";

				
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="row">
	<div class="col-md-3">
		<br><br>
		<?php include 'sidebar.php' ?>
	</div>
<div class="col-md-9">


	<br>
	<br>
<form action="" method="post" enctype="multipart/form-data"> 
<table align="center" width="1000px" cellpadding="10" class="table-striped" cellspacing="15" style="opacity: 0.8;">
	<tr>
		<td align="center">
			Select Property
		</td>
			<td>
				<select name="property" id="property" onchange="" class="col-sm-6 form-control form-control-lg-5" style="border-radius: 1rem;text-align: center;height: 35px" required>
                      <option value="0" selected disabled>--Select--</option>
                          <?php
                              $query = "SELECT * FROM propertydetails where user_id='abhi' group by property_id";
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){                                                 
                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
                              }
                          ?>

                    </select>
			</td>
		</tr>
	<tr style="background:#ff6f61;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Documents</b></td>
	</tr>
	
	<tr>
		<td align="center">Incorporation Certificats/Trade </td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="File" name="in_certificate" required=""  accept=".pdf,.jpg,.jpeg,.png">
		
	</tr>
	<tr>
		<td align="center">Tax/GST Certificate</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="tax_certificate" required="" accept=".pdf,.jpg,.jpeg,.png">		
		</td>

	</tr>
 
	<tr>
		<td align="center">Pan/Tax Identification No</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="pan_identifcation" accept=".pdf,.jpg,.jpeg,.png">
			
		</td>
	</tr>
	
	<tr>
		<td align="center">Cancel Cheque</td>
		<td style="padding-top:.9em;padding-bottom:.9em;"><input type="file" name="cancel_cheque" required="" accept=".pdf,.jpg,.jpeg,.png">
		</td>
	</tr>
	<tr>
		<td align="right"  style="padding: 30">
			<input type="submit" class="btn btn-secondary" name="submit" value="Upload"/></td>
			
		<td>
			<?php if(isset($_FILES['in_certificate']['name'] ) && isset($_FILES['cancel_cheque']['name'] ) && isset($_FILES['tax_certificate']['name'] ) || isset($_FILES['pan_identifcation']['name'] ) ) {

        		echo $_FILES['in_certificate']['name'].",&emsp;".$_FILES['tax_certificate']['name'].",&emsp;".$_FILES['pan_identifcation']['name'].",&emsp;".$_FILES['cancel_cheque']['name']. " &nbsp;was uploaded";

    		} 
    		else {
        		echo "No File Uploaded";
    		}
	?>
		</td>
	</tr>
	</table>


</form>
</div>
</div>

</body>
</html>