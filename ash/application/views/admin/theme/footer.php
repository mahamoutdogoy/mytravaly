<footer class="main-footer clearfix">
	<div class="pull-left hidden-xs">
	<b><?php  echo $this->config->item("product_short_name");?></b>
	<?php echo $this->config->item("product_version");?> - 
	<?php echo '<a target="_BLANK" href="'.site_url().'"><b>'.$this->config->item("institute_address1").'</b></a>'; ?>

	</div>
</footer>

<style type="text/css">
form input[type=text],form input[type=email],form input[type=password],form input[type=file],form input[type=number],form textarea,form select,form .form-control
{
	-webkit-border-radius:0px !important;
    -moz-border-radius: 0px !important;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.10) !important;
    -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.10) !important;
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.10) !important;
    background: #fefefe  !important;

}
form input[type=text]:focus,form input[type=email]:focus,form input[type=password]:focus,form input[type=file]:focus,form input[type=number]:focus,form textarea:focus,form select:focus,form .form-control:focus
{
	/* -webkit-border-radius:5px !important; */
    /* -moz-border-radius: 5px !important; */
    background: #fff  !important;

}
.content-wrapper
{
	background: url('<?php echo base_url("assets/images/body-bg.png");?>') !important;
}
</style>

