<?php $this->load->view('admin/theme/message'); ?>
<?php 

if(array_key_exists(0,$config_data))
$section1_html=$config_data[0]["section1_html"]; 
else $section1_html="";

if(array_key_exists(0,$config_data))
$section1_html_mobile=$config_data[0]["section1_html_mobile"]; 
else $section1_html_mobile="";;

if(array_key_exists(0,$config_data))
$section2_html=$config_data[0]["section2_html"]; 
else $section2_html="";;

if(array_key_exists(0,$config_data))
$section3_html=$config_data[0]["section3_html"]; 
else $section3_html="";;

if(array_key_exists(0,$config_data))
$section4_html=$config_data[0]["section4_html"]; 
else $section4_html="";

if(array_key_exists(0,$config_data))
$selected=$config_data[0]["status"]; 
else $selected="1";

if($selected==0) $class="disabled";
else $class="";

$placeholder=htmlspecialchars('Example: <img src="http://yoursite.com/images/sample.png">');
?> 
<section class="content-header">
   <section class="content">
     	<div class="box box-info custom_box">
		    	<div class="box-header">
		         <h3 class="box-title"><i class="fa fa-bullhorn"></i> <?php echo $this->lang->line("advertisement settings");?></h3>
		        </div><!-- /.box-header -->
		       		<!-- form start -->

		    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config_ad/edit_ad_config';?>" method="POST">
		        <div class="box-body">

		        	<div class="form-group">
		             	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("status");?> *
		             	</label>
	             		<div class="col-sm-9 col-md-6 col-lg-6">	             			
	               			<?php	$status=array("1"=>$this->lang->line("i want to advertise"),"0"=>$this->lang->line("i do not want advertise"));
							echo form_dropdown('status',$status,$selected,'class="form-control" id="status"');  ?>		          
	             			<span class="red"><?php echo form_error('status'); ?></span>
	             		</div>
		           </div> 

		        	<div class="form-group">
		              	<br><br><br>
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("Section - 1");?>  (970x90 px)
		              	</label>
	                	<div class="col-sm-9 col-md-6 col-lg-6">
	               			<textarea name="section1_html"  id="section1_html"  placeholder="<?php echo $placeholder;?>" class="change_status form-control <?php echo $class; ?>"><?php echo $section1_html;?></textarea>		               
	             			<span class="red"><?php echo form_error('section1_html'); ?></span>
	             		</div>
		            </div>

		            <div class="form-group">
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("Section - 1 : Mobile");?>   (320x100 px)
		              	</label>
	                	<div class="col-sm-9 col-md-6 col-lg-6">
	               			<textarea name="section1_html_mobile"  placeholder="<?php echo $placeholder;?>" id="section1_html_mobile"  class="change_status form-control <?php echo $class; ?>"><?php echo $section1_html_mobile;?></textarea>		               
	             			<span class="red"><?php echo form_error('section1_html_mobile'); ?></span>
	             		</div>
		            <div class="space"></div>
		            </div>


		            <div class="form-group">
		              	<br><br><br>
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("Section: 2");?>  (300x250 px)
		              	</label>
	                	<div class="col-sm-9 col-md-6 col-lg-6">
	               			<textarea name="section2_html"  placeholder="<?php echo $placeholder;?>" id="section2_html"  class="change_status form-control <?php echo $class; ?>"><?php echo $section2_html;?></textarea>		               
	             			<span class="red"><?php echo form_error('section2_html'); ?></span>
	             		</div>
		            </div>

		            <div class="form-group">
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("Section: 3");?>  (300x250 px)
		              	</label>
	                	<div class="col-sm-9 col-md-6 col-lg-6">
	               			<textarea name="section3_html" placeholder="<?php echo $placeholder;?>" id="section3_html"  class="change_status form-control <?php echo $class; ?>"><?php echo $section3_html;?></textarea>		               
	             			<span class="red"><?php echo form_error('section3_html'); ?></span>
	             		</div>
		            </div>

		             <div class="form-group">
		              	<label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("Section: 4");?>  (300x600 px)
		              	</label>
	                	<div class="col-sm-9 col-md-6 col-lg-6">
	               			<textarea name="section4_html"  placeholder="<?php echo $placeholder;?>" id="section4_html"  class="change_status form-control <?php echo $class; ?>"><?php echo $section4_html;?></textarea>		               
	             			<span class="red"><?php echo form_error('section4_html'); ?></span>
	             		</div>
		            </div>



		          		                        
		           </div> <!-- /.box-body --> 

		           	<div class="box-footer">
		            	<div class="form-group">
		             		<div class="col-sm-12 text-center">
		               			<input name="submit" type="submit" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line("Save");?>"/>  
		              			<input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config_ad/index",1)'/>  
		             		</div>
		           		</div>
		         	</div><!-- /.box-footer -->         
		        </div><!-- /.box-info -->       
		    </form>     
     	</div>
   </section>
</section>

<script>
	$j(document).ready(function() {
		$("#status").change(function(){
			var selected=$("#status").val();
			if(selected=="0")
			$(".change_status").attr('disabled','disabled');
			else
			$(".change_status").removeAttr('disabled');
		});
	});
</script>