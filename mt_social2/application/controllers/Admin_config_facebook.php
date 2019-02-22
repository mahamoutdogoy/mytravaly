<?php
require_once("Home.php");

/**
* class admin_config_facebook
* @category controller
*/
class Admin_config_facebook extends Home
{

    /**
    * load constructor method
    * @access public
    * @return void
    */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in')!= 1) {
            redirect('home/login', 'location');
        }

        if($this->session->userdata('user_type') != 'Admin')
        redirect('home/login_page', 'location'); 

        $this->important_feature();
        $this->periodic_check();
    }

    /**
    * load index method. redirect to facebook_config
    * @access public
    * @return void
    */
    public function index()
    {
        $this->facebook_config();
    }

    /**
    * method to load facebook_config
    * @access public
    * @return void
    */
    public function facebook_config()
    {
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('facebook_config');
        $crud->order_by('app_name');
        $crud->set_subject($this->lang->line("facebook settings"));
        $crud->required_fields('api_id', 'api_secret','status');
        $crud->columns('app_name','api_id', 'api_secret','status');
        $crud->fields('app_name','api_id', 'api_secret','status');
        $crud->where('deleted','0');
        $crud->where('user_id',$this->session->userdata('user_id'));

        // Only one can be active at a time
        $crud->callback_after_insert(array($this, 'make_up_active_fb_setting'));
        $crud->callback_after_update(array($this, 'make_up_active_fb_setting_edit'));

        $crud->callback_field('status', array($this, 'status_field_crud'));
        $crud->callback_column('status', array($this, 'status_display_crud'));
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();

        $crud->display_as('app_name', $this->lang->line('facebook app Name'));
        $crud->display_as('api_id', $this->lang->line('facebook API ID'));
        $crud->display_as('api_secret', $this->lang->line('facebook API secret'));
        $crud->display_as('status', $this->lang->line('status'));

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("facebook search settings");
        $this->_viewcontroller($data);
    }

    /**
    * method to active facebook setting
    * @access public
    * @return boolean
    */

    public function make_up_active_fb_setting($post_array, $primary_key)
    {
        if ($post_array['status']=='1') {
            $table="facebook_config";
            $where=array('id !='=> $primary_key,"user_id"=>$this->session->userdata('user_id'));
            $data=array("status"=>"0");
            $this->basic->update_data($table, $where, $data);
            $this->db->last_query();
        }

        $this->basic->update_data("facebook_config",array('id'=> $primary_key),array("user_id"=>$this->session->userdata("user_id")));

        return true;
    }

    /**
    * method to active facebook setting edit
    * @access public
    * @return boolean
    */

    public function make_up_active_fb_setting_edit($post_array, $primary_key)
    {
        if ($post_array['status']=='1') {
            $table="facebook_config";
            $where=array('id !='=> $primary_key,"user_id"=>$this->session->userdata('user_id'));
            $data=array("status"=>"0");
            $this->basic->update_data($table, $where, $data);
            $this->db->last_query();
        }
        return true;
    }


    /**
    * method to load status_field_crud
    * @access public
    * @return from_dropdown dropdown
    * @param $value string
    * @param $row	array
    */
    public function status_field_crud($value, $row)
    {
        if ($value == '') {
            $value = 1;
        }
        return form_dropdown('status', array(0 => $this->lang->line('inactive'), 1 => $this->lang->line('active')), $value, 'class="form-control" id="field-status"');
    }

    /**
    * method to load status_display_crud
    * @access public
    * @return message string
    * @param $value integer
    * @param $row  array
    */
    public function status_display_crud($value, $row)
    {
        if ($value == 1) {
            return "<span class='label label-success'>".$this->lang->line('active')."</sapn>";
        } else {
            return "<span class='label label-warning'>".$this->lang->line('inactive')."</sapn>";
        }
    }
}
