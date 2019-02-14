<?php
require_once("Home.php");

class Native_api extends Home
{
    public $user_id;
    
    public function __construct()
    {
        parent::__construct();   
        $this->user_id=$this->session->userdata("user_id");    
        $this->upload_path = realpath( APPPATH . '../upload');
        
    }


    public function api_member_validity($user_id='')
    {
        if($user_id!='') {
            $where['where'] = array('id'=>$user_id);
            $user_expire_date = $this->basic->get_data('users',$where,$select=array('expired_date'));
            $expire_date = strtotime($user_expire_date[0]['expired_date']);
            $current_date = strtotime(date("Y-m-d"));
            $package_data=$this->basic->get_data("users",$where=array("where"=>array("users.id"=>$user_id)),$select="package.price as price, users.user_type",$join=array('package'=>"users.package_id=package.id,left"));

            if(is_array($package_data) && array_key_exists(0, $package_data) && $package_data[0]['user_type'] == 'Admin' )
                return true;

            $price = '';
            if(is_array($package_data) && array_key_exists(0, $package_data))
            $price=$package_data[0]["price"];
            if($price=="Trial") $price=1;

            
            if ($expire_date < $current_date && ($price>0 && $price!=""))
            return false;
            else return true;
            

        }
    }


    public function index()
    {
       $this->get_api();
    }

