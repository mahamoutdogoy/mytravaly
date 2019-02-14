<style>

.table-bordered,  .table-bordered tr td, .table-bordered tr th {
    border-collapse: collapse !important;
    border: 1px solid #ccc !important;
}

.table-bordered tr.head {
	background-color: #efefef;
	background: -webkit-linear-gradient(top,#F9F9F9 0,#efefef 100%);
	background: -moz-linear-gradient(top,#F9F9F9 0,#efefef 100%);
	background: -o-linear-gradient(top,#F9F9F9 0,#efefef 100%);
	background: linear-gradient(to bottom,#F9F9F9 0,#efefef 100%);
	background-repeat: repeat-x;
}

.table-bordered tr.head th {
	font-size: 15px;
	padding-top: 13px;
	padding-bottom: 13px;
}	


</style>

<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">
     	<div class="box box-info custom_box">
		    	<div class="box-header">
		         <h3 class="box-title"><i class="fa fa-angle-double-up"></i> <?php echo $this->config->item('product_short_name').' '.$this->lang->line("updates");?></h3>
		        </div><!-- /.box-header -->

		        <div class="box-body">		        	
		        	<?php
		        		if(count($update_versions) > 0) :
		        	?>
		        			<h4 style='margin-top: 0px;'><?php echo $this->lang->line('your current version is');?> <b><?php echo $current_version; ?></b>. <?php echo $this->lang->line('there are follwoing updates avaibale for you:') ?></h4>
				        	<table class='table table-bordered'>
				        		<tr class='head'>
				        			<th><?php echo $this->lang->line('product');?></th>
				        			<th style='text-align: center;'><?php echo $this->lang->line('version');?></th>
				        			<th style='text-align: center;'><?php echo $this->lang->line('update log');?></th>
				        			<th style='text-align: center;'><?php echo $this->lang->line('action');?></th>
				        		</tr>

					        	<?php
					        		$i = 1;
					        		foreach($update_versions as $update_version) :
					        			$files_replaces = json_decode($update_version->f_source_and_replace);
					        			$sql_cmd_array = explode(';', $update_version->sql_cmd);
					        			$modal = "modal" . $i;
					        	?>		
					        			<tr>
					        				<td><?php echo $update_version->name; ?></td>
					        				<td style='text-align: center;'><b style='font-size: 20px'><?php echo $update_version->version; ?></b></td>
					        				<td style='text-align: center;'>
					        					<button class='btn btn-info' data-toggle="modal" data-target="#<?php echo $modal; ?>"><i class='fa fa-eye'></i> <?php echo $this->lang->line('see log');?></button>
					        					<!-- Modal -->
					        					<div id="<?php echo $modal; ?>" class="modal fade" role="dialog">
					        					  <div class="modal-dialog modal-lg">

					        					    <!-- Modal content-->
					        					    <div class="modal-content">
					        					      <div class="modal-header">
					        					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        					        <h4 class="modal-title"><?php echo $update_version->name; ?> <?php echo $update_version->version; ?> ( <?php echo $this->lang->line('update log');?> )</h4>
					        					      </div>
					        					      <div class="modal-body" style='text-align: left'>
					        					      	<?php 
					        					      		if(count($files_replaces) > 0) : 
					        					      	?>
					        					        		<h4><?php echo $this->lang->line('files');?></h4>
					        					        		<?php 
					        					        			foreach($files_replaces as $file) :
					        					        		?>
					        					        			<li><?php echo $file[1]; ?></li>
					        					        		<?php
					        					        			endforeach;
					        					        		?>
					        					        <?php
					        					        	endif;

					        					        	if(count($sql_cmd_array) > 1) :
					        					        	echo "<hr><h4>".$this->lang->line('SQL')."</h4>";
				        					        		$j = 1;
					        					        	foreach($sql_cmd_array as $single_cmd) :
					        					        		if($j < count($sql_cmd_array)) :
					        					        			$semicolon = ';';
					        					        		else :
					        					        			$semicolon = '';
					        					        		endif;	
					        					        ?>
					        					        	<p><?php echo $single_cmd . $semicolon; ?></p>
					        					        <?php
					        					        		$j++;
					        					        	endforeach;
					        					        	else :
					        					        		if($update_version->sql_cmd != '') :
					        					        			echo "<hr><h4>".$this->lang->line('SQL')."</h4>";
					        					        			echo "<p>" . $update_version->sql_cmd . "</p>";
					        					        		endif;	
					        					        	endif;
					        					        ?>


					        					      </div>
					        					    </div>

					        					  </div>
					        					</div>
					        				</td>
					        				<td style='text-align: center;'>
					        					<?php
					        						if($i == 1) :
					        					?>
				        							<button class='btn btn-warning update' updateid="<?php echo $update_version->id; ?>" version="<?php echo $update_version->version; ?>"><i class="fa fa-angle-double-up"></i> <?php echo $this->lang->line('update');?></button>
					        					<?php
					        						else :
					        					?>
					        							<button disabled='disabled' class='btn btn-warning update' updateid="<?php echo $update_version->id; ?>" version="<?php echo $update_version->version; ?>"><i class="fa fa-angle-double-up"></i> <?php echo $this->lang->line('update');?></button>
					        					<?php
					        						endif;
					        					?>
					        				</td>
					        			</tr>
					        	<?php
					        			$i++;
					        		endforeach;
					        	?>

				        	</table>
		        	<?php	
		        		else :
		        	?>
		        			<h4 style='margin-top: 0px;'><?php echo $this->lang->line('your current version is');?> <b><?php echo $current_version; ?></b>. <?php echo $this->lang->line("no update available for you, you are already using lastest version.") ?></h4>
		        	<?php		        			
		        		endif;
		        	?>
		        </div>  
     	</div>


     	<?php
     		foreach($add_ons as $add_on) :

     			if(isset($add_on_update_versions[$add_on['id']])) :
     				$this_update_version = $add_on_update_versions[$add_on['id']];
     			else :
     				$this_update_version = array();
     			endif;	

     	?>


     		     	<div class="box box-info custom_box">
     				    	<div class="box-header">
     				         <h3 class="box-title"><i class="fa fa-angle-double-up"></i> <?php echo $add_on['add_on_name'].' '.$this->lang->line("updates");?></h3>
     				        </div><!-- /.box-header -->

     				        <div class="box-body">		        	
     				        	<?php
     				        		if(count($this_update_version) > 0) :
     				        	?>
     				        			<h4 style='margin-top: 0px;'><?php echo $this->lang->line('your current version is');?> <b><?php echo $add_on['version']; ?></b>. <?php echo $this->lang->line('there are follwoing updates avaibale for you:') ?></h4>
     						        	<table class='table table-bordered'>
     						        		<tr class='head'>
     						        			<th><?php echo $this->lang->line('product');?></th>
     						        			<th style='text-align: center;'><?php echo $this->lang->line('version');?></th>
     						        			<th style='text-align: center;'><?php echo $this->lang->line('update log');?></th>
     						        			<th style='text-align: center;'><?php echo $this->lang->line('action');?></th>
     						        		</tr>

     							        	<?php
     							        		$k = 1;
     							        		foreach($this_update_version as $add_on_update_version) :
     							        			$add_on_files_replaces = json_decode($add_on_update_version->f_source_and_replace);
     							        			$add_on_sql_cmd_array = explode(';', $add_on_update_version->sql_cmd);
     							        			$modal = "modal-addon-" . $add_on_update_version->id . '-' . $k;
     							        	?>		
     							        			<tr>
     							        				<td><?php echo $add_on_update_version->name; ?></td>
     							        				<td style='text-align: center;'><b style='font-size: 20px'><?php echo $add_on_update_version->version; ?></b></td>
     							        				<td style='text-align: center;'>
     							        					<button class='btn btn-info' data-toggle="modal" data-target="#<?php echo $modal; ?>"><i class='fa fa-eye'></i> <?php echo $this->lang->line('see log');?></button>
     							        					<!-- Modal -->
     							        					<div id="<?php echo $modal; ?>" class="modal fade" role="dialog">
     							        					  <div class="modal-dialog modal-lg">

     							        					    <!-- Modal content-->
     							        					    <div class="modal-content">
     							        					      <div class="modal-header">
     							        					        <button type="button" class="close" data-dismiss="modal">&times;</button>
     							        					        <h4 class="modal-title"><?php echo $add_on_update_version->name; ?> <?php echo $add_on_update_version->version; ?> ( <?php echo $this->lang->line('update log');?> )</h4>
     							        					      </div>
     							        					      <div class="modal-body" style='text-align: left'>
     							        					      	<?php 
     							        					      		if(count($add_on_files_replaces) > 0) : 
     							        					      	?>
     							        					        		<h4><?php echo $this->lang->line('files');?></h4>
     							        					        		<?php 
     							        					        			foreach($add_on_files_replaces as $add_on_file) :
     							        					        		?>
     							        					        			<li><?php echo $add_on_file[1]; ?></li>
     							        					        		<?php
     							        					        			endforeach;
     							        					        		?>
     							        					        <?php
     							        					        	endif;

     							        					        	if(count($add_on_sql_cmd_array) > 1) :
     							        					        	echo "<hr><h4>".$this->lang->line('SQL')."</h4>";
     						        					        		$l = 1;
     							        					        	foreach($add_on_sql_cmd_array as $add_on_single_cmd) :
     							        					        		if($l < count($add_on_sql_cmd_array)) :
     							        					        			$semicolon = ';';
     							        					        		else :
     							        					        			$semicolon = '';
     							        					        		endif;	
     							        					        ?>
     							        					        	<p><?php echo $add_on_single_cmd . $semicolon; ?></p>
     							        					        <?php
     							        					        		$l++;
     							        					        	endforeach;
     							        					        	else :
     							        					        		if($add_on_update_version->sql_cmd != '') :
     							        					        			echo "<hr><h4>".$this->lang->line('SQL')."</h4>";
     							        					        			echo "<p>" . $add_on_update_version->sql_cmd . "</p>";
     							        					        		endif;	
     							        					        	endif;
     							        					        ?>


     							        					      </div>
     							        					    </div>

     							        					  </div>
     							        					</div>
     							        				</td>
     							        				<td style='text-align: center;'>
     							        					<?php
     							        						if($k == 1) :
     							        					?>
     						        							<button id="<?php echo 'addonupdate' . $add_on['id']; ?>" class='btn btn-warning' folder="<?php echo $add_on['unique_name']; ?>" updateid="<?php echo $add_on_update_version->id; ?>" version="<?php echo $add_on_update_version->version; ?>"><i class="fa fa-angle-double-up"></i> <?php echo $this->lang->line('update');?></button>
     							        					<?php
     							        						else :
     							        					?>
     							        							<button disabled='disabled' class='btn btn-warning' updateid="<?php echo $add_on_update_version->id; ?>" version="<?php echo $add_on_update_version->version; ?>"><i class="fa fa-angle-double-up"></i> <?php echo $this->lang->line('update');?></button>
     							        					<?php
     							        						endif;
     							        					?>
     							        				</td>
     							        			</tr>
     							        	<?php
     							        			$k++;
     							        		endforeach;
     							        	?>

     						        	</table>
     				        	<?php	
     				        		else :
     				        	?>
     				        			<h4 style='margin-top: 0px;'><?php echo $this->lang->line('your current version is');?> <b><?php echo $add_on['version']; ?></b>. <?php echo $this->lang->line("no update available for you, you are already using lastest version.") ?></h4>
     				        	<?php		        			
     				        		endif;
     				        	?>
     				        </div>  
     		     	</div>


     	<?php

     		endforeach;

     	?>

   </section>
</section>

<?php
	$send_files = json_encode(array());
	$send_sql = json_encode(array());
	if(isset($update_versions[0]))
	{
		$send_files = $update_versions[0]->f_source_and_replace;
		$send_sql = json_encode(explode(';',$update_versions[0]->sql_cmd));
	}
?>
<script>
	$j(document).ready(function()
	{
		$('.update').click(function()
		{
			var ans=confirm("<?php echo $this->lang->line('are you sure');?>?");

			if(!ans) return false;

			if($(this).is('[disabled=disabled]') == false)
			{				
				$("#update_success").modal();
				var warning_msg="<?php echo $this->lang->line('do not close this window or refresh page untill update done.');?>";
				var loading = warning_msg+'<br/><br/><img src="'+"<?php echo site_url();?>"+'assets/pre-loader/Fading squares2.gif" class="center-block">';
       			$("#update_success_content").attr('class','text-center').html(loading);

				var updateVersionId = $(this).attr('updateid');
				var version = $(this).attr('version');

				var files = <?php echo $send_files; ?>;
				var sql = <?php echo $send_sql; ?>;

				var data = {"update_version_id" : updateVersionId,"version" : version,"files" : files,"sql" : sql};

				$.ajax({
                    type: "POST",
					data: data,
					url: "<?php echo site_url() . 'update_system/initialize_update/';?>",
					dataType: 'JSON',
					success : function(response)
					{
						var what_class="";
						if(response.status=='1') what_class='alert alert-success text-center';
						else what_class='alert alert-danger text-center';
						$("#update_success_content").attr('class',what_class).html(response.message);
					}
				})
				
			}
		});

		<?php

			foreach($add_ons as $add_on) :

				if(isset($add_on_update_versions[$add_on['id']][0]->f_source_and_replace)) :

				$add_on_send_files = $add_on_update_versions[$add_on['id']][0]->f_source_and_replace;
				$add_on_send_sql = json_encode(explode(';', $add_on_update_versions[$add_on['id']][0]->sql_cmd));

		?>

		$("<?php echo '#addonupdate' . $add_on['id']; ?>").click(function()
		{
			var ans=confirm("<?php echo $this->lang->line('are you sure');?>?");

			if(!ans) return false;

			if($(this).is('[disabled=disabled]') == false)
			{				
				$("#update_success").modal();
				var warning_msg="<?php echo $this->lang->line('do not close this window or refresh page untill update done.');?>";
				var loading = warning_msg+'<br/><br/><img src="'+"<?php echo site_url();?>"+'assets/pre-loader/Fading squares2.gif" class="center-block">';
       			$("#update_success_content").attr('class','text-center').html(loading);

				var updateVersionId = $(this).attr('updateid');
				var version = $(this).attr('version');
				var folder = $(this).attr('folder');

				var files = <?php echo $add_on_send_files; ?>;
				var sql = <?php echo $add_on_send_sql; ?>;

				var data = {"update_version_id" : updateVersionId,"version" : version,"folder" : folder,"files" : files,"sql" : sql};

				$.ajax({
                    type: "POST",
					data: data,
					url: "<?php echo site_url() . 'update_system/addon_initialize_update/';?>",
					dataType: 'JSON',
					success : function(response)
					{
						var what_class="";
						if(response.status=='1') what_class='alert alert-success text-center';
						else what_class='alert alert-danger text-center';
						$("#update_success_content").attr('class',what_class).html(response.message);
					}
				})
				
			}
		});

		<?php
				endif;
			endforeach;

		?>	

		$('#update_success').on('hidden.bs.modal', function () { 
			location.reload(); 
		})
	});
</script>


<div class="modal fade" id="update_success" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $this->lang->line('system update');?></h4>
			</div>
			<div class="modal-body">
				<div id="update_success_content"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>