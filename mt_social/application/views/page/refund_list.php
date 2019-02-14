<br>
<div class="container-fluid">
 <div class="row">
    <div class="col-xs-12 col-md-6 border_gray grid_content padded background_white">
	    <h6 class="column-title"><i class="fa fa-list fa-2x blue">  <?php echo $this->lang->line("Refund Log"); ?></i></h6>
	    <div class="account-wall table-responsive" style="height: 500px;overflow-y: auto;"> 
	    	<?php 

		    $i=0;
	    	if(count($sales_data_raw)==0) echo "<div class='alert alert-warning'><i class='fa fa-remove'></i> No refund log.</div>";
	    	else 
	    	{?>
			    <table class="table table-bordered table-hover table-condensed log">
		    		<tr>
		    			<th>SL</th>
		    			<th>Product ID</th>
		    			<th>Product</th>		    			
		    			<th>Email</th>		    			
		    			<th>Type</th>
		    			<th>Time</th>
		    		</tr>
		         <?php 
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
		    			<td>'.$value['ccustemail'].'</td>
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
    $refund_count=$i;
    if($refund_count>0) $refund_count=round($refund_count/2);
    ?>


    <div class="col-xs-12 col-md-6 border_gray grid_content padded background_white">
	    <h6 class="column-title" style="width:100%"><i class="fa fa-sort-numeric-asc fa-2x blue pull-left"> <?php echo $this->lang->line("Refund Count"); ?> : <?php echo $refund_count; ?></i><div class="clearfix"></div></h6>
	    <div class="clearfix"></div>
	    <div class="account-wall table-responsive"> 
	    	<table class="table table-bordered table-hover">
	    		<tr>
	    			<th>SL</th>
	    			<th>Product</th>
	    			<th>Sales Count</th>
	    		</tr>
	         <?php 
	         $i=0;
	         foreach ($sales_data_count as $key => $value) 
	         {
	          	$i++;
	          	$ct=$value['count'];
	          	if($ct>0) $ct=round($ct/2);
	          	echo '
	          	<tr>
	    			<td>'.$i.'</th>
	    			<td>'.$value['display_name'].'</td>
	    			<td>'.$ct.'</td>
	    		</tr>';
	          	
	         }
	         ?>
	    	</table>
	    </div>
    </div>
 </div>
</div>
<div class="clearfix"></div>

<style type="text/css">
	.log td{font-size: 12px}
</style>

