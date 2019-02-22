<?php
require_once("Home.php"); // loading home controller

/**
* @category controller
* class Admin
*/

class Imgclick_custom_domain extends Home
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
        if($this->session->userdata('user_type') != 'Admin' && !in_array(110,$this->module_access))
        redirect('home/login_page', 'location'); 
    }


    public function index()
    {
        $this->settings();
    }

 
    public function settings()
    {
        $data['body']='facebook_rx/imgclick/domain_list';
        $data['page_title']=$this->lang->line("Custom Domain Settings");
        $this->_viewcontroller($data);  
    }

    public function domain_data()
    {   
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 5;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'DESC';
        $order_by_str=$sort." ".$order;

        $where=array("where"=>array("user_id"=>$this->user_id));
                
        $offset = ($page-1)*$rows;            
        $info=$this->basic->get_data('imgclick_domain',$where,$select='',$join='',$limit=$rows,$start=$offset,$order_by=$order_by_str,$group_by='',$num_rows=1);
        $total_rows_array=$this->basic->count_row($table="imgclick_domain",$where,$count="id");
        $total_result=$total_rows_array[0]['total_rows'];            
        echo convert_to_grid_data($info,$total_result);
    }


    public function add_domain()
    {       
        $data['body']='facebook_rx/imgclick/add_domain';     
        $data['page_title']=$this->lang->line('custom installation');     
        $this->_viewcontroller($data);
    }

    public function valid_url($str)
    {
        return (filter_var($str, FILTER_VALIDATE_URL) !== FALSE);
    }


    public function add_domain_action() 
    {      

        if($_SERVER['REQUEST_METHOD'] === 'GET') 
        redirect('home/access_forbidden','location');

        $status=$this->_check_usage($module_id=110,$request=1);
        if($status=="3") 
        {
            $error_msg = $this->lang->line("Sorry, you can not create more custom domain settings.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
            $return_val=array("status"=>"0","message"=>$error_msg);
            echo json_encode($return_val);
            exit();
        } 

        if($_POST)
        {       
            $protocol=$this->input->post('protocol');
            $action_link_controller=$this->input->post('action_link_controller');
            $action_link_controller=str_replace('http://','', $action_link_controller);
            $action_link_controller=str_replace('https://','', $action_link_controller);

            if($this->session->userdata("user_type")=="Admin") $access='everyone';  
            else $access='me';               
          
            $data=array
            (
                'protocol'=>$protocol,
                'action_controller_url'=>$action_link_controller,
                'is_verified'=>'0',
                'user_id'=>$this->user_id,
                'access'=>$access,
                'category'=>'custom'
            );

            $source=file_get_contents("tracking.php");
            // $source=str_replace("PUT_BASE_URL_HERE",base_url(), $source);
            $source=htmlspecialchars($source);
            
            if($this->basic->insert_data('imgclick_domain',$data))                                      
            {                
                $this->_insert_usage_log($module_id=110,$request=1);  
                echo json_encode(array("status"=>"1","message"=>$this->lang->line("please copy this php script and paste it inside")." ".$protocol.$action_link_controller.$this->lang->line("you need to verify the link to let us know you have put the code to right place.."),"source"=>$source));
            }  
            else
            {
                echo json_encode(array("status"=>"0","message"=>$this->lang->line("something went wrong, please try again.")));
            }   
            
        }   
    }

    public function verify_domain($id=0)
    {
        if($id==0) exit();

        $domain_data=$this->basic->get_data("imgclick_domain",array('where'=>array("id"=>$id,"user_id"=>$this->user_id)));

        if(!isset($domain_data[0])) 
        {
            echo $this->lang->line("Domain not found.");
            exit();
        }

        $url=isset($domain_data[0]["action_controller_url"]) ? $domain_data[0]["action_controller_url"] : "";
        if($url=="") 
        {
            echo $this->lang->line("Domain not found.");
            exit();
        }

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
        curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");     
        $content = curl_exec($ch);

        $resp=curl_getinfo($ch);
        if(isset($resp['http_code']) && $resp['http_code']=='406') 
        {
            $this->session->set_userdata('domain_verified','noaccess');
            redirect('/imgclick_custom_domain/settings','location');  
        }

        $pos=strpos($content,'<sociclicks></sociclicks>');
        if($pos!==FALSE)
        {
            $this->session->set_userdata('domain_verified','success');
            $this->basic->update_data('imgclick_domain',array('id'=>$id),array("is_verified"=>'1'));    
        }    
        else
        {
            $this->session->set_userdata('domain_verified','fail');
            $this->basic->update_data('imgclick_domain',array('id'=>$id),array("is_verified"=>'0'));  
        }

        redirect('/imgclick_custom_domain/settings','location');   
    }

    public function wordpress()
    {
        if(!file_exists('plugins/customdomain.zip')) 
        {
            echo "<h3 align='center' style='font-family:arial;line-height:35px;margin:20px;padding:20px;border:1px solid #ccc;color:red'>".$this->lang->line("System failed to create wordpress plugin for you as your server does not support zip creation.Go to plugins folder in the project root using server file manager and manually zip the folder named customdomain & refresh this page.")."</h3>";
            exit();
        }   
        $data['body']='facebook_rx/imgclick/wordpress';     
        $data['page_title']=$this->lang->line('wordpress installation');     
        $this->_viewcontroller($data);
    }

    public function add_wordpress_action() 
    {      

        if($_SERVER['REQUEST_METHOD'] === 'GET') 
        redirect('home/access_forbidden','location');

        $status=$this->_check_usage($module_id=110,$request=1);
        if($status=="3") 
        {
            $error_msg = $this->lang->line("Sorry, you can not create more custom domain settings.")."<a href='".site_url('payment/usage_history')."'>".$this->lang->line("click here to see usage log")."</a>";
            $return_val=array("status"=>"0","message"=>$error_msg);
            echo json_encode($return_val);
            exit();
        } 

        if($_POST)
        {       
            $action_link_controller=$this->input->post('action_link_controller');
            $action_link_controller_org=$action_link_controller;
            $pos=strpos($action_link_controller,'http://');
            if($pos!==FALSE)
            {
                $protocol="http://";
            }
            else $protocol="https://";  

            $action_link_controller=str_replace('http://','', $action_link_controller);
            $action_link_controller=str_replace('https://','', $action_link_controller);

            if($this->session->userdata("user_type")=="Admin") $access='everyone';  
            else $access='me';               
          
            $data=array
            (
                'protocol'=>$protocol,
                'action_controller_url'=>$action_link_controller,
                'is_verified'=>'0',
                'user_id'=>$this->user_id,
                'access'=>$access,
                'category'=>'wordpress'
            );

            $ch=curl_init();
            curl_setopt($ch, CURLOPT_URL, $action_link_controller_org);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");   
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
            curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
            curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");     
            $content = curl_exec($ch);            
            
            if($this->basic->insert_data('imgclick_domain',$data))                                      
            {                
                $insert_id=$this->db->insert_id();
                $pos=strpos($content,'<sociclicks></sociclicks>');
                if($pos!==FALSE)
                {
                    $this->basic->update_data('imgclick_domain',array('id'=>$insert_id),array("is_verified"=>'1'));
                    $is_verified=$this->lang->line("also domain has been verified successfully.");    
                }    
                else
                {
                    $this->basic->update_data('imgclick_domain',array('id'=>$insert_id),array("is_verified"=>'0'));
                    $is_verified=$this->lang->line("but domain has been failed to verify.");
                }

                $this->_insert_usage_log($module_id=110,$request=1);  
                echo json_encode(array("status"=>"1","is_verified"=>$is_verified,"message"=>$this->lang->line("domain has been added successfully.")));
            }  
            else
            {
                echo json_encode(array("status"=>"0","is_verified"=>'0',"message"=>$this->lang->line("something went wrong, please try again.")));
            }   
            
        }   
    }


    public function delete_domain($id=0)
    {
        if($id==0) exit();

        $domain_data=$this->basic->get_data("imgclick_domain",array("where"=>array("id"=>$id,"user_id"=>$this->user_id)));
       
        if(!isset($domain_data[0]))
        {
            $this->session->set_flashdata('delete_error_message',1); 
            redirect('imgclick_custom_domain/settings','location');
        }

        $this->basic->delete_data("imgclick_domain",array("id"=>$id,"user_id"=>$this->user_id));
        if($this->db->affected_rows()>0)        
        {
            $protocol=$domain_data[0]["protocol"];
            $action_controller_url=$domain_data[0]["action_controller_url"];
            $count_no_of_campaign_of_this_domain=$this->basic->count_row("imgclick_campaign",$where=array("where"=>array("protocol"=>$protocol,"action_controller_url"=>$action_controller_url)),$count='id');
            $count=isset($count_no_of_campaign_of_this_domain[0]['total_rows']) ? $count_no_of_campaign_of_this_domain[0]['total_rows'] : 0;
            if($count==0) $this->_delete_usage_log($module_id=110,$usage_count=1); // if that doamin have any campaign then do not reverse module usage 
            $this->session->set_flashdata('delete_success_message',1); 
        }
        else $this->session->set_flashdata('delete_error_message',1); 
        redirect('imgclick_custom_domain/settings','location');
    }


}
