<div style="margin:20px;padding:20px">
<?php
if(isset($message))
{
	if($error==1) $class="danger";
	else $class="success";
	echo '<div class="text-center alert alert-'.$class.'">';
		echo '<b>'.$message.'</b>';
	echo '</div>';
}	


if(isset($expired_or_not) && $expired_or_not==1)
{
	echo '<div class="alert alert-success">';
		echo '<h5 class="text-center"> <i class="fa fa-info"></i> User access token is valid. You can login and get new user access token if you want.<h5>';
	echo '</div>';
}

if(isset($fb_login_button))
{
	echo '<div class="well">';
		echo '<h3 class="text-center"> <i class="fa fa-facebook-official"></i> '.$fb_login_button.'<h3>';
	echo '</div>';
}

echo '<center><a href="'.base_url("facebook_rx_config/index").'"><i class="fa fa-arrow-circle-left"></i> Go Back</a></center>';
?>
</div>