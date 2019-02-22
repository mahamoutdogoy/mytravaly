  <div class='container-fluid' >
      <div class='row'>
         <a href="<?php echo base_url(); ?>"> <img src="<?php echo site_url('assets/images/logo1.png');?>" class="center-block" style="margin-top:50px;max-width:200px;"></a>
          <div id='form-container' class='col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4'>
              <form action="<?php echo site_url('home/sign_up_action'); ?>" method="POST" class='full'>
                  <div id='form-header' class='full'>
                      <h3><?php echo $this->lang->line("Sign Up"); ?></h3>
                  </div>

                  <div id='form-body' class='full'>
                      <?php 
                        if($this->session->userdata('reg_success') == 1) {
                          echo "<div class='alert alert-success'>".$this->lang->line("an activation code has been sent to your email. please check your inbox to activate your account.")."</div>";
                          $this->session->unset_userdata('reg_success');
                        }

                        // if($this->session->userdata('jzvoo_error') != ''){
                        //       echo '<div class="alert alert-danger text-center">Sorry! We have not received any payment against this email.</div>';
                        //       $this->session->unset_userdata('jzvoo_error');
                        //      }    
                      ?>

                      <!-- <p class='error'>Username or Password is invalid</p> -->

                       <div class='form-group'>
                          <i class='fa fa-user'></i>
                          <input type='text' name="name" placeholder="<?php echo $this->lang->line('Name'); ?> *" class='form-control' value="<?php echo set_value('name');?>"/>
                           <span style="color:red"><?php echo form_error('name'); ?></span>
                      </div>   

                      <div class='form-group'>
                          <i class='fa fa-envelope'></i>
                          <input type='email' name="email" placeholder="<?php echo $this->lang->line('Email'); ?> *" class='form-control'  value="<?php echo set_value('email');?>"/>
                           <span style="color:red"><?php echo form_error('email'); ?></span>
                      </div>   
                      
                      <div class='form-group'>
                          <i class='fa fa-lock'></i>
                          <input type='password' placeholder="<?php echo $this->lang->line('Password'); ?> *" name="password" class='form-control' value="<?php echo set_value('password');?>"/>
                           <span style="color:red"><?php echo form_error('password'); ?></span>
                      </div> 

                      <div class='form-group'>
                          <i class='fa fa-lock'></i>
                          <input type='password' placeholder="<?php echo $this->lang->line('Confirm Password'); ?> *" name="confirm_password" class='form-control' value="<?php echo set_value('confirm_password');?>"/>
                           <span style="color:red"><?php echo form_error('confirm_password'); ?></span>
                      </div>  

                      <!-- <?php echo "<h4 class='text-center'>".$this->lang->line("captcha").": ".$num1. "+". $num2." = ?</h4>"; ?>
                      <div class='form-group'>
                          <i class='fa fa-android'></i>
                          <input type='password' placeholder='<?php echo $this->lang->line("put the answer of captcha");?> *' name="captcha" class='form-control' value="<?php echo set_value('captcha');?>"/>
                          <span style="color:red;margin-top:5px;">
                            <?php 
                            if(form_error('captcha')) 
                            echo form_error('captcha'); 
                            else  
                            { 
                              echo $this->session->userdata("sign_up_captcha_error"); 
                              $this->session->unset_userdata("sign_up_captcha_error"); 
                            } ?>
                          </span>
                      </div>  -->
 

                      <div class='form-group'>
                          <input type='submit' value="<?php echo $this->lang->line('SIGN UP'); ?>" class='btn btn-block btn-submit'/>
                      </div>
                  </div>

                  <!-- <div id='form-footer' class='full'>
                      <br>                     
                  </div> -->
              </form>    
          </div>
      </div> <!-- end row -->
  </div> <!-- end container-fluid -->


