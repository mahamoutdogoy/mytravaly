<?php
//session_start();

include"connect.php";
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
	 'userid'=>$row['userid'],	
	 'fname'=>$row['fname'],
	 'lname'=>$row['lname'],
	 'country'=>$row['country'],
	 'property'=>$row['property'],
	 'email'=>$row['email'],
	 'image'=>$row['image'],
	 'password'=>$row['password'],
	 'role'=>$row['role']
	 );
	 $role=$_SESSION['user']['role'];
	switch($role){
	case 'user':
	header('location:phpmailer/index.php');
	break;
	case 'superadmin':
	header('location:mytravalyAdmin/superadmin.php');
	break;
	case 'admin':
	header('location:phpmailer/index.php');
	break;
   }
   }else{
   $error='Your PassWord or Email is not Found';
   }
  }
  }
  ?>

<div>

			<form action="" class="login_form float-right" method="post">
		
                           
                         <!-- <div class="form-group">
                          	<div class="input-group">
	                          	<select name="" id="" class="custom-select form-control">
	                          		<option value="Admin">Select user</option>
	                          		<option value="Admin">Admin</option>
	                          		<option value="customer">User</option>
	                          	</select>	
                          	
                          	</div>
                          	
                          </div> -->

		          	     <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
											 <div class="input-group-text"><i class="fa fa-user text-info"></i> </div>     
										</div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email id" required>
                                    </div>
                          </div>
                                
                          <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input type="Password" class="form-control" id="pwd" name="password" placeholder="Enter your password" required>
                                    </div>
                           </div>



						
 			  		<div class="custom-control custom-checkbox">
	        			 <div class="mb-2">
	         	    	<input type="checkbox" name="name" class="custom-control-input"  id="terms_c">
	         	    	<label for="terms_c" class="custom-control-label mr-5">&nbsp;&nbsp;&nbsp;&nbsp;<i>Remember me</i></label>
	         		  </div>
	       			</div>

			

                          <div class="form-group">
            			
            					<input type="submit"  name="Login" class="form-control btn btn-block btn btn-success" value="Login" id="pwd">
            				</div>


                        
	  	</form>
	  <div>
	  	<div class="row col-12"> <br> <br> 
	      <div class="col-md-5  col-lg-5  col-sm-5	">
	      	  <i><a href=""class="btn-link text-center">forgot Password</a></i>
	      </div>

	      <div class="col-lg-7 col-sm-8 col-md-8 col-xs-8">
	      	 <i><span>Dont have account ?</span> <a href="sign-up-page.php" name="submit"> Sign up</a></i>
	      </div>
	  	</div>
	   
	 </div> 	                
</div>
	  	             
		
	</div>

  </div>
</div>