    public function _api_key_generator()
    {
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');

        if($this->session->userdata('user_type') != 'Admin' && !in_array(15,$this->module_access))
        redirect('home/login_page', 'location');

        $this->member_validity();
        $val=$this->session->userdata("user_id")."-".substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 7 ).time()
        .substr(str_shuffle('abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ23456789') , 0 , 7 );
        return $val;
    }

    public function get_api()
    {
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');

        if($this->session->userdata('user_type') != 'Admin' && !in_array(15,$this->module_access))
        redirect('home/login_page', 'location');

        $this->member_validity();

        $data['body'] = "api/native_api";
        $data['page_title'] = 'API';
        $api_data=$this->basic->get_data("native_api",array("where"=>array("user_id"=>$this->session->userdata("user_id"))));
        $data["api_key"]="";
        if(count($api_data)>0) $data["api_key"]=$api_data[0]["api_key"];
        $this->_viewcontroller($data);
    }

    public function get_api_action()
    { 
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login', 'location');

        if($this->session->userdata('user_type') != 'Admin' && !in_array(15,$this->module_access))
        redirect('home/login_page', 'location');

        $api_key=$this->_api_key_generator(); 
        if($this->basic->is_exist("native_api",array("api_key"=>$api_key)))
        $this->get_api_action();

        $user_id=$this->session->userdata("user_id");        
        if($this->basic->is_exist("native_api",array("user_id"=>$user_id)))
        $this->basic->update_data("native_api",array("user_id"=>$user_id),array("api_key"=>$api_key));
        else $this->basic->insert_data("native_api",array("api_key"=>$api_key,"user_id"=>$user_id));
            
        redirect('native_api/get_api', 'location');
    }





    // public function send_notification($api_key="")
    // {
    //     if ($api_key=="") exit();
    //     $user_id=substr($api_key, 0, 1);

    //     if(!$this->basic->is_exist("native_api",array("api_key"=>$api_key,"user_id"=>$user_id)))
    //     {
    //         echo "API Key does not match with any user.";
    //         exit();
    //     }   

    //     if(!$this->basic->is_exist("users",array("id"=>$user_id,"status"=>"1","deleted"=>"0","user_type"=>"Admin")))
    //     {
    //         echo "Invalid user.";
    //         exit();
    //     }     

    //     $current_date = date("Y-m-d");
    //     $tenth_day_before_expire = date("Y-m-d", strtotime("$current_date + 10 days"));
    //     $one_day_before_expire = date("Y-m-d", strtotime("$current_date + 1 days"));
    //     $one_day_after_expire = date("Y-m-d", strtotime("$current_date - 1 days"));

    //     // echo $tenth_day_before_expire."<br/>".$one_day_before_expire."<br/>".$one_day_after_expire;

    //     //send notification to members before 10 days of expire date
    //     $where = array();
    //     $where['where'] = array(
    //         'user_type !=' => 'Admin',
    //         'expired_date' => $tenth_day_before_expire
    //         );
    //     $info = array();
    //     $value = array();
    //     $info = $this->basic->get_data('users',$where,$select='');
    //     $from = "";
    //     $mask = $this->config->item('product_name');
    //     $subject = "Payment Notification";
    //     foreach ($info as $value) 
    //     {
    //         $message = "Dear {$value['first_name']} {$value['last_name']},<br/> your account will expire after 10 days, Please pay your fees.<br/><br/>Thank you,<br/><a href='".base_url()."'>{$mask}</a> team";
    //         $to = $value['email'];
    //         $this->_mail_sender($from, $to, $subject, $message, $mask, $html=0);
    //     }

    //     //send notificatio to members before 1 day of expire date
    //     $where = array();
    //     $where['where'] = array(
    //         'user_type !=' => 'Admin',
    //         'expired_date' => $one_day_before_expire
    //         );
    //     $info = array();
    //     $value = array();
    //     $info = $this->basic->get_data('users',$where,$select='');
    //     $from = $this->config->item('institute_email');
    //     $mask = $this->config->item('product_name');
    //     $subject = "Payment Notification";
    //     foreach ($info as $value) {
    //         $message = "Dear {$value['first_name']} {$value['last_name']},<br/> your account will expire tomorrow, Please pay your fees.<br/><br/>Thank you,<br/><a href='".base_url()."'>{$mask}</a> team";
    //         $to = $value['email'];
    //         $this->_mail_sender($from, $to, $subject, $message, $mask, $html=0);
    //     }

    //     //send notificatio to members after 1 day of expire date
    //     $where = array();
    //     $where['where'] = array(
    //         'user_type !=' => 'Admin',
    //         'expired_date' => $one_day_after_expire
    //         );
    //     $info = array();
    //     $value = array();
    //     $info = $this->basic->get_data('users',$where,$select='');
    //     $from = $this->config->item('institute_email');
    //     $mask = $this->config->item('product_name');
    //     $subject = "Payment Notification";
    //     foreach ($info as $value) {
    //         $message = "Dear {$value['name']},<br/> your account has been expired, Please pay your fees for continuity.<br/><br/>Thank you,<br/><a href='".base_url()."'>{$mask}</a> team";
    //         $to = $value['email'];
    //         $this->_mail_sender($from, $to, $subject, $message, $mask, $html=0);
    //     }

    // }


    public function api_key_check($api_key="")
    {
        $user_id="";
        if($api_key!="")
        {
            $explde_api_key=explode('-',$api_key);
            $user_id="";
            if(array_key_exists(0, $explde_api_key))
            $user_id=$explde_api_key[0];
        }

        if($api_key=="")
        {        
            echo "API Key is required.";    
            exit();
        }

        if(!$this->basic->is_exist("native_api",array("api_key"=>$api_key,"user_id"=>$user_id)))
        {
           echo "API Key does not match with any user.";
           exit();
        }

        if(!$this->basic->is_exist("users",array("id"=>$user_id,"status"=>"1","deleted"=>"0","user_type"=>"Admin")))
        {
            echo "API Key does not match with any authentic user.";
            exit();
        } 

    }


    // run every 1 or 2 mins
    public function imgclick_social_post($api_key="")
    {   

        $this->api_key_check($api_key);

        $join=
        array
        (
            'users' => 'imgclick_campaign.user_id=users.id,left'
        );

        $campaign_info = $this->basic->get_data('imgclick_campaign',array('where'=>array('posting_status'=>'0')),array("imgclick_campaign.*","users.deleted as user_deleted","users.status as user_status"),$join,'5',0,'schedule_time asc');
        $campaign_id_array=array();
        foreach ($campaign_info as $value) 
        {
            if($value['user_deleted'] == '1' || $value['user_status']=="0") continue;

            $schedule_type = $value['schedule_type'];
            $schedule_time = $value['schedule_time'];
            $time_zone = $value['time_zone'];

            if($time_zone!= '' && $schedule_type=='later') date_default_timezone_set($time_zone);
            
            $now_time = date("Y-m-d H:i:s");            
            if(strtotime($now_time) < strtotime($schedule_time)) continue; 
            $campaign_id_array[] = $value['id'];    
        }

        if(empty($campaign_id_array)) exit();
        $this->db->where_in("id",$campaign_id_array);
        $this->db->update("imgclick_campaign",array("posting_status"=>"1"));


        foreach ($campaign_info as $value) 
        {
            if($value['user_deleted'] == '1' || $value['user_status']=="0") continue;

            $campaign_id= $value['id'];
            $link= $value['post_link'];
            $image= $value['image'];
            $message= $value['message'];
            $social_media_list= $value['social_media_list'];
            $schedule_type = $value['schedule_type'];
            if(!in_array($campaign_id, $campaign_id_array)) continue;     

            $post_report=$this->_post_to_social_media($link,$image,$message,$social_media_list,$api_key); 
            if(!is_array($post_report)) $post_report=array();  

            $update_data=array
            (
               'post_report'=>json_encode($post_report),
               'posting_status'=>'2',
               'last_updated_at'=>date("Y-m-d H:i:s")
            );

            $this->basic->update_data('imgclick_campaign',array('id'=>$campaign_id),$update_data);
                                
        }



        
    }

    // part of imgclick_social_post()
    public function _post_to_social_media($link="",$image="",$message="",$social_media_list="",$api_key="")
    {
        $this->api_key_check($api_key);

        $this->load->library('Twitter');
        $this->load->library('Linkedin');      
        $this->load->library('Pinterests');
        $this->load->library('Tumblr');
        $this->load->library('Fb_rx_login');

        $social_media_list = explode(',',$social_media_list);
        $post_report = array();
        $facebook_error_count=0;
     
        foreach($social_media_list as $social_media)
        {
           $social_media_info = explode('-', $social_media);

           //=======================FACEBOOK=======================================
           if($social_media_info[0] == 'facebook_rx_fb_user_info' || $social_media_info[0] == 'facebook_rx_fb_page_info' || $social_media_info[0] == 'facebook_rx_fb_group_info')
            {
                if($facebook_error_count>0)
                continue;

                $table_id = $social_media_info[1];
                $table_name = $social_media_info[0];

                if($table_name == 'facebook_rx_fb_page_info')
                {
                    $select = array
                    (
                        'facebook_rx_fb_user_info_id',
                        'page_access_token',
                        'page_id',
                        'page_name'
                    );  
                }              
                if($table_name == 'facebook_rx_fb_group_info')
                {
                    $select = array
                    (
                        'facebook_rx_fb_user_info_id',
                        'group_id',
                        'group_access_token',
                        'group_name'
                    );
                }
                if($table_name != 'facebook_rx_fb_user_info')
                {
                    $fb_info = $this->basic->get_data($table_name,array('where'=>array('id'=>$table_id)),$select);
                    if(!isset($fb_info[0])) continue;

                    $profile_table_id = isset($fb_info[0]['facebook_rx_fb_user_info_id']) ? $fb_info[0]['facebook_rx_fb_user_info_id'] : 0;
                    if(isset($fb_info[0]['page_access_token']))
                    {
                        $access_token = $fb_info[0]['page_access_token'];
                        $page_group_id = $fb_info[0]['page_id'];
                        $display_name = $fb_info[0]['page_name'];
                    }
                    else
                    {
                        $access_token = $fb_info[0]['group_access_token'];
                        $page_group_id = $fb_info[0]['group_id'];
                        $display_name = $fb_info[0]['group_name'];
                    }

                }
                else
                $profile_table_id = $table_id;
                

                $where['where'] = array("facebook_rx_fb_user_info.id"=>$profile_table_id);
               
                $fb_config_info = $this->basic->get_data('facebook_rx_fb_user_info',$where);
                if(!isset($fb_config_info[0])) continue;

                if($table_name == 'facebook_rx_fb_user_info')
                {
                    $access_token = $fb_config_info[0]['access_token'];
                    $page_group_id = $fb_config_info[0]['fb_id'];
                    $display_name = $fb_config_info[0]['name'];
                }

                $this->fb_rx_login->app_initialize($fb_config_info[0]['facebook_rx_config_id']);
         
                try
                {                   
                    // $fb_link=$link."&rc=fk";
                    $fb_status = $this->fb_rx_login->feed_post($message,$link,"",$scheduled_publish_time="","","",$access_token,$page_group_id);
                    $post_report["Facebook"][] = array("display_name"=>$display_name,"report"=>"https://www.facebook.com/".$fb_status['id']);
                }
                catch(Exception $e)
                {
                    $post_report["Facebook"][] = array("display_name"=>$display_name,"report"=>$e->getMessage());
                    $facebook_error_count++;
                }          

            }
            //=======================FACEBOOK=======================================

           
            //=======================PINTEREST=======================================
            if($social_media_info[0] == 'rx_pinterest_info')
            {
                $where['where'] = array('rx_pinterest_info.id'=>$social_media_info[1]);
                $join = array('pinterest_config'=>'rx_pinterest_info.pinterest_table_id=pinterest_config.id,left');
                $select = array('user_name','board_name','code','pinterest_config.id as table_id');
                $pinterest_info = $this->basic->get_data('rx_pinterest_info',$where,$select,$join);  
                if(!isset($pinterest_info[0])) continue;                              

                try
                {
                    $pt_link=$link."&rc=pt";
                    $this->pinterests->app_initialize($pinterest_info[0]['table_id']);
                    $pinterest_status = $this->pinterests->post_link_to_pinterest($pinterest_info[0]['user_name'],$pinterest_info[0]['board_name'],$pt_link,$image,$pinterest_info[0]['code'],$message);
                    if(isset($pinterest_status['url']))
                    $post_report["Pinterest"][] = array("display_name"=>$pinterest_info[0]['board_name'],"report"=>$pinterest_status['url']);
                }
                catch(Exception $e)
                {
                    $post_report["Pinterest"][] = array("display_name"=>$pinterest_info[0]['board_name'],"report"=>$e->getMessage());
                }
            }
            //=======================PINTEREST=======================================
            

            //=======================LINKED IN=======================================
            if($social_media_info[0] == 'rx_linkedin_autopost')
            {
                $linkedin_info = $this->basic->get_data('rx_linkedin_autopost',array('where'=>array('id'=>$social_media_info[1])));
                if(!isset($linkedin_info[0])) continue;                              

                $access_token = $linkedin_info[0]['access_token'];
                $display_name = $linkedin_info[0]['first_name']." ".$linkedin_info[0]['last_name'];
              
                $message_linkedin = $message." ".$link."&rc=li";              
                try
                {
                    $linkedin_status = $this->linkedin->post_to_linkedin($access_token,$message_linkedin);
                    if(isset($linkedin_status['updateUrl']))
                    $post_report['Linkedin'][] = array("display_name"=>$display_name,"report"=>$linkedin_status['updateUrl']);
                }
                catch(Exception $e)
                {
                    $post_report["Linkedin"][] = array("display_name"=>$display_name,"report"=>$e->getMessage());
                }

            }
            //=======================LINKED IN=======================================


            //=======================TWITTER=======================================
            // no messagwe in twitter
            if($social_media_info[0] == 'rx_twitter_atuopost')
            {
                $twitter_info = $this->basic->get_data('rx_twitter_atuopost',array('where'=>array('id'=>$social_media_info[1])));
                if(!isset($twitter_info[0])) continue;                              

                $oauth_token = $twitter_info[0]['oauth_token'];
                $oauth_token_secret = $twitter_info[0]['oauth_token_secret'];
                $display_name = $twitter_info[0]['screen_name'];        
                try
                {
                    $tw_link=$link."&rc=tw";
                    $twitter_status = $this->twitter->post_to_twitter($oauth_token,$oauth_token_secret,$tw_link);
                    $twitter_status = json_decode($twitter_status,true);
                    if(!isset($twitter_status['errors']))
                    {
                        // $tweet_url = "https://twitter.com/".$twitter_info[0]['screen_name']."/status/".$twitter_status['id_str'];
                        if(isset($twitter_status->id_str))
                        $tweet_url = "https://twitter.com/".$twitter_info[0]['screen_name']."/status/".$twitter_status->id_str;                      
                        else                     
                        $tweet_url = "https://twitter.com/".$twitter_info[0]['screen_name']."/status/".$twitter_status['id_str'];  
                         
                        $post_report['Twitter'][] = array("display_name"=>$display_name,"report"=>$tweet_url);
                    }
                }
                catch(Exception $e)
                {
                    $post_report['Twitter'][] = array("display_name"=>$display_name,"report"=>$e->getMessage());
                }
            }
            //=======================TWITTER=======================================


            //=======================TUMBLR======================================= 
            // no message in tumbler
            if($social_media_info[0] == 'rx_tumblr_autopost')
            {
                $tumblr_info = $this->basic->get_data('rx_tumblr_autopost',array('where'=>array('id'=>$social_media_info[1])));
                if(!isset($tumblr_info[0])) continue;                              

                $oauth_token = $tumblr_info[0]['auth_token'];
                $oauth_token_secret = $tumblr_info[0]['auth_token_secret'];
                $oauth_varifier = $tumblr_info[0]['auth_varifier'];
                $tumblr_username = $tumblr_info[0]['user_name'];
                try
                {
                    $tm_link=$link."&rc=tm";
                    $tumblr_status = $this->tumblr->create_link_post($oauth_token,$oauth_token_secret,$oauth_varifier,$tumblr_username,$tm_link,$image);
                    if(!isset($tumblr_status['error']))
                    {
                        $tumblr_url = "https://".$tumblr_username.".tumblr.com/post/".$tumblr_status['id'];
                        $post_report['Tumblr'][] = array("display_name"=>$tumblr_username,"report"=>$tumblr_url);
                    }
                }
                catch(Exception $e)
                {
                    $post_report['Tumblr'][] = array("display_name"=>$tumblr_username,"report"=>$e->getMessage());
                }
            }
            //=======================TUMBLR=======================================

        sleep(rand(8,30));

        }

        return $post_report;
    }


    public function delete_junk_data($api_key="")
    {
        $this->api_key_check($api_key);
        $curdate=date("Y-m-d H:i:s");
        $two_month_before_date = date("Y-m-d", strtotime("$curdate -60 days"));
        $three_days_before_date = date("Y-m-d", strtotime("$curdate -3 days"));

        $table="ci_sessions";
        $delete_ci_session = "DELETE FROM {$table} WHERE date_time < '{$three_days_before_date}';";
        $this->basic->execute_complex_query($delete_ci_session);
        echo $this->db->affected_rows()." rows deleted from {$table} <br>";

       
        $table='imgclick_traffic';
        $delete_visitor_data_sql = "DELETE FROM {$table} WHERE date_time < '{$two_month_before_date}';";           
        $this->basic->execute_complex_query($delete_visitor_data_sql);
        echo $this->db->affected_rows()." rows deleted from {$table} <br>";
    }



	
}
