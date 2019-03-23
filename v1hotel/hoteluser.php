<?php
session_start();

include"../connect.php";
if(isset($_POST['submit'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  if(empty($email)&&empty($password)){
  $error= 'Fields are Mandatory';
  }else{
   $result=mysqli_query($con,"SELECT * FROM user WHERE email='$email' AND password='$password'");
   $row=mysqli_fetch_assoc($result);
   $count=mysqli_num_rows($result);

   $result1=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND passwd='$password'");
   $row1=mysqli_fetch_assoc($result1);
   $count1=mysqli_num_rows($result1);
   if($count==1){
    $_SESSION['user_id']= $row['userid'];
  
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
  header('location:usermgt/attendance.php');
  break;
  case 'superadmin':
  header('location:mytravalyAdmin/mt.php');
  break;
  case 'admin':
  header('location:mytravalyAdmin/mt.php');
  break;
   }
   }elseif($count1==1){
      //$_SESSION['user_id']= $row['userid'];

  
  $_SESSION['user']=array(
   'userid'=>$row1['userid'], 
   'name'=>$row1['name'],
   'username'=>$row1['username'],
   'role'=>$row1['role']
   );
   $roles=$_SESSION['user']['role'];
  switch($roles){
  case 'user':
  header('location:usermgt/attendance.php');
  break;
  case 'superadmin':
  header('location:mytravalyAdmin/mt.php');
  break;
  case 'admin':
  header('location:usermgt/mt.php');
  break;
  
   }
}
   else{
   echo 'Your PassWord or Email is not Found';
   }
  }
  }
  ?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  

  body {
  margin: 0;
  height: 100%;
  overflow: hidden;
  width: 100% !important;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}

.backRight {
  position: absolute;
  right: 0;
  width: 50%;
  height: 100%;
  background: #03a9f4;
}

.backLeft {
  position: absolute;
  left: 0;
  width: 50%;
  height: 100%;
  background:none;
}

#back {
  width: 100%;
  height: 100%;
  position: absolute;
  z-index: -999;
}

.canvas-back {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
}

#slideBox {
  width: 50%;
  max-height: 100%;
  height: 100%;
  overflow: hidden;
  margin-left: 50%;
  position: absolute;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.topLayer {
  width: 200%;
  height: 100%;
  position: relative;
  left: 0;
  left: -100%;
}

label {
  font-size: 0.8em;
  text-transform: uppercase;
}

input {
  background-color: transparent;
  border: 0;
  outline: 0;
  font-size: 1em;
  padding: 8px 1px;
  margin-top: 0.1em;
}

.left {
  width: 50%;
  height: 100%;
  overflow: scroll;
  background: #2c3034;
  left: 0;
  position: absolute;
}
.left label {
  color: #e3e3e3;
}
.left input {
  border-bottom: 1px solid #e3e3e3;
  color: #e3e3e3;
}
.left input:focus, .left input:active {
  border-color: #03a9f4;
  color: #03a9f4;
}
.left input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px #2c3034 inset;
  -webkit-text-fill-color: #e3e3e3;
}
.left a {
  color: #03a9f4;
}

.right {
  width: 50%;
  height: 100%;
  overflow: scroll;
  background: #f9f9f9;
  right: 0;
  position: absolute;
}
.right label {
  color: #212121;
}
.right input {
  border-bottom: 1px solid #212121;
}
.right input:focus, .right input:active {
  border-color: #673ab7;
}
.right input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0 30px #f9f9f9 inset;
  -webkit-text-fill-color: #212121;
}

.content {
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 100%;
  width: 80%;
  margin: 0 auto;
  position: relative;
}

.content h2 {
  font-weight: 300;
  font-size: 2.6em;
  margin: 0.2em 0 0.1em;
}

.left .content h2 {
  color: #03a9f4;
}

.right .content h2 {
  color: #ff4f35;
}

.form-element {
  margin: 1.6em 0;
}
.form-element.form-submit {
  margin: 1.6em 0 0;
}

.form-stack {
  display: flex;
  flex-direction: column;
}

.checkbox {
  -webkit-appearance: none;
  outline: none;
  background-color: #e3e3e3;
  border: 1px solid #e3e3e3;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  padding: 12px;
  border-radius: 4px;
  display: inline-block;
  position: relative;
}

