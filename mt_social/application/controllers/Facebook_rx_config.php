<?php
require_once("Home.php");

class Facebook_rx_config extends Home
{

    /**
    * load constructor method
    * @access public
    * @return void
    */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in')!= 1) 
        redirect('home/login', 'location');        
        if ($this->session->userdata('user_type') != 'Admin')
        redirect('home/login_page', 'location');

        $this->important_feature();
        $this->periodic_check();
    }


    public function index()
    {
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('facebook_rx_config');
        $crud->order_by('app_name');
        $crud->set_subject($this->lang->line("facebook settings"));
        $crud->required_fields('api_id', 'api_secret','status','app_version');
        $crud->columns('app_name','api_id', 'api_secret','app_version','status','validity');
        $crud->fields('app_name','api_id', 'api_secret','app_version','numeric_id','status');

        $crud->where('user_id',$this->session->userdata('user_id'));

        $crud->callback_field('status', array($this, 'status_field_crud'));
        $crud->callback_column('status', array($this, 'status_display_crud'));
        $crud->callback_column('validity', array($this, 'validity_display_crud'));

        $crud->callback_after_insert(array($this, 'make_up_fb_setting'));

        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();
        $crud->unset_delete();

        $total_rows_array = $this->basic->count_row("facebook_rx_config",array("where"=>array('user_id'=>$this->session->userdata('user_id'))), $count="id"); 
        $total_result = $total_rows_array[0]['total_rows'];

        if($this->session->userdata("user_type")=="Member" && $total_result>0)
        $crud->unset_add();

        $crud->display_as('validity', $this->lang->line('Token Validity'));
        $crud->display_as('app_name', $this->lang->line('facebook app Name'));
        $crud->display_as('api_id', $this->lang->line('facebook App ID'));
        $crud->display_as('api_secret', $this->lang->line('facebook App secret'));
        $crud->display_as('status', $this->lang->line('status'));
        $crud->display_as('numeric_id', $this->lang->line('FB Numeric ID'));
        $crud->display_as('app_version', $this->lang->line('App Version'));
        $crud->display_as('validity', $this->lang->line('token validity'));

        $images_url = base_url("plugins/grocery_crud/themes/flexigrid/css/images/login.png");
        $crud->add_action('Login', $images_url, 'facebook_rx_config/fb_login');

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("Facebook Settings");
        $this->_viewcontroller($data);
    }

    public function make_up_fb_setting($post_array, $primary_key)
    {       
        if($this->session->userdata("user_type")=="Admin") $use_by = "everyone";
        else $use_by = "only_me";

        $this->basic->update_data("facebook_rx_config",array('id'=> $primary_key),array("user_id"=>$this->session->userdata("user_id"),'use_by'=>$use_by));
        return true;
    }

 
    public function fb_login($id)
    {     
        $this->session->set_userdata("fb_rx_login_database_id",$id);
        $this->load->library("fb_rx_login");
       
        $redirect_url = base_url()."home/redirect_rx_link";       
        $data['fb_login_button'] = $this->fb_rx_login->login_for_user_access_token($redirect_url);  

        $data['body'] = 'facebook_rx/admin_login';
        $data['page_title'] =  $this->lang->line("admin login");
        $data['expired_or_not'] = $this->fb_rx_login->access_token_validity_check();

        $this->_viewcontroller($data);
    }

    
    public function status_field_crud($value, $row)
    {
        if ($value == '') {
            $value = 1;
        }
        return form_dropdown('status', array(0 => $this->lang->line('inactive'), 1 => $this->lang->line('active')), $value, 'class="form-control" id="field-status"');
    }

    public function status_display_crud($value, $row)
    {
        if ($value == 1) {
            return "<span class='label label-success' title='Access Token : ".$row->user_access_token."'>".$this->lang->line('active')."</sapn>";
        } else {
            return "<span class='label label-warning' title='Access Token : ".$row->user_access_token."'>".$this->lang->line('inactive')."</sapn>";
        }
    } 

    function validity_display_crud($value, $row)
    {
        $input_token  = $row->user_access_token;

        if($input_token=="") 
        return "<span class='label label-warning' style='font-weight:normal'>".$this->lang->line('Invalid')."</sapn>";

        $this->load->library("fb_rx_login"); 
        $url="https://graph.facebook.com/debug_token?input_token={$input_token}&access_token={$input_token}";
        $result= $this->fb_rx_login->run_curl_for_fb($url);
        $result = json_decode($result,true);

        if(isset($result["data"]["is_valid"]) && $result["data"]["is_valid"]) 
        {
            return "<span class='label label-success' style='font-weight:normal'>".$this->lang->line('Valid')."</sapn>";
        } 
        else 
        {
            return "<span class='label label-warning' style='font-weight:normal'>".$this->lang->line('Expired')."</sapn>";
        }    
    }
}
