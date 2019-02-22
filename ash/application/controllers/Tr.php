<?php 
require_once("Home.php"); // loading home controller

class Tr extends Home
{

    public $user_id;    
    
    public function __construct()
    {
        parent::__construct();       
    }


    public function index()
    {
        $this->rd();
    }


    public function rd() 
    {
        $tracking_code=$this->input->get("tc",true);        
        $referrer_code=$this->input->get("rc",true);        
        $campaign_data=$this->basic->get_data("imgclick_campaign",array("where"=>array("tracking_code"=>$tracking_code)));
        $data=array("campaign_data"=>$campaign_data,"referrer_code"=>$referrer_code);
        $this->load->view("facebook_rx/imgclick/redirect",$data);
    }

    public function traffic_tracking()
    {
        header('Access-Control-Allow-Origin: *');
        $time=date("Y-m-d H:i:s");        
        ignore_user_abort(TRUE); 
       
        $ip=$this->real_ip();
        $tracking_code=$_POST['tracking_code'];
        $campaign_id=$_POST['campaign_id'];
        $browser_name=$_POST['browser_name'];
        $browser_version=$_POST['browser_version'];
        $device=$_POST['device'];
        $mobile_desktop=$_POST['mobile_desktop'];
        $referrer=$_POST['referrer'];
        $referrer_code=$_POST['referrer_code'];
        $current_url=$_POST['current_url']."&rc=".$referrer_code;
        $only_domain = get_domain_only($current_url); 
        
        $this->load->library('misc');
         
        /**Get Country code and country name***/        
        if($ip)
        {
            
            /*** Check ip is already in table or not, if in table then don't call for api ****/            
            $where['where']=array('ip'=>$ip,'country !='=>'');
            $select=array('country','city','org','latitude','longitude','postal');
            $existing_ip_info= $this->basic->get_data("imgclick_traffic",$where,$select,'', $limit = '1', $start = '0');
            
            if(isset($existing_ip_info[0]['country']) && $existing_ip_info[0]['country']!='')
            {            
                $user_country=isset($existing_ip_info[0]['country']) ? $existing_ip_info[0]['country']: "";
                $user_city=isset($existing_ip_info[0]['city'])? $existing_ip_info[0]['city']: "";
                $user_org=isset($existing_ip_info[0]['org']) ? $existing_ip_info[0]['org']:"";
                $user_latitude=isset($existing_ip_info[0]['latitude']) ? $existing_ip_info[0]['latitude'] :"";
                $user_longitude=isset($existing_ip_info[0]['longitude']) ? $existing_ip_info[0]['longitude'] : "";
                $user_postal=isset($existing_ip_info[0]['postal']) ? $existing_ip_info[0]['postal'] : "";
            }
            
            else
            {
                $ip_info= $this->misc->ip_information($ip);                
                $user_country=isset($ip_info['country']) ? $ip_info['country']: "";
                $user_city=isset($ip_info['city'])? $ip_info['city']: "";
                $user_org=isset($ip_info['org'])?$ip_info['org']:"";
                $user_latitude=isset($ip_info['latitude'])?$ip_info['latitude']:"";
                $user_longitude=isset($ip_info['longitude'])?$ip_info['longitude']:"";
                $user_postal=isset($ip_info['postal'])?$ip_info['postal']:"";
            }
            
         }
         
        if(!isset($user_country))
        $user_country="";
        
        if(!isset($country_code))
        $country_code="";       

        if(strpos($referrer,'facebook') !== false) 
        $referrer_enum_val='facebook';
        
        else if(strpos($referrer_code,'tw') !== false) 
        $referrer_enum_val='twitter';
        
        else if(strpos($referrer_code,'pt') !== false) 
        $referrer_enum_val='pinterest';
        
        else if(strpos($referrer_code,'tm') !== false) 
        $referrer_enum_val='tumblr';
        
        else if(strpos($referrer_code,'li') !== false) 
        $referrer_enum_val='linkedin';
        
        else $referrer_enum_val='unknown';
        
        if($this->basic->is_exist("imgclick_campaign",array("tracking_code"=>$tracking_code)))        
        {
            $q="
            INSERT INTO  `imgclick_traffic` (campaign_id,tracking_code,ip,country,city,org,latitude,longitude,postal,os,device,browser_name,browser_version,date_time,referrer,referrer_url,visit_url) 
            values ('$campaign_id','$tracking_code','$ip','$user_country','$user_city','$user_org','$user_latitude','$user_longitude','$user_postal','$device','$mobile_desktop','$browser_name','$browser_version','$time','$referrer_enum_val','$referrer','$current_url')";
            $this->basic->execute_complex_query($q);
        }
    }


    function real_ip()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    public function external_source($tracking_code="")
    {   
        if($tracking_code=='')
        {
            $status=array("status"=>"0","message"=>"Invalid tracking code.");
            echo json_encode($status);
        }    
        $campaign_data=$this->basic->get_data("imgclick_campaign",array("where"=>array("tracking_code"=>$tracking_code)));
        if(!isset($campaign_data))
        {
            $status=array("status"=>"0","message"=>"Campaign not found.");
            echo json_encode($status);
        }
        echo json_encode(array("status"=>"1","data"=>$campaign_data[0])); 
    }








}