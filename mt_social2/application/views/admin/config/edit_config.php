<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">
     	<div class="box box-info custom_box">
		    	<div class="box-header">
		         <h3 class="box-title"><i class="fa fa-cogs"></i> <?php echo $this->lang->line("general settings");?></h3>
		        </div><!-- /.box-header -->
		       		<!-- form start -->
		    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config/edit_config';?>" method="POST">
		        <div class="box-body">
		           	<div class="form-group">
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("company name");?>
		              	</label>
		                	<div class="col-sm-9 col-md-6 col-lg-6">
		               			<input name="institute_name" value="<?php echo $this->config->item('institute_address1');?>"  class="form-control" type="text">		               
		             			<span class="red"><?php echo form_error('institute_name'); ?></span>
		             		</div>
		            </div>
		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("company address");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">
	               			<input name="institute_address" value="<?php echo $this->config->item('institute_address2');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('institute_address'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("company email");?> *
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">
	               			<input name="institute_email" value="<?php echo $this->config->item('institute_email');?>"  class="form-control" type="email">		          
	             			<span class="red"><?php echo form_error('institute_email'); ?></span>
	             		</div>
		           </div>  


		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("company phone/ mobile");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">
	               			<input name="institute_mobile" value="<?php echo $this->config->item('institute_mobile');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('institute_mobile'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 control-label" for=""><?php echo $this->lang->line("product");?> 
		             	</label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">
	               			<input name="product_name" value="<?php echo $this->config->item('product_name');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('product_name'); ?></span>
	             		</div>
		           </div>

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 control-label" for=""><?php echo $this->lang->line("product short name");?> 
		             	</label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">
	               			<input name="product_short_name" value="<?php echo $this->config->item('product_short_name');?>"  class="form-control" type="text">		          
	             			<span class="red"><?php echo form_error('product_short_name'); ?></span>
	             		</div>
		           </div>

		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("logo");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6" >
		           			<div class='text-center' style="background:#357CA5;padding:10px;"><img class="img-responsive" src="<?php echo base_url().'assets/images/logo.png';?>" alt="Logo"/></div>
	               			<?php echo $this->lang->line("max dimension");?> : 600 x 300, <?php echo $this->lang->line("max size");?> : 200KB,  <?php echo $this->lang->line("allowed format");?> : png
	               			<input name="logo" class="form-control" type="file">		          
	             			<span class="red"> <?php echo $this->session->userdata('logo_error'); $this->session->unset_userdata('logo_error'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("favicon");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">
	             			<div class='text-center'><img class="img-responsive" src="<?php echo base_url().'assets/images/favicon.png';?>" alt="Favicon"/></div>
	               			 <?php echo $this->lang->line("Max Dimension");?> : 32 x 32, <?php echo $this->lang->line("Max Size");?> : 50KB, <?php echo $this->lang->line("Allowed Format");?> : png

	               			<input name="favicon"  class="form-control" type="file">		          
	             			<span class="red"><?php echo $this->session->userdata('favicon_error'); $this->session->unset_userdata('favicon_error'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("language");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">	             			
	               			<?php
							$select_lan="english";
							if($this->config->item('language')!="") $select_lan=$this->config->item('language');
							echo form_dropdown('language',$language_info,$select_lan,'class="form-control" id="language"');  ?>		          
	             			<span class="red"><?php echo form_error('language'); ?></span>
	             		</div>
		           </div>

		        
		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("time zone");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">	             			
	               			<?php	$time_zone['']="Time Zone";
							echo form_dropdown('time_zone',$time_zone,$this->config->item('time_zone'),'class="form-control" id="time_zone"');  ?>		          
	             			<span class="red"><?php echo form_error('time_zone'); ?></span>
	             		</div>
		           </div> 


		           <div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("facebook post limit per campaign");?>
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">
	               			<input name="check_post_count_limit" value="<?php echo $this->config->item('check_post_count_limit'); ?>"  class="form-control" type="number" min="0">	          
	             			<span class="red"><?php echo form_error('check_post_count_limit'); ?></span>
	             		</div>
		           </div> 


		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 control-label" for="display_landing_page" style="margin-top: -7px;"><?php echo $this->lang->line('display landing page');?></label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	             			
	               			<?php	
	               			$display_landing_page = $this->config->item('display_landing_page');
	               			if($display_landing_page == '') $display_landing_page='0';
							echo form_dropdown('display_landing_page',array('0'=>$this->lang->line('no'),'1'=>$this->lang->line('yes')),$display_landing_page,'class="form-control" id="display_landing_page"');  ?>		          
	             			<span class="red"><?php echo form_error('display_landing_page'); ?></span>
	             		</div>
		           </div> 

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 control-label" for=""><?php echo $this->lang->line("theme");?> 
		             	</label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	             			
	               			<?php 
	               			$select_theme="skin-black-light";
							if($this->config->item('theme')!="") $select_theme=$this->config->item('theme');
							echo form_dropdown('theme',$themes,$select_theme,'class="form-control" id="theme"');  ?>		          
	             			<span class="red"><?php echo form_error('theme'); ?></span>
	             		</div>
		           </div>

		           <div class="form-group">
		             	<label class="col-xs-12 col-sm-12 col-md-3 control-label" for="use_app_domain_as_action_controller_link" style="margin-top: -7px;"><?php echo $this->lang->line('use app domain as action controller link');?></label>
	             		<div class="col-xs-12 col-sm-12 col-md-6">	             			
	               			<?php	
	               			$use_app_domain_as_action_controller_link = $this->config->item('use_app_domain_as_action_controller_link');
	               			if($use_app_domain_as_action_controller_link == '') $use_app_domain_as_action_controller_link='false';
							echo form_dropdown('use_app_domain_as_action_controller_link',array('false'=>$this->lang->line('no'),'true'=>$this->lang->line('yes')),$use_app_domain_as_action_controller_link,'class="form-control" id="use_app_domain_as_action_controller_link"');  ?>		          
	             			<span class="red"><?php echo form_error('use_app_domain_as_action_controller_link'); ?></span>
	             		</div>
		           </div> 

		           
		         		               
		           </div> <!-- /.box-body --> 

		           	<div class="box-footer">
		            	<div class="form-group">
		             		<div class="col-sm-12 text-center">
		               			<input name="submit" type="submit" class="btn btn-primary btn-lg" value="<?php echo $this->lang->line("Save");?>"/>  
		              			<input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config",1)'/>  
		             		</div>
		           		</div>
		         	</div><!-- /.box-footer -->         
		        </div><!-- /.box-info -->       
		    </form>     
     	</div>
   </section>
</section>



