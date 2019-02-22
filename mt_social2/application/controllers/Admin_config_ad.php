<?php
require_once("Home.php"); // including home controller

/**
* class config
* @category controller
*/
class Admin_config_ad extends Home
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
            redirect('home/login_page', 'location');
        }

        if ($this->session->userdata('user_type')!= 'Admin') {
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
    public function index($base_site="")
    {
        $this->ad_config();
    }

    /**
    * load config form method
    * @access public
    * @return void
    */
    public function ad_config()
    {                
        $data['body'] = "admin/config/edit_ad_config";
        $data['config_data'] = $this->basic->get_data("ad_config");       
        $data['page_title'] = $this->lang->line('advertisement settings');  
        $this->_viewcontroller($data);
    }

    /**
    * method to edit config
    * @access public
    * @return void
    */
    public function edit_ad_config()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            redirect('home/access_forbidden', 'location');
        }

        if ($_POST) 
        {
            // validation
            $this->form_validation->set_rules('section1_html',          '<b>Section - 1 (970x90)</b>',              'trim');
            $this->form_validation->set_rules('section1_html_mobile',   '<b>Section - 1 : Mobile  (320x100)</b>',   'trim');
            $this->form_validation->set_rules('section2_html',          '<b>Section: 2 (300x250) </b>',             'trim');
            $this->form_validation->set_rules('section3_html',          '<b>Section: 3 (300x250) </b>',             'trim');
            $this->form_validation->set_rules('section4_html',          '<b>Section: 4 (300x600) </b>',             'trim');
            $this->form_validation->set_rules('status',                 '<b>'.$this->lang->line("status").'</b>',   'trim|required');
            // go to config form page if validation wrong
            if ($this->form_validation->run() == false) 
            {
                return $this->ad_config();
            } 
            else 
            {
                // assign
                $section1_html=htmlspecialchars($this->input->post('section1_html', false),ENT_QUOTES);
                $section1_html_mobile=htmlspecialchars($this->input->post('section1_html_mobile', false),ENT_QUOTES);
                $section2_html=htmlspecialchars($this->input->post('section2_html', false),ENT_QUOTES);
                $section3_html=htmlspecialchars($this->input->post('section3_html', false),ENT_QUOTES);
                $section4_html=htmlspecialchars($this->input->post("section4_html", false),ENT_QUOTES);
                $status=$this->input->post("status", true);


               
                if($status=="1")
                $insert_update_data=array("section1_html"=>$section1_html,"section1_html_mobile"=>$section1_html_mobile,"section2_html"=>$section2_html,"section3_html"=>$section3_html,"section4_html"=>$section4_html,"status"=>$status);
                else
                $insert_update_data=array("status"=>$status);

                if($this->basic->is_exist("ad_config",$where='',$select='id')) 
                $this->basic->update_data("ad_config",$where=array("id>"=>"0"),$insert_update_data);
                else $this->basic->insert_data("ad_config",$insert_update_data);
                  
                $this->session->set_flashdata('success_message', 1);
                redirect('admin_config_ad/ad_config', 'location');
            }
        }
    }

 


}