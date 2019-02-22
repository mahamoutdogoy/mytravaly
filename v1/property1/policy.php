<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="icon" href="fav.png" type="image/png" sizes="16x16">
  <title>Policy</title>

<?php include 'propertymenus.php';
 include"red.php";?>
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

<div>
	<br>
	<br>
	<br>
	<table align="center" width="750px" cellpadding="5" class="table-striped" cellspacing="10" style="opacity: 0.8;">
		<tr>
			<td align="center" colspan="2" style="background:#ff6f61;padding-top: .4em;padding-bottom: .4em;font-size: 30px;"><b>Provided Policies<b></td>
		</tr>
		<tr>
			<td align="center">Cancellation Policy</td>
			<td><input type="text" name="ctxt" style="width:300px;border-radius: 1rem;" class="form-control hasclear"></td>

		</tr>
		<tr>
			<td align="center">Refund Policy</td>
			<td><input type="text" name="rtxt" style="width:300px;border-radius: 1rem;" class="form-control hasclear"></td>
		</tr>
		<tr>
			<td align="center">Child Policy</td>
			<td><input type="text" name="rtxt" style="width:300px;border-radius: 1rem;" class="form-control hasclear"></td>
		</tr>
		<tr>
			<td align="center">Damage Policy</td>
			<td><input type="text" name="dtxt" style="width:300px;border-radius: 1rem;" class="form-control hasclear" ></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="padding-top: .5em;padding-bottom: .4em;"><input type="Submit" name="submit" class="btn btn-success" value="Save" style="border-radius: 1rem;width:150px"></td>
		</tr>
	</table>
</div>
</div>
</div>
</body>
</html>