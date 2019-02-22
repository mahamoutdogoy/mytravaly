<style type="text/css">
	.tabs-below > .nav-tabs,
	.tabs-right > .nav-tabs,
	.tabs-left > .nav-tabs {
	  border-top: 0;
	}

	.tab-content > .tab-pane,
	.pill-content > .pill-pane {
	  display: none;
	}

	.tab-content > .active,
	.pill-content > .active {
	  display: block;
	}

	.tabs-below > .nav-tabs {
	  border-top: 1px solid #fff;
	}

	.tabs-below > .nav-tabs > li {
	  margin-bottom: -1px;
	  margin-top: 0;
	}

	.tabs-below > .nav-tabs > li > a {
	  -webkit-border-radius: 4px 4px 0 0;
	     -moz-border-radius: 4px 4px 0 0;
	          border-radius: 4px 4px 0 0;
	}

	.tabs-below > .nav-tabs > li > a:hover,
	.tabs-below > .nav-tabs > li > a:focus {
	  border-bottom-color: transparent;
	  border-top-color: #ddd;
	  border-top:2px solid orange;
	}

	.tabs-below > .nav-tabs > .active > a,
	.tabs-below > .nav-tabs > .active > a:hover,
	.tabs-below > .nav-tabs > .active > a:focus {
	  border-color: #ddd #ddd transparent #ddd;
	  border-top:2px solid orange;
	}
