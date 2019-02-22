<?php $this->load->view('admin/theme/message'); ?>

<?php $cur_month=date("n"); ?>
<?php $cur_year=date("Y"); ?>
<?php 
if($cur_month==1) $month="January";
else if($cur_month==2) $month="February";
else if($cur_month==3) $month="March";
else if($cur_month==4) $month="April";
else if($cur_month==5) $month="May";
else if($cur_month==6) $month="June";
else if($cur_month==7) $month="July";
else if($cur_month==8) $month="August";
else if($cur_month==9) $month="September";
else if($cur_month==10) $month="October";
else if($cur_month==11) $month="November";
else if($cur_month==12) $month="December";

$unlimited_module_array=array(111,113);

$user_count_array=$this->basic->count_row("users");
$user_count=isset($user_count_array[0]['total_rows']) ? $user_count_array[0]['total_rows'] : 0;
$allowed_count_array=$this->basic->get_data("users",array("where"=>array("id"=>$this->session->userdata("user_id"))));
$allowed_count=isset($allowed_count_array[0]["user_limit"]) ? $allowed_count_array[0]["user_limit"] : 0;

?>

<!-- Main content -->
<section class="content-header">
	<h1 class = 'text-info'> <?php echo $this->lang->line("usage log");?> <!-- : <?php echo $this->lang->line($month)."-".$cur_year ?> --></h1>
</section>
<section class="content">  
	<div class="row" >
		<div class="col-xs-12">		

			
			<div class="grid_container well table-responsive" style="width:auto;background:#fff;border:1px solid #ccc;padding:20px">
				<h3 class='text-center'>
					<div class="well">			
				 	   <?php if($price=="Trial") $price=0; ?>
					   <?php echo $this->lang->line("package name")?> : 
					   <?php echo $package_name;?>
					   <!--  @ <?php echo $payment_config[0]['currency']; ?> <?php echo $price;?> /
					   <?php echo $validity;?> <?php echo $this->lang->line("days")?>	<br/><br/>
					   <?php echo $this->lang->line("expired date");?> : <?php echo date("Y-m-d",strtotime($this->session->userdata("expiry_date"))); ?> -->			
					</div>
				</h3>	
				<table class="table table-bordered">
	               		<tr class="warning">
	               			<th></th>
	               			<th><?php echo $this->lang->line("Modules");?></th>
	               			<th class="text-center"><?php echo $this->lang->line("Limit");?></th>
	               			<th class="text-center"><?php echo $this->lang->line("Used");?></th>
	               		</tr>
	               	 	<?php 
	               	 	$i=0;	               	 	
	               	 	foreach($info as $row)
	               	 	{
		               	 	$i++;
		               	 	$row_class="";
		               	 	if(in_array($row["module_id"],$this->module_access)) $row_class="allowed";
		               	 	echo "<tr class='".$row_class."'>";
		               	 		echo "<td class='text-center'>";
			               	 		echo $i;
			               	 	echo "</td>";
			               	 	echo "<td>";
			               	 		echo $this->lang->line($row["module_name"]);
			               	 	echo "</td>";

			               	 	$str="";
		               	 		if(!in_array($row["module_id"],$this->module_access)) // no access and skip
		               	 		{
		               	 			$str="<i class='fa fa-remove'></i>";
		               	 			echo "<td colspan='3' class='text-center'>{$str}</td>";
			               	 		echo "</tr>";
			               	 		continue;
		               	 		}
		               	 	
			               	 			               	 		
			               	 	if(in_array($row["module_id"], $unlimited_module_array))
			               	 	{
			               	 		echo "<td class='text-center'>".$this->lang->line("unlimited")."</td>";
			               	 	}
		               	 		else
		               	 		{
		               	 			echo "<td class='text-center'>";
		               	 			if($monthly_limit[$row["module_id"]]=="0") $monthly_limit[$row["module_id"]]=$this->lang->line("unlimited");
		               	 			if(isset($monthly_limit[$row["module_id"]])) 
		               	 			{
		               	 				echo $monthly_limit[$row["module_id"]];
		               	 				if($monthly_limit[$row["module_id"]]!=$this->lang->line("unlimited"))
		               	 				echo " ".$this->lang->line($row["extra_text"]);
		               	 			}
		               	 			echo "</td>";
		               	 		}



			               	 	echo "<td class='text-center' >";
			               	 		if(in_array($row["module_id"], $unlimited_module_array))
				               	 	{
				               	 		echo "";
				               	 	}
			               	 		else
			               	 		{
			               	 			if($str!="") echo $str;
				               	 		else
				               	 		{
				               	 			if(isset($row["usage_count"])) echo $row["usage_count"];
				               	 			else echo "0";
				               	 		}
			               	 		}
			               	 	echo "</td>";


		               	 	echo "</tr>";
	               	 	} 
	               	 	?>
	              </table>                      
			</div>

		</div>        
	</div> 
</section>

<style>
	.allowed td,.allowed th{font-weight: bold;font-size:14px;background: #fcfcfc;}
</style>