<?php include 'propertymenus.php';?>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>Bank Details</title>

	<link rel="stylesheet" type="text/css" href="bank.css">

	<script type="text/javascript">

		function validate(){

		//	alert("Form is validated");

		var phon_no=document.getElementById("code").value;

		var pattern=/^[0-9]{10}$/;

		if(pattern.test(phon_no))

		{

             alert("valid mobile number");

        }	

        else

        {

        	alert("invalid mobile number");

        }

  	}



	</script>

</head>

<body>

	

<div>
	<br>
	<br>

<table align="center" width="750px" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
	<tr style="background:#ff6f61;font-size: 20px;">
		<td colspan="2" align="center" style="padding-top:.9em;padding-bottom:.9em;"><b>Bank Details</b></td>
	</tr>
	<tr><td align="center">Bank name</td>
		<td><input type="text" name="bankName"></td>
	</tr>
	<tr>
		<td align="center">Beneficiary Name</td>
		<td><input type="text" name="beneficiaryName"></td>

	</tr>

	<tr>
		<td align="center">Account Type</td>
		<td><input type="text" name="accounttype"></td>
	</tr>
	<tr>
		<td align="center">IFSC Code</td>
		<td><input type="text" name="ifsc"></td>
	</tr>
	<tr>
		<td  align="center">Swift Code</td>
		<td><input type="text" name="swiftcode"/></td>
	</tr>
	<tr>
		<td align="center">Branch</td>
		<td><input type="text" name="branch"></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="padding-top:1.9em;padding-bottom:1.9em;"><input type="Submit" name="save" value="save" class="btn btn-success" style="border-radius: 2em;width:115px;" /></td>
	</tr>
	<table>
</div>
</body>
</html>





