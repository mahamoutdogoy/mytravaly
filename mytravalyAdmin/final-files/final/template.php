<!DOCTYPE html>
<html>
<head>
	<title>Subscription Email Template</title>
	<script type="text/javascript">
		
	</script>
</head>
<body style="width: 90vw; margin: 0 auto; text-align: center; font-family: monospace; font-size: 14px;">
	<header>
		<span>
			<img src="images/<?php echo $_POST["logo"]; ?>">
		</span>
		<h2>
			Welcome to the <?php echo $_POST["compName"]; ?> family!
		</h2>
	</header>
	<div>
		Thank you for signing up :) 
		<br>
		You have been added to our mailing list and will now be among the first to hear about big events and special offers.
		<br>
		<?php echo $_POST["addText"]; ?>
	</div> 
	<div>
		Get in touch with us
		<br>
		<div>
			<span id="fbIcon">
				<a href="<?php echo $_POST["facebook"] ?>">Facebook</a> |
			</span>
			<span id="twitIcon">
				<a href="<?php echo $_POST["twitter"] ?>">Twitter</a> |
			</span>
			<span id="instaIcon">
				<a href="<?php echo $_POST["insta"] ?>">Instagram</a> |
			</span>
			<span id="linkedinIcon">
				<a href="<?php echo $_POST["linkedin"] ?>">LinkedIn</a>
			</span>
		</div>
	</div>
	<br>
	<div>
		Our mailing address is:
		<br>
		<?php echo $_POST["address1"]; ?>
		<br>
		<?php echo $_POST["address2"]; ?>
		<br>
		<?php echo $_POST["city"]; ?>
		<br>
		<?php echo $_POST["country"]; ?>
	</div>
	<br>
	<div>
		Want to change how you receive these emails?
		<br>
		You can <a href="#">update your preferences</a> or <a href="#">unsubscribe from this list</a>.
		<br>
		<br>
		Copyright &copy; 2019 Travaly Travel and Hospitality LLP, All rights reserved.
	</div>
</body>
</html>