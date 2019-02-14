<?php 
$share_date=json_decode($info[0]["post_report"],true);
if(!is_array($share_date)) $share_date=array();

?>
<div class="clearfix"></div>
<div style="margin:10px 20px">
    <div class="box box-info">
        <div class="box-body">
            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;" class="blue">
                 <?php echo $info[0]["campaign_name"];?>
            </h4>
            <div class="media">
                <div class="media-left hidden-xs">
                     <img src="<?php echo $info[0]["image"];?>" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                </div>
                <div class="media-body">
                	<div class="clearfix"></div>
                    <p class="pull-right">
                    	 <?php 
	                      if($info[0]['posting_status']=="0") echo "<span class='label label-danger'><i class='fa fa-clock-o'></i> ".$this->lang->line("Pending")."</span>";
	                      else if($info[0]['posting_status']=="1") echo "<span class='label label-warning'><i class='fa fa-spinner'></i> ".$this->lang->line("Processing")."</span>";
	                      else echo "<span class='label label-success'><i class='fa fa-check'></i> ".$this->lang->line("Completed")."</span>"; 
	                     ?> 
	                     <br>
                        <?php if($info[0]["tracking_enabled"]=='1') : ?>
                    	<a href="<?php echo base_url("imgclick/traffic_report/".$info[0]["id"]); ?>" class="btn btn-warning btn-sm" style="margin-top:10px;">
                        	<i class="fa fa fa-line-chart"></i> <?php echo $this->lang->line("traffic report");?>
                    	</a>
                    	<?php endif; ?>
                    </p>

                    <h5 style="margin-top: 0"><i class="fa fa-code margin-r5"></i> <b><?php echo $this->lang->line("Tracking Code");?></b> : <?php echo $info[0]['tracking_code'];?></h5>

                    <p><i class="fa fa-clock-o margin-r5"></i> <b><?php echo $this->lang->line("Schedule Type");?></b> : <?php echo $this->lang->line($info[0]['schedule_type']);?></p>
                    <p style="margin-bottom: 0">
                        <i class="fa fa-link margin-r5"></i> <b><?php echo $this->lang->line("Post Link");?></b> : <a target="_BLANK" href="<?php echo $info[0]['post_link'];?>"><?php echo $this->lang->line("Visit");?></a>
                    </p> 
            	</div>
            </div>
        </div>
    </div>	 

    <ul class="todo-list ui-sortable">
        <li>
          <span class="handle ui-sortable-handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>         
          <span class=""><?php echo $this->lang->line("Link Title");?> : <?php echo $info[0]['title']; ?></span>                 
        </li>
         <li>
          <span class="handle ui-sortable-handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>         
          <span class=""><?php echo $this->lang->line("Link Description");?> : <?php echo nl2br($info[0]['description']); ?></span>                 
        </li>
         <li>
          <span class="handle ui-sortable-handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>         
          <span class=""><?php echo $this->lang->line("Post Content");?> : <?php echo nl2br($info[0]['message']); ?></span>                 
        </li>
         <li>
          <span class="handle ui-sortable-handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
              </span>         
          <span class="">
          <?php echo $this->lang->line("Scheduled at");?> :
          <?php 
			if($info[0]['schedule_type']=='later') 
			{
				echo $info[0]['schedule_time']; echo "[".$info[0]['time_zone']."]"; 
			}
			else echo $this->lang->line("N/A");  ?> 
          </span>                 
        </li>
  	</ul>	
    <br><br>

    <div class="tabs-below">    
        <ul class="nav nav-tabs" role="tablist">
        	<?php 
        	$i=0;
        	foreach($share_date as $key=>$value)
        	{  $temp=$key; ?>
        		<li <?php if($i==0) echo 'class="active"';?> role="presentation">
        		<a href="#<?php echo $temp;?>" aria-controls="<?php echo $temp;?>" role="tab" data-toggle="tab">
        			<?php echo $temp;?>							
        		</a>
        		</li>
        	<?php
        	$i++;
        	} ?>
        </ul>

        <div class="tab-content">
        	<?php if(empty($share_date)) echo "<h4 class='text-center'>".$this->lang->line('no social post data to show')."</h4>";?>
        
        	<?php
        	$i=0;
        	foreach($share_date as $key=>$value)
        	{ $temp=$key;?>
        		<div role="tabpanel" class="tab-pane <?php if($i==0) echo 'active';?>" id="<?php echo $temp;?>">
        		<?php
        		echo "<br/>";
        		foreach ($value as $key2 => $value2) 
        		{ ?>
        			<blockquote>
        				<p>
        					<?php
        					echo $value2["display_name"]." : ";
        					if(substr($value2["report"], 0,4)=="http")
        					echo "<a href='".$value2["report"]."' target='_BLANK'>".$value2["report"]."</a>";
        					else echo "<span class='red'>".$value2["report"]."</span>";
        					?>
        				</p>
        			</blockquote> <?php
        		}
        		?>
        		</div>					    
        	<?php
        	$i++;
        	} ?>
        </div>
	</div>
</div>


<div class="clearfix"></div>
<br><br>
<style type="text/css">
    blockquote{border-left-color: #337ab7;}
</style>

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


<style type="text/css">
	.todo-list li{background: #fff;}
</style>