<?php 
$check_post_count_limit=$this->config->item('check_post_count_limit');
if($this->session->userdata('user_type')=='Member' && is_int($check_post_count_limit) && $check_post_count_limit>0) $check_post_count='yes';
else $check_post_count='no';

$this->load->view("include/upload_js"); 
$select_time_zone=$this->config->item('time_zone');
$social_media_list=explode(',', $xdata_campaign[0]["social_media_list"]);
$profile_database=array();
$page_database=array();
$group_database=array();
if($existing_accounts != '0')
{
	foreach ($existing_accounts as $key => $value) 
	{
		$profile_database[$value["userinfo_table_id"]] = $value["name"];

		foreach ($value["page_list"] as $key2 => $value2) 
		{
			$page_database[$value2["id"]]=$value["name"]." : ".$value2["page_name"];
		}

		foreach ($value["group_list"] as $key2 => $value2) 
		{
			$group_database[$value2["id"]]=$value["name"]." : ".$value2["group_name"];
		}
	}
}
?>
<div class="clearfix"></div>
<h4 style="line-height: 20px;font-size:14px;">	
	<?php 
	if($check_post_count=='yes')
	{
		echo '<div class="well text-center" style="background:#fffddd;margin-bottom:0;">'.$this->lang->line("maximum allowed Facebook post per campaign using default action controller:").' '.$check_post_count_limit.'. ';
		echo $this->lang->line("use your own domain for post unlimited on Facebook.").'</div>';
	}
	?>
</h4>

