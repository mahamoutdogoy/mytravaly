<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mytravaly</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>	

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


	<script>
		function inv(){
			document.getElementById('form2').classList.add('invisible');
		}
	</script>

</head>
<body>
<?php
	include("user_header1.php");
?>
<form action="test.php" method="post">
	<label for="">Name</label>
	<input type="text" name='testname'>
	<input type="checkbox" name="chk" value="5" >
	<input type="submit" onclick="return inv();" name="submit">
</form>
<form class="d-none" action="test.php" method="post" id="form2">
	<label for="">Test</label>
	<input type="text" name='test' >
	<input type="submit" name="submittest" value="fortest" >
</form>
<div>hfjhfhfjkdshf
fkghdkghdfg
dffghdfgjh</div>
</body>

<?php
	if (isset($_POST['submit'])) {
		echo "<script>alert('alert text')</script>";	
	}
/*	$pp= $_POST['chk'];
	if (isset($_POST['chk'])) {
		 echo "yes checked $_POST[chk]";
		$ssqql ="SELECT * FROM test WHERE testid=3";
		$run=mysqli_query($con,$ssqql);
		$r=mysqli_fetch_assoc($run);
		$arr=explode(',',$r['testtest']);
		echo count($arr);
		for ($i=0; $i < (sizeof($arr)-1) ; $i++) { 
			# code...
			if (trim($arr[$i])=='yesyesy') {
				array_splice($arr,$i,1);
				echo sizeof($arr);
			}
		}
		$arrr=implode(',', $arr);
		mysqli_query($con,"UPDATE test set testtest='$arrr' WHERE testid=3");
		
	}else echo "no not checked $_POST[chk]";}
	if (isset($_POST['submittest'])) {
		# code...
		$usqql ="UPDATE test SET testtest=(CONCAT(testtest,'$_POST[test],'))";
		mysqli_query($con,$usqql);
	}*/

?>