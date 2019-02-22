<br>
<div class="container-fluid">
 <div class="row">
    <div class="col-xs-12 col-md-6 border_gray grid_content padded background_white">
	    <h6 class="column-title"><i class="fa fa-history fa-2x blue">  <?php echo $this->lang->line("Check Purchase History"); ?></i></h6>
	    <div class="account-wall table-responsive"> 
	    	<form action="<?php base_url('check_purchase/1717');?>" method="POST">
	    		<div class="form-group">
		           <div id='msg'></div>
		           <label class="col-xs-12" style="margin-left:0;padding-left:0;"><?php echo $this->lang->line("client email"); ?></label>
		           <input required type="email" class="form-control col-xs-12" id="email" name="email" placeholder="<?php echo $this->lang->line("input client email"); ?>">          
		        </div>       
		        <div class="form-group">
		          <button type="submit" id="submit" style="margin-top:20px" class="btn btn-primary btn-lg"><i class="fa fa-history"></i> <?php echo $this->lang->line("Show purchase history"); ?></button>
		          <span id='wait' ></span>  
		        </div>
	    	</form>
	    </div>
    </div>

    <?php 
    if($is_post==='1') 
    { ?>
		<div class="col-xs-12 col-md-6 border_gray grid_content padded background_white">
		    <h6 class="column-title"><i class="fa fa-sort-numeric-asc fa-2x blue">  <?php echo $this->lang->line("Purchase History"); ?> : <?php echo $email; ?></i></h6>
		    <div class="account-wall table-responsive"> 
		    	<?php 
		    	if(count($sales_data_raw)==0) echo "<div class='alert alert-warning'><i class='fa fa-remove'></i> No purchase history.</div>";
		    	else 
		    	{?>
			    	<table class="table table-bordered table-hover table-condensed log">
			    		<tr>
			    			<th>SL</th>
			    			<th>Product ID</th>
			    			<th>Product</th>
			    			<th>Type</th>
			    			<th>Purchased at</th>
			    		</tr>
			         <?php 
			         $i=0;
			         foreach ($sales_data_raw as $key => $value) 
			         {
			          	$i++;
			          	$date = new DateTime($value['insert_time']);
						$date->modify("+4 hours");
						$created_date=$date->format("d-m-y h:i:s A");
			          	echo '
			          	<tr>
			    			<td>'.$i.'</th>
			    			<td>'.$value['cproditem'].'</td>
			    			<td>'.$value['cprodtitle'].'</td>
			    			<td>'.$value['ctransaction'].'</td>
			    			<td>'.$created_date.'</td>
			    		</tr>';
			          	
			         } ?>
			    	</table>
			    <?php
			    } ?>
		    </div>
	    </div>
    <?php
    }
    ?>
 </div>
</div>
<div class="clearfix"></div>

<style type="text/css">
	.log td{font-size: 12px}
</style>