</style>
<input type="hidden" id="domain_id" value="<?php echo $id; ?>"/>
<section class="content">
	<div class="row">
		<div class="col-xs-12">	
			<div class="box box-info">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;" class="blue">
                         <?php echo $campaign_data[0]["campaign_name"];?>
                    </h4>
                    <div class="media">
                        <div class="media-left hidden-xs">
                             <img src="<?php echo $campaign_data[0]["image"];?>" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                        </div>
                        <div class="media-body">
                            <div class="clearfix">
                                <p class="pull-right">
                                	 <?php 
				                      if($campaign_data[0]['posting_status']=="0") echo "<span class='label label-danger'><i class='fa fa-clock-o'></i> ".$this->lang->line("Pending")."</span>";
				                      else if($campaign_data[0]['posting_status']=="1") echo "<span class='label label-warning'><i class='fa fa-spinner'></i> ".$this->lang->line("Processing")."</span>";
				                      else echo "<span class='label label-success'><i class='fa fa-check'></i> ".$this->lang->line("Completed")."</span>"; 
				                     ?> 
				                     <br>
                                    <a href="<?php echo base_url("imgclick/campaign_report/".$campaign_data[0]["id"]); ?>" class="btn btn-primary btn-sm" style="margin-top:10px;">
                                        <i class="fa fa fa-th-list"></i> <?php echo $this->lang->line("campaign report");?>
                                    </a>
                                </p>

                                <h5 style="margin-top: 0"><i class="fa fa-code margin-r5"></i> <b><?php echo $this->lang->line("Tracking Code");?></b> : <?php echo $campaign_data[0]['tracking_code'];?></h5>

                                <p><i class="fa fa-clock-o margin-r5"></i> <b> <?php echo $this->lang->line("Schedule Type");?></b> : <?php echo $this->lang->line($campaign_data[0]['schedule_type']);?></p>
                                 <p style="margin-bottom: 0">
                                    <i class="fa fa-link margin-r5"></i> <b> <?php echo $this->lang->line("Post Link");?></b> : <a target="_BLANK" href="<?php echo $campaign_data[0]['post_link'];?>"><?php echo $this->lang->line("Visit");?></a>
                                </p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>	

            <div class="clearfix"></div>

			<div class="tabs-below">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab"><?php echo $this->lang->line("Overview");?></a></li>
					<li role="presentation"><a href="#country_wise_report" aria-controls="country_wise_report" role="tab" data-toggle="tab"><?php echo $this->lang->line("Country Wise Report");?></a></li>
					<li role="presentation"><a href="#browser_report" aria-controls="browser_report" role="tab" data-toggle="tab"><?php echo $this->lang->line("Browser Report");?></a></li>
					<li role="presentation"><a href="#os_report" aria-controls="os_report" role="tab" data-toggle="tab"><?php echo $this->lang->line("OS Report");?></a></li>
					<li role="presentation"><a href="#device_report" aria-controls="device_report" role="tab" data-toggle="tab"><?php echo $this->lang->line("Device Report");?></a></li>
					<li role="presentation"><a href="#raw_data" aria-controls="raw_data" role="tab" data-toggle="tab"><?php echo $this->lang->line("Raw Data");?></a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">					
					<?php $this->load->view('domain_visitor/visitor_analysis_details/overview'); ?>
					<?php $this->load->view('domain_visitor/visitor_analysis_details/country_wise_report'); ?>
					<?php $this->load->view('domain_visitor/visitor_analysis_details/browser_report'); ?>
					<?php $this->load->view('domain_visitor/visitor_analysis_details/os_report'); ?>
					<?php $this->load->view('domain_visitor/visitor_analysis_details/device_report'); ?>				
					<?php $this->load->view('domain_visitor/visitor_analysis_details/raw_data'); ?>				
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$('.reservation').daterangepicker();

	var function_name='overview';
	var first_load = 1;

	$j("document").ready(function(){
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
			e.preventDefault();
			first_load = 0;
			var target = $(e.target).attr("href");
			function_name = target.replace('#','');
			ajax_call(function_name);		

		}); // end of $('a[data-toggle="tab"]')


		$(document.body).on('click','.search_button',function(){
			ajax_call(function_name);			
		});

		if(function_name == 'overview' && first_load == 1){
			ajax_call(function_name);
		}


		function ajax_call(function_name)
		{
			var domain_id = $("#domain_id").val();
			var date_range = $("#"+function_name+"_date").val();

			if(function_name == 'visitor_analysis')
				date_range = $("#overview_date").val();

			var base_url="<?php echo base_url(); ?>";
			var data_type = "JSON";
			if(function_name == 'alexa_info' || function_name == 'general' || function_name == 'similarweb_info')
				data_type = '';
			$('#'+function_name+'_success_msg').html('<img class="center-block" style="margin-top:10px;" src="'+base_url+'assets/pre-loader/Fancy pants.gif" alt="Searching...">');

			$.ajax({
				type: "POST",
				url : "<?php echo site_url('domain_details_visitor/ajax_get_"+function_name+"_data'); ?>",
				data:{domain_id:domain_id,date_range:date_range},
				dataType: data_type,
				async: false,
				success:function(response){
					$('#'+function_name+'_success_msg').html('');
					$("#"+function_name+"_name").html(response);
					// $(".domain_name").text(response.domain_name);
					var pieOptions = {
					    //Boolean - Whether we should show a stroke on each segment
					    segmentShowStroke: true,
					    //String - The colour of each segment stroke
					    segmentStrokeColor: "#fff",
					    //Number - The width of each segment stroke
					    segmentStrokeWidth: 1,
					    //Number - The percentage of the chart that we cut out of the middle
					    percentageInnerCutout: 30, // This is 0 for Pie charts
					    //Number - Amount of animation steps
					    animationSteps: 100,
					    //String - Animation easing effect
					    animationEasing: "easeOutBounce",
					    //Boolean - Whether we animate the rotation of the Doughnut
					    animateRotate: true,
					    //Boolean - Whether we animate scaling the Doughnut from the centre
					    animateScale: false,
					    //Boolean - whether to make the chart responsive to window resizing
					    responsive: true,
					    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
					    maintainAspectRatio: false,
					    //String - A tooltip template
					    tooltipTemplate: "<%=value %> <%=label%>"
					};


					/***************** overview page and traffic meregd by alamin :D ******************/
					if (function_name == 'overview') {
						$('#overview_from_date').text(response.from_date);
						$('#overview_to_date').text(response.to_date);
						$('.report_date_common').text(response.from_date+' - '+response.to_date);
						// LINE CHART
				        var line = new Morris.Line({
				          element: 'line-chart',
				          resize: true,
				          data: response.line_chart,
				          xkey: 'date',
				          ykeys: ['user'],
				          labels: ['Click'],
				          lineColors: ['#3c8dbc'],
				          hideHover: 'auto',
				          lineWidth: 1
				        });
				        $('#total_post_count').text(response.total_post_count);
				        $('#total_click_count').text(response.total_click_count);
				        $('#avg_click_per_day').text(response.avg_click_per_day);
					}
					/********************* end of overview page *****************/


					/******************** for traffic source page *******************/ 
					if(function_name=='overview') {
						
						$('#traffic_source_from_date').text(response.from_date);
						$('#traffic_source_to_date').text(response.to_date);
						/*** daily traffic line chart ***/
						var area = new Morris.Area({
						    element: 'traffic_line-chart',
						    resize: true,
						    data: response.line_chart_data,
						    xkey: 'date',
						    ykeys: ['facebook', 'twitter', 'linkedin', 'pinterest','tumblr','unknown'],
						    labels: ['Facebook', 'Twitter', 'Linkedin', 'Pinterest','Tumblr','Unknown'],
						    lineColors: ['#FFB85F', '#74828F', '#BEB9B5', '#C25B56','#BCCF3D','#D79C8C'],
						    hideHover: 'auto',
						     lineWidth: 1
						  });
						/****************************/

						/*** Top referrer pie chart ***/
						// var donut = new Morris.Donut({
						//     element: 'top_referrer_chart',
						//     resize: true,
						//     colors: response.top_referrer_color,
						//     data: response.top_referrer_data,
						//     hideHover: 'auto'
						//   });

				        // Get context with jQuery - using jQuery's .get() method.
				        var pieChartCanvas = $("#top_referrer_chart").get(0).getContext("2d");
				        var pieChart = new Chart(pieChartCanvas);
				        var PieData = response.top_referrer_data;
				        var pieOptions = {
				          //Boolean - Whether we should show a stroke on each segment
				          segmentShowStroke: true,
				          //String - The colour of each segment stroke
				          segmentStrokeColor: "#fff",
				          //Number - The width of each segment stroke
				          segmentStrokeWidth: 2,
				          //Number - The percentage of the chart that we cut out of the middle
				          percentageInnerCutout: 30, // This is 0 for Pie charts
				          //Number - Amount of animation steps
				          animationSteps: 100,
				          //String - Animation easing effect
				          animationEasing: "easeOutBounce",
				          //Boolean - Whether we animate the rotation of the Doughnut
				          animateRotate: true,
				          //Boolean - Whether we animate scaling the Doughnut from the centre
				          animateScale: false,
				          //Boolean - whether to make the chart responsive to window resizing
				          responsive: true,
				          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				          maintainAspectRatio: false
				        };
				        //Create pie or douhnut chart
				        // You can switch between pie and douhnut using the method below.
				        pieChart.Doughnut(PieData, pieOptions);
						/******************************/


						/*** Total traffic bar chart ***/
				        //BAR CHART
				        var bar = new Morris.Bar({
				          element: 'bar-chart',
				          resize: true,
				          data: response.bar_chart_data,
				          barColors: ['#3498DB'],
				          xkey: 'source_name',
				          ykeys: ['value'],
				          labels: ['Click'],
				          hideHover: 'auto'
				        });
						/******************************/


					}					
					/****************** end of traffic source page ***********************/


					/**************** country wise report page ********************/
					if(function_name == 'country_wise_report'){
						$("#country_wise_visitor_from_date").text(response.from_date);
						$("#country_wise_visitor_to_date").text(response.to_date);
						$("#country_wise_table_data").html(response.country_wise_table_data);
						
						function drawMap() {
							var data = google.visualization.arrayToDataTable(response.country_graph_data);

							var options = {};
							options['dataMode'] = 'regions';

							var container = document.getElementById('regions_div');
							var geomap = new google.visualization.GeoMap(container);

							geomap.draw(data, options);
						};

						google.charts.load('current', {'packages':['geomap']});
						google.charts.setOnLoadCallback(drawMap);
					}
					/**************** end country wise report page ********************/

					if(function_name == 'browser_report'){
						$("#browser_table_from_date").text(response.from_date);
						$("#browser_table_to_date").text(response.to_date);
						$("#browser_report_name").html(response.browser_report_name);
					}

					if(function_name == 'os_report'){
						$("#os_table_from_date").text(response.from_date);
						$("#os_table_to_date").text(response.to_date);
						$("#os_report_name").html(response.os_report_name);
					}

					if(function_name == 'device_report'){
						$("#device_table_from_date").text(response.from_date);
						$("#device_table_to_date").text(response.to_date);
						$("#device_report_name").html(response.device_report_name);
					}

					if(function_name == 'raw_data'){
						$("#raw_data_from_date").text(response.from_date);
						$("#raw_data_to_date").text(response.to_date);
						$("#raw_data_name").html(response.raw_data_name);
					}
					
				} //end of success

			}); // end of ajax
		} //end of function ajax_call



		$(document.body).on('click','.browser_name',function(){
			var domain_id = $("#domain_id").val();
			var browser_name = $(this).attr("data");
			var date_range = $("#browser_report_date").val();
			var base_url="<?php echo base_url(); ?>";
			$("#individual_browser_data_table").html('');
			$("#id_for_browser_name").text(browser_name);
			$("#modal_for_browser_report").modal();
			$('#modal_waiting_browser_name').html('<img class="center-block" style="margin-top:10px;margin-bottom:15px;" src="'+base_url+'assets/pre-loader/Fancy pants.gif" alt="Searching...">');

			$.ajax({
				type: "POST",
				url : "<?php echo site_url('domain_details_visitor/ajax_get_individual_browser_data'); ?>",
				data:{domain_id:domain_id,date_range:date_range,browser_name:browser_name},
				dataType: 'JSON',
				async: false,
				success:function(response){
					$("#modal_waiting_browser_name").html('');
					$("#browser_name_from_date").text(response.from_date);
					$("#browser_name_to_date").text(response.to_date);
					$("#individual_browser_data_table").html(response.browser_version);
					var line = new Morris.Line({
					    element: 'browser_name_line_chart',
					    resize: true,
					    data: response.browser_daily_session_data,
					    xkey: 'date',
					    ykeys: ['session'],
					    labels: ['Sessions'],
					    lineColors: ['#3c8dbc'],
					    hideHover: 'auto'
					  });					
				} //end of success
			});
		}); // end of browser name click function


		$(document.body).on('click','.country_wise_name',function(){
			var domain_id = $("#domain_id").val();
			var country_name = $(this).attr("data");
			var date_range = $("#country_wise_report_date").val();
			var base_url="<?php echo base_url(); ?>";
			$("#individual_country_data_table").html('');
			$("#id_for_country_name").text(country_name);
			$("#modal_for_country_report").modal();
			$('#modal_waiting_country_name').html('<img class="center-block" style="margin-top:10px;margin-bottom:15px;" src="'+base_url+'assets/pre-loader/Fancy pants.gif" alt="Searching...">');

			$.ajax({
				type: "POST",
				url : "<?php echo site_url('domain_details_visitor/ajax_get_individual_country_data'); ?>",
				data:{domain_id:domain_id,date_range:date_range,country_name:country_name},
				dataType: 'JSON',
				async: false,
				success:function(response){
					$("#modal_waiting_country_name").html('');
					$("#country_name_from_date").text(response.from_date);
					$("#country_name_to_date").text(response.to_date);
					$("#individual_country_data_table").html(response.country_city_str);
					var line = new Morris.Line({
					    element: 'country_name_line_chart',
					    resize: true,
					    data: response.country_daily_session_data,
					    xkey: 'date',
					    ykeys: ['session'],
					    labels: ['Sessions'],
					    lineColors: ['#3c8dbc'],
					    hideHover: 'auto'
					  });					
				} //end of success
			});
		}); // end of browser name click function


	});
</script>
