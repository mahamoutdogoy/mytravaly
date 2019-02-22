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

		padding-left: 20px;

		list-style: none;

	}

</style>

<?php 

if($this->session->userdata("user_type")=="Admin" || in_array(65,  $this->module_access)) $fb_access=true; else $fb_access=false;

if($this->session->userdata("user_type")=="Admin" || in_array(104, $this->module_access)) $li_access=true; else $li_access=false;

if($this->session->userdata("user_type")=="Admin" || in_array(105, $this->module_access)) $pt_access=true; else $pt_access=false;

if($this->session->userdata("user_type")=="Admin" || in_array(106, $this->module_access)) $tm_access=true; else $tm_access=false;

if($this->session->userdata("user_type")=="Admin" || in_array(107, $this->module_access)) $tw_access=true; else $tw_access=false;

?>



<h2 style="margin:0;">

<div class="well text-center blue" style="border-radius: 0;background: #fff !important;">

    <i class="fa fa-download"></i> <?php echo $this->lang->line("Import Social Accounts");?>

</div>

</h2>



<?php 

if($this->session->userdata('limit_cross') != '')

{

	echo "<h4 style='margin:0'><div class='alert alert-danger text-center'><i class='fa fa-remove'></i> ".$this->session->userdata('limit_cross')."</div></h4>";

	$this->session->unset_userdata('limit_cross');

}

?>



