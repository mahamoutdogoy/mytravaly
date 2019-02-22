<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
    <li> <a href="<?php echo site_url()."dashboard/index"; ?>"> <i class="fa fa-dashboard"></i> <span><?php echo $this->lang->line("dashboard"); ?></span></a></li>

     <?php if ($this->session->userdata('user_type') == 'Admin') : ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-plus"></i> <span><?php echo $this->lang->line("administration"); ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url()."admin_config/configuration"; ?>"><i class="fa fa-wrench"></i> <?php echo $this->lang->line("general settings"); ?></a></li>
          <li><a href="<?php echo site_url()."admin/user_management"; ?>"><i class="fa fa-user"></i> <?php echo $this->lang->line("user management"); ?></a></li>
          <li><a href="<?php echo site_url()."admin_config_email/index"; ?>"><i class="fa fa-envelope"></i> <?php echo $this->lang->line("email settings"); ?></a></li>
          <li><a href="<?php echo site_url()."admin_config_login/login_config"; ?>"><i class="fa fa-sign-in"></i> <?php echo $this->lang->line("social login settings"); ?></a></li>
          <li><a href="<?php echo site_url()."admin_config/analytics_config"; ?>"><i class="fa fa-pie-chart"></i><?php echo $this->lang->line('analytics settings');?></a></li>
          <li><a href="<?php echo site_url()."admin_config/purchase_code_configuration"; ?>"><i class="fa fa-code"></i><?php echo $this->lang->line('purchase code settings');?></a></li>
          <li><a href="<?php echo site_url()."admin_config_ad/ad_config"; ?>"><i class="fa fa-bullhorn"></i><?php echo $this->lang->line('advertisement settings');?></a></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-plug"></i> <span><?php echo $this->lang->line("API Settings"); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
              <li><a href='<?php echo site_url()."facebook_rx_config/index"; ?>'><i class="fa fa-facebook-official"></i> <?php echo $this->lang->line("facebook settings"); ?></a></li>
              <li><a href='<?php echo site_url()."admin_config_accounts/twitter_settings"; ?>'><i class="fa fa-twitter"></i> <?php echo $this->lang->line("twitter settings"); ?></a></li>
              <li><a href='<?php echo site_url()."admin_config_accounts/linkedin_settings"; ?>'><i class="fa fa-linkedin"></i> <?php echo $this->lang->line("linkedin settings"); ?></a></li>
              <li><a href='<?php echo site_url()."admin_config_accounts/tumblr_settings"; ?>'><i class="fa fa-tumblr"></i> <?php echo $this->lang->line("Tumblr settings"); ?></a></li>
              <li><a href='<?php echo site_url()."admin_config_accounts/pinterest_settings"; ?>'><i class="fa fa-pinterest-p"></i> <?php echo $this->lang->line("Pinterest settings"); ?></a></li>
              <li><a href='<?php echo site_url()."admin_config_accounts/img_api_settings"; ?>'><i class="fa fa-photo"></i> <?php echo $this->lang->line("pixabay api settings"); ?></a></li>
            </ul>
          </li> <!-- end settings -->

          <li class="treeview">
            	<a href="#">
            	  	<i class="fa fa-paypal"></i> <span><?php echo $this->lang->line("Payment"); ?></span>
            	  	<i class="fa fa-angle-left pull-right"></i>
            	</a>
            	<ul class="treeview-menu">
            	  	<li><a href="<?php echo site_url()."payment/payment_dashboard_admin"; ?>"> <i class="fa fa-dashboard"></i> <?php echo $this->lang->line("Dashboard"); ?></a></li>
            	  	<li><a href="<?php echo site_url()."payment/package_settings"; ?>"><i class="fa fa-cube"></i> <?php echo $this->lang->line("Package management"); ?></a></li>
            	  	<li><a href="<?php echo site_url()."payment/payment_setting_admin"; ?>"><i class="fa fa-cog"></i> <?php echo $this->lang->line("Payment Settings"); ?></a></li>
            	  	<li><a href="<?php echo site_url()."payment/admin_payment_history"; ?>"><i class="fa fa-history"></i> <?php echo $this->lang->line("Payment History"); ?></a></li>
            	</ul>
      	  </li>

        </ul>
      </li>
      <?php endif; ?>

      <?php if($this->session->userdata('user_type') == 'Member'): ?>
        <li > <a href="<?php echo site_url()."payment/usage_history"; ?>"> <i class="fa fa-list-ol"></i> <span><?php echo $this->lang->line("usage log"); ?></span></a></li>
        <li > <a href="<?php echo site_url()."payment/member_payment_history"; ?>"> <i class="fa fa-paypal"></i> <span><?php echo $this->lang->line("Payment"); ?></span></a></li>
      <?php endif; ?>

      <?php if($this->session->userdata("user_type")=="Admin" || count(array_intersect($this->module_access, array(108,109)))>0 ) : ?>
        <?php if($this->session->userdata("user_type")=="Admin" || count(array_intersect($this->module_access, array(65,104,105,106,107)))>0 ) : ?>
          <li> <a href="<?php echo site_url()."imgclick/social_network_accounts"; ?>"> <i class="fa fa-download"></i> <span><?php echo $this->lang->line("Import Social Accounts"); ?></span></a></li>
        <?php endif; ?>
        <li> <a href="<?php echo site_url()."imgclick/create_campaign"; ?>"> <i class="fa fa-plus"></i> <span><?php echo $this->lang->line("create campaign"); ?></span></a></li><li> <a href="<?php echo site_url()."imgclick/campaign_list"; ?>"> <i class="fa fa-th"></i> <span><?php echo $this->lang->line("campaign list"); ?></span></a></li>

      <?php endif; ?>



      <?php if($this->session->userdata("user_type")=="Admin" || count(array_intersect($this->module_access, array(110,113)))>0 ) : ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-star"></i> <span><?php echo $this->lang->line("Domain Settings"); ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">


          <?php if($this->session->userdata('user_type') == 'Admin' || in_array(113,$this->module_access)): ?>
            <?php $is_hidden_wp="";if(!file_exists('plugins/customdomain.zip') && $this->session->userdata('user_type') == 'Member' ) $is_hidden_wp="hidden";?>
            <li class="<?php echo $is_hidden_wp;?>"> <a href="<?php echo site_url()."imgclick_custom_domain/wordpress"; ?>"> <i class="fa fa-wordpress"></i> <?php echo $this->lang->line("Wordpress Installation"); ?></a></li>
          <?php endif; ?>
          <?php if($this->session->userdata('user_type') == 'Admin' || in_array(110,$this->module_access)): ?>
            <li > <a href="<?php echo site_url()."imgclick_custom_domain/add_domain"; ?>"> <i class="fa fa-external-link"></i> <?php echo $this->lang->line("Custom Installation"); ?></a></li>
          <?php endif; ?>
           <li > <a href="<?php echo site_url()."imgclick_custom_domain/settings"; ?>"> <i class="fa fa-list"></i> <?php echo $this->lang->line("Domain List"); ?></a></li>

        </ul>
      </li>
      <?php endif; ?>

      <li> <a href="<?php echo site_url()."imgclick/image_library"; ?>"> <i class="fa fa-image"></i> <span><?php echo $this->lang->line("web image library"); ?></span></a></li>

      <?php if($this->session->userdata('user_type') == 'Admin'): ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-clock-o"></i> <span><?php echo $this->lang->line("cron job setup"); ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <?php if($this->session->userdata('user_type') == 'Admin' || in_array(15,$this->module_access)): ?>
            <li > <a href="<?php echo site_url()."native_api/index"; ?>"> <i class="fa fa-key"></i> <?php echo $this->lang->line("API Key"); ?></a></li>
          <?php endif; ?>

          <?php if ($this->session->userdata('user_type') == 'Admin') : ?>
            <li><a href="<?php echo site_url('cron_job/index'); ?>"><i class="fa fa-code"></i> <span><?php echo $this->lang->line("cron job command"); ?></span></a></li>
          <?php endif; ?>

        </ul>
      </li>
      <li> <a href="<?php echo site_url()."update_system/index"; ?>"> <i class="fa fa-angle-double-up"></i> <span><?php echo $this->lang->line("check update"); ?></span></a></li>
      <?php endif; ?>



    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
