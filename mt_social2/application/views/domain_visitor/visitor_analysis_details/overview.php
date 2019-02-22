<div role="tabpanel" class="tab-pane active" id="overview">
	<div id="overview_success_msg" class="text-center" ></div>	
	<!-- <div id="overview_name"></div> -->
	<!-- <div id="visitor_analysis_name"></div> -->
	<div class="row">
		<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3><div class="well text-center">Domain Name - <span class="domain_name"></span></div></h3>
		</div> -->

		<div class="col-xs-10 col-md-10 col-lg-10" style="margin-right: -23px;">
			<!-- Date range -->
			<div class="form-group">
				<label><?php echo $this->lang->line("date range");?>:</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" class="form-control pull-right reservation" id="overview_date" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
			<!-- end of date range -->
		</div>
		<div class="col-xs-12 col-lg-1" style="margin-top:25px;"><button class="btn btn-info search_button"><i class="fa fa-binoculars"></i> <?php echo $this->lang->line("search");?></button></div>


        <div style="margin-top: 20px;" class="col-xs-12"></div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        	<div class="info-box bg-aqua">
				<span class="info-box-icon"><i class="fa fa-share-alt"></i></span>
				<div class="info-box-content">
					<!-- <span class="info-box-text">Inventory</span> -->
					<span class="info-box-number" id="total_post_count"></span> 
					<div class="progress">
						<div class="progress-bar" style="width: 70%"></div>
					</div>
					<span class="progress-description">
						<b style="font-size: 18px;"><?php echo $this->lang->line("Total Social Post");?></b>
					</span>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        	<div class="info-box bg-blue">
				<span class="info-box-icon"><i class="fa fa-hand-o-up"></i></span>
				<div class="info-box-content">
					<!-- <span class="info-box-text">Inventory</span> -->
					<span class="info-box-number" id="total_click_count"></span>
					<div class="progress">
						<div class="progress-bar" style="width: 70%"></div>
					</div>
					<span class="progress-description">
						<b style="font-size: 18px;"><?php echo $this->lang->line("Total Click");?></b>
					</span>
					<div class="report_date_common" style="font-size:12px"></div>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        	<div class="info-box bg-yellow">
				<span class="info-box-icon"><i class="fa fa-calculator"></i></span>
				<div class="info-box-content">
					<!-- <span class="info-box-text">Inventory</span> -->
					<span class="info-box-number" id="avg_click_per_day"></span>
					<div class="progress">
						<div class="progress-bar" style="width: 70%"></div>
					</div>
					<span class="progress-description">
						<b style="font-size: 18px;"><?php echo $this->lang->line("Average Click/Day");?></b>
					</span>
					<div class="report_date_common" style="font-size:12px"></div>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->
        </div>

        <div class="col-lg-4 col-md-4 col-xs-12">
			<!-- DONUT CHART -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><b>%</b> <?php echo $this->lang->line("Traffic Source");?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<!-- <div class="chart" id="top_referrer_chart" style="height: 300px; position: relative;"></div> -->
					<div class="report_date_common text-center"></div>
					<canvas id="top_referrer_chart" height="300"></canvas>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>

		<div class="col-lg-8 col-md-8 col-xs-12">
			<!-- BAR CHART -->
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-group"></i> <?php echo $this->lang->line("Total Traffic");?></h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div class="report_date_common text-center"></div>
					<div class="chart" id="bar-chart"></div>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo $this->lang->line("Day Wise Click Report");?> (<span id="overview_from_date"></span> - <span id="overview_to_date"></span>)</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col lg-10 -->
		

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-adjust"></i> <?php echo $this->lang->line("Day Wise Click Comparison Report");?> (<span id="traffic_source_from_date"></span> - <span id="traffic_source_to_date"></span>)</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
               <!-- Morris chart - Sales -->
               <div class="chart tab-pane active" id="traffic_line-chart" style="position: relative; height: 300px;"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col lg-10 -->
        
	
	</div>

</div>