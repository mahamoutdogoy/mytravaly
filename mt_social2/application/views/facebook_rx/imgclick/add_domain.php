<section class="content-header">
   <section class="content">
     <div class="box box-info custom_box">
       <div class="box-header">
         <h3 class="box-title"><i class="fa fa-external-link"></i> <?php echo $this->lang->line("custom installation"); ?></h3>
       </div><!-- /.box-header -->
       <!-- form start -->
       <form class="form-horizontal" id="add_domain_form" action="" method="POST">
         <div class="box-body">
            <div class="form-group col-xs-12 col-md-3" style="padding:0 5px 0 0">
             <label class="col-xs-12 control-label" style="text-align:left !important;" for="protocol"> <?php echo $this->lang->line("protocol")?> *</label>
             <div class="col-xs-12">
               <?php echo form_dropdown('protocol',array("http://"=>"http://","https://"=>"https://"),set_value('protocol'),'class="form-control" id="protocol"'); ?>
               <span class="red"><?php echo form_error('protocol'); ?></span>
             </div>
             </div>
             <div class="form-group col-xs-12 col-md-9" style="padding:0 0 0 5px">
               <label class="col-xs-12 control-label" style="text-align:left !important;" for="action_link_controller"> <?php echo $this->lang->line("redirecting script URL (without protocol)")?> *</label>
               <div class="col-xs-12">
                 <input name="action_link_controller" placeholder="<?php echo $this->lang->line('example');?> : yourdomain.com/tracking.php" id="action_link_controller" value="<?php echo set_value('action_link_controller');?>"  class="form-control" type="text">
                 <span class="red"><?php echo form_error('action_link_controller'); ?></span>               
               </div>          
             </div>
             <div class="clearfix"></div>
             <div class="alert alert-info">
                 <?php echo $this->lang->line("Redirecting script URL must have to be a php file as like example. After submitting the form you will get a php script , simply copy that script and paste it to your redirecting script URL.")?> 
             </div>
           </div> <!-- /.box-body --> 
           <div class="box-footer">
            <div class="form-group">
             <div class="col-sm-12 text-center">
               <input name="button" type="button" id="submit_post" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line('submit'); ?>"/>         
               <input type="button" class="btn btn-default btn-lg" value="<?php echo $this->lang->line('cancel'); ?>" onclick='goBack("imgclick_custom_domain/index",0)'/>
             </div>
           </div>
         </div><!-- /.box-footer -->         
         </div><!-- /.box-info -->       
       </form>     
     </div>
   </section>
</section>


<script type="text/javascript">
  $j(document).ready(function() {
      $("#embed").hide();

      $(document.body).on('click','#submit_post',function(){ 
        if($("#action_link_controller").val()==""  || $("#protocol").val()=="")
        {
          alert("<?php echo $this->lang->line('* marked fields are required.')?>");
          return;
        }         

        $("#submit_post").val('<?php echo $this->lang->line("Processing");?>...');       
        $("#submit_post").addClass("disabled"); 
        $("#response_modal_content").removeClass("alert-danger");
        $("#response_modal_content").removeClass("alert-success");
        var loading = '<img src="'+base_url+'assets/pre-loader/Surrounded segments.gif" class="center-block">';
        $("#response_modal_content").html(loading);
        $("#response_modal").modal();

          var queryString = new FormData($("#add_domain_form")[0]);
          $.ajax({
           type:'POST' ,
           url: base_url+"imgclick_custom_domain/add_domain_action",
           data: queryString,
           dataType : 'JSON',
           cache: false,
           contentType: false,
           processData: false,
           success:function(response)
           {               
            $("#submit_post").removeClass("disabled");
            $("#submit_post").val('<?php echo $this->lang->line("submit")?>');    


            if(response.status=="1")
            {
              $("#response_modal_content").removeClass("alert-danger");
              $("#response_modal_content").addClass("alert-info");
              $("#response_modal_content").html(response.message);
              $("#embed").html(response.source).show();
            }
            else
            {
              $("#response_modal_content").removeClass("alert-info");
              $("#response_modal_content").addClass("alert-danger");
              $("#response_modal_content").html(response.message);
              $("#embed").hide();
            }

           }

        });

    });

    $('#response_modal').on('hidden.bs.modal', function () { 
    var link="<?php echo site_url('imgclick_custom_domain/settings'); ?>"; 
    window.location.assign(link); 
    })
    
  });
</script>

<style type="text/css" media="screen">
  td,th{background:#fff}
</style>

<div class="modal fade" id="response_modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-plus"></i> <?php echo $this->lang->line("custom installation"); ?></h4>
      </div>
      <div class="modal-body">
        <div class="alert text-center">
          <div class="alert text-center" id="response_modal_content"></div>
          <textarea id="embed" style="width: 100%;height:400px;"></textarea>          
        </div>
      </div>
    </div>
  </div>
</div>