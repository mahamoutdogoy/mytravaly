<?php
require_once("Home.php");

class Cron_job extends Home
{
    public $user_id;
    
    public function __construct()
    {
        parent::__construct();   

        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');        
        if ($this->session->userdata('user_type') != 'Admin')
        redirect('home/login_page', 'location');

        $this->important_feature();
        
        if($this->session->userdata('user_type') == 'Admin')
            $this->periodic_check();

        $this->user_id=$this->session->userdata("user_id");       
    }


    public function index()
    {
        $data['body'] = "api/cron_job";
        $data['page_title'] = $this->lang->line("cron job");
        $api_data=$this->basic->get_data("native_api",array("where"=>array("user_id"=>$this->session->userdata("user_id"))));
        $data["api_key"]="";
        if(count($api_data)>0) $data["api_key"]=$api_data[0]["api_key"];
        $this->_viewcontroller($data);
    }


    


    
}