<div class="container-fluid">

	<br>



	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-6">

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

			  <div class="panel panel-primary">

			    <div class="panel-heading" role="tab" id="headingTwo">

			      <h4 class="panel-title">

			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#twitter" aria-expanded="false" aria-controls="twitter">

			          <i class="fa fa-twitter"></i> Twitter

			        </a>

			      </h4>

			    </div>

			    <div id="twitter" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

			      <div class="panel-body" style="height: 200px !important; overflow-y: auto;">

			        <div class="col-xs-12">

			        	<div class="row">

			        		<?php if($tw_access) :?><a class="btn btn-default" href="<?php echo base_url().'imgclick/twitter_login_action'; ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line("Add New Account");?></a><br/><?php endif; ?>

			        		

			        		<p class="existing_account"><?php echo $this->lang->line('Existing Accounts');?></p>

			        		<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>

			        		<div class="account_list">

			        			<?php foreach($twitter_account_list as $value): ?>

			        				<p class="individual_account_name">

			        					<i class="fa fa-close red delete_account" data-placement="right" data-toggle="tooltip" style="cursor: pointer" table_and_id="<?php echo 'rx_twitter_atuopost-'.$value['id'];?>" title="<?php echo $this->lang->line('Do you want to delete this account?');?>"></i> 

			        					<i class="fa fa-clone"></i> 

			        					<?php echo $value['screen_name']; ?>

			        				</p>

			        			<?php endforeach; ?>

			        		</div>

			        	</div><!-- /.row -->

			        </div>

			      </div>

			    </div>

			  </div>

			  <div class="panel panel-primary">

			    <div class="panel-heading" role="tab" id="headingThree">

			      <h4 class="panel-title">

			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#linkedin" aria-expanded="false" aria-controls="linkedin">

			          <i class="fa fa-linkedin-square"></i> Linkedin

			        </a>

			      </h4>

			    </div>

			    <div id="linkedin" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">

			      <div class="panel-body"  style="height: 200px !important; overflow-y: auto;">

			        <div class="col-xs-12">

			        	<div class="row">

			        		<?php if($li_access) :?><?php echo $linkedin_button; ?><br/><?php endif; ?>

			        		

			        		<p class="existing_account"><?php echo $this->lang->line('Existing Accounts');?></p>

			        		<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>

			        		<div class="account_list">

			        			<?php foreach($linkedin_account_list as $value): ?>

			        				<p class="individual_account_name">

			        					<i class="fa fa-close red delete_account" data-placement="right" data-toggle="tooltip" style="cursor: pointer" table_and_id="<?php echo 'rx_linkedin_autopost-'.$value['id'];?>" title="<?php echo $this->lang->line('Do you want to delete this account?');?>"></i> 

			        					<i class="fa fa-clone"></i> 

			        					<?php echo $value['first_name']." ".$value['last_name']; ?>

			        				</p>

			        			<?php endforeach; ?>

			        		</div>

			        	</div><!-- /.row -->

			        </div>

			      </div>

			    </div>

			  </div>			 

			</div>

		</div>



		<div class="col-xs-12 col-sm-12 col-md-6">

			<div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">	

			  <div class="panel panel-primary">

			    <div class="panel-heading" role="tab" id="headingNine">

			      <h4 class="panel-title">

			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#pinterest" aria-expanded="false" aria-controls="pinterest">

			          <i class="fa fa-pinterest-square"></i> Pinterest

			        </a>

			      </h4>

			    </div>

			    <div id="pinterest" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingNine">

			      <div class="panel-body"  style="height: 200px !important; overflow-y: auto;">

			        <div class="col-xs-12">

						<div class="row">

							<?php if($pt_access) :?><?php echo $pinterest_login_button; ?><br/><?php endif; ?>

							

							<p class="existing_account"><?php echo $this->lang->line('Existing Accounts');?></p>

							<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>

							<?php foreach($pinterest_info as $value): ?>

								

								<p class="individual_account_name">

									<i class="fa fa-close red delete_account" table_and_id="<?php echo 'pinterest_config-'.$value['pinterest_autopost_table_id']; ?>"  data-placement="right" data-toggle="tooltip" style="cursor: pointer" title="<?php echo $this->lang->line('Do you want to delete this account?');?>"></i> 

									<i class="fa fa-clone"></i> <?php echo $value['name']; ?>

								</p>

								<ul class="padded_ul">						

									<?php foreach($value['pinterest_info'] as $info): ?>

										<li><i class="fa fa-close red delete_account" table_and_id="<?php echo 'rx_pinterest_info-'.$info['table_id']; ?>"  data-placement="right" data-toggle="tooltip" style="cursor: pointer" title="<?php echo $this->lang->line('Do you want to delete this account?');?>"></i> 

										<?php echo $info['board_name']; ?></li>

									<?php endforeach; ?>

								</ul>

							<?php endforeach; ?>



						</div><!-- /.row -->

					</div>

			      </div>

			    </div>

			  </div>		

	

			  <div class="panel panel-primary">

			    <div class="panel-heading" role="tab" id="headingFour">

			      <h4 class="panel-title">

			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#tumblr" aria-expanded="false" aria-controls="tumblr">

			          <i class="fa fa-tumblr"></i> Tumblr

			        </a>

			      </h4>

			    </div>

			    <div id="tumblr" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">

			      <div class="panel-body"  style="height: 200px !important; overflow-y: auto;">

			        <div class="col-xs-12">

						<div class="row">

							<?php if($tm_access) :?><a class="btn btn-default" href="<?php echo base_url().'imgclick/tumblr_login_action'; ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line("Add New Account");?></a><br/><?php endif; ?>

							

							<p class="existing_account"><?php echo $this->lang->line('Existing Accounts');?></p>

							<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>

							<div class="account_list">

								<?php foreach($tumblr_account_list as $value): ?>

									<p class="individual_account_name">

										<i class="fa fa-close red delete_account" table_and_id="<?php echo 'rx_tumblr_autopost-'.$value['id'];?>" data-placement="right" data-toggle="tooltip" style="cursor: pointer" title="<?php echo $this->lang->line('Do you want to delete this account?');?>"></i> 

										<i class="fa fa-clone"></i> 

										<?php echo $value['user_name']; ?>

									</p>

								<?php endforeach; ?>

							</div>



						</div>

					</div>

			      </div>

			    </div>

			  </div>

			</div>

		</div>

	</div>



		<div class="row">

		<div class="col-xs-12">

			<div class="box box-primary box-solid">

				<div class="box-header with-border">

				<h3 class="box-title"><i class="fa fa-facebook-square"></i> Facebook</h3>

					<div class="box-tools pull-right">

						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

					</div><!-- /.box-tools -->

				</div><!-- /.box-header -->

				<div class="box-body chart-responsive" style="height: 400px; overflow-y: auto; overflow-x: hidden;">

					<div class="col-xs-12">

						<div class="row clearfix">

							<?php if($fb_access) :?><a class="btn btn-default" href="<?php echo base_url('facebook_rx_account_import/index'); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line("Add New Account");?></a><?php endif; ?>

							<p class="existing_account"><?php echo $this->lang->line('Existing Accounts');?></p>

							<div class="custom_progress"><div class="custom_progress_bar" style="width: 70%"></div></div>

							

								<?php if($existing_accounts != '0') : ?>

								<div>

									<div class="row" style="padding:0 15px;">

									<?php $i=0; foreach($existing_accounts as $value) : ?>

										<div class="col-xs-12"><i class="fa fa-remove delete_fb_account red" title="<?php echo $this->lang->line('Do you want to remove this account from our database? Deleting facebook account will log you out.');?>" data-placement="right" data-toggle="tooltip" style="cursor: pointer" table_id="<?php echo $value['userinfo_table_id']; ?>"></i> <i class="fa fa-clone"></i> <b><?php echo $value['name']; ?></b> </div>

										<div class="col-xs-12 col-sm-12 col-md-6">

											<ul style="list-style: none;">

												<li> <b><?php echo $this->lang->line("Pages");?></b>:

													<ul style="list-style: none;">

														<?php foreach($value['page_list'] as $page_info) : ?>

															<li><i class="fa fa-remove red page_delete ptll-left" table_id="<?php echo $page_info['id']; ?>" title="<?php echo $this->lang->line('Do you want to remove this page from our database?');?>" data-placement="top" data-toggle="tooltip" style="cursor: pointer"></i> <?php echo $page_info['page_name']; ?></li>

														<?php endforeach; ?>

													</ul>

												</li>

											</ul>

										</div>

											

										<div class="col-xs-12 col-sm-12 col-md-6">

											<ul style="list-style: none;">	

												<li> <b><?php echo $this->lang->line("Groups");?></b>:

													<ul style="list-style: none;">

														<?php foreach($value['group_list'] as $group_info) : ?>

															<li><i class="fa fa-remove red group_delete" table_id="<?php echo $group_info['id']; ?>" title="<?php echo $this->lang->line('Do you want to remove this group from our database?');?>" data-placement="left" data-toggle="tooltip" style="cursor:pointer"></i>  <?php echo $group_info['group_name']; ?></li>

														<?php endforeach; ?>

													</ul>

												</li>

											</ul>

										</div>

										<div class="col-xs-12"><hr></div>

										<?php endforeach; ?>

									</div> 

								</div>

							<?php endif; ?>



						</div><!-- /.row -->

					</div>



				</div><!-- /.box-body -->

			</div><!-- /.box -->

		</div>

	</div>





