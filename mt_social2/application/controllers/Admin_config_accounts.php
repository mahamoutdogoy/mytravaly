<?php
require_once("Home.php"); // including home controller

/**
* class config
* @category controller
*/
class Admin_config_accounts extends Home
{

    public $user_id;
    /**
    * load constructor method
    * @access public
    * @return void
    */
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in')!= 1) {
            redirect('home/login_page', 'location');
        }

        $this->user_id=$this->session->userdata('user_id');
        $this->important_feature();        
        $this->periodic_check(); 
    }

    /**
    * load index method. redirect to config
    * @access public
    * @return void
    */
    public function index()
    {
        $this->configuration();
    }


    public function twitter_settings()
    {
        
        if ($this->session->userdata('user_type')!= 'Admin') {
            redirect('home/login_page', 'location');
        }

        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('twitter_config');
        $crud->where('deleted', '0');
        $crud->order_by('id');
        $crud->set_subject($this->lang->line("twitter settings"));
        $crud->required_fields('consumer_key', 'consumer_secret');
        $crud->columns('consumer_key', 'consumer_secret');
        $crud->fields('consumer_key', 'consumer_secret');
        
        $crud->unset_export();
        $crud->unset_print();
        // $crud->unset_read();

        $crud->display_as('consumer_key', $this->lang->line('Consumer Key'));
        $crud->display_as('consumer_secret', $this->lang->line('Consumer Secret'));

        $crud->callback_after_insert(array($this, 'insert_user_id_twitter')); 

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("twitter settings");
        $this->_viewcontroller($data);
    }


    public function insert_user_id_twitter($post_array, $primary_key)
    {
        $id = $primary_key;
        $where = array('id'=>$id);
        $table = 'twitter_config';
        $data = array('user_id'=>$this->session->userdata("user_id"));
        $this->basic->update_data($table, $where, $data);
        return true;
    }
    

    public function linkedin_settings()
    {
        
        if ($this->session->userdata('user_type')!= 'Admin') {
            redirect('home/login_page', 'location');
        }

        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('linkedin_config');
        $crud->where('deleted', '0');
        $crud->order_by('id');
        $crud->set_subject($this->lang->line("linkedin settings"));
        $crud->required_fields('client_id', 'client_secret');
        $crud->columns('client_id', 'client_secret');
        $crud->fields('client_id', 'client_secret');
        
        $crud->unset_export();
        $crud->unset_print();
        // $crud->unset_read();

        $crud->display_as('client_id', $this->lang->line('Client ID'));
        $crud->display_as('client_secret', $this->lang->line('Client Secret'));

        $crud->callback_after_insert(array($this, 'insert_user_id_linkedin')); 

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("linkedin settings");
        $this->_viewcontroller($data);
    }


    public function insert_user_id_linkedin($post_array, $primary_key)
    {
        $id = $primary_key;
        $where = array('id'=>$id);
        $table = 'linkedin_config';
        $data = array('user_id'=>$this->session->userdata("user_id"));
        $this->basic->update_data($table, $where, $data);
        return true;
    }


    public function tumblr_settings()
    {
        
        if ($this->session->userdata('user_type')!= 'Admin') {
            redirect('home/login_page', 'location');
        }

        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('tumblr_config');
        $crud->where('deleted', '0');
        $crud->order_by('id');
        $crud->set_subject($this->lang->line("tumblr settings"));
        $crud->required_fields('consumer_key', 'consumer_secret');
        $crud->columns('consumer_key', 'consumer_secret');
        $crud->fields('consumer_key', 'consumer_secret');
        
        $crud->unset_export();
        $crud->unset_print();
        // $crud->unset_read();

        $crud->display_as('consumer_key', $this->lang->line('Consumer Key'));
        $crud->display_as('consumer_secret', $this->lang->line('Consumer Secret'));

        $crud->callback_after_insert(array($this, 'insert_user_id_tumblr')); 

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("tumblr settings");
        $this->_viewcontroller($data);
    }


    public function insert_user_id_tumblr($post_array, $primary_key)
    {
        $id = $primary_key;
        $where = array('id'=>$id);
        $table = 'tumblr_config';
        $data = array('user_id'=>$this->session->userdata("user_id"));
        $this->basic->update_data($table, $where, $data);
        return true;
    }


    public function pinterest_settings()
    {
        $data['page_title'] = $this->lang->line("pinterest settings");
        $data['body'] = 'pinterest_settings/pinterest_setting';
        $this->_viewcontroller($data);
    }

    public function pinterest_config_data()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        redirect('home/access_forbidden', 'location');

        $page = isset($_POST['page']) ? intval($_POST['page']) : 15;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'ASC';

        $app_id = trim($this->input->post("app_id", true));
        $app_name = trim($this->input->post("app_name", true));
        $user_name = trim($this->input->post("user_name", true));
        $is_searched = $this->input->post('is_searched', true);

        if ($is_searched) 
        {
            $this->session->set_userdata('pinterest_config_app_id', $app_id);
            $this->session->set_userdata('pinterest_config_app_name', $app_name);
            $this->session->set_userdata('pinterest_config_user_name', $user_name);
        }

        // saving session data to different search parameter variables
        $search_app_id  = $this->session->userdata('pinterest_config_app_id');
        $search_app_name  = $this->session->userdata('pinterest_config_app_name');
        $search_user_name  = $this->session->userdata('pinterest_config_user_name');

        $where_simple=array();        
        if ($search_app_id) $where_simple['app_id like '] = "%".$search_app_id."%";
        if ($search_app_name) $where_simple['app_name like '] = "%".$search_app_name."%";
        if ($search_user_name) $where_simple['user_name like '] = "%".$search_user_name."%";

        // $where_simple['page_info_table_id'] = $table_id;
        $where_simple['user_id'] = $this->user_id;

        $where  = array('where'=>$where_simple);
        $order_by_str=$sort." ".$order;
        $offset = ($page-1)*$rows;
        $result = array();
        $table = "pinterest_config";
        // $select = array('id','auto_reply_campaign_name','post_created_at','last_updated_at');
        $info = $this->basic->get_data($table, $where, $select='', $join='', $limit=$rows, $start=$offset, $order_by=$order_by_str, $group_by='');
        $total_rows_array = $this->basic->count_row($table, $where, $count="id", $join='');
        $total_result = $total_rows_array[0]['total_rows'];

        echo convert_to_grid_data($info, $total_result);

    }

    public function add_pinterest_settings()
    {
        $data['page_title'] = $this->lang->line("pinterest settings");
        $data['body'] = 'pinterest_settings/add_settings';
        $this->_viewcontroller($data);
    }

    public function add_pinterest_settings_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            redirect('home/access_forbidden', 'location');
        }
        if ($_POST) 
        {
            $this->form_validation->set_rules('app_id',  '<b>'.$this->lang->line("App ID").'</b>','trim|required');                
            $this->form_validation->set_rules('app_name',  '<b>'.$this->lang->line("App Name").'</b>','trim|required');                
            $this->form_validation->set_rules('app_secret',  '<b>'.$this->lang->line("App Secret").'</b>','trim|required');  
            // go to config form page if validation wrong
            if ($this->form_validation->run() == false) 
            {
                return $this->add_pinterest_settings();
            } 
            else 
            {
                $app_id=addslashes(strip_tags($this->input->post('app_id', true)));
                $app_name=addslashes(strip_tags($this->input->post('app_name', true)));
                $app_secret=addslashes(strip_tags($this->input->post('app_secret', true)));

                $insert_data = array(
                    'app_id' => $app_id,
                    'app_name' => $app_name,
                    'app_secret' => $app_secret,
                    'user_id' => $this->user_id
                );

                if($this->basic->insert_data('pinterest_config',$insert_data))
                {
                    $this->session->set_flashdata('success_message', 1);
                    redirect('admin_config_accounts/pinterest_settings', 'location');
                }
                
            }
        }

    }

    public function update_pinterest_config($table_id)
    {
        $app_info = $this->basic->get_data('pinterest_config',array('where'=>array('id'=>$table_id)));
        $data['info'] = $app_info;
        $data['page_title'] = $this->lang->line("pinterest settings");
        $data['body'] = 'pinterest_settings/edit_settings';
        $this->_viewcontroller($data);

    }

    public function update_pinterest_config_action($table_id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            redirect('home/access_forbidden', 'location');
        }
        if ($_POST) 
        {
            $this->form_validation->set_rules('app_id',  '<b>'.$this->lang->line("App ID").'</b>','trim|required');                
            $this->form_validation->set_rules('app_name',  '<b>'.$this->lang->line("App Name").'</b>','trim|required');                
            $this->form_validation->set_rules('app_secret',  '<b>'.$this->lang->line("App Secret").'</b>','trim|required');  
            // go to config form page if validation wrong
            if ($this->form_validation->run() == false) 
            {
                return $this->update_pinterest_config($table_id);
            } 
            else 
            {
                $app_id=addslashes(strip_tags($this->input->post('app_id', true)));
                $app_name=addslashes(strip_tags($this->input->post('app_name', true)));
                $app_secret=addslashes(strip_tags($this->input->post('app_secret', true)));

                $insert_data = array(
                    'app_id' => $app_id,
                    'app_name' => $app_name,
                    'app_secret' => $app_secret
                );

                if($this->basic->update_data('pinterest_config',array('id'=>$table_id),$insert_data))
                {
                    $this->session->set_flashdata('success_message', 1);
                    redirect('admin_config_accounts/pinterest_settings', 'location');
                }
                
            }
        }

    }

    public function pinterest_login_button($table_id)
    {
        $this->session->unset_userdata('pinterest_config_table_id');
        $this->session->set_userdata('pinterest_config_table_id',$table_id);
        $this->load->library('Pinterests');
        $this->pinterests->app_initialize($table_id);

        $redirect_pin_url = base_url("imgclick/pinterest_login_callback");
        $redirect_pin_url=str_replace('http://','https://',$redirect_pin_url);
        $data['pinterest_login_button'] = $this->pinterests->login_button($redirect_pin_url);
        $data['page_title'] = $this->lang->line("pinterest settings");
        $data['body'] = 'pinterest_settings/pinterest_login_button';
        $this->_viewcontroller($data);
    }

    public function delete_pinterest_config()
    {
        if(!$_POST) exit();
        $pinterest_config_table_id = $this->input->post('table_id');

        $this->basic->delete_data('pinterest_config',array('id'=>$pinterest_config_table_id));
        $this->basic->delete_data('rx_pinterest_info',array('pinterest_table_id'=>$pinterest_config_table_id));
        echo 'success';

    }








    public function img_api_settings()
    {
        
        if ($this->session->userdata('user_type')!= 'Admin') {
            redirect('home/login_page', 'location');
        }

        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('img_api_config');
        $crud->where('deleted', '0');
        $crud->order_by('id');
        $crud->set_subject($this->lang->line("pixabay api settings"));
        $crud->required_fields('api_key','status');
        $crud->columns('api_key','status');
        $crud->fields('api_key','status');
        $crud->callback_field('status', array($this, 'status_field_crud'));
        $crud->callback_column('status', array($this, 'status_display_crud'));
        
        $crud->unset_export();
        $crud->unset_print();
        $crud->unset_read();

        $crud->display_as('api_key', $this->lang->line('api key'));
        $crud->display_as('api_secret', $this->lang->line('api secret'));
        // $crud->display_as('api_name', $this->lang->line('api name'));
        $crud->display_as('status', $this->lang->line('status'));

        $output = $crud->render();
        $data['output'] = $output;
        $data['crud'] = 1;
        $data['page_title'] = $this->lang->line("pixabay api settings");
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
            return "<span class='label label-success'>".$this->lang->line('active')."</sapn>";
        } else {
            return "<span class='label label-warning'>".$this->lang->line('inactive')."</sapn>";
        }
    }




}
