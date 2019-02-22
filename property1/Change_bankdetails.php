<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />



<?php include 'propertymenus.php';
	include 'Property_DB.php';
?>

<?php

	
		if (isset($_POST['save'])) {
		$user_id='abhi';
		$property_id=$_POST['property'];
		$bankname=$_POST['bankname'];
		$beneficiaryname=$_POST['beneficiaryname'];
		$accounttype=$_POST['accounttype'];
		$accnumber=$_POST['accnumber'];
		$ifsc=$_POST['ifsc'];
		$swiftcode=$_POST['swiftcode'];
		$branch=$_POST['branch'];
		$cancelcheque=addslashes(file_get_contents($_FILES['cancelcheque']['tmp_name']));

		mysqli_query($con,"insert into change_bankdetails(user_id,property_id,bankname,beneficiaryname,accounttype,accnumber,ifsc,swiftcode,branch,cancelcheque) values('$user_id','$property_id','$bankname','$beneficiaryname','$accounttype','$accnumber','$ifsc','$swiftcode','$branch','$cancelcheque');");
		echo "<script type='text/javascript'>

				alert('Your Request Has been send Successfully.... We touch you soon!!!!');
				 location.replace('bankdetails.php');
				document.getElementById('branch').disabled = true;
				</script>";

				$to_email = "abhigowda161996@gmail.com";
				$subject = " You Request to change the Banking Details";
				$message = "We wish to inform you have been request to change the bank details in My travaly website we will touch you soon!!!";
				$headers = "From: abhishekkt.1rn16mca01@gmail.com";
				//mail($to_email,$subject,$message,$headers);
				//header("Location: bankdetails.php");
			
		# code...
	}
	








?>



<!DOCTYPE html>

<html lang="en">

<head>



 


	<meta charset="utf-8">

	<title>Bank Details</title>

	<link rel="stylesheet" type="text/css" href="bank.css">

<head>	

<script>

/*function myFunction() {
  var bankname = document.getElementById('bankname').value;
   var beneficiaryname = document.getElementById('beneficiaryname').value;
    var accounttype = document.getElementById('accounttype').value;
 var accnumber = document.getElementById('accnumber').value;
  var ifsc = document.getElementById('ifsc').value;
   var swiftcode = document.getElementById('swiftcode').value;
    var branch = document.getElementById('branch').value;

  if (bankname== "") {
    alert("bankname must be filled out");
    return false;
  }
  else if (beneficiaryname== "") {
    alert("Beneficiary name must be filled out");
    return false;
  }
else if (accounttype== "") {
    alert("account type must be filled out");
    return false;
  }
else if (accnumber== "") {
    alert("account number must be filled out");
    return false;
  }
else if (ifsc== "") {
    alert("ifsc must be filled out");
    return false;
  }
  else if (swiftcode== "") {
    alert("swiftcode must be filled out");
    return false;
  }

  else if (branch== "") {
    alert("branch must be filled out");
    return false;
  }

}
*/

</script>

</head>

<body>

<div class="row">
	<div class="col-md-3">
		<br><br>
		<?php include 'sidebar.php' ?>
	</div>
<div class="col-md-9">

	
<form action="" method="post" enctype="multipart/form-data"> 
<div>
	<br>
	<br>

<table align="center" width="800px" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
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
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Bank Details</b></td>
	</tr>
	<tr><td align="center">Bank name</td>
		<td><input list="bankname" name="bankname"  class="col-sm-6 custom-select custom-select-sm" required="" autocomplete="off">
  			<datalist id="bankname">
    		<option value="SBI Bank"></option>
    		<option value="Canara Bank"></option>
    		<option value="HDFC Bank"></option>
    		<option value="Axix Bank"></option>
    		<option value="Karnataka Bank"></option>
  			</datalist></td>
  		</td>
	</tr>
	<tr>
		<td align="center">Beneficiary Name</td>
		<td><input type="text" name="beneficiaryname" id="beneficiaryname" required class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>

	</tr>

	<tr>
		<td align="center">Account Type</td>
		<td><input list="accounttype" name="accounttype"  class="col-sm-6 custom-select custom-select-sm" required="" autocomplete="off" >
  			<datalist id="accounttype">
    		<option value="Saving Account"></option>
    		<option value="Current Account"></option>
    		<option value="Recurring Deposit Accounte"></option>
    		<option value="Fixed Deposit Account"></option>
  			</datalist>
  		</td>
	</tr>
	<tr>
		<td align="center">Account Number</td>
		<td><input type="number" name="accnumber" id="accnumber" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td align="center">IFSC Code</td>
		<td><input type="text" name="ifsc" id="ifsc" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td  align="center">Swift Code</td>
		<td><input type="text" name="swiftcode" id="swiftcode"class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off"/></td>
	</tr>
	<tr>
		<td align="center">Branch</td>
		<td><input type="text" name="branch" id ="branch" class="col-sm-6 form-control form-control-lg-5" required="" autocomplete="off" ></td>
	</tr>
	<tr>
		<td align="center">Cancel Cheque Copy</td>
		<td><input type="file" name="cancelcheque" id ="Cheque"  width="48" height="48" class="custom-style" required="" autocomplete="off"/ ></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="padding-top:1.9em;padding-bottom:1.9em;"><input type="Submit" name="save" id="save" value="Update" class="btn" style="border-radius: 2em;width:115px;background: #ff6f61" onclick="" />
		
		</td>

		
	</tr>
	<tr>
		<td colspan="2" align="center">
			<label><b><?php if(isset($_POST['save'])){ 
			
			echo "<label style='border-radius: 2em;font-size:25px'> Your Request has been Successfully Saved </label>";
		}
		?>
	</b></label>
			</td>
		</tr>
	</table>
</div>
</form>
</div>
</div>
</body>
</html>




