<?php $this->load->view('admin/theme/message'); ?>
<section class="content-header">
   <section class="content">
        <div class="box box-info custom_box">
                <div class="box-header">
                 <h3 class="box-title"><i class="fa fa-pie-chart"></i> <?php echo $this->lang->line("analytics settings");?></h3>
                </div><!-- /.box-header -->
                    <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'admin_config/analytics_config_action';?>" method="POST">
                <div class="box-body">
                   <div class="form-group">
                        <label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("enter your facebook pixel code");?>
                        </label>
                        <?php
                            $pixel_code = file_get_contents(APPPATH . 'views/include/fb_px.php');
                        ?>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <textarea name="pixel_code" class="form-control" rows="10"><?php echo $pixel_code;?></textarea>        
                            <span class="red"><?php echo form_error('pixel_code'); ?></span>
                        </div>
                   </div>

                   <div class="form-group">
                        <label class="col-sm-3 control-label" for=""><?php echo $this->lang->line("enter your google analytics code");?>
                        </label>
                        <?php
                            $file_data = file_get_contents(APPPATH . 'views/include/google_code.php');
                        ?>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <textarea name="google_code" class="form-control" rows="10"><?php echo $file_data;?></textarea>        
                            <span class="red"><?php echo form_error('google_code'); ?></span>
                        </div>
                   </div>

                </div> <!-- /.box-body --> 

                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <input name="submit" type="submit" class="btn btn-info btn-lg" value="<?php echo $this->lang->line("submit");?>"/>  
                            <input type="button" class="btn btn-warning btn-lg" value="<?php echo $this->lang->line("Cancel");?>" onclick='goBack("admin_config/analytics_config",1)'/>  
                        </div>
                    </div>
                </div><!-- /.box-footer -->         
                </div><!-- /.box-info -->       
            </form>     
        </div>
   </section>
</section>