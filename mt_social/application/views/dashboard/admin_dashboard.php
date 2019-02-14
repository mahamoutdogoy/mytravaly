<!-- JS for country map -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php if($this->session->userdata('user_type') == 'Admin' || in_array(111,$this->module_access)) 
{
	$tracking_access='1';
	$height='280px'; 
	$bar_chart_col_left="col-md-6 col-lg-6";	
}
else 
{
	$tracking_access='0';
	$height='230px';
	$bar_chart_col_left="col-md-12 col-lg-12";				
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h2 class='dashboard-title'><i class='fa fa-dashboard'></i> <?php echo $this->lang->line("All Reports are generated from last 30 days data"); ?></h2>
		</div>	
	</div>


	<div id='dashboard-top' class="row">

		<?php if($tracking_access=='1') : ?>
		<div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-send"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("Total Social Post"); ?></span>
              <span class="info-box-number"><?php echo $info["total_post_count"]; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-hand-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("Total Click"); ?></span>
              <span class="info-box-number"><?php echo $info["total_click_count"]; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-calculator"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("Average Click/Day"); ?></span>
              <span class="info-box-number"><?php echo $info["avg_click_per_day"]; ?></span>
            </div>
          </div>
        </div>
    	<?php endif; ?>


    	<div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-bullhorn"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("total campaign"); ?></span>
              <span class="info-box-number"><?php echo $info["total_campaign_count"]; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-check-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("completed campaign"); ?></span>
              <span class="info-box-number"><?php echo $info["completed_campaign_count"]; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-hourglass"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $this->lang->line("pending campaign"); ?></span>
              <span class="info-box-number"><?php echo $info["pending_campaign_count"]; ?></span>
            </div>
          </div>
        </div>


	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line("Recent Campaign"); ?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>				
				<div class="box-body"  style="background: #fafafa">
					<div class="row">
						<?php $i=1; ?>
						<?php foreach ($latest_campaign as $key => $value) : 
							if($i>8) break; $i++;
						?>						
						<div class="col-xs-12 col-md-3">
							<div class="box box-solid" style="height: <?php echo $height; ?>;overflow-y: auto;">
			                    <div class="box-body">
	                                <a href="<?php echo base_url("imgclick/campaign_report/".$value['id']);?>">
	                                    <img src="<?php echo $value["image"];?>" class="img-thumbnail center-block" style="max-width:100% !important;max-height:200px !important;border-radius: 0;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
	                                </a>
	                                <?php if($tracking_access=='1') : ?>
	                                	<a style="border-radius: 0;" href="<?php echo base_url("imgclick/traffic_report/".$value['id']);?>" class="btn btn-primary center-block"><i class="fa fa-line-chart"></i> <?php echo $this->lang->line("traffic report");?></a>
	                                <?php endif; ?>
	                                <p class="text-center"> <?php echo substr($value['campaign_name'], 0, 70); if(strlen($value['campaign_name'])>70) echo '...';?></p>
			                    </div>
			                </div>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>		
	</div>


	<div class="row">
		<div class="col-xs-12 col-sm-12 <?php echo $bar_chart_col_left;?>">
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-send"></i> <?php echo $this->lang->line("Post/Social Media"); ?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="chart">
						<textarea name="bar_chart_data2" id="bar_chart_data2" class="hidden"><?php echo $info['bar_chart_data2']; ?></textarea>
						<div id="bar_chart2" height="200"></div>
					</div>
				</div>
			</div>
		</div>
		<?php if($tracking_access=='1') : ?>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-hand-o-up"></i> <?php echo $this->lang->line("Click/Social Media"); ?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="chart">
						<textarea name="bar_chart_data" id="bar_chart_data" class="hidden"><?php echo $info['bar_chart_data']; ?></textarea>
						<div id="bar_chart" height="200"></div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

	<?php if($tracking_access=='1') : ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- AREA CHART -->
			<div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo $this->lang->line("Day Wise Click Report"); ?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="chart">
						<textarea name="day_wise_click_report" id="day_wise_click_report" class="hidden"><?php echo $info['day_wise_click_report']; ?></textarea>
						<div class="chart" id="day_wise_click_report_chart" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-adjust"></i> <?php echo $this->lang->line("Day Wise Click Comparison Report");?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
				<textarea name="day_wise_click_comparison_report" id="day_wise_click_comparison_report" class="hidden"><?php echo $info['day_wise_click_comparison_report']; ?></textarea>
               <div class="chart" id="day_wise_click_comparsion_report_chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 hidden-xs">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3  class="box-title"><i class="fa fa-map-marker"></i> <?php echo $this->lang->line("Country Click Map");?></h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive text-center" style="background: gray;">
					<textarea name="country_graph_data" id="country_graph_data" class="hidden"><?php echo $info['country_graph_data']; ?></textarea>
					<div class="chart-responsive" id="regions_div">						
					</div>
				</div>
			</div> <!-- end box -->			
		</div>


		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-flag"></i> <?php echo $this->lang->line("Country Wise Click Report");?></h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive"  style="height: 370px;overflow-y: auto" >
					<div id="country_wise_table_data" class="table-responsive">
						<?php echo $info["country_wise_table_data"]; ?>
					</div>
				</div>
			</div> <!-- end box -->			
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-tablet"></i> <?php echo $this->lang->line("OS Wise Click Report");?></h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<textarea name="os_report_data" id="os_report_data" class="hidden"><?php echo $info['os_report_data']; ?></textarea>
					<canvas id="os_report_chart" height="200"></canvas>
				</div>
				<?php echo $info["os_report_data_ul"];?>
				<div class="clearfix"></div><br><br>
			</div>		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-firefox"></i> <?php echo $this->lang->line("Browser Wise Click Report");?></h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<textarea name="browser_report_data" id="browser_report_data" class="hidden"><?php echo $info['browser_report_data']; ?></textarea>
					<canvas id="browser_report_chart" height="200"></canvas>
				</div>
				<?php echo $info["browser_report_data_ul"];?>
				<div class="clearfix"></div><br><br>
			</div>		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-tv"></i> <?php echo $this->lang->line("Device Wise Click Report");?></h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<textarea name="device_report_data" id="device_report_data" class="hidden"><?php echo $info['device_report_data']; ?></textarea>
					<canvas id="device_report_chart" height="200"></canvas>
				</div>
				<?php echo $info["device_report_data_ul"];?>
				<div class="clearfix"></div><br><br>
			</div>		
		</div>
	</div>
	<?php endif; ?>
</div>

<div class="modal fade" id="show_demo_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $this->config->item("product_short_name"); ?> Video Tour</h4>
			</div>
			<div class="modal-body">
				<h4 class='orange' style='line-height:30px;'>Before you start using, we recommend you to take a video tour. You can access all training videos from <a href="<?php echo base_url('training/index'); ?>">Training Videos</a> menu.</h4>
				<iframe width="100%" height="360" src="https://www.youtube.com/embed/xptf_E0Ft78" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">May be later</button>
				<button type="button" class="btn btn-default" id="dont_show_me">Don't show me this</button>
			</div>
		</div>
	</div>
</div>


<style type="text/css" media="screen">
iframe{padding:4px;border:1px solid #aaa;}	
</style>
<?php $show_demo_popup=$this->session->userdata('show_demo_popup');?>
<script type="text/javascript">
    var show_demo_popup="<?php echo $show_demo_popup;?>";
    if(show_demo_popup=='1')
    {
      setTimeout(function() {
       $("#show_demo_modal").modal();
      }, 3000);
    }  

    $(document.body).on('click','#dont_show_me',function(){ 
    	$("#dont_show_me").html("Please wait...");
    	$.ajax({
            type:'POST' ,
            url:"<?php echo site_url();?>training/dont_show_me",
            success:function(response){	            		                
               window.location.assign("<?php echo base_url('dashboard/index');?>"); 
            }
        }); 
    }); 

 $('#show_demo_modal').on('hidden.bs.modal', function () { 
    $.ajax({
        type:'POST' ,
        url:"<?php echo site_url();?>training/dont_show_me_this_session",
        success:function(response){	            		                
           window.location.assign("<?php echo base_url('dashboard/index');?>"); 
        }
    }); 
  }) 
</script>

<script>
	$j("document").ready(function(){	
		var tracking_access = "<?php echo $tracking_access;?>";

		if(tracking_access=='1')
		{
			/****************  Day Wise Click Report Line Chanrt  ********************/
		      var day_wise_click_report=JSON.parse($("#day_wise_click_report").val());
			  var line = new Morris.Line({
		          element: 'day_wise_click_report_chart',
		          resize: true,
		          data: day_wise_click_report,
		          xkey: 'date',
		          ykeys: ['user'],
		          labels: ['Click'],
		          lineColors: ['#3c8dbc'],
		          hideHover: 'auto',
		          lineWidth: 1
	        });
			/****************  Day Wise Click Report  ********************/

			/****************  Day Wise Click Comparison Report  ********************/
		    var day_wise_click_comparison_report=JSON.parse($("#day_wise_click_comparison_report").val());
			var area = new Morris.Area({
			    element: 'day_wise_click_comparsion_report_chart',
			    resize: true,
			    data: day_wise_click_comparison_report,
			    xkey: 'date',
			    ykeys: ['facebook', 'twitter', 'linkedin', 'pinterest','tumblr','unknown'],
			    labels: ['Facebook', 'Twitter', 'Linkedin', 'Pinterest','Tumblr','Unknown'],
			    lineColors: ['#FFB85F', '#74828F', '#BEB9B5', '#C25B56','#BCCF3D','#D79C8C'],
			    hideHover: 'auto',
			    lineWidth: 1
			  });
			/****************  Day Wise Click Comparison Report  ********************/

			/****************  CLick/Social Account  Bar Chart ********************/		
			var bar_chart_data=JSON.parse($("#bar_chart_data").val());
	        var bar = new Morris.Bar({
	          element: 'bar_chart',
	          resize: true,
	          data: bar_chart_data,
	          barColors: ['#3498DB'],
	          xkey: 'source_name',
	          ykeys: ['value'],
	          labels: ['Click'],
	          hideHover: 'auto'
	        });
			/****************  CLick/Social Account  ********************/

	        /**************** country wise report page ********************/		
			function drawMap() {
				var data = google.visualization.arrayToDataTable(JSON.parse($("#country_graph_data").val()));

				var options = {};
				options['dataMode'] = 'regions';

				var container = document.getElementById('regions_div');
				var geomap = new google.visualization.GeoMap(container);

				geomap.draw(data, options);
			};

			google.charts.load('current', {'packages':['geomap']});
			google.charts.setOnLoadCallback(drawMap);
			/**************** end country wise report page ********************/

			var pieOptions = {
			    segmentShowStroke: true,
			    segmentStrokeColor: "#fff",
			    segmentStrokeWidth: 1,
			    percentageInnerCutout: 50, // This is 0 for Pie charts
			    animationSteps: 100,
			    animationEasing: "easeOutBounce",
			    animateRotate: true,
			    animateScale: false,
			    responsive: true,
			    maintainAspectRatio: false
			};


			//*********************** OS PIE *************************************
			var PieData=JSON.parse($("#os_report_data").val());
			var pieChartCanvas = $("#os_report_chart").get(0).getContext("2d");
	        var pieChart = new Chart(pieChartCanvas);
			pieChart.Doughnut(PieData, pieOptions);
			//*********************** OS PIE *************************************

			//*********************** BROwSER PIE *************************************
			var PieData=JSON.parse($("#browser_report_data").val());
			var pieChartCanvas = $("#browser_report_chart").get(0).getContext("2d");
	        var pieChart = new Chart(pieChartCanvas);
			pieChart.Doughnut(PieData, pieOptions);
			//*********************** BROWSER PIE *************************************

			//*********************** DEVICE PIE *************************************
			var PieData=JSON.parse($("#device_report_data").val());
			var pieChartCanvas = $("#device_report_chart").get(0).getContext("2d");
	        var pieChart = new Chart(pieChartCanvas);
			pieChart.Doughnut(PieData, pieOptions);
			//*********************** DEVICE PIE *************************************


		} // end if tracking_access==1


        /****************  Post/Social Account Bar chart ********************/
        var bar_chart_data2=JSON.parse($("#bar_chart_data2").val());
        var bar2 = new Morris.Bar({
          element: 'bar_chart2',
          resize: true,
          data: bar_chart_data2,
          barColors: ['#3498DB'],
          xkey: 'source_name',
          ykeys: ['value'],
          labels: ['Post'],
          hideHover: 'auto'
        });
        /****************  Post/Social Account  ********************/


});
</script>










<style>
	#dashboard-top {
		padding-top: 40px;
	}

	#dashboard-top .cmn {
		position: relative;
		height: 160px;
		margin: 15px 0 70px 0;
		border-radius: 5px;
		width: 100%;
		float: left;
	}

	#dashboard-top .cmn .info {
		color: #fff;
		margin: 45px 0 10px 0;
		display: block;
		position: relative;
		text-align: center;
		font-size: 51px;
	}	

	#dashboard-top .cmn .info span {
		font-size: 12px;
		margin-left: 3px;
	}	

	#dashboard-top .cmn .short-info {
		color: #fff;
		text-align: center;
		font-size: 14px;
		margin-top: 0px;
	}	

	.bg-a {
		background: #FF4056;
	}	

	.bg-b {
		background: #F88B33;
	}	

	.bg-c {
		background: #3498DB;
	}

	.bg-d {
		background: #83DE5B;
	}

	.top-icon {
		position: absolute;
		top: -50px;
		left: 0;
		width: 100%;
		text-align: center;
	}

	.first-circle {
		width: 100px;
		height: 100px;
		border-radius: 50%;
		background: #ddd;
		margin: 0 auto;
		padding: 10px 0;
		display: block;
	}

	.second-circle {
		width: 80px;
		height: 80px;
		border-radius: 50%;
		background: #fff;
		margin: 0 auto;
		padding: 10px 0;
	}

	.third-circle {
		background: #F05746;	
		width: 60px;
		height: 60px;
		border-radius: 50%;
		margin: 0 auto;
		text-align: center;
		padding-top: 17px;
	}	

	.third-circle.bg-b {
		background: #F88B33;
	}	

	.third-circle.bg-c {
		background: #3498DB;	
	}	

	.third-circle.bg-d {
		background: #83DE5B;
	}

	.third-circle i {
		color: #fff;
		font-size: 26px;
	}	

	.more-info {
		position: absolute;
		bottom: -20px;
		left: 0;
		width: 100%;
		text-align: center;
	}	

	.more-info a {
		height: 40px;
		cursor: default;
		width: 120px;
		padding: 10px 15px;
		background: #ecf0f5;
		color: #333333;
		margin: 0 auto;
		display: block;
		text-align: center;	
		border-radius: 20px;
	}	
	
	#dashboard-box {
		margin-bottom: 25px;
	}
	
	#dashboard-box .cmn {
		background: #fff;
		height: 150px;
		padding: 15px;
		position: relative;
		margin-bottom: 30px;
	}

	#dashboard-box .cmn .icon {
		position: absolute;
		height: 86px;
		width: 86px;
		left: 15px;
		top: -15px;
		background: #83DE5B;
		text-align: center;
		padding-top: 30px;
	}
	
	#dashboard-box .cmn .icon.bg-a {
		background: #83DE5B;
	}	
	
	#dashboard-box .cmn .icon.bg-b {
		background: #974DEC;
	}
	
	#dashboard-box .cmn .icon.bg-c {
		background: #F88B33;
	}
	
	#dashboard-box .cmn .icon.bg-d {
		background: #FF4056;
	}
	
	#dashboard-box .cmn .icon i {
		font-size: 26px;		
		color: #fff;
	}	

	#dashboard-box .cmn .info {
		text-align: left;
		color: #ababab;
		margin-top: 0;
		margin-bottom: 0px;
		font-size: 20px;
		padding: 10px 0;
	}

	#dashboard-box .cmn .stat {
		text-align: right;
		color: #83DE5B;
		margin-top: 0;
		margin-bottom: 10px;
		font-size: 45px;
	}
	
	#dashboard-box .cmn .stat.color-b {
		color: #974DEC;
	}
	
	#dashboard-box .cmn .stat.color-c {
		color: #F88B33;
	}
	
	#dashboard-box .cmn .stat.color-d {
		color: #FF4056;
	}
	
	#dashboard-box .cmn .stat span {
			font-size: 15px;
	}	
	
	#dashboard-box .cmn .bottom-info {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 95%;
		margin: 0 2.5%;
		border-top: 1px solid #e1e1e1;
	}
	
	#dashboard-box .cmn .bottom-info a {
		padding: 7px 0;
		text-align: right;
		display: block;
	}	
	
	#dashboard-middle {
		width: 100%;
		float: left;
		margin: 35px 0 35px 0;
	}
	
	#dashboard-middle .cmn {
		background: #1a8af1;
		border-radius: 3px;		
		width: 100%;
		height: 110px;
		padding: 10px;
		padding-left: 100px;
		position: relative;
		margin-bottom: 15px;
	}
	
	#dashboard-middle .cmn.bg-b {
		background: #5dc560;
	}	
	
	#dashboard-middle .cmn.bg-c {
		background: #ea5691;
	}

	#dashboard-middle .cmn .icon {
		position: absolute;
		left: 10px;
		top: 10px;
		width: 90px;
		height: 90px;
		border-radius: 50%;
		text-align: center;
		background: #fff;
		padding-top: 25px;
	}
	
	#dashboard-middle .cmn .icon i {
		color: #1a8af1;
		font-size: 40px;
	}	
	
	#dashboard-middle .cmn .icon i.bg-b {
		color: #5dc560;
		background: none;
	}	
	
	#dashboard-middle .cmn .icon i.bg-c {
		color: #ea5691;
		background: none;
	}

	#dashboard-middle .cmn .info {
		text-align: right;
		color: #fff;
		font-size: 23px;
		margin-top: 10px;
		margin-bottom: 10px;
		font-weight: 500;
	}
	
	#dashboard-middle .cmn .info.color-b {
		color: #fff;
	}	
	
	#dashboard-middle .cmn .info.color-c {
		color: #fff;
	}	

	#dashboard-middle .cmn .stat {
		text-align: right;
		color: #fff;
		font-size: 30px;
		margin-top: 0px;
		margin-bottom: 0px;
		font-weight: normal;
	}	
	
	#dashboard-bottom {
		margin: 30px 0 35px 0;
		width: 100%;
		float: left;
	}
	
	#dashboard-bottom .cmn {
		background: #fff;
		border-radius: 3px;		
		width: 100%;
		height: 110px;
		padding: 10px;
		padding-right: 100px;
		position: relative;
		margin-bottom: 15px;
	}
	
	#dashboard-bottom .cmn.bg-b {
		background: #fff;
	}	
	
	#dashboard-bottom .cmn.bg-c {
		background: #fff;
	}

	#dashboard-bottom .cmn .icon {
		position: absolute;
		right: 0;
		top: 0;
		width: 90px;
		height: 100%;
		text-align: center;
		background: #1a8af1;
		padding-top: 35px;
	}
	
	#dashboard-bottom .cmn .icon.bg-b {
		background: #5dc560;
	}	
	
	#dashboard-bottom .cmn .icon.bg-c {
		background: #ea5691;
	}
	
	#dashboard-bottom .cmn .icon i {
		color: #fff;
		font-size: 40px;
	}	
	
	#dashboard-bottom .cmn .icon i.bg-b {
		color: #fff;
		background: none;
	}	
	
	#dashboard-bottom .cmn .icon i.bg-c {
		color: #fff;
		background: none;
	}

	#dashboard-bottom .cmn .info {
		text-align: left;
		color: #1a8af1;
		font-size: 23px;
		margin-top: 10px;
		margin-bottom: 10px;
		font-weight: 500;
	}
	
	#dashboard-bottom .cmn .info.color-b {
		color: #5dc560;
	}	
	
	#dashboard-bottom .cmn .info.color-c {
		color: #ea5691;
	}	

	#dashboard-bottom .cmn .stat {
		text-align: left;
		color: #C2C2A6;
		font-size: 30px;
		margin-top: 0px;
		margin-bottom: 0px;
		font-weight: normal;
	}	
	
	.dashboard-title {
		background: #607D8B;
		padding: 15px;
		color: #fff;
		text-align: center;
		border-radius: 3px;
	}	
</style>