</div>





<script>

	$j("document").ready(function(){



        var base_url = "<?php echo base_url(); ?>";



        $(".delete_account").click(function(){

        	var ans = confirm("Are you sure, you want to delete this account?");

        	if(ans)

        	{

        		var table_and_id = $(this).attr('table_and_id');        		

        		$.ajax

	            ({

	               type:'POST',

	               async:false,

	               url:base_url+'imgclick/ajax_delete_social_account',

	               data:{table_and_id:table_and_id},

	               success:function(response)

	                {

	                	if(response == 'success')

	                    	location.reload();

	                    else 

	                    	alert("Something went wrong, please try agian.");               

	                }                   

	            });

        	}

        });



    });

</script>









<script>

  $colorbox(document).bind("cbox_complete", function(){

  if($("#cboxTitle").height() > 20){

  $("#cboxTitle").hide();

  $("#cboxLoadedContent").append(""+$("#cboxTitle").html()+"").css({color: $("#cboxTitle").css("color")});

  }

  });

  

  

  var width=$(window).width();

  var a;

  var b;



  if(width<400) a=90;

  else a= 55;



  b= 9*a/16;

  var iframe_width=width*a/100;

  var iframe_height=iframe_width*b/a;

  $colorbox(".youtube").colorbox({iframe:true, innerWidth:iframe_width, innerHeight:iframe_height});

  

</script>





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





		$(".delete_fb_account").click(function(){

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





	});

</script>





<div class="modal fade" id="delete_confirmation" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title text-center"><?php echo $this->lang->line("Delete Confirmation");?></h4>

            </div>

            <div class="modal-body" id="delete_confirmation_body">                



            </div>

        </div>

    </div>

</div>



<style type="text/css">

	.fa-remove,.fa-close{cursor: pointer}

</style>