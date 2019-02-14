<div role="tabpanel" class="tab-pane" id="browser_report">
	<div id="browser_report_success_msg" class="text-center" ></div>	
	
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
					<input type="text" class="form-control pull-right reservation" id="browser_report_date" />
				</div><!-- /.input group -->
			</div><!-- /.form group -->
		</div>
		<div class="col-xs-12 col-lg-1" style="margin-top:25px;"><button class="btn btn-info search_button"><i class="fa fa-binoculars"></i> <?php echo $this->lang->line("search");?></button></div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 style="color: blue; word-spacing: 3px;" class="box-title"><i class="fa fa-firefox"></i> <?php echo $this->lang->line("Browser Wise Click Report");?> (<span id="browser_table_from_date"></span> - <span id="browser_table_to_date"></span>)</h3>
					<div class="box-tools pull-right">
						<button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
						<button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div id="browser_report_name">
						
					</div>
				</div>
			</div> <!-- end box -->			
		</div>

	</div>
</div>

<!-- Start modal for new search. -->
<div id="modal_for_browser_report" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&#215;</span>
				</button>
				<h4 id="new_search_details_title" class="modal-title"><i class="fa fa-bars"></i> <?php echo $this->lang->line("Browser Wise Click Report Breakdown");?> </h4>
			</div>

			<div class="modal-body" id="browser_details_body">
				<div class="row"><div class="text-center" id="modal_waiting_browser_name"></div></div>
				
				<div class="row">
					<div class="col-xs-12" style="padding: 15px;">						
						<div class="table-responsive" id="individual_browser_data_table">
							
						</div>
					</div>
				</div>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("Close");?></button>
			</div>
		</div>
	</div>
</div>
<!-- End modal for new search. -->