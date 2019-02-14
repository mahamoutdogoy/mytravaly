<?php 
require_once("Home.php"); // loading home controller

class Imgclick extends Home
{

    public $user_id;    
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');
 
        $this->user_id=$this->session->userdata('user_id');
        set_time_limit(0);
        
        $this->member_validity();
        if($this->session->userdata('user_type') != 'Admin' && !in_array(108,$this->module_access))
        redirect('home/login_page', 'location'); 

        $this->upload_path = realpath( APPPATH . '../upload');

        $this->load->library('Twitter');
        $this->load->library('Linkedin');
        $this->load->library('Pinterests');
        $this->load->library('Tumblr');
    }


    public function index()
    {
        $this->social_network_accounts();
    }


    public function social_network_accounts()
    {

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
        else  $data['existing_accounts'] = array();

      
        // $redirect_pin_url = base_url("imgclick/pinterest_login_callback");
        // $redirect_pin_url=str_replace('http://','https://',$redirect_pin_url);
        // $data['pinterest_login_button'] = $this->pinterests->login_button($redirect_pin_url);
        $loginurl = base_url('admin_config_accounts/pinterest_settings');
        $data['pinterest_login_button'] = "<a href='{$loginurl}' class='btn btn-default'><i class='fa fa-plus'></i> ".$this->lang->line("Add New Account")."</a>";

        $where['where'] = array('pinterest_config.user_id'=>$this->user_id, 'pinterest_config.user_name !='=>'');
        $join = array('rx_pinterest_info' => 'pinterest_config.id=rx_pinterest_info.pinterest_table_id,left');
        $select = array('user_name','board_name','rx_pinterest_info.id as table_id','pinterest_config.id as pinterest_autopost_table_id');
        $pinterest_list = $this->basic->get_data('pinterest_config',$where,$select,$join);

        $pinterest_info = array();
        if(!empty($pinterest_list))
        {            
            $i = 0;
            foreach($pinterest_list as $value)
            {
                $pinterest_info[$value['user_name']]['name'] = $value['user_name'];
                $pinterest_info[$value['user_name']]['pinterest_autopost_table_id'] = $value['pinterest_autopost_table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['table_id'] = $value['table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['board_name'] = $value['board_name'];
                $i++;
            }
        }
        $data['pinterest_info'] = $pinterest_info;

        $data['twitter_account_list'] = $this->basic->get_data('rx_twitter_atuopost',array('where'=>array('user_id'=>$this->user_id)));
        
        $data['tumblr_account_list'] = $this->basic->get_data('rx_tumblr_autopost',array('where'=>array('user_id'=>$this->user_id)));

        $data['linkedin_account_list'] = $this->basic->get_data('rx_linkedin_autopost',array('where'=>array('user_id'=>$this->user_id)));        
        $redirect_url = base_url('imgclick/linkedin_login_callback');
        $data['linkedin_button'] = $this->linkedin->login_button($redirect_url);

        $data['body'] = "facebook_rx/imgclick/social_network_accounts";
        $data['page_title'] = $this->lang->line("Social Account Import");
        $this->_viewcontroller($data);

    }


    public function ajax_delete_social_account()
    {
        $table_and_id = $this->input->post('table_and_id');
        $table_and_id = explode('-', $table_and_id);
        $table_name = $table_and_id[0];
        $id = $table_and_id[1];
        
        $this->db->trans_start();
        if($table_name == 'pinterest_config')
        {
            $this->basic->delete_data('rx_pinterest_info',array('pinterest_table_id'=>$id));
        }

        $this->basic->delete_data($table_name,array('id'=>$id));

        $this->basic->get_data($table_name,array('where'=>array('id'=>$id)));

        $module_id=0;
        if($table_name=='pinterest_config') $module_id=105;
        else if($table_name=='rx_linkedin_autopost') $module_id=104;
        else if($table_name=='rx_twitter_atuopost') $module_id=107;
        else if($table_name=='rx_tumblr_autopost') $module_id=106;

        $this->_delete_usage_log($module_id,$request=1);

        $this->db->trans_complete();
        if($this->db->trans_status() === false) 
        {
            echo "fail";
        }
        else
        {
            echo "success";
        }

    }


    public function _get_api_reponse($url)
    {      
        $ch = curl_init(); // initialize curl handle
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
        curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 60s     
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        $content = curl_exec($ch); // run the whole process        
        curl_close($ch);        
        return json_decode($content,true);        
    }

    public function image_library()
    {
        $data['page_title'] = $this->lang->line("web image library");
        $data['body'] = 'facebook_rx/imgclick/web_image_library';
        $this->_viewcontroller($data);
    }

    public function pixbay_api()
    {        
        if(!$_POST) exit();
        $pixbay_query=urlencode($this->input->post('pixbay_query',true));
        $pixbay_category=$this->input->post('pixbay_category',true);
        $page=$this->input->post('page',true);
        if($page=="") $page=1;
        $per_page=24;
        $response="";
        $return=array();
        
        $getdata=$this->basic->get_data("img_api_config",array("where"=>array("status"=>"1","deleted"=>"0","api_name"=>"pixbay")),$select='',$join='',$limit='1',$start=NULL,$order_by='rand()');
        $apikey=isset($getdata[0]["api_key"]) ? $getdata[0]["api_key"] : "";
        if($apikey=="")
        {
            $response.= "<div class='clearfix'></div><div class='text-center alert alert-warning'>".$this->lang->line("no pixabay setting found.")."</div>";
            $return=array("content"=>$response,"status"=>"0","next_page"=>"0");
            echo json_encode($return);
            exit();
        }

        $url="https://pixabay.com/api/?key={$apikey}&q={$pixbay_query}&min_width=500&orientation=horizontal&page={$page}&per_page={$per_page}";
        if($pixbay_category!="")$url.="&category={$pixbay_category}";
        $imgdata=$this->_get_api_reponse($url);

        if(!isset($imgdata['hits']) || count($imgdata['hits'])==0)
        {
            if($page>1) $response.= "<div class='clearfix'></div><div class='text-center alert alert-warning'>".$this->lang->line("no more image found.")."</div>";
            else $response.= "<div class='clearfix'></div><div class='text-center alert alert-warning'>".$this->lang->line("no image found.")."</div>";
            $return=array("content"=>$response,"status"=>"0","next_page"=>"0");
            echo json_encode($return);
            exit();
        }
        
        foreach ($imgdata['hits'] as $key => $value) 
        {
            if(!isset($value['webformatURL']) || $value['webformatURL']=="") continue;
            if(!isset($value["webformatWidth"])) $value["webformatWidth"]="";
            if(!isset($value["webformatHeight"])) $value["webformatHeight"]="";
            if(!isset($value["previewURL"]) ||$value["previewURL"]=="") continue;
            $response.= "<div class='col-xs-12 col-md-2' style='margin-bottom:20px;height:220px;overflow:hidden;'>";
                $response.= "<a target='_BLANK' href='".$value['webformatURL']."'><h4 class='text-center'><i class='fa fa-photo'></i> ".$value["webformatWidth"]."x".$value["webformatHeight"]."</h4>";
                $response.= "<img title='".$this->lang->line("Click to save this image")."' data-url='".$value["webformatURL"]."' src='".$value["previewURL"]."' style='width:100%;cursor:pointer;' img-src='pixabay' class='select-me'></a>";
            $response.= "</div>";
        }
        $next_page=$page+1;
        $return=array("content"=>$response,"status"=>"1","next_page"=>$next_page);
        echo json_encode($return);
    }


    public function create_campaign()
    { 

        $where['where'] = array('pinterest_config.user_id'=>$this->user_id, 'pinterest_config.user_name !='=>'');
        $join = array('rx_pinterest_info' => 'pinterest_config.id=rx_pinterest_info.pinterest_table_id,left');
        $select = array('user_name','board_name','rx_pinterest_info.id as table_id','pinterest_config.id as pinterest_autopost_table_id');
        $pinterest_list = $this->basic->get_data('pinterest_config',$where,$select,$join);

        $pinterest_info = array();
        if(!empty($pinterest_list))
        {            
            $i = 0;
            foreach($pinterest_list as $value)
            {
                $pinterest_info[$value['user_name']]['name'] = $value['user_name'];
                $pinterest_info[$value['user_name']]['pinterest_autopost_table_id'] = $value['pinterest_autopost_table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['table_id'] = $value['table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['board_name'] = $value['board_name'];
                $i++;
            }
        }
        $data['pinterest_info'] = $pinterest_info;


        $data['twitter_account_list'] = $this->basic->get_data('rx_twitter_atuopost',array('where'=>array('user_id'=>$this->user_id)),array('screen_name','id'));
        
        $data['tumblr_account_list'] = $this->basic->get_data('rx_tumblr_autopost',array('where'=>array('user_id'=>$this->user_id)));

        $data['linkedin_account_list'] = $this->basic->get_data('rx_linkedin_autopost',array('where'=>array('user_id'=>$this->user_id)),array('first_name','last_name','id'));
        

        $data['time_zone_list'] = $this->_time_zone_list();

        $data['page_title'] = $this->lang->line("Create New Campaign");
        $data['body'] = 'facebook_rx/imgclick/create_campaign';

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
        else  $data['existing_accounts'] = array();


        
        $data['default_redirect_domain_list'] = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","access"=>"everyone")),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
        $data['custom_redirect_domain_list']  = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","user_id"=>$this->user_id)),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
       

        $data["image_server"] =  base_url();


        $this->_viewcontroller($data);
    }

    


    public function create_campaign_action()
    {
        if(!$_POST)
        exit();

        $post=$_POST;
        foreach ($post as $key => $value) 
        {
           $$key=$value;
        }

        //================== USAGE CHECK ====================================
        if($schedule_type=='now')
        {            
            $status=$this->_check_usage($module_id=108,$request=1);
            if($status=="3") 
            {
                $error_msg = $this->lang->line("Sorry, you can not create more clickabe image campaign this month. Monthly limited has been exceeded.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
                $return_val=array("status"=>"0","message"=>$error_msg);
                echo json_encode($return_val);
                exit();
            }   
        }
        else
        {                
            if($this->session->userdata('user_type') != 'Admin' && !in_array(109,$this->module_access))
            {
                $error_msg = $this->lang->line("Sorry, your package does not allow to post schdeuled clickable images.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
                $return_val=array("status"=>"0","message"=>$error_msg);
                echo json_encode($return_val);
                exit();
            }   
            else
            {
                $status=$this->_check_usage($module_id=109,$request=1);
                if($status=="3") 
                {
                    $error_msg = $this->lang->line("Sorry, you can not create more scheduled clickabe image campaign this month. Monthly limited has been exceeded.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
                    $return_val=array("status"=>"0","message"=>$error_msg);
                    echo json_encode($return_val);
                    exit();
                }   
            }
        } 
        //================== USAGE CHECK ====================================


        //==================SOCIAL MEDIA ARRAY GENETATION ===================
        if(!isset($profile_database)    || !is_array($profile_database))    $profile_database=array();
        if(!isset($page_database)       || !is_array($page_database))       $page_database=array();
        if(!isset($group_database)      || !is_array($group_database))      $group_database=array();
        if(!isset($twitter_select)      || !is_array($twitter_select))      $twitter_select=array();
        if(!isset($pinterest_select)    || !is_array($pinterest_select))    $pinterest_select=array();
        if(!isset($tumblr_select)       || !is_array($tumblr_select))       $tumblr_select=array();
        if(!isset($linkedin_select)     || !is_array($linkedin_select))     $linkedin_select=array();

        $selected_social_media=array();

        foreach($profile_database as $profiles)
        {
            $profile_share = "facebook_rx_fb_user_info-".$profiles;
            array_push($selected_social_media, $profile_share);
        }   
        foreach($page_database as $pages)
        {
            $page_share = "facebook_rx_fb_page_info-".$pages;
            array_push($selected_social_media, $page_share);
        }    
        foreach($group_database as $groups)
        {
            $group_share = "facebook_rx_fb_group_info-".$groups;
            array_push($selected_social_media, $group_share);
        }
        foreach($twitter_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($pinterest_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($linkedin_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($tumblr_select as $val)
        {
            array_push($selected_social_media, $val);
        }                 

        $selected_social_media=array_filter($selected_social_media);
        $selected_social_media=array_unique($selected_social_media);

        $selected_social_media_str="";
        $total_post_count=0;
        if(!empty($selected_social_media))
        {
            $total_post_count=count($selected_social_media);
            $selected_social_media_str = implode(',', $selected_social_media);
        }
        else
        {
            $return_val=array("status"=>"0","message"=>"<i class='fa fa-remove'></i> ".$this->lang->line("No social account selected to post."));
            echo json_encode($return_val);   
            exit();
        }

        $post_status=$this->_check_usage($module_id=112,$request=$total_post_count);
        if($post_status=="3") 
        {
            $post_error_msg = $this->lang->line("Sorry, you can not publish more clickable image to your social accounts this month. Monthly limit has been exceeded.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
            $return_val=array("status"=>"0","message"=>$post_error_msg);
            echo json_encode($return_val);
            exit();
        }   


        //==================SOCIAL MEDIA ARRAY GENETATION ===================

        if($schedule_type=='now')
        {
            $schedule_time='';
            $time_zone='';
        }
        $subdomain=''; 
        $tracking_code = $this->user_id.time().$this->_random_number_generator(2);
        $post_link=$protocol;
        if($subdomain!="") $post_link.=$subdomain.".";
        $post_link.=$action_controller_url;

        $pos=strpos($post_link,'?');
        if($pos!==FALSE)
        $post_link.="&tc=".$tracking_code;
        else $post_link.="?tc=".$tracking_code;

        if($this->session->userdata('user_type') == 'Admin' || in_array(111,$this->module_access)) $tracking_enabled='1';
        else $tracking_enabled='0';

        $insert_data_campaign=array
        (
            "user_id"=>$this->user_id,
            "campaign_name"=>$campaign_name,
            "tracking_code"=>$tracking_code,
            "image"=>$image_url,
            "link"=>$link,
            "title"=>$title,
            "description"=>$description,
            "message"=>$message,
            "protocol"=>$protocol,
            "subdomain"=>$subdomain,
            "action_controller_url"=>$action_controller_url,
            "post_link"=>$post_link,
            "social_media_list"=>$selected_social_media_str,
            "post_report"=>json_encode(array()),
            "total_post_count"=>$total_post_count,
            "posting_status"=>'0',
            "schedule_type"=>$schedule_type,
            "schedule_time"=>$schedule_time,
            "time_zone"=>$time_zone,
            "created_at"=>date("Y-m-d H:i:s"),
            "last_updated_at"=>date("Y-m-d H:i:s"),
            "tracking_enabled"=>$tracking_enabled
        );

        if($this->session->userdata('user_type') == 'Admin' || in_array(113,$this->module_access)) 
        $insert_data_campaign['pixel_code']=$pixel_code;
        else $insert_data_campaign['pixel_code']="";

        $this->basic->insert_data("imgclick_campaign",$insert_data_campaign);
        $campaign_id=$this->db->insert_id();        
       

        //================================================================= 
        if($schedule_type=='now') 
        $this->_insert_usage_log($module_id=108,$request=1);  
        else $this->_insert_usage_log($module_id=109,$request=1);  
        $this->_insert_usage_log($module_id=112,$request=$total_post_count);
        //=================================================================


         $return_val=array("id"=>$campaign_id,"status"=>"1","message"=>"<i class='fa fa-check-circle'></i> ".$this->lang->line("Campaign has been queued for processing successfully."));
         echo json_encode($return_val);       

         
    }



    public function campaign_list()
    {

        $data['page_title'] = $this->lang->line("campaign list");

        $where_simple['user_id'] = $this->user_id;        
        $where  = array('where'=>$where_simple);

        $total_rows = 0;
        $per_page=15;   
        $uri_segment=6;     
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $info = $this->basic->get_data("imgclick_campaign", $where, $select='', $join='', $limit=$per_page, $start=$page, $order_by="id desc", $group_by='');
        $data['video_infos'] = $info;
        $total_rows_array = $this->basic->count_row("imgclick_campaign", $where, $count="id");
        $total_result = $total_rows_array[0]['total_rows'];

        $campaign_ids=array_column($info, 'id');
        if(empty($campaign_ids)) $campaign_ids=array(0);
        $click_data = $this->basic->get_data("imgclick_traffic",array("where_in"=>array('campaign_id'=>$campaign_ids)),'campaign_id,count(id) as click_count', '', '', '', "", 'campaign_id');
        $click_info=array_column($click_data,"click_count","campaign_id");
        $data['click_info']=$click_info;

        $config['total_rows']   =   $total_result;            
        $config['base_url']     =   site_url("imgclick/campaign_list/all/all/all");    
        $config['per_page']     =   $per_page; // row per page
        $config["uri_segment"]  =   $uri_segment;  //depth of pagination link,here 3 (Ex- site/students/2)
        $config['next_link']    =   '>>';
        $config['prev_link']    =   '<<';
        $config['num_links']    =   5;      
        $this->pagination->initialize($config);
        $data['pages']=$this->pagination->create_links();

        $data['body'] = 'facebook_rx/imgclick/all_campaign_list_grid';  
        $this->_viewcontroller($data);
    }


    public function all_campaign_search_result($campaign_title='all',$posting_status='all',$schedule_type='all')
    {        
        $sql="";
        if($campaign_title != 'all')
        {
            $campaign_title = urldecode($campaign_title);
            $campaign_title = urldecode($campaign_title);
            $campaign_title = str_replace("____","/",$campaign_title);
            $campaign_title='%'.$campaign_title.'%';
            $campaign_title=$this->db->escape($campaign_title);
            $sql = "(campaign_name like {$campaign_title} OR tracking_code like {$campaign_title})";
        }
   
        if($sql!="")$this->db->where($sql);

        $where_simple['user_id'] = $this->user_id;
        if($posting_status!="all") $where_simple["posting_status"]=$posting_status;
        if($schedule_type!="all") $where_simple["schedule_type"]=$schedule_type;

        $where  = array('where'=>$where_simple);

        $total_rows = 0;
        $per_page=15;   
        $uri_segment=6;     
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $info = $this->basic->get_data("imgclick_campaign", $where, $select='', $join='', $limit=$per_page, $start=$page, $order_by="id desc", $group_by='');
        if($sql!="")$this->db->where($sql);
        $total_result = $this->basic->get_data("imgclick_campaign", $where);

        $data['video_infos'] = $info;
        $data['page_title'] = $this->lang->line("campaign list");
        $total_result = count($total_result);

        $campaign_ids=array_column($info, 'id');
        if(empty($campaign_ids)) $campaign_ids=array(0);
        $click_data = $this->basic->get_data("imgclick_traffic",array("where_in"=>array('campaign_id'=>$campaign_ids)),'campaign_id,count(id) as click_count', '', '', '', "", 'campaign_id');
        $click_info=array_column($click_data,"click_count","campaign_id");
        $data['click_info']=$click_info;

        $config['total_rows']   =   $total_result;            
        $config['base_url']     =   site_url("imgclick/all_campaign_search_result/$campaign_title/$posting_status/$schedule_type");    
        $config['per_page']     =   $per_page; // row per page
        $config["uri_segment"]  =   $uri_segment;  //depth of pagination link,here 3 (Ex- site/students/2)
        $config['next_link']    =   '>>';
        $config['prev_link']    =   '<<';
        $config['num_links']    =   5;      
        $this->pagination->initialize($config);
        $data['pages']=$this->pagination->create_links();

        $data['body'] = 'facebook_rx/imgclick/all_campaign_list_grid';
        $this->_viewcontroller($data);
    }


    public function traffic_report($id=0) // rest of the part is done in domain_details_vistitor controller, it is done here to get meaningful url
    {
        if($this->session->userdata('user_type') != 'Admin' && !in_array(111,$this->module_access))
        redirect('home/login_page', 'location'); 

        if($id==0) exit();
        $campaign_data=$this->basic->get_data("imgclick_campaign",array("where"=>array("id"=>$id,"user_id"=>$this->user_id)));
        if(!isset($campaign_data[0])) exit();

        $tracking_enabled=isset($campaign_data[0]["tracking_enabled"]) ? $campaign_data[0]["tracking_enabled"] : '0';
        if($tracking_enabled=='0')
        exit();       

        $data['id'] = $id;
        $data['body'] = 'domain_visitor/domain_details';
        $data['page_title'] = $this->lang->line("visitor tracking");
        $data['campaign_data'] = $campaign_data;
        $this->_viewcontroller($data);
    }


    public function campaign_report($id=0)
    {
        if($id==0) exit();

        $info=$this->basic->get_data("imgclick_campaign",array("where"=>array("id"=>$id,"user_id"=>$this->user_id)));
        if(!isset($info[0])) exit();
        $this->_viewcontroller($data=array("info"=>$info,"page_title"=>$this->lang->line("Campaign Report"),"body"=>"facebook_rx/imgclick/campaign_report"));
    }

    public function edit_campaign($id=0)
    {
        if($id==0) exit();

        $xdata_campaign=$this->basic->get_data("imgclick_campaign",array('where'=>array("id"=>$id,"user_id"=>$this->user_id)));

        if(!isset($xdata_campaign[0])) 
        {
            echo $this->lang->line("Campaign not found.");
            exit();
        }
        if($xdata_campaign[0]["posting_status"]!='0') 
        {
            echo $this->lang->line("Only pending campaigns can be edited.");
            exit();
        }
        if($xdata_campaign[0]["schedule_type"]!="later") 
        {
            echo $this->lang->line("Only scheduled campaigns can be edited.");
            exit();
        }
            
        $where['where'] = array('pinterest_config.user_id'=>$this->user_id, 'pinterest_config.user_name !='=>'');
        $join = array('rx_pinterest_info' => 'pinterest_config.id=rx_pinterest_info.pinterest_table_id,left');
        $select = array('user_name','board_name','rx_pinterest_info.id as table_id','pinterest_config.id as pinterest_autopost_table_id');
        $pinterest_list = $this->basic->get_data('pinterest_config',$where,$select,$join);

        $pinterest_info = array();
        if(!empty($pinterest_list))
        {            
            $i = 0;
            foreach($pinterest_list as $value)
            {
                $pinterest_info[$value['user_name']]['name'] = $value['user_name'];
                $pinterest_info[$value['user_name']]['pinterest_autopost_table_id'] = $value['pinterest_autopost_table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['table_id'] = $value['table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['board_name'] = $value['board_name'];
                $i++;
            }
        }
        $data['pinterest_info'] = $pinterest_info;


        $data['twitter_account_list'] = $this->basic->get_data('rx_twitter_atuopost',array('where'=>array('user_id'=>$this->user_id)),array('screen_name','id'));
        
        $data['tumblr_account_list'] = $this->basic->get_data('rx_tumblr_autopost',array('where'=>array('user_id'=>$this->user_id)));

        $data['linkedin_account_list'] = $this->basic->get_data('rx_linkedin_autopost',array('where'=>array('user_id'=>$this->user_id)),array('first_name','last_name','id'));
        

        $data['time_zone_list'] = $this->_time_zone_list();

        $data['page_title'] = $this->lang->line("edit campaign");
        $data['body'] = 'facebook_rx/imgclick/edit_campaign';

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
        else  $data['existing_accounts'] = array();
        
        $data['default_redirect_domain_list'] = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","access"=>"everyone")),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
        $data['custom_redirect_domain_list']  = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","user_id"=>$this->user_id)),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
       

        $data["image_server"] =  base_url();

        $data["xdata_campaign"]=$xdata_campaign;      

        $this->_viewcontroller($data);
    }


    public function edit_campaign_action()
    {
        if(!$_POST)
        exit();

        $post=$_POST;
        foreach ($post as $key => $value) 
        {
           $$key=$value;
        }
        $schedule_type='later'; // it must be later

        $xdata=$this->basic->get_data("imgclick_campaign",array("where"=>array("id"=>$hidden_id)));
        if(!isset($xdata[0]) || $xdata[0]["posting_status"]!='0')
        {
            $error_msg = $this->lang->line("This campaign is not in a editable stage anymore.");
            $return_val=array("status"=>"0","message"=>$error_msg);
            echo json_encode($return_val);
            exit();     
        }
        $tracking_code=$xdata[0]["tracking_code"];


        //==================SOCIAL MEDIA ARRAY GENETATION ===================
        if(!isset($profile_database)    || !is_array($profile_database))    $profile_database=array();
        if(!isset($page_database)       || !is_array($page_database))       $page_database=array();
        if(!isset($group_database)      || !is_array($group_database))      $group_database=array();
        if(!isset($twitter_select)      || !is_array($twitter_select))      $twitter_select=array();
        if(!isset($pinterest_select)    || !is_array($pinterest_select))    $pinterest_select=array();
        if(!isset($tumblr_select)       || !is_array($tumblr_select))       $tumblr_select=array();
        if(!isset($linkedin_select)     || !is_array($linkedin_select))     $linkedin_select=array();

        $selected_social_media=array();

        foreach($profile_database as $profiles)
        {
            $profile_share = "facebook_rx_fb_user_info-".$profiles;
            array_push($selected_social_media, $profile_share);
        }   
        foreach($page_database as $pages)
        {
            $page_share = "facebook_rx_fb_page_info-".$pages;
            array_push($selected_social_media, $page_share);
        }    
        foreach($group_database as $groups)
        {
            $group_share = "facebook_rx_fb_group_info-".$groups;
            array_push($selected_social_media, $group_share);
        }
        foreach($twitter_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($pinterest_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($linkedin_select as $val)
        {
            array_push($selected_social_media, $val);
        }
        foreach($tumblr_select as $val)
        {
            array_push($selected_social_media, $val);
        }                 

        $selected_social_media=array_filter($selected_social_media);
        $selected_social_media=array_unique($selected_social_media);

        $selected_social_media_str="";
        $total_post_count=0;
        if(!empty($selected_social_media))
        {
            $total_post_count=count($selected_social_media);
            $selected_social_media_str = implode(',', $selected_social_media);
        }
        else
        {
            $return_val=array("status"=>"0","message"=>"<i class='fa fa-remove'></i> ".$this->lang->line("No social account selected to post."));
            echo json_encode($return_val);   
            exit();
        }
        //==================SOCIAL MEDIA ARRAY GENETATION ===================   
        $subdomain=''; 
        $post_link=$protocol;
        if($subdomain!="") $post_link.=$subdomain.".";
        $post_link.=$action_controller_url;

        $pos=strpos($post_link,'?');
        if($pos!==FALSE)
        $post_link.="&tc=".$tracking_code;
        else $post_link.="?tc=".$tracking_code;

        $insert_data_campaign=array
        (
            "campaign_name"=>$campaign_name,
            "image"=>$image_url,
            "link"=>$link,
            "title"=>$title,
            "description"=>$description,
            "message"=>$message,
            "protocol"=>$protocol,
            "subdomain"=>$subdomain,
            "action_controller_url"=>$action_controller_url,
            "post_link"=>$post_link,
            "social_media_list"=>$selected_social_media_str,
            "post_report"=>json_encode(array()),
            "total_post_count"=>$total_post_count,
            "posting_status"=>'0',
            "schedule_type"=>$schedule_type,
            "schedule_time"=>$schedule_time,
            "time_zone"=>$time_zone,
            "last_updated_at"=>date("Y-m-d H:i:s")
        );
        if($this->session->userdata('user_type') == 'Admin' || in_array(113,$this->module_access)) 
        $insert_data_campaign['pixel_code']=$pixel_code;
        else $insert_data_campaign['pixel_code']="";

        $this->basic->update_data("imgclick_campaign",array("id"=>$hidden_id,"user_id"=>$this->user_id),$insert_data_campaign);
        $campaign_id=$hidden_id;  

         $return_val=array("id"=>$campaign_id,"status"=>"1","message"=>"<i class='fa fa-check-circle'></i> ".$this->lang->line("Campaign has been updated and queued for processing successfully."));
         echo json_encode($return_val);  
         
    }


    public function clone_campaign($id=0)
    {
        if($id==0) exit();

        $xdata_campaign=$this->basic->get_data("imgclick_campaign",array('where'=>array("id"=>$id,"user_id"=>$this->user_id)));

        if(!isset($xdata_campaign[0])) 
        {
            echo $this->lang->line("Campaign not found.");
            exit();
        }
            
        $where['where'] = array('pinterest_config.user_id'=>$this->user_id, 'pinterest_config.user_name !='=>'');
        $join = array('rx_pinterest_info' => 'pinterest_config.id=rx_pinterest_info.pinterest_table_id,left');
        $select = array('user_name','board_name','rx_pinterest_info.id as table_id','pinterest_config.id as pinterest_autopost_table_id');
        $pinterest_list = $this->basic->get_data('pinterest_config',$where,$select,$join);

        $pinterest_info = array();
        if(!empty($pinterest_list))
        {            
            $i = 0;
            foreach($pinterest_list as $value)
            {
                $pinterest_info[$value['user_name']]['name'] = $value['user_name'];
                $pinterest_info[$value['user_name']]['pinterest_autopost_table_id'] = $value['pinterest_autopost_table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['table_id'] = $value['table_id'];
                $pinterest_info[$value['user_name']]['pinterest_info'][$i]['board_name'] = $value['board_name'];
                $i++;
            }
        }
        $data['pinterest_info'] = $pinterest_info;


        $data['twitter_account_list'] = $this->basic->get_data('rx_twitter_atuopost',array('where'=>array('user_id'=>$this->user_id)),array('screen_name','id'));
        
        $data['tumblr_account_list'] = $this->basic->get_data('rx_tumblr_autopost',array('where'=>array('user_id'=>$this->user_id)));

        $data['linkedin_account_list'] = $this->basic->get_data('rx_linkedin_autopost',array('where'=>array('user_id'=>$this->user_id)),array('first_name','last_name','id'));
        

        $data['time_zone_list'] = $this->_time_zone_list();

        $data['page_title'] = $this->lang->line("clone campaign");
        $data['body'] = 'facebook_rx/imgclick/clone_campaign';

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
        else  $data['existing_accounts'] = array();
        
        $data['default_redirect_domain_list'] = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","access"=>"everyone")),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
        $data['custom_redirect_domain_list']  = $this->basic->get_data("imgclick_domain",array("where"=>array("is_verified"=>"1","user_id"=>$this->user_id)),$select='',$join='',$limit='',$start=NULL,$order_by='rand()');
       

        $data["image_server"] =  base_url();

        $data["xdata_campaign"]=$xdata_campaign;      

        $this->_viewcontroller($data);
    }


    public function twitter_login_action()
    {
        $status=$this->_check_usage($module_id=107,$request=1);
        if($status=="3") 
        {
            $this->session->set_userdata('limit_cross', $this->lang->line('Sorry, Twitter account import limit has been exceeded.'));
            redirect('imgclick/social_network_accounts','location');                
            exit();
        }

        $redirect_url = base_url()."imgclick/twitter_login_callback";
        $this->twitter->twitter_login($redirect_url);
    }

    public function twitter_login_callback()
    {
        $oauth_verifier = $_GET['oauth_verifier'];
        $this->twitter->twitter_login_info($oauth_verifier);

        $oauth_token = $this->session->userdata('final_auth_token');
        $oauth_token_secret = $this->session->userdata('final_oauth_token_secret');
        $twitter_screen_name = $this->session->userdata('twitter_screen_name');
        $twitter_user_id = $this->session->userdata('twitter_user_id');

        $where['where'] = array(
            'user_id' => $this->user_id,
            'twitter_user_id' => $twitter_user_id
            );
        $exist_or_not = $this->basic->get_data('rx_twitter_atuopost',$where);


        $data = array(
                'user_id' => $this->user_id,
                'oauth_token' => $oauth_token,
                'oauth_token_secret' => $oauth_token_secret,
                'screen_name' => $twitter_screen_name,
                'twitter_user_id' => $twitter_user_id,
                'add_date' => date('Y-m-d')
                );

        if(empty($exist_or_not))
        {    
            $this->basic->insert_data('rx_twitter_atuopost',$data);
            $this->_insert_usage_log($module_id=107,$request=1);  
        }
        else
        {
            $where = array(
                'user_id' => $this->user_id,
                'twitter_user_id' => $twitter_user_id
                );
            $this->basic->update_data('rx_twitter_atuopost',$where,$data);
        }

        redirect('imgclick/social_network_accounts','Location');

        // $this->twitter->post_to_twitter();
    }


    public function tumblr_login_action()
    {
        $status=$this->_check_usage($module_id=106,$request=1);
        if($status=="3") 
        {
            $this->session->set_userdata('limit_cross', $this->lang->line('Sorry, Tumblr account import limit has been exceeded.'));
            redirect('imgclick/social_network_accounts','location');                
            exit();
        }
        $callback_url = base_url()."imgclick/tumblr_login_callback";
        $this->tumblr->login_url($callback_url);
    }

    public function tumblr_login_callback()
    {
        $auth_token = $this->session->userdata('tumblr_auth_token');
        $auth_token_secret = $this->session->userdata('tumblr_auth_token_secret');
        // $auth_token = $_GET['oauth_token'];
        $auth_varifier = $_GET['oauth_verifier'];
        $user_info = $this->tumblr->get_username($auth_token,$auth_token_secret,$auth_varifier);

        if(!isset($user_info['error']))
        {
            $user_name = $user_info['user_name'];
            $insert_data['auth_token'] = $user_info['auth_token'];
            $insert_data['auth_token_secret'] = $user_info['auth_token_secret'];
            $insert_data['auth_varifier'] = $auth_varifier;
            $insert_data['user_name'] = $user_name;
            $insert_data['user_id'] = $this->user_id;
            $insert_data['add_date'] = date('Y-m-d');

            $where['where'] = array(
                'user_id' => $this->user_id,
                'user_name' => $user_name
                );
            $exist_or_not = $this->basic->get_data('rx_tumblr_autopost',$where);


            if(empty($exist_or_not))
            {    
                $this->basic->insert_data('rx_tumblr_autopost',$insert_data);
                $this->_insert_usage_log($module_id=106,$request=1);  
            }
            else
            {
                $where = array(
                    'user_id' => $this->user_id,
                    'user_name' => $user_name
                    );
                $this->basic->update_data('rx_tumblr_autopost',$where,$insert_data);
            }

            redirect('imgclick/social_network_accounts','Location');
        }
    }


    public function linkedin_login_callback()
    {
        $redirect_url = base_url("imgclick/linkedin_login_callback");
        $authentication_code = $_GET['code'];
        $user_info = $this->linkedin->linkedin_info($authentication_code,$redirect_url);

        $data = array(
            'user_id' => $this->user_id,
            'access_token' => $user_info['access_token'],
            'add_date' => date('Y-m-d'),
            'linkedin_id' => $user_info['id'],
            'first_name' => $user_info['firstName'],
            'last_name' => $user_info['lastName']
            );

        $where['where'] = array(
            'user_id' => $this->user_id,
            'linkedin_id' => $user_info['id']
            );
        $exist_or_not = $this->basic->get_data('rx_linkedin_autopost',$where);

        if(empty($exist_or_not))
        {
            $this->basic->insert_data('rx_linkedin_autopost',$data);
            $this->_insert_usage_log($module_id=104,$request=1);  
        }
        else
        {
            $where = array(
                'user_id' => $this->user_id,
                'linkedin_id' => $user_info['id']
                );
            $this->basic->update_data('rx_linkedin_autopost',$where,$data);
        }

        redirect('imgclick/social_network_accounts','Location');


    }

    public function pinterest_limit()
    {
        $this->session->set_userdata('limit_cross', $this->lang->line('Sorry, Pinterest account import limit has been exceeded.'));
        redirect('imgclick/social_network_accounts','location');                
        exit();
    }

    public function linkedin_limit()
    {
        $this->session->set_userdata('limit_cross', $this->lang->line('Sorry, Linkedin account import limit has been exceeded.'));
        redirect('imgclick/social_network_accounts','location');                
        exit();
    }


    public function pinterest_login_callback()
    {
        $code = $_GET['code'];
        $board_list = $this->pinterests->get_userinfo($code); //board list
        $pinterest_username = $this->session->userdata('pinterest_username');
        $pinterest_access_token = $this->session->userdata('pinterest_access_token');




        $data = array(
            'user_name' => $pinterest_username,
            'code' => $pinterest_access_token
            );

        $where['where'] = array('user_id'=>$this->user_id,'id'=>$this->session->userdata('pinterest_config_table_id'));
        $exist_or_not = $this->basic->get_data('pinterest_config',$where);

        if(empty($exist_or_not))
        {
            $this->basic->insert_data('pinterest_config',$data);
            $pinterest_table_id = $this->db->insert_id();
            $this->_insert_usage_log($module_id=105,$request=1);  
        }
        else
        {
            $pinterest_table_id = $exist_or_not[0]['id'];
            $where = array('user_id'=>$this->user_id,'id'=>$this->session->userdata('pinterest_config_table_id'));
            $this->basic->update_data('pinterest_config',$where,$data);
        }


        $data = array();
        foreach($board_list as $key => $value)
        {
            $data = array(
                'pinterest_table_id' => $pinterest_table_id,
                'user_id' => $this->user_id,
                'board_name' => $value
                );
            $where=array();
            $where['where'] = array('pinterest_table_id'=>$pinterest_table_id,'board_name'=>$value);
            $exist_or_not = $this->basic->get_data('rx_pinterest_info',$where);

            if(empty($exist_or_not))
            {
                $this->basic->insert_data('rx_pinterest_info',$data);
            }
            else
            {
                $where = array('pinterest_table_id'=>$pinterest_table_id,'board_name'=>$value);
                $this->basic->update_data('rx_pinterest_info',$where,$data);
            }
        }
        $this->session->unset_userdata('pinterest_username');
        $this->session->unset_userdata('pinterest_access_token');
        redirect(base_url('imgclick/social_network_accounts'),'Location');
       
    }


    public function fb_login_callback()
    {
        $user_info = $this->fb_autopost->login_callback();
        $access_token = $this->session->userdata('fb_autopost_access_token');

        $data = array(
            'user_id' => $this->user_id,
            'access_token' => $access_token,
            'name' => $user_info['name'],
            'email' => $user_info['email'],
            'fb_id' => $user_info['id'],
            'add_date' => date('Y-m-d')
            );

        $where['where'] = array('user_id'=>$this->user_id,'fb_id'=>$user_info['id']);
        $exist_or_not = $this->basic->get_data('rx_facebook_autopost',$where);

        if(empty($exist_or_not))
        {
            $this->basic->insert_data('rx_facebook_autopost',$data);
            $facebook_table_id = $this->db->insert_id();
        }
        else
        {
            $facebook_table_id = $exist_or_not[0]['id'];
            $where = array('user_id'=>$this->user_id,'fb_id'=>$user_info['id']);
            $this->basic->update_data('rx_facebook_autopost',$where,$data);
        }


        $page_list = $this->fb_autopost->get_page_list();

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

                $data = array(
                    'user_id' => $user_id,
                    'fb_table_id' => $facebook_table_id,
                    'page_id' => $page_id,
                    'page_cover' => $page_cover,
                    'page_profile' => $page_profile,
                    'page_name' => $page_name,
                    'page_access_token' => $page_access_token,
                    'page_email' => $page_email,
                    'add_date' => date('Y-m-d')
                    );

                $where=array();
                $where['where'] = array('fb_table_id'=>$facebook_table_id,'page_id'=>$page['id']);
                $exist_or_not = $this->basic->get_data('rx_facebook_info',$where);

                if(empty($exist_or_not))
                {
                    $this->basic->insert_data('rx_facebook_info',$data);
                }
                else
                {
                    $where = array('fb_table_id'=>$facebook_table_id,'page_id'=>$page['id']);
                    $this->basic->update_data('rx_facebook_info',$where,$data);
                }

            }
        }
        redirect('imgclick/social_network_accounts','Location');

    }


    public function ajax_delete_campaign()
    {
        if(!$_POST)
        exit();
        $id = $this->input->post('table_id');

        $data=$this->basic->get_data("imgclick_campaign",array("where"=>array("id"=>$id,"user_id"=>$this->user_id)));
        if(!isset($data[0])) 
        {
            echo "error";
            exit();
        }        

        $posting_status=isset($data[0]['posting_status']) ? $data[0]['posting_status'] : '0';
        $schedule_type=isset($data[0]['schedule_type']) ? $data[0]['schedule_type'] : 'now';
        $total_post_count=isset($data[0]['total_post_count']) ? $data[0]['total_post_count'] : 0;
      
        if($posting_status==='1') 
        {
            echo "error";
            exit();
        }


        if($this->basic->delete_data('imgclick_campaign',array('id'=>$id)))
        {
            if($posting_status==='0')  
            {
                if($schedule_type=="now")
                $this->_delete_usage_log($module_id=108,$usage_count=1); 
                else $this->_delete_usage_log($module_id=109,$usage_count=1); 

                $this->_delete_usage_log($module_id=112,$usage_count=$total_post_count); 
            }
            echo "success";
        }

    }



    public function upload_image_only()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') exit();

        $ret=array();
        $output_dir = FCPATH."upload/imgclick";
        if (!file_exists($output_dir)) {
            mkdir($output_dir, 0777, true);
        }

        if (isset($_FILES["myfile"])) {
            $error =$_FILES["myfile"]["error"];
            $post_fileName =$_FILES["myfile"]["name"];
            $post_fileName_array=explode(".", $post_fileName);
            $ext=array_pop($post_fileName_array);
            $filename=implode('.', $post_fileName_array);
            $filename="image_".$this->user_id."_".time().substr(uniqid(mt_rand(), true), 0, 6).".".$ext;

            $allow=".jpg,.jpeg,.png,.gif";
            $allow=str_replace('.', '', $allow);
            $allow=explode(',', $allow);
            if(!in_array(strtolower($ext), $allow)) 
            {
                echo json_encode("Are you kidding???");
                exit();
            }

            move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir.'/'.$filename);
            $ret[]= $filename;
            echo json_encode($filename);
        }
    }


    public function delete_uploaded_file() // deletes the uploaded video to upload another one
    {
        if(!$_POST) exit();
        $output_dir = FCPATH."upload/imgclick/".$this->user_id."/";
        if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
        {
             $fileName =$_POST['name'];
             $fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files 
             $filePath = $output_dir. $fileName;
             if (file_exists($filePath)) 
             {
                unlink($filePath);
             }
        }
    }










}