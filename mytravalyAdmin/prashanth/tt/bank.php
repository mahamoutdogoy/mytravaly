<html>
<head>
<title>Bank database</title>
</head>
<body>
<form name="form1" action="" method="">
	<table align="center">
	<tr><th>Property Bank Details</th><tr>
	<tr>
	<td><b>Bank Name</b></td>
	<td><input type="text" name="txtbname" required /></td>
	</tr>
	
	<tr>
	<td><b>Beneficiary Name</b></td>
	<td><input type="text" name="txtbenename" required /></td>
	</tr>
	<tr>
	<td><b>Account Type</b></td>
	<td>
	
	<select name="atype">
		<option>Saving Account</option>
	<option>Current Account</option>
	<option>***** Account</option>
	</select>	</td>
	</tr>
	
	<tr>
	<td><b>Account Number</b></td>
	<td><input type="number" name="txtano" required maxlength="16" /></td>
	</tr>
	
	<tr>
	<td><b>IFSC Code</b></td>
	<td><input type="number" name="txtifsc" required maxlength="16" /></td>
	</tr>
	
	<tr>
	<td><b>Branch</b></td>
	<td><input type="text" name="txtbranch" required /></td>
	</tr>
	<tr><td><input type="submit" value="Save" /></td><td><input type="button" name="edit" value="edit"/></td></tr>
	


</table></form>
</body>
</html>

