<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">
   		<div class="well">
           <b> <?php echo "Callback URL : <span style='color:blue'>".base_url('imgclick/pinterest_login_callback'); ?></span></b>
        </div>
     	<div class="box box-info custom_box">
		    	<div class="box-header">
		         <h3 class="box-title"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add pinterest APP'); ?></h3>
		        </div><!-- /.box-header -->
		       		<!-- form start -->
		    <form class="form-horizontal text-c" enctype="multipart/form-data" action="<?php echo site_url().'admin_config_accounts/add_pinterest_settings_action';?>" method="POST">
		        <div class="box-body">
		           
		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1 control-label" for="app_name" style="margin-top: -7px;"><?php echo $this->lang->line('App Name');?></label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	 
	             			<input name="app_name" id="app_name" value="<?php echo set_value('app_name'); ?>"  class="form-control" type="text">
	             			<span class="red"><?php echo form_error('app_name'); ?></span>
	             		</div>
		           </div> 	

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1 control-label" for="app_id" style="margin-top: -7px;"><?php echo $this->lang->line('App ID');?></label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	 
	             			<input name="app_id" id="app_id" value="<?php echo set_value('app_id'); ?>"  class="form-control" type="text">
	             			<span class="red"><?php echo form_error('app_id'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 col-md-offset-1 control-label" for="app_secret" style="margin-top: -7px;"><?php echo $this->lang->line('App Secret');?></label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	 
	             			<input name="app_secret" id="app_secret" value="<?php echo set_value('app_secret'); ?>"  class="form-control" type="text">
	             			<span class="red"><?php echo form_error('app_secret'); ?></span>
	             		</div>
		           </div> 

		     
		           
		         		               
		           </div> <!-- /.box-body --> 

		           	<div class="box-footer">
		            	<div class="form-group">
		             		<div class="col-sm-12 text-center">
		               			<input name="submit" type="submit" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line("Save");?>"/>  
		              			<input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config_accounts/pinterest_settings",1)'/>  
		             		</div>
		           		</div>
		         	</div><!-- /.box-footer -->         
		        </div><!-- /.box-info -->       
		    </form>     
     	</div>
   </section>
</section>