<div class="row padding-5">
	<div class="col-xs-12 padding-20">
		<div class="box box-primary">
			<div class="box-header ui-sortable-handle padding-20" style="cursor: move;">
				<i class="fa fa-clone"></i>
				<h3 class="box-title"><?php echo $this->lang->line("clone campaign"); ?></h3>
				<!-- tools box -->
				<div class="pull-right box-tools"></div><!-- /. tools -->
			</div>
			<div class="box-body padding-20">
				<form action="#" enctype="multipart/form-data" id="auto_poster_form" method="post">
					<div class="form-group">
						<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $xdata_campaign[0]["id"];?>">
						<label><?php echo $this->lang->line("campaign name"); ?> *</label>
						<input type="input" class="form-control" value="<?php echo $xdata_campaign[0]["campaign_name"];?>"  name="campaign_name" id="campaign_name" placeholder="<?php echo $this->lang->line('Type a name to identify it later easily'); ?>">
					</div>
				
					<div class="form-group col-xs-12 col-md-6" style="padding:0 5px 0 0;">
						<label><?php echo $this->lang->line("link"); ?> *</label>
						<input type="input" class="form-control"  value="<?php echo $xdata_campaign[0]["link"];?>" name="link" id="link" placeholder="<?php echo $this->lang->line('Paste a link where you want to take people on image click'); ?>">
					</div>

					<div class="form-group col-xs-12 col-md-6" style="padding:0 0 0 5px;">
						<label><?php echo $this->lang->line("title"); ?> *</label>
						<input type="input" class="form-control" value="<?php echo $xdata_campaign[0]["title"];?>" name="title" id="title" placeholder="<?php echo $this->lang->line('Any custom title for the link'); ?>">
					</div>


					<div class="form-group col-xs-12 col-md-6" style="padding:0 5px 0 0;">
						<label><?php echo $this->lang->line("description"); ?></label>
						<textarea class="form-control"  name="description" id="description" placeholder="<?php echo $this->lang->line('Any custom description for the link'); ?>"><?php echo $xdata_campaign[0]["description"];?></textarea>
					</div>


					<div class="form-group col-xs-12 col-md-6" style="padding:0 0 0 5px;">
						<label><?php echo $this->lang->line("post content"); ?></label>
						<textarea class="form-control" name="message" id="message" placeholder="<?php echo $this->lang->line('Any content to dispaly alongside clickable image ( only works for faceboook, pinterest & linkedin )'); ?>"><?php echo $xdata_campaign[0]["message"];?></textarea>
					</div>				
					
					<div class="clearfix"></div>


					<div id="image_block" class="well clearfix">
						<div class="form-group col-xs-12 col-md-7" style="padding:0 5px 0 0">
							<label><?php echo $this->lang->line("image URL"); ?></label>
							<input class="form-control" style="max-width:462.5px;" value="<?php echo $xdata_campaign[0]["image"];?>" name="image_url" id="image_url" type="text" placeholder="<?php echo $this->lang->line('Paste image URL or upload new'); ?>" > 
							<div id="img-live-preview" class="hidden-xs hidden-sm"></div>
							<span class="label label-info preview_uploaded  hidden-md hidden-lg" style="cursor:pointer"><i class="fa fa-eye"></i> <?php echo $this->lang->line("Preview"); ?></span>
						</div>
						<div class="form-group col-xs-12 col-md-5" style="padding:0 0 0 5px">
							<label><?php echo $this->lang->line("Upload Image"); ?></label>      
							<div id="image_url_upload"><?php echo $this->lang->line('Upload');?></div>
						</div>

						<div class="clearfix"></div>
						<p class="orange text-center well" style="background: #fff;"><?php echo $this->lang->line("The standard image size of Facebook is (924x486)px and the twitter is (1200x628)px. The minimum image should have a width of 400px with maintain the ratio. In summary the image must be at least 400px in width and maintain 1.91:1 ratio and it will be allowed by all the social network.");?></p>
					</div>

			
					<div class="form-group">
						<label>
						<?php echo $this->lang->line("action link controller"); ?> *
						<?php 
							$extra_message="";
							if($this->session->userdata('user_type') == 'Admin' || in_array(110,$this->module_access))
							$extra_message=$this->lang->line('You can set up your own domain to be used as action link controller.');
							$extra_message2="";
							if($this->session->userdata('user_type') == 'Admin' || in_array(111,$this->module_access))
							$extra_message2=$this->lang->line('It also tracks visitors and generate click report.');
						?>
						<a href="#" data-placement="top" data-toggle="popover" data-trigger="focus" title="<?php echo $this->lang->line("action link controller"); ?>" data-content="<?php echo $this->lang->line('Action link controller controls the click on your social post. Social posts will be taken to this URL first and then it will be redirected to your link action.').' '.$extra_message.' '.$extra_message2;?>"><i class='fa orange fa-info-circle'></i></a>
						</label>
						<div class="input-group">
						  <?php $protocol=  $xdata_campaign[0]["protocol"];?>
						  <span class="input-group-addon" id="protocol_display"><?php echo $protocol;?></span>
						  <input type="hidden" name="protocol" id="protocol" value="<?php echo $protocol;?>">
						  <input type="text" class="form-control hidden" value="<?php echo $xdata_campaign[0]["subdomain"];?>" style="height: 42px !important"  name="subdomain" id="subdomain" placeholder="<?php echo $this->lang->line('sub-domain'); ?> <?php echo $this->lang->line('(optional)'); ?>">
						  <span class="input-group-addon hidden" id="dot" style="border-left:none;"><b>.</b></span>
						  <span class="input-group-addon" style='width:60%;padding:0;'>
							<?php 
								echo "<select class='form-control' name='action_controller_url' id='action_controller_url' style='border:none;'>";
									if(!empty($default_redirect_domain_list) || $this->config->item('use_app_domain_as_action_controller_link')==TRUE)
									{
										echo "<optgroup label='".$this->lang->line("Default controller")."'>";	
										if($this->config->item('use_app_domain_as_action_controller_link')==TRUE)
										{
											$self_protocol=isset($_SERVER['HTTPS']) ? "https://" : "http://";
											$self_action_controller=base_url('tr/rd');
											$self_action_controller=str_replace(array('http://','https://'),array('',''), $self_action_controller);
											if($self_action_controller==$xdata_campaign[0]["action_controller_url"]) $selected="selected='selected'";
											else $selected='';
											echo "<option data-type='default' {$selected} data-protocol='".$self_protocol."' value='".$self_action_controller."'>".$self_action_controller."</option>";
										}								
										foreach ($default_redirect_domain_list as $key => $value) 
										{
											if($value["action_controller_url"]==$xdata_campaign[0]["action_controller_url"]) $selected="selected='selected'";
											else $selected='';
											echo "<option data-type='default' {$selected} data-protocol='".$value["protocol"]."' value='".$value["action_controller_url"]."'>".$value["action_controller_url"]."</option>";
											
										}
										echo "</optgroup>";
									}
									if(!empty($custom_redirect_domain_list))
									{
										echo "<optgroup label='".$this->lang->line("Custom controller")."'>";
										foreach ($custom_redirect_domain_list as $key => $value) 
										{
											if($value["action_controller_url"]==$xdata_campaign[0]["action_controller_url"]) $selected="selected='selected'";
											else $selected='';
											echo "<option data-type='custom' {$selected} data-protocol='".$value["protocol"]."' value='".$value["action_controller_url"]."'>".$value["action_controller_url"]."</option>";
										}
										echo "</optgroup>";
									}
								echo "</select>";
							 ?>
						  </span>
						</div>
					</div>

					
					<br>					
					<div class="clearfix"></div>

					<?php 
					if($this->session->userdata('user_type') == 'Admin' || in_array(109,$this->module_access)) 
					{
						$hide_scheduler=""; 
						$br="<br><br>";
					}
					else 
					{
						$hide_scheduler="hidden";
						$br="";
					}
					?>
				
					<div class="form-group <?php echo $hide_scheduler;?>">
						<label><?php echo $this->lang->line("When to Post Offer?"); ?></label><br/>
						<input name="schedule_type" value="now" id="schedule_now" checked type="radio"> <?php echo $this->lang->line("Post Now"); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="schedule_type" value="later" id="schedule_later" type="radio"> <?php echo $this->lang->line("Post Later"); ?>  
					</div>


					<div class="form-group schedule_block_item col-xs-12 col-md-6 <?php echo $hide_scheduler;?>" style="padding:0 5px 0 0">
						<label><?php echo $this->lang->line("Schedule Time"); ?></label>
						<input placeholder="<?php echo $this->lang->line('Schedule Time'); ?>"  name="schedule_time" id="schedule_time" class="form-control datepicker" type="text"/>
					</div>

					<div class="form-group schedule_block_item col-xs-12 col-md-6 <?php echo $hide_scheduler;?>" style="padding:0 0 0 5px">
						<label><?php echo $this->lang->line("time zone"); ?></label>
						<?php
						$time_zone_list[''] = $this->lang->line('Please Select');
						echo form_dropdown('time_zone',$time_zone_list,$select_time_zone,' class="form-control" id="time_zone" required'); 
						?>
					</div>	
					<div class="clearfix"></div>
					<br><br>

					<!-- SOCIAL SHARE -->
					<div class="row">
						<?php 
						if($this->session->userdata('user_type') == 'Admin' || count(array_intersect(array(65,107),$this->module_access)>0))
						{
							$left_col="col-md-6";
							$right_col="col-md-6";
						}
						else
						{
							$left_col="hidden";
							$right_col="col-md-6";
						}
						?>
						<div class="col-xs-12 col-sm-12 <?php echo $left_col;?>">
							<?php if($this->session->userdata('user_type') == 'Admin' || in_array(65,$this->module_access)) $hide_social_block=''; else $hide_social_block='hidden';?>
							<div class="box box-primary <?php echo $hide_social_block;?>">
								<div class="box-header ui-sortable-handle" style="cursor: move;">
								  <i class="fa fa-facebook"></i>
								  <h3 class="box-title"><?php echo $this->lang->line("Post to Facebook");?></h3>
								</div>
								<div class="box-body">
									<?php echo $this->lang->line("Profile/Timeline");?>: <br>
									<select multiple="multiple" id="profile_database" class="form-control" name="profile_database[]">
										<?php 
										foreach ($profile_database as $key => $value) 
										{
											if(in_array("facebook_rx_fb_user_info-".$key,$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='".$key."'>".$value."</option>";
										} 
										?>
									</select>
									<?php echo $this->lang->line("Pages");?>: <br>
									<select multiple="multiple" id="page_database" class="form-control" name="page_database[]">								
										<?php 
										foreach ($page_database as $key => $value) 
										{
											if(in_array("facebook_rx_fb_page_info-".$key,$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='".$key."'>".$value."</option>";
										} 
										?>
									</select>
									<?php echo $this->lang->line("Groups");?>: <br>
									<select multiple="multiple" id="group_database" class="form-control" name="group_database[]">
										<?php 
										foreach ($group_database as $key => $value) 
										{
											if(in_array("facebook_rx_fb_group_info-".$key,$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='".$key."'>".$value."</option>";
										} 
										?>
									</select>
								</div>
							</div>

							<?php if($this->session->userdata('user_type') == 'Admin' || in_array(107,$this->module_access)) $hide_social_block=''; else $hide_social_block='hidden';?>
							<div class="box box-primary <?php echo $hide_social_block;?>">
								<div class="box-header ui-sortable-handle" style="cursor: move;">
								  <i class="fa fa-twitter"></i>
								  <h3 class="box-title"><?php echo $this->lang->line("Post to Twitter");?></h3>
								</div>
								<div class="box-body">
									<div class="account_list">
										<select multiple="multiple" id="twitter_select" class="form-control" name="twitter_select[]">
										<?php 
										foreach($twitter_account_list as $value)
										{											
											if(in_array("rx_twitter_atuopost-".$value["id"],$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='rx_twitter_atuopost-".$value['id']."'>".$this->lang->line("Account").": ".$value['screen_name']."</option>";
																		 
										} ?>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-12 <?php echo $right_col;?>">
							<?php if($this->session->userdata('user_type') == 'Admin' || in_array(105,$this->module_access)) $hide_social_block=''; else $hide_social_block='hidden';?>
							<div class="box box-primary <?php echo $hide_social_block;?>">
								<div class="box-header ui-sortable-handle" style="cursor: move;">
								  <i class="fa fa-pinterest"></i>
								  <h3 class="box-title"><?php echo $this->lang->line("Post to Pinterest");?></h3>
								</div>
								<div class="box-body">
									<select multiple="multiple" id="pinterest_select" class="form-control" name="pinterest_select[]">
									<?php 
									foreach($pinterest_info as $value)
									{											
										echo "<optgroup label='".$this->lang->line("Account").": ". $value['name']."'>";
										foreach($value['pinterest_info'] as $info)
										{
											if(in_array("rx_pinterest_info-".$info['table_id'],$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='rx_pinterest_info-".$info['table_id']."'>".$this->lang->line("Board").": ".$info['board_name']."</option>";
										}
										echo "</optgroup>";
																	 
									} ?>
									</select>
								</div>
							</div>

							<?php if($this->session->userdata('user_type') == 'Admin' || in_array(104,$this->module_access)) $hide_social_block=''; else $hide_social_block='hidden';?>
							<div class="box box-primary <?php echo $hide_social_block;?>" style="margin-top:34px;">
								<div class="box-header ui-sortable-handle" style="cursor: move;">
								  <i class="fa fa-linkedin"></i>
								  <h3 class="box-title"><?php echo $this->lang->line("Post to LinkedIn");?></h3>
								</div>
								<div class="box-body">
									<div class="account_list">
										<select multiple="multiple" id="linkedin_select" class="form-control" name="linkedin_select[]">
										<?php 
										foreach($linkedin_account_list as $value)
										{											
											if(in_array("rx_linkedin_autopost-".$value["id"],$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='rx_linkedin_autopost-".$value['id']."'>".$this->lang->line("Account").": ". $value['first_name']." ".$value['last_name']."</option>";
																		 
										} ?>
										</select>
									</div>
								</div>
							</div>

							<?php if($this->session->userdata('user_type') == 'Admin' || in_array(106,$this->module_access)) $hide_social_block=''; else $hide_social_block='hidden';?>
							<div class="box box-primary <?php echo $hide_social_block;?>" style="margin-top:21px;">
								<div class="box-header ui-sortable-handle" style="cursor: move;">
								  <i class="fa fa-tumblr"></i>
								  <h3 class="box-title"><?php echo $this->lang->line("Post to Tumblr");?></h3>
								</div>
								<div class="box-body">
									<div class="account_list">
										<select multiple="multiple" id="tumblr_select" class="form-control" name="tumblr_select[]">
										<?php 
										foreach($tumblr_account_list as $value)
										{											
											if(in_array("rx_tumblr_autopost-".$value["id"],$social_media_list)) $selected="selected='selected'"; else $selected='';
											echo "<option {$selected} value='rx_tumblr_autopost-".$value['id']."'>".$this->lang->line("Account").": ".$value['user_name']."</option>";
																		 
										} ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- SOCIAL SHARE -->

					<?php 
					if($this->session->userdata('user_type') == 'Admin' || in_array(113,$this->module_access)) 
					{
						$hide_pixel=""; 
						$br="<br><br>";
					}
					else 
					{
						$hide_pixel="hidden";
						$br="";
					}
					?>

					<div class="form-group <?php echo $hide_pixel;?>">
						<label><?php echo $this->lang->line("facebook pixel code"); ?></label>
						<textarea class="form-control" name="pixel_code" id="pixel_code" placeholder="<?php echo $this->lang->line('paste your facebook pixel code here'); ?>"><?php echo $xdata_campaign[0]["pixel_code"];?></textarea>
					</div>

					<div class="clearfix"></div>
					<div class="box-footer" style="padding:15px 0">
						<button class="btn btn-primary btn-lg" id="submit_post" name="submit_post" type="button"><i class="fa fa-clone"></i> <?php echo $this->lang->line("clone campaign"); ?></button>
					</div>
					<br>


				</form>
			</div>
			
		</div>
	</div>  
</div>


<script>

	function char_limiting(text,limit)
	{
		var dot=limit-3;
		 if (text.length > limit) 
		 {
			return text.substr(0,dot) + '...';
		 }
		 else return text;
	}


	$j("document").ready(function(){

		setTimeout(function() {
			$("#image_url").blur();
		}, 3000);

		$(document.body).on('change','#action_controller_url',function(){ 			
			var data_protocol=$("#action_controller_url option:selected").attr("data-protocol");
            $("#protocol").val(data_protocol);
			$("#protocol_display").html(data_protocol);
		});


		var data_type=$("#action_controller_url option:selected").attr("data-type");
		var data_protocol=$("#action_controller_url option:selected").attr("data-protocol");
		$("#protocol").val(data_protocol);
		$("#protocol_display").html(data_protocol);
		// if(data_type=='default')
		// {
		// 	$("#subdomain").show();
		// 	$("#dot").show();
		// }
		// else 
		// {
		// 	$("#subdomain").val('').hide();
		// 	$("#dot").hide();
		// }

		$('[data-toggle="popover"]').popover(); 
		$('[data-toggle="popover"]').on('click', function(e) {e.preventDefault(); return true;});

		var base_url="<?php echo base_url();?>";
		var image_server="<?php echo $image_server;?>";

		var today = new Date();
		// var next_date = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
		$j('.datepicker').datetimepicker({
			theme:'dark',
			format:'Y-m-d H:i:s',
			formatDate:'Y-m-d H:i:s',
			minDate: today
		});

		$j("#profile_database").multipleSelect({
			filter: true,
			multiple: true
		});	
		$j("#page_database").multipleSelect({
			filter: true,
			multiple: true
		});	
		$j("#group_database").multipleSelect({
			filter: true,
			multiple: true
		});
		$j("#twitter_select").multipleSelect({
			filter: true,
			multiple: true
		});
		$j("#pinterest_select").multipleSelect({
			filter: true,
			multiple: true
		});
		$j("#tumblr_select").multipleSelect({
			filter: true,
			multiple: true
		});
		$j("#linkedin_select").multipleSelect({
			filter: true,
			multiple: true
		});

		$(".schedule_block_item").hide();
	 
		$(document.body).on('change','input[name=schedule_type]',function(){    
			if($("input[name=schedule_type]:checked").val()=="later")
			$(".schedule_block_item").show();
			else 
			{
				$("#schedule_time").val("");
				$("#time_zone").val("");
				$(".schedule_block_item").hide();
			}
		});
		

		// var message_pre=$("#message").val();
		// message_pre=message_pre.replace(/[\r\n]/g, "<br />");
		// if(message_pre!="")
		// {
		// 	message_pre=message_pre+"<br/><br/>";
		// 	$(".preview_message").html(message_pre);
		// }
			
		$(document.body).on('blur','#image_url',function(){ 
			var data_modified=$("#image_url").val();			
            var imgsrc='<img src="'+data_modified+'" style="width:462.5px;height:242.5px;border-radius:0;cursor:pointer" class="edit-me img-thumbnail">';
			$("#img-live-preview").html(imgsrc);
		});
	   
	   

		// $(document.body).on('click','#refresh_preview',function(){ 
		// 	load_preview();
		// });


		$(document.body).on('click','.preview_uploaded',function(){ 
			var media_url=$(this).prev().val();
			if(media_url=='')
			{
				alert('No media to display.');
				return;
			} 
			var html_content;        	
			html_content="<img src='"+media_url+"' class='img-responsive img-thumbnail'>";        	
			$("#preview_uploaded_modal_content").html(html_content);
			$("#preview_uploaded_modal").modal();
		});


		// $(document.body).on('keyup','#message',function(){  
		// 	var message=$(this).val();
		// 	message=message.replace(/[\r\n]/g, "<br />");
		// 	if(message!="")
		// 	{
		// 		message=message+"<br/><br/>";
		// 		$(".preview_message").html(message);
		// 	}
		// }); 


		$("#image_url_upload").uploadFile({
			url:base_url+"imgclick/upload_image_only",
			fileName:"myfile",
			maxFileSize:1*1024*1024,
			showPreview:false,
			returnType: "json",
			dragDrop: true,
			showDelete: true,
			multiple:false,
			maxFileCount:1, 
			acceptFiles:".png,.jpg,.jpeg",
			deleteCallback: function (data, pd) {
				var delete_url="<?php echo site_url('imgclick/delete_uploaded_file');?>";
				$.post(delete_url, {op: "delete",name: data},
					function (resp,textStatus, jqXHR) {  
						$("#image_url").val('');                      
					});
			   
			 },
			 onSuccess:function(files,data,xhr,pd)
			   {
				   var data_modified = image_server+"upload/imgclick/"+data;
				   $("#image_url").val(data_modified);	
            	   var imgsrc='<img src="'+data_modified+'" style="width:462.5px;height:242.5px;border-radius:0;cursor:pointer" class="edit-me img-thumbnail">';
		  	   	   $("#img-live-preview").html(imgsrc);                     
			   }
		});



		 $(document.body).on('click','#submit_post',function(){ 


			if($("#campaign_name").val()=="")
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Campaign name is required.')?>");
				$("#error_modal").modal();
				return;
			}
			if($("#link").val()=="")
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Link is required.')?>");
				$("#error_modal").modal();
				return;
			}
			if($("#title").val()=="")
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Title is required.')?>");
				$("#error_modal").modal();
				return;
			}
			if($("#action_controller_url").val()=="" || $("#action_controller_url").val()==null)
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Action link controller is required.')?>");
				$("#error_modal").modal();
				return;
			} 
	
			if($("#image_url").val()=="")
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Please paste an image url or upload an image to post.')?>");
				$("#error_modal").modal();
				return;
			}  

			var schedule_type = $("input[name=schedule_type]:checked").val();
			var schedule_time = $("#schedule_time").val();
			var time_zone = $("#time_zone").val();
			if(schedule_type=='later' && (schedule_time=="" || time_zone==""))
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('Please select schedule time/time zone.')?>");
				$("#error_modal").modal();
				return;
			} 
	


			var profile_database = $("#profile_database").val();
			var page_database = $("#page_database").val();
			var group_database = $("#group_database").val();
			var pinterest_select = $("#pinterest_select").val();
			var twitter_select = $("#twitter_select").val();
			var linkedin_select = $("#linkedin_select").val();
			var tumblr_select = $("#tumblr_select").val();
	
			if(profile_database==null && page_database==null && group_database==null && pinterest_select==null && twitter_select==null && linkedin_select==null && tumblr_select==null)
			{
				$("#error_modal_content").html("<?php echo $this->lang->line('No social account selected to post.')?>");
				$("#error_modal").modal();
				return;
			}

			var check_post_count="<?php echo $check_post_count;?>";
			var action_controller_type=$("#action_controller_url option:selected").attr("data-type");
			if(check_post_count=='yes' && action_controller_type=='default')
			{
				var check_post_count_limit="<?php echo $check_post_count_limit;?>";
				var facebook_post_count=0;
				if(profile_database!=null) facebook_post_count+=profile_database.length;
				if(page_database!=null) facebook_post_count+=page_database.length;
				if(group_database!=null) facebook_post_count+=group_database.length;

				if(facebook_post_count>check_post_count_limit) 
				{
					$("#error_modal_content").html("<?php echo $this->lang->line('maximum allowed Facebook post per campaign using default action controller:')?>"+" "+check_post_count_limit+". "+"<?php echo $this->lang->line('use your own domain for post unlimited on Facebook.')?>");
					$("#error_modal").modal();
					return;
				}
			}
						

			$("#submit_post").html('<?php echo $this->lang->line("Processing");?>...');     	
			$("#submit_post").addClass("disabled"); 
			$("#response_modal_content").removeClass("alert-danger");
			$("#response_modal_content").removeClass("alert-success");
			var loading = '<img src="'+base_url+'assets/pre-loader/Surrounded segments.gif" class="center-block">';
			$("#response_modal_content").html(loading);
			$("#response_modal").modal();

			  var queryString = new FormData($("#auto_poster_form")[0]);
			  $.ajax({
			   type:'POST' ,
			   url: base_url+"imgclick/create_campaign_action",
			   data: queryString,
			   dataType : 'JSON',
			   // async: false,
			   cache: false,
			   contentType: false,
			   processData: false,
			   success:function(response)
			   {  		         
					$("#submit_post").removeClass("disabled");
					$("#submit_post").html('<i class="fa fa-clone"></i> <?php echo $this->lang->line("clone campaign")?>');    


					if(response.status=="1")
					{
						$("#response_modal_content").removeClass("alert-danger");
						$("#response_modal_content").addClass("alert-success");
						var report_link="<br/><a href='"+base_url+"imgclick/campaign_report/"+response.id+"'><?php echo $this->lang->line('Click here to see campaign report'); ?></a>";
						$("#response_modal_content").html(response.message+report_link);
					}
					else
					{
						$("#response_modal_content").removeClass("alert-success");
						$("#response_modal_content").addClass("alert-danger");
						$("#response_modal_content").html(response.message);
					}

			   }

			  });

		});
		


	});



</script>



<div class="modal fade" id="response_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-clone"></i> <?php echo $this->lang->line("clone campaign")?></h4>
			</div>
			<div class="modal-body">
				<div class="alert text-center" id="response_modal_content">
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="error_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-info"></i> <?php echo $this->lang->line('Campaign Error'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="alert text-center alert-warning" id="error_modal_content">
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="preview_uploaded_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="fa fa-eye"></i> <?php echo $this->lang->line('Media Preview'); ?></h4>
			</div>
			<div class="modal-body">
				<div id="preview_uploaded_modal_content">
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view("facebook_rx/imgclick/style.php"); ?>