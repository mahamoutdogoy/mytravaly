<?php
require_once("Home.php"); // loading home controller

class Facebook_rx_account_import extends Home
{

    public $user_id;    
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');   
        
        if($this->session->userdata('user_type') != 'Admin' && !in_array(65,$this->module_access))
        redirect('home/login_page', 'location'); 

        $this->user_id=$this->session->userdata('user_id');
        set_time_limit(0);
        $this->important_feature();
        $this->member_validity();

        $this->load->library("fb_rx_login");       
    }


    public function index()
    {
      $this->account_import();
    }
  
    public function account_import()
    {
        $data['body'] = 'facebook_rx/account_import';
        $data['page_title'] = $this->lang->line('Facebook Account Import');

        $redirect_url = base_url()."facebook_rx_account_import/manual_renew_account";
        $fb_login_button = $this->fb_rx_login->login_for_user_access_token($redirect_url);
        $data['fb_login_button'] = $fb_login_button;

        $where['where'] = array('user_id'=>$this->user_id);
        $existing_accounts = $this->basic->get_data('facebook_rx_fb_user_info',$where);
        if(!empty($existing_accounts))
        {
            $i=0;
            foreach($existing_accounts as $value)
            {
                $existing_account_info[$i]['fb_id'] = $value['fb_id'];
                $existing_account_info[$i]['userinfo_table_id'] = $value['id'];
                $existing_account_info[$i]['name'] = $value['name'];
                $existing_account_info[$i]['email'] = $value['email'];
                $existing_account_info[$i]['user_access_token'] = $value['access_token'];

                $valid_or_invalid = $this->fb_rx_login->access_token_validity_check_for_user($value['access_token']);
                if($valid_or_invalid)
                {
                    $existing_account_info[$i]['validity'] = 'yes';
                }
                else{
                    $existing_account_info[$i]['validity'] = 'no';
                }


                $where = array();
                $where['where'] = array('facebook_rx_fb_user_info_id'=>$value['id']);
                $page_count = $this->basic->get_data('facebook_rx_fb_page_info',$where);
                $existing_account_info[$i]['page_list'] = $page_count;
                if(!empty($page_count))
                {
                    $existing_account_info[$i]['total_pages'] = count($page_count);                    
                }
                else
                    $existing_account_info[$i]['total_pages'] = 0;


                $group_count = $this->basic->get_data('facebook_rx_fb_group_info',$where);
                $existing_account_info[$i]['group_list'] = $group_count;
                if(!empty($group_count))
                {
                    $existing_account_info[$i]['total_groups'] = count($group_count);                    
                }
                else
                    $existing_account_info[$i]['total_groups'] = 0;

                $i++;
            }

            $data['existing_accounts'] = $existing_account_info;
        }
        else
            $data['existing_accounts'] = '0';


        $this->_viewcontroller($data);
    }


    public function ajax_delete_group_action()
    {
        $table_id = $this->input->post("group_table_id");
        $data = array('deleted' => '1');
        $this->basic->update_data('facebook_rx_fb_group_info',array('id'=>$table_id),$data);
        echo "<div class='alert alert-success text-center'>".$this->lang->line('Your group has been deleted successfully.')."</div>";
    }

    public function ajax_delete_page_action()
    {
        $table_id = $this->input->post("page_table_id");

        $this->db->trans_start();

        $this->basic->delete_data("facebook_rx_fb_page_info",array('id'=>$table_id));
 
        $this->db->trans_complete();
        if($this->db->trans_status() === false) 
        {
            echo "<div class='alert alert-danger text-center'>".$this->lang->line('Something went wrong, please try again.')."</div>";
        }
        else
        {
            echo "<div class='alert alert-success text-center'>".$this->lang->line('Your page and all of its corresponding campaigns has been deleted successfully.')."</div>";
        }
    }


    public function ajax_delete_account_action()
    {
        $table_id = $this->input->post("user_table_id");
        $data = array('deleted' => '1');

        $this->db->trans_start();
        //******************************//
        // delete data to useges log table
        $this->_delete_usage_log($module_id=65,$request=1);   
        //******************************//
        $this->basic->delete_data('facebook_rx_fb_user_info',array('id'=>$table_id));
        $this->basic->delete_data('facebook_rx_fb_group_info',array('facebook_rx_fb_user_info_id'=>$table_id));    
        $this->basic->delete_data('facebook_rx_fb_page_info',array('facebook_rx_fb_user_info_id'=>$table_id));

        $this->db->trans_complete();

        if($this->db->trans_status() === false) 
        {
            echo "<div class='alert alert-danger text-center'>".$this->lang->line('Something went wrong, please try again.')."</div>";
        }
        else
        {
            echo "success";
        }
    }



    public function send_user_roll_access()
    {
        if($_POST)
        {
            $fb_numeric_id= $this->input->post("fb_numeric_id");

            $database_id = $this->session->userdata('fb_rx_login_database_id');
            $facebook_config=$this->basic->get_data("facebook_rx_config",array("where"=>array("id"=>$database_id)));
            if(isset($facebook_config[0]))
            {           
                $app_id=$facebook_config[0]["api_id"];
                $app_secret=$facebook_config[0]["api_secret"];
                $user_access_token=$facebook_config[0]["user_access_token"];
            }

            $response=$this->fb_rx_login->send_user_roll_access($app_id,$fb_numeric_id,$user_access_token);
   
            if(isset($response['success']) && $response['success'] == 1)
                echo "<br/>
            <div class='well'><h4 class='text-center red'>".$this->lang->line('Please log in & check your facebook profile page notifications, to accept our invitation.')."</h4></div>
            <div class='alert alert-danger text-center'>
                        <h4 style='line-height:25px'>".$this->lang->line('A request has been sent to your facebook account. Please login to your facebook account, confirm the app request and click below button.')."<br/><br/>".$this->lang->line('DO NOT CLICK THIS UNTIL CONFIRMED')."</h4>
                        <br/>
                        <button class='btn btn-default btn-lg' id='fb_confirm'><b>".$this->lang->line('I have Confirmed App Request in Facebook')."</b></button>
                    </div>";
            else if (isset($response["error"]["error_user_msg"]))
                 echo "<br/><div class='alert alert-danger text-center'>
                        <p><i class='fa fa-remove'></i> ".$response["error"]["error_user_msg"]."</p>
                    </div>";
            else
                echo "<br/><div class='alert alert-danger text-center'>
                        <p><i class='fa fa-remove'></i> ".$this->lang->line('Something went wrong, please try with correct information.')."</p>
                    </div>";
        }
    }



    public function ajax_get_login_button()
    {
        $redirect_url = base_url()."facebook_rx_account_import/redirect_custer_link";
        $fb_login_button = $this->fb_rx_login->login_for_user_access_token($redirect_url);
        if(isset($fb_login_button))
        {
            echo '<br/><div class="alert alert-danger text-center">
                    <h3 class=""> <i class="fa fa-facebook-official"></i> '.$fb_login_button.'<h3>
                </div>';
        }
        else 
            echo "<br/><div class='alert alert-danger text-center'><p>".$this->lang->line('Something went wrong, please try with proper information.')."</p></div>";
    }

    

    public function redirect_custer_link()
    {
        $id = $this->session->userdata('fb_rx_login_database_id');
        $redirect_url = base_url()."facebook_rx_account_import/redirect_custer_link";
        $user_info = $this->fb_rx_login->login_callback($redirect_url); 
                
        if( isset($user_info['status']) && $user_info['status'] == '0')
        {
            $data['error'] = 1;
            $data['message'] = "Something went wrong,please <a href='".base_url("facebook_rx_account_import/account_import")."'>try again</a>";
            $data['body'] = "facebook_rx/user_login";
            $this->_viewcontroller($data);
        } 
        else 
        {
            //************************************************//
            $status=$this->_check_usage($module_id=65,$request=1);
            if($status=="3") 
            {
                $this->session->set_userdata('limit_cross', $this->lang->line('Sorry, Facebook account import limit has been exceeded.'));
                redirect('imgclick/social_network_accounts','location');                
                exit();
            }
            //************************************************//

            $access_token=$user_info['access_token_set'];

            //checking permission given by the users            
            $permission = $this->fb_rx_login->debug_access_token($access_token);

            $given_permission = array();
            if(isset($permission['data']['scopes']))
            {
                $permission_checking = array();
                $needed_permission = array('manage_pages','publish_pages','pages_messaging');
                $given_permission = $permission['data']['scopes'];
                $permission_checking = array_intersect($needed_permission,$given_permission);
                if(empty($permission_checking))
                {
                    $documentation_link = base_url('documentation/#!/sm_import_account');
                    $text = $this->lang->line("Sorry, you didn't confirm the request yet. Please login to your FB account and accept the request.");
                    $this->session->set_userdata('limit_cross', $text);
                    redirect('facebook_rx_account_import/index','location');                
                    exit();
                }
            }


            if(isset($access_token))
            {
                $data = array(
                    'user_id' => $this->user_id,
                    'facebook_rx_config_id' => $id,
                    'access_token' => $access_token,
                    'name' => $user_info['name'],
                    'email' => isset($user_info['email']) ? $user_info['email'] : "",
                    'fb_id' => $user_info['id'],
                    'add_date' => date('Y-m-d'),
                    'deleted' => '0'
                    );

                $where=array();
                $where['where'] = array('user_id'=>$this->user_id,'fb_id'=>$user_info['id']);
                $exist_or_not = array();
                $exist_or_not = $this->basic->get_data('facebook_rx_fb_user_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                if(empty($exist_or_not))
                {
                    $this->basic->insert_data('facebook_rx_fb_user_info',$data);
                    $facebook_table_id = $this->db->insert_id();
                }
                else
                {
                    $facebook_table_id = $exist_or_not[0]['id'];
                    $where = array('user_id'=>$this->user_id,'id'=>$facebook_table_id);
                    $this->basic->update_data('facebook_rx_fb_user_info',$where,$data);
                }

                $this->session->set_userdata("facebook_rx_fb_user_info",$facebook_table_id);  

                $page_list = array();
                $page_list = $this->fb_rx_login->get_page_list($access_token);

                if(!empty($page_list))
                {
                    foreach($page_list as $page)
                    {
                        $user_id = $this->user_id;
                        $page_id = $page['id'];
                        $page_cover = '';
                        if(isset($page['cover']['source'])) $page_cover = $page['cover']['source'];
                        $page_profile = '';
                        if(isset($page['picture']['url'])) $page_profile = $page['picture']['url'];
                        $page_name = '';
                        if(isset($page['name'])) $page_name = $page['name'];
                        $page_access_token = '';
                        if(isset($page['access_token'])) $page_access_token = $page['access_token'];
                        $page_email = '';
                        if(isset($page['emails'][0])) $page_email = $page['emails'][0];
                        $page_username = '';
                        if(isset($page['username'])) $page_username = $page['username'];

                        $data = array(
                            'user_id' => $user_id,
                            'facebook_rx_fb_user_info_id' => $facebook_table_id,
                            'page_id' => $page_id,
                            'page_cover' => $page_cover,
                            'page_profile' => $page_profile,
                            'page_name' => $page_name,
                            'page_access_token' => $page_access_token,
                            'page_email' => $page_email,
                            'username' => $page_username,
                            'add_date' => date('Y-m-d'),
                            'deleted' => '0'
                            );

                        $where=array();
                        $where['where'] = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'page_id'=>$page['id']);
                        $exist_or_not = array();
                        $exist_or_not = $this->basic->get_data('facebook_rx_fb_page_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                        if(empty($exist_or_not))
                        {
                            $this->basic->insert_data('facebook_rx_fb_page_info',$data);
                        }
                        else
                        {
                            $where = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'page_id'=>$page['id']);
                            $this->basic->update_data('facebook_rx_fb_page_info',$where,$data);
                        }

                    }
                }

                $group_list = array();
                $group_list = $this->fb_rx_login->get_group_list($access_token);

                if(!empty($group_list))
                {
                    foreach($group_list as $group)
                    {
                        $user_id = $this->user_id;
                        $group_access_token = $access_token; // group uses user access token
                        $group_id = $group['id'];
                        $group_cover = '';
                        if(isset($group['cover']['source'])) $group_cover = $group['cover']['source'];
                        $group_profile = '';
                        if(isset($group['picture']['url'])) $group_profile = $group['picture']['url'];
                        $group_name = '';
                        if(isset($group['name'])) $group_name = $group['name'];

                        $data = array(
                            'user_id' => $user_id,
                            'facebook_rx_fb_user_info_id' => $facebook_table_id,
                            'group_id' => $group_id,
                            'group_cover' => $group_cover,
                            'group_profile' => $group_profile,
                            'group_name' => $group_name,
                            'group_access_token' => $group_access_token,
                            'add_date' => date('Y-m-d'),
                            'deleted' => '0'
                            );

                        $where=array();
                        $where['where'] = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'group_id'=>$group['id']);
                        $exist_or_not = array();
                        $exist_or_not = $this->basic->get_data('facebook_rx_fb_group_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                        if(empty($exist_or_not))
                        {
                            $this->basic->insert_data('facebook_rx_fb_group_info',$data);
                        }
                        else
                        {
                            $where = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'group_id'=>$group['id']);
                            $this->basic->update_data('facebook_rx_fb_group_info',$where,$data);
                        }
                    }
                }

                //insert data to useges log table
                $this->_insert_usage_log($module_id=65,$request=1);

                $this->session->set_userdata('success_message', 'success');
                redirect('facebook_rx_account_import/index','location');                
                exit();
            }
            else
            {
                $data['error'] = 1;
                $data['message'] = "Something went wrong,please <a href='".base_url("facebook_rx_account_import/account_import")."'>try again</a>";
                $data['body'] = "facebook_rx/user_login";
                $this->_viewcontroller($data);
            }
        }
    }


    public function manual_renew_account()
    {
        $id = $this->session->userdata('fb_rx_login_database_id');
        $redirect_url = base_url()."facebook_rx_account_import/manual_renew_account";
        $user_info = array();
        $user_info = $this->fb_rx_login->login_callback($redirect_url); 
                
        if( isset($user_info['status']) && $user_info['status'] == '0')
        {
            $data['error'] = 1;
            $data['message'] = "Something went wrong,please <a href='".base_url("facebook_rx_account_import/account_import")."'>".$this->lang->line('try again')."</a>";
            $data['body'] = "facebook_rx/user_login";
            $this->_viewcontroller($data);
        } 
        else 
        {
            $access_token=$user_info['access_token_set'];

            //checking permission given by the users            
            $permission = $this->fb_rx_login->debug_access_token($access_token);

            $given_permission = array();
            if(isset($permission['data']['scopes']))
            {
                $permission_checking = array();
                $needed_permission = array('manage_pages','publish_pages','pages_messaging');
                $given_permission = $permission['data']['scopes'];
                $permission_checking = array_intersect($needed_permission,$given_permission);
                if(empty($permission_checking))
                {
                    $documentation_link = base_url('documentation/#!/sm_import_account');                    
                    $text = $this->lang->line("Sorry, you didn't confirm the request yet. Please login to your FB account and accept the request.");
                    $this->session->set_userdata('limit_cross', $text);
                    redirect('facebook_rx_account_import/index','location');                
                    exit();
                }
            }

            if(isset($access_token))
            {
                $data = array(
                    'user_id' => $this->user_id,
                    'facebook_rx_config_id' => $id,
                    'access_token' => $access_token,
                    'name' => $user_info['name'],
                    'email' => isset($user_info['email']) ? $user_info['email'] : "",
                    'fb_id' => $user_info['id'],
                    'add_date' => date('Y-m-d'),
                    'deleted' => '0'
                    );

                $where=array();
                $where['where'] = array('user_id'=>$this->user_id,'fb_id'=>$user_info['id']);
                $exist_or_not = array();
                $exist_or_not = $this->basic->get_data('facebook_rx_fb_user_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                if(empty($exist_or_not))
                {
                    $this->basic->insert_data('facebook_rx_fb_user_info',$data);
                    $facebook_table_id = $this->db->insert_id();
                }
                else
                {
                    $facebook_table_id = $exist_or_not[0]['id'];
                    $where = array('user_id'=>$this->user_id,'id'=>$facebook_table_id);
                    $this->basic->update_data('facebook_rx_fb_user_info',$where,$data);
                }

                $page_list = array();
                $page_list = $this->fb_rx_login->get_page_list($access_token);

                if(!empty($page_list))
                {
                    foreach($page_list as $page)
                    {
                        $user_id = $this->user_id;
                        $page_id = $page['id'];
                        $page_cover = '';
                        if(isset($page['cover']['source'])) $page_cover = $page['cover']['source'];
                        $page_profile = '';
                        if(isset($page['picture']['url'])) $page_profile = $page['picture']['url'];
                        $page_name = '';
                        if(isset($page['name'])) $page_name = $page['name'];
                        $page_access_token = '';
                        if(isset($page['access_token'])) $page_access_token = $page['access_token'];
                        $page_email = '';
                        if(isset($page['emails'][0])) $page_email = $page['emails'][0];
                        $page_username = '';
                        if(isset($page['username'])) $page_username = $page['username'];

                        $data = array(
                            'user_id' => $user_id,
                            'facebook_rx_fb_user_info_id' => $facebook_table_id,
                            'page_id' => $page_id,
                            'page_cover' => $page_cover,
                            'page_profile' => $page_profile,
                            'page_name' => $page_name,
                            'username' => $page_username,
                            'page_access_token' => $page_access_token,
                            'page_email' => $page_email,
                            'add_date' => date('Y-m-d'),
                            'deleted' => '0'
                            );

                        $where=array();
                        $where['where'] = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'page_id'=>$page['id']);
                        $exist_or_not = array();
                        $exist_or_not = $this->basic->get_data('facebook_rx_fb_page_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                        if(empty($exist_or_not))
                        {
                            $this->basic->insert_data('facebook_rx_fb_page_info',$data);
                        }
                        else
                        {
                            $where = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'page_id'=>$page['id']);
                            $this->basic->update_data('facebook_rx_fb_page_info',$where,$data);
                        }

                    }
                }

                $group_list = array();
                $group_list = $this->fb_rx_login->get_group_list($access_token);


                if(!empty($group_list))
                {
                    foreach($group_list as $group)
                    {
                        $user_id = $this->user_id;
                        $group_access_token = $access_token; // group uses user access token
                        $group_id = $group['id'];
                        $group_cover = '';
                        if(isset($group['cover']['source'])) $group_cover = $group['cover']['source'];
                        $group_profile = '';
                        if(isset($group['picture']['url'])) $group_profile = $group['picture']['url'];
                        $group_name = '';
                        if(isset($group['name'])) $group_name = $group['name'];

                        $data = array(
                            'user_id' => $user_id,
                            'facebook_rx_fb_user_info_id' => $facebook_table_id,
                            'group_id' => $group_id,
                            'group_cover' => $group_cover,
                            'group_profile' => $group_profile,
                            'group_name' => $group_name,
                            'group_access_token' => $group_access_token,
                            'add_date' => date('Y-m-d'),
                            'deleted' => '0'
                            );

                        $where=array();
                        $where['where'] = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'group_id'=>$group['id']);
                        $exist_or_not = array();
                        $exist_or_not = $this->basic->get_data('facebook_rx_fb_group_info',$where,$select='',$join='',$limit='',$start=NULL,$order_by='',$group_by='',$num_rows=0,$csv='',$delete_overwrite=1);

                        if(empty($exist_or_not))
                        {
                            $this->basic->insert_data('facebook_rx_fb_group_info',$data);
                        }
                        else
                        {
                            $where = array('facebook_rx_fb_user_info_id'=>$facebook_table_id,'group_id'=>$group['id']);
                            $this->basic->update_data('facebook_rx_fb_group_info',$where,$data);
                        }
                    }
                }

                $this->session->set_userdata('success_message', 'success');
                redirect('facebook_rx_account_import/index','location');                
                exit();
            }
            else
            {
                $data['error'] = 1;
                $data['message'] = "Something went wrong,please <a href='".base_url("facebook_rx_account_import/account_import")."'>".$this->lang->line('try again')."</a>";
                $data['body'] = "facebook_rx/user_login";
                $this->_viewcontroller($data);
            }
        }
    }


     public function fb_rx_account_switch()
    {
        if(!$_POST) exit();
        $id=$this->input->post("id");
        
        $this->session->set_userdata("facebook_rx_fb_user_info",$id); 

        $get_user_data = $this->basic->get_data("facebook_rx_fb_user_info",array("where"=>array("id"=>$id,"user_id"=>$this->user_id)));
        $config_id = isset($get_user_data[0]["facebook_rx_config_id"]) ? $get_user_data[0]["facebook_rx_config_id"] : 0;
        $this->session->set_userdata("fb_rx_login_database_id",$config_id);   
    }









}