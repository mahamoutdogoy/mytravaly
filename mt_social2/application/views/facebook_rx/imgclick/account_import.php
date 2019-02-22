<?php 
	if($this->session->userdata('success_message') == 'success')
	{
		echo "<h4 style='margin:0'><div class='alert alert-success text-center'><i class='fa fa-check-circle'></i> ". $this->lang->line('Your account has been imported successfully!') ."</div></h4>";
		$this->session->unset_userdata('success_message');
	}

	if($this->session->userdata('limit_cross') != '')
	{
		echo "<h4 style='margin:0'><div class='alert alert-danger text-center'><i class='fa fa-remove'></i> ".$this->session->userdata('limit_cross')."</div></h4>";
		$this->session->unset_userdata('limit_cross');
	}
?>
<style>
	.custom_progress {
	  height: 2px;
	  margin-top: 0px;
	  margin-bottom: 10px;
	  overflow: hidden;
	  background-color: #f5f5f5;
	  border-radius: 4px;
	  -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
	          box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
	}
	.custom_progress_bar {
	  float: left;
	  width: 0;
	  height: 100%;
	  font-size: 4px;
	  line-height: 6px;
	  color: #fff;
	  text-align: center;
	  background-color: orange;
	  -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
	          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
	  -webkit-transition: width .6s ease;
	       -o-transition: width .6s ease;
	          transition: width .6s ease;
	}
	.existing_account {
		margin: 10px 0 0;
		font-size: 16px;
		font-weight: bold;
		font-style: italic;
	}
	.account_list{
		padding-left: 5%;
	}
	.individual_account_name{
		font-weight: bold;
		font-size: 14px;
	}
	.padded_ul{
		padding-left: 10%;
	}
	.horizontal_break{
		padding: 2px;
		margin: 0px;
	}

	.info-box-icon {
	    border-top-left-radius: 2px;
	    border-top-right-radius: 0;
	    border-bottom-right-radius: 0;
	    border-bottom-left-radius: 2px;
	    display: block;
	    float: left;
	    height: 55px;
	    width: 90px;
	    text-align: center;
	    font-size: 40px;
	    line-height: 55px;
	    background: rgba(0,0,0,0.2);
	}

	.info-box {
	    display: block;
	    min-height: 50px;
	    background: #fff;
	    width: 100%;
	    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
	    border-radius: 2px;
	    margin-bottom: 15px;
	}
	.wrapper,.content-wrapper{background: #fafafa !important;}
	.well{background: #fff;}

</style>
<!-- <div class="container"> -->
	<?php  if($this->config->item("backup_mode")==0) : ?>
		<div class="row well" style="background: #0073b7;border:3px solid orange !important;color:#fff">
			<div class="col-xs-12 col-md-5 col-md-offset-1">
				<h3><i class="fa fa-download"></i> <?php echo $this->lang->line("Import New Facebook Account"); ?></h3>
				<br>
				<input type="text" class="form-control" placeholder="<?php echo $this->lang->line('Enter Your Facebook Numeric ID'); ?>" id="fb_numeric_id" style="height:45px"/>
				<span class="label label-warning"><a href="http://findmyfbid.com/" target="_blank" style="color: white;"><?php echo $this->lang->line("Find Your Facebook Numeric ID?"); ?></a></span>
			</div>
			<div class="col-xs-12 col-md-5">
				<h3>&nbsp;</h3><br>
				<button class="btn btn-warning btn-lg" id="submit"><i class='fa fa-send'></i> <?php echo $this->lang->line("Send App Request"); ?></button>
			</div>

			<div class="col-xs-12" id="response">
				
			</div>
		</div>
	<?php  endif;?>
<!-- </div> -->

<div class="">
	<?php if($existing_accounts != '0') : ?>
		<div>
			<div class="col-xs-12">				
				<h3>
					<div class="text-center blue">
						<p><i class="fa fa-facebook-official"></i> <?php echo $this->lang->line("Your existing accounts"); ?></p>
					</div>
				</h3>
				<h4 class="text-center"><p data-toggle="tooltip" title="<?php echo $this->lang->line('You must be logged in your facebook account for which you want to refresh your access token. For synch your new page, simply refresh your token. If any access token is restricted for any action, refresh your access token.'); ?>"><?php echo $this->lang->line("To refresh your access token just"); ?> <?php echo $fb_login_button; ?></p></h4>
				<hr>
			</div>
			<div class="row" style="padding:0 15px;">
			<?php $i=0; foreach($existing_accounts as $value) : ?>
				<div class="col-xs-12 col-sm-12 col-md-6">
					<div class="box box-primary box-solid">
						<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-facebook"></i> <?php echo $value['name']; ?>							
						</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body"  style="height: 550px;overflow-y: auto;">
							<div class="col-xs-12">
								<?php 
									if($value['validity'] == 'no')
									{
										echo "<div class='alert alert-danger text-center'><i class='fa fa-close'></i> ".$this->lang->line('Your login validity has been expired!')."</div>";
									}
								?>
								<div class="row" >
									<?php $profile_picture="https://graph.facebook.com/me/picture?access_token={$value['user_access_token']}&width=150&height=150"; ?>
									
									<div class="col-xs-12 col-sm-12 col-md-6">
										<br/>
										<div class="info-box" style="border:1px solid #3c8dbc;border-bottom:2px solid #3c8dbc;">
											<span class="info-box-icon bg-blue"><i class="fa fa-newspaper-o"></i></span>
											<div class="info-box-content">
												<span class="info-box-text"><?php echo $this->lang->line("total pages");?></span>
												<span class="info-box-number"><?php echo number_format($value['total_pages']); ?></span>
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
										<br>
										<br>
										<div class="info-box" style="border:1px solid #3c8dbc;border-bottom:2px solid #3c8dbc;">
											<span class="info-box-icon bg-blue"><i class="fa fa-columns"></i></span>
											<div class="info-box-content">
												<span class="info-box-text"><?php echo $this->lang->line("total groups");?></span>
												<span class="info-box-number">
													<?php echo number_format($value['total_groups']); ?>						
												</span>
											</div><!-- /.info-box-content -->
										</div><!-- /.info-box -->
									</div>
									<div class="text-center col-xs-12 col-sm-12 col-md-6">
										<img src="<?php echo $profile_picture;?>" alt="" class='' style="border:1px solid #ccc;border-radius: 15px 15px  0 0;-moz-border-radius: 15px 15px  0 0;-webkit-border-radius: 15px 15px  0 0;"><br>
										<button class="delete_account btn btn-danger" style="border-radius: 0" table_id="<?php echo $value['userinfo_table_id']; ?>" data-toggle="tooltip" title="Do you want to remove this account from our database? You can import again."><i class="fa fa-remove"></i> <?php echo $this->lang->line("remove this account"); ?></button>
									</div>									
								</div><!-- /.row -->

								<br/>
								<p class="existing_account"><?php echo $this->lang->line("page list"); ?></p>
								<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>
								<?php foreach($value['page_list'] as $page_info) : ?>
									<br>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-2">
											<img src="<?php echo $page_info['page_profile']; ?>" alt="" class='img-thumbnail'>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-8">
											<p><b><?php echo $this->lang->line("Name"); ?> : </b> <?php echo "<a target='BLANK' href='https://www.facebook.com/".$page_info['page_id']."'>".$page_info['page_name']."</a>"; ?></p>											
											<p><b><?php echo $this->lang->line("Email"); ?> : </b> <?php echo $page_info['page_email']; ?></p>
										</div>
										<!-- <div class="col-xs-12 col-sm-12 col-md-1">
											 
										</div> -->
										<div class="col-xs-12 col-sm-12 col-md-2">
											<i class="fa fa-2x fa-remove red page_delete ptll-left" table_id="<?php echo $page_info['id']; ?>" title="Do you want to remove this page from our database?" data-toggle="tooltip"></i>
										</div>
									</div>
									<br>
									<hr class="horizontal_break">
								<?php endforeach; ?>

								<br/>
								 
									<!-- Only shows for SociMarketer, hide for Fb Exciter -->
									<p class="existing_account"><?php echo $this->lang->line("group list"); ?></p>
									<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>
									<?php foreach($value['group_list'] as $group_info) : ?>
										<br>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-2">
												<img src="<?php echo $group_info['group_profile']; ?>" alt="" class='img-thumbnail'>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-7">
												<p style="padding-top:15px"><b><?php echo $this->lang->line("Name"); ?> : </b> <?php echo "<a target='BLANK' href='https://www.facebook.com/".$group_info['group_id']."'>".$group_info['group_name']."</a>"; ?></p>											
											</div>
											<div class="col-xs-12 col-sm-12 col-md-3">
												<i class="fa fa-2x fa-remove red group_delete" table_id="<?php echo $group_info['id']; ?>" title="Do you want to remove this group from our database?" data-toggle="tooltip"></i>
											</div>										
										</div>
										<br>
										<hr class="horizontal_break">
								<?php endforeach; ?>

							</div>

						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>

			<?php
				$i++;
				if($i%2 == 0)
					echo "</div><div class='row' style='padding:0 15px;'>";
				endforeach;				
			?>
			</div> 
		</div>
	<?php endif; ?>
</div>


<div class="modal fade" id="delete_confirmation" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="delete_confirmation_body">                

            </div>
        </div>
    </div>
</div>


<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip();
	});
	
	$j("document").ready(function() {

		var base_url = "<?php echo base_url(); ?>";

		$(".group_delete").click(function(){
			var ans = confirm('Do you want to delete this group from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var group_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_group_action',
				   data:{group_table_id:group_table_id},
				   success:function(response)
				    {
				        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$(".page_delete").click(function(){
			var ans = confirm('Do you want to delete this page from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var page_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_page_action',
				   data:{page_table_id:page_table_id},
				   success:function(response)
				    {
				        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$(".delete_account").click(function(){
			var ans = confirm('Do you want to delete this account from database?');
			if(ans)
			{
				$("#delete_confirmation_body").html('<img class="center-block" src="'+base_url+'assets/pre-loader/custom_lg.gif" alt="Processing..."><br/>');
				$("#delete_confirmation").modal();

				var user_table_id = $(this).attr('table_id');
				$.ajax
				({
				   type:'POST',
				   // async:false,
				   url:base_url+'facebook_rx_account_import/ajax_delete_account_action',
				   data:{user_table_id:user_table_id},
				   success:function(response)
				    {
				    	if(response == 'success')
				    	{
				    		var link="<?php echo site_url('home/logout'); ?>"; 
							window.location.assign(link);
				    	}
				    	else
					        $("#delete_confirmation_body").html(response);
				    }
				       
				});

			}
		});


		$('#delete_confirmation').on('hidden.bs.modal', function () { 
			location.reload(); 
		});


		$("#submit").click(function(){
			var fb_numeric_id = $("#fb_numeric_id").val().trim();
			if(fb_numeric_id == '')
			{
				alert("<?php echo $this->lang->line('Please Enter Your Facebook Numeric ID First'); ?>");
				return false;
			}

			var loading = '<br/><br/><img src="'+base_url+'assets/pre-loader/custom.gif" class="center-block"><br/>';
        	$("#response").html(loading);

			$.ajax
			({
			   type:'POST',
			   // async:false,
			   url:base_url+'facebook_rx_account_import/send_user_roll_access',
			   data:{fb_numeric_id:fb_numeric_id},
			   success:function(response)
			    {
			        $("#response").html(response);
			    }
			       
			});
		});

		
		$(document.body).on('click','#fb_confirm',function(){
			var loading = '<br/><br/><img src="'+base_url+'assets/pre-loader/custom.gif" class="center-block"><br/>';
        	$("#response").html(loading);
			$.ajax
			({
			   type:'POST',
			   // async:false,
			   url:base_url+'facebook_rx_account_import/ajax_get_login_button',
			   data:{},
			   success:function(response)
			    {
			        $("#response").html(response);
			    }
			       
			});
		});


	});
</script>