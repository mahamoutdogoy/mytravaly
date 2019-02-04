if(isset($_POST['Login'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	if(empty($email)&&empty($password)){
	$error= 'Fields are Mandatory';
	}else{
   $result=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND password='$password'");
   $row=mysqli_fetch_assoc($result);
   $count=mysqli_num_rows($result);
   if($count==1){
	$_SESSION['user']=array(
	 'email'=>$row['email'],
	 'password'=>$row['password'],
	 'role'=>$row['role']
	 );
	 $role=$_SESSION['user']['role'];
	 // navi base one their roles
	switch($role){
	case 'user':
	header('location:user.php');
	break;
	case 'manager':
	header('location:manager.php');
	break;
	case 'admin':
	header('location:mytravalyAdmin/index.php');
	break;
   }
   }else{
   $error='Your PassWord or Email is not Found';
   }
  }
  }
  ?>