.checkbox:focus,
.checkbox:checked:focus,
.checkbox:active,
.checkbox:checked:active {
  border-color: #03a9f4;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px 1px 3px rgba(0, 0, 0, 0.1);
}

.checkbox:checked {
  outline: none;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05), inset 15px 10px -12px rgba(255, 255, 255, 0.1);
}

.checkbox:checked:after {
  outline: none;
  content: "\2713";
  color: #03a9f4;
  font-size: 1.4em;
  font-weight: 900;
  position: absolute;
  top: -4px;
  left: 4px;
}

.form-checkbox {
  display: flex;
  align-items: center;
}
.form-checkbox label {
  margin: 0 6px 0;
  font-size: 0.72em;
}

button {
  padding: 0.8em 1.2em;
  margin: 0 10px 0 0;
  width: auto;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 1em;
  color: #fff;
  line-height: 1em;
  letter-spacing: 0.6px;
  border-radius: 3px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.1);
  border: 0;
  outline: 0;
  transition: all 0.25s;
}
button.signup {
  background: #ff4f35;
}
button.login {
  background: green;
}
button.off {
  background: #ff4f35;
  box-shadow: none;
  margin: 0;
}
button.off.signup {
  color: #ff4f35;
}
button.off.login {
  color: white
}

button:focus,
button:active,
button:hover {
  box-shadow: 0 4px 7px rgba(0, 0, 0, 0.1), 0 3px 6px rgba(0, 0, 0, 0.1);
}
button:focus.signup,
button:active.signup,
button:hover.signup {
  background: #0288d1;
}
button:focus.login,
button:active.login,
button:hover.login {
  background: #512da8;
}
button:focus.off,
button:active.off,
button:hover.off {
  box-shadow: none;
}
button:focus.off.signup,
button:active.off.signup,
button:hover.off.signup {
  color: #03a9f4;
  background: #212121;
}
button:focus.off.login,
button:active.off.login,
button:hover.off.login {
  color: #512da8;
  background: #e3e3e3;
}

@media only screen and (max-width: 768px) {
  #slideBox {
    width: 80%;
    margin-left: 20%;
  }

  .signup-info,
  .login-info {
    display: none;
  }
}
.good
{
  width: 850px;
}

</style>
<body>
  <div id="back">
  <canvas id="canvas" class="canvas-back"></canvas>
  <div class="backRight">    
  </div>

  <div class="backLeft">
    <img src="good.png" class="good">
  </div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">

      <div class="content">
       <!--  <h2>Sign Up</h2> -->
        <form id="form-signup" method="post">
          <div class="form-element form-stack">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email">
          </div>
          <div class="form-element form-stack">
            <label for="username-signup" class="form-label">Username</label>
            <input id="username-signup" type="text" name="username">
          </div>
          <div class="form-element form-stack">
            <label for="password-signup" class="form-label">Password</label>
            <input id="password-signup" type="password" name="password">
          </div>
          <div class="form-element form-checkbox">
            <input id="confirm-terms" type="checkbox" name="confirm" value="yes" class="checkbox">
            <label for="confirm-terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
          </div>
          <div class="form-element form-submit"><!-- 
            <button id="signUp" class="signup" type="submit" name="signup">Sign up</button> -->
            <button id="goLeft" class="signup off">Log In</button> 
          </div>
        </form>
      </div>
    </div>
    <div class="right">
      <div class="content">
       <center> <h2>SIGN IN</h2> </center>
        <form id="form-login" method="post">
          <div class="form-element form-stack">
            <label for="username-login"  class="form-label">Email</label>
            <input id="username-login" type="text" name="email">
          </div>
          <div class="form-element form-stack">
            <label for="password-login" class="form-label">Password</label>
            <input id="password-login" type="password" name="password">
          </div>
          <center>
          <div class="form-element form-submit ">
            <button id="logIn" class="login" type="submit" name="submit">Log In</button>
            <button id="goRight" class="login off" name="signup">Forgot Password</button>
          </div>
        </center>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
 
