  <div class='container-fluid'>
      <div class='row'>
         <a href="<?php echo base_url(); ?>"> <img src="<?php echo site_url('assets/images/logo1.png');?>" class="center-block" style="margin-top:50px;max-width:200px;"></a>
          <div id='form-container' class='col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4'>
              <form action="<?php echo site_url('home/login');?>" method="POST" class='full'>
                  <div id='form-header' class='full'>
                      <h3><?php echo $this->lang->line("Log In"); ?></h3>
                  </div>

                  <div id='form-body' class='full'>
                    <?php 
                        if($this->session->flashdata('login_msg')!='') 
                        {
                            echo "<div class='alert alert-danger text-center'>"; 
                                echo $this->session->flashdata('login_msg');
                            echo "</div>"; 

                        }   

                        if($this->session->flashdata('reset_success')!='') 
                        {
                            echo "<div class='alert alert-success text-center'>"; 
                                echo $this->session->flashdata('reset_success');
                            echo "</div>"; 

                        } 
                        if($this->session->userdata('reg_success') != '')
                        {
                          echo '<div class="alert alert-success text-center">'.$this->session->userdata("reg_success").'</div>';
                          $this->session->unset_userdata('reg_success');
                        }  


                        // if($this->session->userdata('jzvoo_success') != '')
                        // {
                        //   echo '<div class="alert alert-success text-center">'.$this->lang->line("your account has been created successfully. please login.").'</div>';
                        //   $this->session->unset_userdata('jzvoo_success');

                        // }    

                      ?>

                      <!-- <p class='error'>Username or Password is invalid</p> -->
                      <div class='form-group'>
                          <i class='fa fa-user'></i>
                          <input type='text' name="username" placeholder="<?php echo $this->lang->line('Email'); ?>" class='form-control'/>
                           <span style="color:red"><?php echo form_error('username'); ?></span>
                      </div>   
                      
                      <div class='form-group'>
                          <i class='fa fa-lock'></i>
                          <input type='password' placeholder="<?php echo $this->lang->line('Password'); ?>" name="password" class='form-control'/>
                           <span style="color:red"><?php echo form_error('password'); ?></span>
                      </div>  

                      <div class='form-group'>
                          <input type='submit' value="<?php echo $this->lang->line('LOGIN'); ?>" class='btn btn-block btn-submit'/>
                      </div>

                      <div class='form-group'>                    
                          <div class='text-center'>
                              <a class='forget' href='<?php echo site_url('home/forgot_password');?>'><?php echo $this->lang->line("Forgot Password?"); ?></a>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                    
                    <div class="text-center">      
                      <?php echo  str_replace("ThisIsTheLoginButtonForGoogle",$this->lang->line("login with google"), $google_login_button); ?>
                      <?php echo  str_replace("ThisIsTheLoginButtonForFacebook",$this->lang->line("login with facebook"), $fb_login_button); ?>
                    </div>
         
                  </div>

                  <div id='form-footer' class='full'>
                      <br>
                      <div class='col-xs-6 col-sm-6 padding-0'>
                          <p class='para-bottom'><?php echo $this->lang->line("Need new account?"); ?></p>
                      </div>
                      <div class='col-xs-6 col-sm-6 padding-0'>
                          <a href='<?php echo base_url("home/sign_up"); ?>' class='btn btn-default btn-signup'><?php echo $this->lang->line("Sign Up"); ?></a>
                      </div>
                  </div>
              </form> 
              <div class="clearfix"></div>

          </div>

      </div> <!-- end row -->
  </div> <!-- end container-fluid -->



