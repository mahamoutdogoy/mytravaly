<div class="row" style="padding-left:15px;padding-right:15px;">
	<br/><br/>
	<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
		<?php if($error==0) : ?>
			<div class="alert alert-success text-center"><h3><?php echo $message; ?></h3></div>
		<?php else : ?>
			<div class="alert alert-danger text-center"><h3><?php echo $message; ?></h3></div>
		<?php endif; ?>
	</div>
</div>