$(document).ready(function(){
  $('#goRight').on('click', function(){
    $('#slideBox').animate({
      'marginLeft' : '0'
    });
    $('.topLayer').animate({
      'marginLeft' : '100%'
    });
  });
  $('#goLeft').on('click', function(){
    if (window.innerWidth > 769){
      $('#slideBox').animate({
        'marginLeft' : '50%'
      });
    }
    else {
      $('#slideBox').animate({
        'marginLeft' : '20%'
      });
    }
    $('.topLayer').animate({
      'marginLeft': '0'
    });
  });
});

paper.install(window);
paper.setup(document.getElementById("canvas"));

// Paper JS Variables
var canvasWidth, 
    canvasHeight,
    canvasMiddleX,
    canvasMiddleY;

var shapeGroup = new Group();

var positionArray = [];

function getCanvasBounds() {
  // Get current canvas size
  canvasWidth = view.size.width;
  canvasHeight = view.size.height;
  canvasMiddleX = canvasWidth / 2;
  canvasMiddleY = canvasHeight / 2;
  // Set path position
  var position1 = {
    x: (canvasMiddleX / 2) + 100,
    y: 100, 
  };

  var position2 = {
    x: 200,
    y: canvasMiddleY, 
  };

  var position3 = {
    x: (canvasMiddleX - 50) + (canvasMiddleX / 2),
    y: 150, 
  };

  var position4 = {
    x: 0,
    y: canvasMiddleY + 100, 
  };

  var position5 = {
    x: canvasWidth - 130,
    y: canvasHeight - 75, 
  };

  var position6 = {
    x: canvasMiddleX + 80,
    y: canvasHeight - 50, 
  };
  
  var position7 = {
    x: canvasWidth + 60,
    y: canvasMiddleY - 50, 
  };
  
  var position8 = {
    x: canvasMiddleX + 100,
    y: canvasMiddleY + 100, 
  };

  positionArray = [position3, position2, position5, position4, position1, position6, position7, position8];
  };


function initializeShapes() {
  // Get Canvas Bounds
  getCanvasBounds();

  var shapePathData = [
    'M231,352l445-156L600,0L452,54L331,3L0,48L231,352', 
    'M0,0l64,219L29,343l535,30L478,37l-133,4L0,0z', 
    'M0,65l16,138l96,107l270-2L470,0L337,4L0,65z',
    'M333,0L0,94l64,219L29,437l570-151l-196-42L333,0',
    'M331.9,3.6l-331,45l231,304l445-156l-76-196l-148,54L331.9,3.6z',
    'M389,352l92-113l195-43l0,0l0,0L445,48l-80,1L122.7,0L0,275.2L162,297L389,352',
    'M 50 100 L 300 150 L 550 50 L 750 300 L 500 250 L 300 450 L 50 100',
    'M 700 350 L 500 350 L 700 500 L 400 400 L 200 450 L 250 350 L 100 300 L 150 50 L 350 100 L 250 150 L 450 150 L 400 50 L 550 150 L 350 250 L 650 150 L 650 50 L 700 150 L 600 250 L 750 250 L 650 300 L 700 350 '
  ];

  for (var i = 0; i <= shapePathData.length; i++) {
    // Create shape
    var headerShape = new Path({
      strokeColor: 'rgba(255, 255, 255, 0.5)',
      strokeWidth: 2,
      parent: shapeGroup,
    });
    // Set path data
    headerShape.pathData = shapePathData[i];
    headerShape.scale(2);
    // Set path position
    headerShape.position = positionArray[i];
  }
};

initializeShapes();


view.onFrame = function paperOnFrame(event) {
  if (event.count % 4 === 0) {
    // Slows down frame rate
    for (var i = 0; i < shapeGroup.children.length; i++) {
      if (i % 2 === 0) {
        shapeGroup.children[i].rotate(-0.1);
      } else {
        shapeGroup.children[i].rotate(0.1);
      }
    }
  }
};

view.onResize = function paperOnResize() {
  getCanvasBounds();

  for (var i = 0; i < shapeGroup.children.length; i++) {
    shapeGroup.children[i].position = positionArray[i];
  }

  if (canvasWidth < 700) {
    shapeGroup.children[3].opacity = 0;
    shapeGroup.children[2].opacity = 0;
    shapeGroup.children[5].opacity = 0;
  } else {
    shapeGroup.children[3].opacity = 1;
    shapeGroup.children[2].opacity = 1;
    shapeGroup.children[5].opacity = 1;
  }
};
</script>