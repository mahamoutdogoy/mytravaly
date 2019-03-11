
<?php


if(isset($_POST['submit']))
{
	if(!empty($_POST['list']))
	{
		foreach($_POST['list'] as $selected)
		{
			include("../dbConnect.php");
			$task=mysqli_real_escape_string($conn, strip_tags($_POST['task']));
			$priority=mysqli_real_escape_string($conn, strip_tags($_POST['priority']));
			$assignto=mysqli_real_escape_string($conn, strip_tags($_POST['assignto']));
			$description=mysqli_real_escape_string($conn, strip_tags($_POST['description']));
			$remarks=mysqli_real_escape_string($conn, strip_tags($_POST['remarks']));
			$duedate=$_POST['duedate'];
		
			mysqli_query($conn,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,
			DueDate) values ('$selected','$task','$priority','$assignto','NOT_YET_STARTED',
			'$description','$remarks','$duedate')") or die(mysqli_error($conn)) ;
		}
		
		echo "<script>
				alert('Multiple Task Added Successfully....');
				document.location='index.php'
				</script>";
	}
}

?>