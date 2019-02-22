<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->config->item('product_name')." | ".$page_title;?></title>	
    <?php $this->load->view("include/css_include_front");?>    
    <?php $this->load->view("include/js_include_front"); ?>  
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">    
</head>
     
            
<body class="app_body">
<div class="container-fluid sticky_top no_margin" style="border-bottom-color: orange !important;">
	<div class="row">
		<div class="col-xs-12" style="height:80px;background: #1c2b4a;">
			<h1 style="margin:0"><a href="<?php echo site_url(); ?>"><img src="<?php echo base_url();?>assets/images/logo.png" style="height:65%;margin-top:12px;" alt="<?php echo $this->config->item('product_name');?>" class="img-responsive center-block"></a></h1>
   		</div>
	</div>
</div>

<div class="container-fluid front_content">
	<!-- page content -->
	<?php $this->load->view($body);?>
	<!-- page content --> 
</div>

 <!-- footer -->
<!-- <footer id="footer" class='sticky_bottom' style="background: #000">
<div class="container-fluid text-center">
    <div class="row">
        <div class="col-xs-12">             
             <?php echo $this->config->item("product_name").$this->config->item("product_version").' - <a target="_BLANK" href="'.site_url().'"><b>'.$this->config->item("institute_address1").'</b></a>'; ?> 
             </div>
    </div>
    </div>
</footer> -->
<!-- footer --> 

</body>
</html>
