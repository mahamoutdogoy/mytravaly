<?php
require_once("Home.php"); // loading home controller

/**
* @category controller
* class Admin
*/

class Admin extends Home
{

    public $user_id;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');
        if ($this->session->userdata('user_type') != 'Admin')
        redirect('home/login_page', 'location');

        $this->load->helper('form');
        $this->load->library('upload');
        $this->upload_path = realpath(APPPATH . '../upload');
        $this->user_id=$this->session->userdata('user_id');

        $this->important_feature();
        $this->periodic_check();

    }


    public function index()
    {
        $this->user_management();
    }

     public function user_management()
    {
        $this->load->database();
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_theme('flexigrid');
        $crud->set_table('users');
        $crud->order_by('id');
        $crud->where('users.deleted', '0');
        $crud->set_subject($this->lang->line("user"));
        $crud->set_relation('package_id','package','package_name',array('package.deleted' => '0'));

        $crud->fields('name', 'email', 'mobile', 'password', 'address', 'user_type', 'status');

        $crud->edit_fields('name', 'email', 'mobile', 'address','expired_date','package_id', 'status');

        $crud->add_fields('name', 'email', 'mobile', 'password', 'address', 'user_type', 'status');

        $crud->required_fields('name', 'email', 'password', 'user_type','expired_date','package_id', 'status');

        $crud->columns('name', 'email','package_id', 'status', 'user_type', 'add_date','last_login_at','expired_date');

        $crud->field_type('password', 'password');
        $crud->field_type('expired_date', 'date');

        $crud->display_as('add_date',$this->lang->line('Register date'));
        // $crud->display_as('purchase_date','Purchase date');
        $crud->display_as('last_login_at',$this->lang->line('Last Logged in'));
        $crud->display_as('name', $this->lang->line('name'));
        $crud->display_as('email', $this->lang->line('email'));
        $crud->display_as('mobile', $this->lang->line('mobile'));
        $crud->display_as('address', $this->lang->line('address'));
        $crud->display_as('status', $this->lang->line('status'));
        $crud->display_as('user_type', $this->lang->line('Type'));
        $crud->display_as('password', $this->lang->line('password'));
        $crud->display_as('package_id', $this->lang->line('package name'));
        $crud->display_as('expired_date', $this->lang->line('expiry date')."");
        $crud->unset_texteditor('address');

       
        $crud->set_rules("email",$this->lang->line("email"),'valid_email|callback_unique_email_check['.$this->uri->segment(4).']');


        $images_url = base_url("plugins/grocery_crud/themes/flexigrid/css/images/password.png");
        $crud->add_action('Change User Password', $images_url, 'admin/change_user_password');

        $crud->callback_column('expired_date', array($this, 'expired_date_display_crud'));
        $crud->callback_field('expired_date', array($this, 'expired_date_field_crud'));

        $crud->callback_column('add_date', array($this, 'registered_date_display_crud'));
        // $crud->callback_column('purchase_date', array($this, 'purchase_date_display_crud'));
        $crud->callback_column('last_login_at', array($this, 'last_login_date_display_crud'));

        $crud->callback_column('status', array($this, 'status_display_crud'));
        $crud->callback_field('status', array($this, 'status_field_crud'));

        $crud->callback_after_insert(array($this, 'encript_password'));
         
        $crud->unset_read();
        $crud->unset_print();
        $crud->unset_export();

        $output = $crud->render();
        $data['output']=$output;
        $data['page_title'] = $this->lang->line("user management");
        $data['crud']=1;

        $this->_viewcontroller($data);
    }




     public function change_user_password_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            redirect('home/access_forbidden', 'location');
        }
        $id = $this->session->userdata('change_user_password_id');
        // $this->session->unset_userdata('change_member_password_id');
        if ($_POST) {
            $this->form_validation->set_rules('password', '<b>'. $this->lang->line("password").'</b>', 'trim|required');
            $this->form_validation->set_rules('confirm_password', '<b>'. $this->lang->line("confirm password").'</b>', 'trim|required|matches[password]');
        }
        if ($this->form_validation->run() == false) {
            $this->change_user_password($id);
        } else {
            $new_password = $this->input->post('password', true);
            $new_confirm_password = $this->input->post('confirm_password', true);

            $table_change_password = 'users';
            $where_change_passwor = array('id' => $id);
            $data = array('password' => md5($new_password));
            $this->basic->update_data($table_change_password, $where_change_passwor, $data);

            $where['where'] = array('id' => $id);
            $mail_info = $this->basic->get_data('users', $where);
            
            $name = $mail_info[0]['name'];
            $to = $mail_info[0]['email'];
            $password = $new_password;

            $subject = 'Change Password Notification';
            $mask = $this->config->item('product_name');
            $from = $this->config->item('institute_email');
            $url = site_url();

            $message = "Dear {$name},<br/> Your <a href='".$url."'>{$mask}</a> password has been changed. Your new password is: {$password}.<br/><br/> Thank you.";
            $this->_mail_sender($from, $to, $subject, $message, $mask);
            $this->session->set_flashdata('success_message', 1);
                // return $this->config_member();
            redirect('admin/user_management', 'location');
        }
    }


    function unique_email_check($str, $edited_id)
    {
        $email= strip_tags(trim($this->input->post('email',TRUE)));
        if($email==""){
            $s= $this->lang->line("required");
            $s=str_replace("<b>%s</b>","",$s);
            $s="<b>".$this->lang->line("email")."</b> ".$s;
            $this->form_validation->set_message('unique_email_check', $s);
            return FALSE;
        }

        if(!isset($edited_id) || !$edited_id)
            $where=array("email"=>$email);
        else
            $where=array("email"=>$email,"id !="=>$edited_id);


        $is_unique=$this->basic->is_unique("users",$where,$select='');

        if (!$is_unique) {
            $s = $this->lang->line("is_unique");
            $s=str_replace("<b>%s</b>","",$s);
            $s="<b>".$this->lang->line("email")."</b> ".$s;
            $this->form_validation->set_message('unique_email_check', $s);
            return FALSE;
            }

        return TRUE;
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


    public function expired_date_field_crud($value, $row)
    {
        if ($value == '0000-00-00 00:00:00') {
            $value = "";
        }
        else $value=date("Y-m-d",strtotime($value));
        return '<input id="field-expired_date" type="text" maxlength="100" value="'.$value.'" name="expired_date">';
    }

    public function expired_date_display_crud($value, $row)
    {
        if($row->user_type=="Admin") return "-";
        if ($value == '0000-00-00 00:00:00') {
            $value = "-";
        }
        else $value=date("Y-m-d",strtotime($value));
        return $value;
    }

    public function purchase_date_display_crud($value, $row)
    {
        if($row->user_type=="Admin") return "-";
        if ($value == '0000-00-00 00:00:00') {
            $value = "-";
        }
        else $value=date("Y-m-d H:i",strtotime($value));
        return $value;
    }

    public function last_login_date_display_crud($value, $row)
    {

        if ($value == '0000-00-00 00:00:00') {
            $value = "-";
        }
        else $value=date("Y-m-d H:i",strtotime($value));
        return $value;
    }

    public function registered_date_display_crud($value, $row)
    {
        if ($value == '0000-00-00 00:00:00') {
            $value = "-";
        }
        else $value=date("Y-m-d H:i",strtotime($value));
        return $value;
    }



    public function encript_password($post_array, $primary_key)
    {
        $id = $primary_key;
        $where = array('id'=>$id);
        $password = md5($post_array['password']);
        $table = 'users';
        $data = array('password'=>$password);
        $this->basic->update_data($table, $where, $data);
        return true;
    }



    public function change_user_password($id)
    {
        $this->session->set_userdata('change_user_password_id', $id);

        $table = 'users';
        $where['where'] = array('id' => $id);

        $info = $this->basic->get_data($table, $where);

        $data['user_name'] = $info[0]['name'];

        $data['body'] = 'admin/user/change_user_password';
        $data['page_title'] =  $this->lang->line("change password");
        $this->_viewcontroller($data);
    }





}
