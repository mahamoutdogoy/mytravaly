
<?php


if(isset($_POST['submit']))
{
	if(!empty($_POST['list']))
	{
		foreach($_POST['list'] as $selected)
		{
			$con2=mysqli_connect("localhost","root","","sb_database") or die(mysqli_connect_error());
			mysqli_query($con2,"insert into task_details (ClientId,Task,Priority,AssignTo,Status,Description,Remarks,DueDate) values ('$selected','$_POST[task]','$_POST[priority]','$_POST[assignto]','NOT_YET_STARTED','$_POST[description]','$_POST[remarks]','$_POST[duedate]')") ;
		}
		
		echo "<script>
				alert('Multiple Task Added Successfully....');
				document.location='leadtablepage.php'
				</script>";
	}
}

?>