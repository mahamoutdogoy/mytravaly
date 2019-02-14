<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">

     	<?php 
		$text=$this->lang->line("Generate Your")." ".$this->config->item("product_short_name")." ".$this->lang->line("API Key");
		$get_key_text=$this->lang->line("Get Your")." ".$this->config->item("product_short_name")." ".$this->lang->line("API Key");
		if(isset($api_key) && $api_key!="") 
		{
			$text=$this->lang->line("Re-generate Your")." ".$this->config->item("product_short_name")." ".$this->lang->line("API Key");
			$get_key_text=$this->lang->line("Your")." ".$this->config->item("product_short_name")." ".$this->lang->line("API Key");
   		} 
   		?>
	    	
	    <!-- form start -->
	    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'native_api/get_api_action';?>" method="GET">
	        <div class="box-body" style="padding-top:0;">
	           	<div class="form-group">
	           		<div class="small-box bg-blue">
						<div class="inner">
							<h4><?php echo $get_key_text; ?></h4>
							<p>									
	   							<h2><?php echo $api_key; ?></h2>
							</p>
							<input name="button" type="submit" class="btn btn-default btn-lg btn" value="<?php echo $text; ?>"/>
						</div>
						<div class="icon">
							<i class="fa fa-key"></i>
						</div>
					</div>
	            </div>	           
         		               
	           </div> <!-- /.box-body -->      
	    </form>
		<?php $call_sync_contact_url=site_url("native_api/sync_contact"); ?>

   </section>
</section>



