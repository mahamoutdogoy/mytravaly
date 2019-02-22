<div class="clearfix"></div>
<div  id="search_modal" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog  modal-lg" style="width:90%">
		<div class="modal-content">
			<div class="hidden hidden-xs hidden-sm" id="downloading-image" style="position: absolute;top:7px;right:30px;z-index: 10000;"><?php echo $this->lang->line('please wait'); ?><img src="<?php echo base_url('assets/pre-loader/Fading squares2.gif');?>" class="center-block"></div>
			<div class="modal-header">
				<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
				<h4 class="modal-title"><i class="fa fa-search"></i> <?php echo $this->lang->line("Search Image");?></h4>
			</div>
			<div class="modal-body">		
			    <div id="pixabay" class="tab-pane fade in active">
			    	<div class="form-group col-xs-12 col-md-7" style="padding:0 5px 0 0">
						<input autofocus="true" class="form-control" name="pixbay_query" id="pixbay_query" type="text" placeholder="<?php echo $this->lang->line("search keyword"); ?> | <?php echo $this->lang->line('example: office'); ?>" > 
					</div>
					<div class="form-group col-xs-12 col-md-3">
						<?php $pixbay_category_options=array(''=>$this->lang->line('any category'),'fashion'=>'fashion','nature'=>'nature','backgrounds'=>'backgrounds','science'=>'science','education'=>'education','people'=>'people','feelings'=>'feelings','religion'=>'religion','health'=>'health','places'=>'places','animals'=>'animals','industry'=>'industry','food'=>'food','computer'=>'computer','sports'=>'sports','transportation'=>'transportation','travel'=>'travel','buildings'=>'buildings','business'=>'business','music'=>'music');?>
						<?php echo form_dropdown('pixbay_category', $pixbay_category_options, '','class="form-control" id="pixbay_category"'); ?>
					</div>
					<div class="form-group col-xs-12 col-md-2" style="padding:0 0 0 5px">
						<a id="pixbay_submit" class="btn btn-primary" style="padding-top:9px; padding-bottom: 9px;"><i class="fa fa-search"></i> <?php echo $this->lang->line("pixbay search");?></a>
					</div>
					<div class="clearfix"></div>
			      	<div id="pixbay_img_container" class="row"></div>
			      	<div id="pixbay_img_loading"></div>
			      	<div id="pixbay_load_more_container" class="hidden"><a class="btn btn-warning btn-lg" data-page="1" id="pixbay_load_more"><i class="fa fa-photo"></i> <?php echo $this->lang->line("load more images");?></a></div>
			      	<br/><hr/><a href="https://pixabay.com" target="_BLANK"><img src="https://pixabay.com/static/img/logo.png" class="img-responsive center-block" style="max-width:100px;"></a><br/>			    
			    </div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>




<script>

    $(document.body).on('click','#pixbay_submit',function(){  
        var pixbay_query=$("#pixbay_query").val();
        var pixbay_category=$("#pixbay_category").val();
        if(pixbay_query=="")
        {
        	alert("<?php echo $this->lang->line('please type a keyword.');?>");
        	return false;
        }
        $("#pixbay_img_container").html('');
        $("#pixbay_load_more_container").addClass('hidden');
        var loading = '<img src="<?php echo base_url();?>assets/pre-loader/Surrounded segments.gif" class="center-block">';
		$("#pixbay_img_loading").html(loading);

        $.ajax({
		   type:'POST' ,
		   url: base_url+"imgclick/pixbay_api",
		   data: {pixbay_query: pixbay_query,pixbay_category:pixbay_category},		
		   dataType: 'JSON',	  
		   success:function(response)
		   { 
		     $("#pixbay_img_container").html(response.content);
		     if(response.status=='1') 
		     {
		     	$("#pixbay_load_more_container").removeClass('hidden');
		     	$("#pixbay_load_more").attr('data-page',response.next_page);
		     }
		     else $("#pixbay_load_more_container").addClass('hidden');
		     $("#pixbay_img_loading").html('');
		   }

		});
    });

    $(document.body).on('click','#pixbay_load_more',function(){  
        var pixbay_query=$("#pixbay_query").val();
        var pixbay_category=$("#pixbay_category").val();
        var page=$("#pixbay_load_more").attr('data-page');
        if(pixbay_query=="")
        {
        	alert("<?php echo $this->lang->line('please type a keyword.');?>");
        	return false;
        }

        var loading = '<img src="<?php echo base_url();?>assets/pre-loader/Surrounded segments.gif" class="center-block">';
		$("#pixbay_img_loading").html(loading);

        $.ajax({
		   type:'POST' ,
		   url: base_url+"imgclick/pixbay_api",
		   data: {pixbay_query: pixbay_query,pixbay_category:pixbay_category,page:page},		
		   dataType: 'JSON',	  
		   success:function(response)
		   { 
		     $(response.content).appendTo("#pixbay_img_container");
		     if(response.status=='1') 
		     {
		     	$("#pixbay_load_more_container").removeClass('hidden');
		     	$("#pixbay_load_more").attr('data-page',response.next_page);
		     }
		     else $("#pixbay_load_more_container").addClass('hidden');
		     $("#pixbay_img_loading").html('');
		   }

		});
    });

    $j("document").ready(function(){
		$('#pixbay_query').keyup(function(e){
		    if(e.keyCode == 13)
		    {
		        $("#pixbay_submit").trigger("click");
		    }
		});
		$('#pixbay_category').change(function(e){
		    if($("#pixbay_query").val()!="")
		    {
		        $("#pixbay_submit").trigger("click");
		    }
		});

	});

</script>