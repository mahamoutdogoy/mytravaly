<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">
        <div class="box box-info custom_box">
                <div class="box-header">
                 <h3 class="box-title"><i class="fa fa-cogs"></i> <?php echo $this->lang->line("purchase code settings");?></h3>
                </div><!-- /.box-header -->
                    <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config/edit_purchase_code_config';?>" method="POST">
                <div class="box-body">
                   <div class="form-group">
                        <label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("purchase code");?>
                        </label>
                        <?php
                            $file_data = file_get_contents(APPPATH . 'core/licence.txt');
                            $file_data_array = json_decode($file_data, true);
                        ?>
                        <div class="col-sm-9 col-md-6 col-lg-6">
                            <input name="purchase_code" value="<?php echo $file_data_array['purchase_code'];?>"  disabled class="form-control" type="text">                
                            <span class="red"><?php echo form_error('purchase_code'); ?></span>
                        </div>
                   </div>

                </div> <!-- /.box-body --> 

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <input name="submit" type="submit" class="btn btn-danger btn-lg" value="<?php echo $this->lang->line("delete purchase code");?>"/>  
                            <input type="button" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line("cancel");?>" onclick='goBack("admin_config/purchase_code_configuration",1)'/>  
                        </div>
                    </div>
                </div><!-- /.box-footer -->         
                </div><!-- /.box-info -->       
            </form>     
        </div>
   </section>
</section>