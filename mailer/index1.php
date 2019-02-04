<!DOCTYPE html>
<html>
<header>
<title>HTML Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://studentstutorial.com/div/d.css">
<header>
<body>
<div class="w3-row">
<div class="w3-half w3-card-2 w3-round">
<div class="w3-container w3-center w3-green">
<h2>Sign In</h2>
</div>
<br>
<form class="w3-container" method="post" action="process.php">
<label class="w3-label w3-text-black"><b>Name</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="name" name="name" required></p>
<label class="w3-label w3-text-black"><b>Email</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="email" name="email"></p>
<label class="w3-label w3-text-black"><b>Phone</b></label>
<p><input class="w3-input w3-border w3-round" type="text" placeholder="phone" name="phone"></p>
<p class="w3-center"><button class="w3-btn w3-green w3-round" style="width:100%;height:40px" name="btn-save">Submit</button></p>
</form>
<div class="w3-container w3-center w3-light-grey">
<h4></h4>
</div>
</div>
<div class="w3-half">
</div>
</div>
</body>
</html>
