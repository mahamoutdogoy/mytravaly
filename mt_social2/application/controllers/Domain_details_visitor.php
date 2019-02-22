<?php
require_once("Home.php"); // loading home controller

/**
* @category controller
* class Admin
*/

class Domain_details_visitor extends Home
{

    public $user_id;    

    /**
    * load constructor
    * @access public
    * @return void
    */
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 1)
        redirect('home/login_page', 'location');   

        $this->user_id=$this->session->userdata('user_id');
        set_time_limit(0);

        if($this->session->userdata('user_type') != 'Admin' && !in_array(111,$this->module_access))
        redirect('home/login_page', 'location'); 

        $this->member_validity();
         
        $query = 'SET SESSION group_concat_max_len = 9999999999999999999';
        $this->db->query($query);

        if(function_exists('ini_set')){
            ini_set('memory_limit', '-1');
        }
    }


    public function index()
    {
        $this->domain_list_visitor();      
    }
    
    public function domain_details($id=0)
    {
        redirect("/imgclick/traffic_report",'location'); // this function is done inside imgclick controllers to get meaningful url, rest of the functions are here
    }


    public function ajax_get_overview_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);
        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = 'imgclick_traffic';
        
        // code for line chart
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );
        $select = array(
            "date_format(date_time,'%Y-%m-%d') as date",
            "count(id) as number_of_user"
            );
        $day_wise_visitor = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start='',$order_by='',$group_by="date");

        $day_count = date('Y-m-d', strtotime($from_date. " + 1 days"));


        foreach ($day_wise_visitor as $value){
            $day_wise_info[$value['date']] = $value['number_of_user'];
        }

        $dDiff = strtotime($to_date) - strtotime($from_date);
        $no_of_days = floor($dDiff/(60*60*24));
        $line_char_data = array();
        for($i=0;$i<=$no_of_days+1;$i++){
            $day_count = date('Y-m-d', strtotime($from_date. " + $i days"));
            if(isset($day_wise_info[$day_count])){
                $line_char_data[$i]['user'] = $day_wise_info[$day_count];
            } else {
                $line_char_data[$i]['user'] = 0;
            }
            $line_char_data[$i]['date'] = date('Y-m-d', strtotime($from_date. " + $i days"));
        }
        // end of code for line chart
        $info['line_chart'] = $line_char_data;      
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );

        $select=array("date_format(date_time,'%Y-%m-%d') as date_test","GROUP_CONCAT(referrer SEPARATOR ',') as referrer");

        $traffic_source_info = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start='',$order_by='',$group_by='date_test');
        $social_network_array = array('facebook','twitter','linkedin','pinterest','tumblr','unknown');
        $dates_with_data=array_column($traffic_source_info,'date_test');
        $traffic_source_info_assoc=array_column($traffic_source_info,'referrer','date_test');

        $dDiff = strtotime($to_date) - strtotime($from_date);
        $no_of_days = floor($dDiff/(60*60*24));
        $line_char_data = array();
        $all_dates=array();
        $fb_occurance_count=0;
        $tw_occurance_count=0;
        $ln_occurance_count=0;
        $pt_occurance_count=0;
        $tm_occurance_count=0;
        $un_occurance_count=0;
        for($i=0;$i<=$no_of_days+1;$i++)
        {
            $one_date= date('Y-m-d', strtotime($from_date. " + $i days"));  

            if(isset($traffic_source_info_assoc[$one_date]))
            {
                $fb_occurance=substr_count($traffic_source_info_assoc[$one_date], 'facebook');
                $tw_occurance=substr_count($traffic_source_info_assoc[$one_date], 'twitter');
                $ln_occurance=substr_count($traffic_source_info_assoc[$one_date], 'linkedin');
                $pt_occurance=substr_count($traffic_source_info_assoc[$one_date], 'pinterest');
                $tm_occurance=substr_count($traffic_source_info_assoc[$one_date], 'tumblr');
                $un_occurance=substr_count($traffic_source_info_assoc[$one_date], 'unknown');
            }
            else
            {
                $fb_occurance=0;
                $tw_occurance=0;
                $ln_occurance=0;
                $pt_occurance=0;
                $tm_occurance=0;
                $un_occurance=0;
            }

            $fb_occurance_count=$fb_occurance_count+$fb_occurance;
            $tw_occurance_count=$tw_occurance_count+$tw_occurance;
            $ln_occurance_count=$ln_occurance_count+$ln_occurance;
            $pt_occurance_count=$pt_occurance_count+$pt_occurance;
            $tm_occurance_count=$tm_occurance_count+$tm_occurance;
            $un_occurance_count=$un_occurance_count+$un_occurance;

            $line_char_data[]=array("date"=>$one_date,"facebook"=>$fb_occurance,"twitter"=>$tw_occurance,"linkedin"=>$ln_occurance,"pinterest"=>$pt_occurance,"tumblr"=>$tm_occurance,"unknown"=>$un_occurance);        
        }
   

        $info['line_chart_data'] = $line_char_data;
        $info['bar_chart_data'] = array
        (
            array('source_name' => 'Facebook', 'value' => $fb_occurance_count),
            array('source_name' => 'Twitter', 'value' => $tw_occurance_count),
            array('source_name' => 'Linkedin', 'value' => $ln_occurance_count),
            array('source_name' => 'Pinterest', 'value' => $pt_occurance_count),
            array('source_name' => 'Tumblr', 'value' => $tm_occurance_count),
            array('source_name' => 'Unknown', 'value' => $un_occurance_count)
        );

        $grand_total=$fb_occurance_count+$tw_occurance_count+$ln_occurance_count+$pt_occurance_count+$tm_occurance_count+$un_occurance_count;
        if($grand_total==0)
        {
            $fb_per=0;
            $tw_per=0;
            $ln_per=0;
            $pt_per=0;
            $tm_per=0;
            $un_per=0;
        }
        else
        {
            $fb_per=($fb_occurance_count/$grand_total)*100;
            $tw_per=($tw_occurance_count/$grand_total)*100;
            $ln_per=($ln_occurance_count/$grand_total)*100;
            $pt_per=($pt_occurance_count/$grand_total)*100;
            $tm_per=($tm_occurance_count/$grand_total)*100;
            $un_per=($un_occurance_count/$grand_total)*100;
            $fb_per=number_format((float)$fb_per, 2, '.', '');
            $tw_per=number_format((float)$tw_per, 2, '.', '');
            $ln_per=number_format((float)$ln_per, 2, '.', '');
            $pt_per=number_format((float)$pt_per, 2, '.', '');
            $tm_per=number_format((float)$tm_per, 2, '.', '');
            $un_per=number_format((float)$un_per, 2, '.', '');
        }

        

        $color_array=array('#FFB85F', '#74828F', '#BEB9B5', '#C25B56','#BCCF3D','#D79C8C');
        $top_five_referrer = 
        array
        (
            array('value'=>$fb_per,'color'=>$color_array[0],'highlight'=>$color_array[0],'direct_link'=>'facebook.com','label'=>'Facebook'),
            array('value'=>$tw_per,'color'=>$color_array[1],'highlight'=>$color_array[1],'direct_link'=>'twitter.com','label'=>'Twitter'),
            array('value'=>$ln_per,'color'=>$color_array[2],'highlight'=>$color_array[2],'direct_link'=>'linkedin.com','label'=>'Linkedin'),
            array('value'=>$pt_per,'color'=>$color_array[3],'highlight'=>$color_array[3],'direct_link'=>'pinterest.com','label'=>'Pinterest'),
            array('value'=>$tm_per,'color'=>$color_array[4],'highlight'=>$color_array[4],'direct_link'=>'tumblr.com','label'=>'Tumblr'),
            array('value'=>$un_per,'color'=>$color_array[5],'highlight'=>$color_array[5],'direct_link'=>'unknown','label'=>'Unknown')
        );
        $info['top_referrer_data'] = $top_five_referrer;

        $cam_data=$this->basic->get_data("imgclick_campaign",array("where"=>array("id"=>$domain_id)));
        $total_post_count=isset($cam_data[0]["total_post_count"]) ? $cam_data[0]["total_post_count"] : 0;
        
        $avg_click_per_day=0;
        if($grand_total!=0)
        {
            $avg_click_per_day=$grand_total/30;
            $avg_click_per_day=number_format((float)$avg_click_per_day, 2, '.', '');
        }


        $info["total_post_count"]=$total_post_count;
        $info["total_click_count"]=$grand_total;
        $info["avg_click_per_day"]=$avg_click_per_day;

        echo json_encode($info);
    }



    public function ajax_get_country_wise_report_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);
        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );
        $select = array('country',"GROUP_CONCAT(id SEPARATOR ',') as new_user");
        $country_name = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='country');

        $i = 0;
        $country_report = array();
        $a = array('Country','New Visitor');
        $country_report[$i] = $a;
        foreach($country_name as $value){
            $new_users = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);
            $temp = array();
            $temp[] = $value['country'];
            $temp[] = $new_users;
            $country_report[$i] = $temp;
        }

        $info['country_graph_data'] = $country_report;

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","country");
        $browser_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='country');

        $country_report_str = "<table class='table table-hover'>
                                    <tr style='background:#D9FDC7;color:blue'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("Country")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";
        $country_list = $this->get_country_names();       
        $i = 0;
        foreach($browser_report as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $s_country = array_search(trim(strtoupper($value["country"])), $country_list); 
            $image_link = base_url()."assets/images/flags/".$s_country.".png";
            $country_report_str .= "<tr class='country_wise_name' style='cursor:pointer;' data='".$value['country']."'><td>".$i."</td><td>".'<img style="height: 15px; width: 20px; margin-top: -3px;" src="'.$image_link.'" alt=" "> &nbsp;'.$value['country']."</td><td>".$new_users."</td></tr>";

        }
        $country_report_str .= "</table>";
        $info['country_wise_table_data'] = $country_report_str;

        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        echo json_encode($info);
    }

    public function ajax_get_individual_country_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);
        $country_name = $this->input->post('country_name', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "country" => $country_name,
            "campaign_id"=>$domain_id
            );
        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","date_format(date_time,'%Y-%m-%d') as date");
        $country_daily_session = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='city');

        foreach($country_daily_session as $value){
            $sessions = array();
            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);
            $report[$value['date']]['sessions'] = $sessions;
        }

        $dDiff = strtotime($to_date) - strtotime($from_date);
        $no_of_days = floor($dDiff/(60*60*24));
        $line_char_data = array();

        for($i=0;$i<=$no_of_days+1;$i++){
            $day_count = date('Y-m-d', strtotime($from_date. " + $i days"));
            if(isset($report[$day_count])){
                $line_char_data[$i]['session'] = $report[$day_count]['sessions'];
            } else {
                $line_char_data[$i]['session'] = 0;               
            }
            $line_char_data[$i]['date'] = date('Y-m-d', strtotime($from_date. " + $i days"));
        }

        $info['country_daily_session_data'] = $line_char_data;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));



        $where_version = array();
        $where_version['where'] = array(
            'country' => $country_name,
            "campaign_id"=>$domain_id
            );
        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","country","city");
        $country_city = array();
        $country_city = $this->basic->get_data($table,$where_version,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='city');

        $country_city_str = "<table class='table table-hover'>
                                    <tr style='background:#0073B7;color:white'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("Country")."</th>
                                        <th>".$this->lang->line("City")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";
        $country_list_individual = $this->get_country_names();       
        $i = 0;
        foreach($country_city as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $s_country = array_search(trim(strtoupper($value["country"])), $country_list_individual); 
            $image_link = base_url()."assets/images/flags/".$s_country.".png";

            $country_city_str .= "<tr><td>".$i."</td><td>".'<img style="height: 15px; width: 20px; margin-top: -3px;" src="'.$image_link.'" alt=" "> &nbsp;'.$value['country']."</td><td>".$value['city']."</td><td>".$new_users."</td></tr>";

        }
        $country_city_str .= "</table>";

        $info['country_city_str'] = $country_city_str;

        echo json_encode($info);
    }

    public function ajax_get_browser_report_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","browser_name");
        $browser_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='browser_name');

        $browser_report_str = "<table class='table table-hover'>
                                    <tr style='background:#0073B7;color:white'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("Browser")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";        
        $i = 0;
        foreach($browser_report as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $browser_report_str .= "<tr class='browser_name' style='cursor:pointer;' data='".$value['browser_name']."'><td>".$i."</td><td>".$value['browser_name']."</td><td>".$new_users."</td></tr>";

        }
        $browser_report_str .= "</table>";

        $info['browser_report_name'] = $browser_report_str;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));


        echo json_encode($info);
    }

    public function ajax_get_individual_browser_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);
        $browser_name = $this->input->post('browser_name', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "browser_name" => $browser_name,
            "campaign_id"=>$domain_id
            );
        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","date_format(date_time,'%Y-%m-%d') as date");
        $browser_daily_session = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='date');
        foreach($browser_daily_session as $value){
            $sessions = array();
            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);
            $report[$value['date']]['sessions'] = $sessions;
        }

        $dDiff = strtotime($to_date) - strtotime($from_date);
        $no_of_days = floor($dDiff/(60*60*24));
        $line_char_data = array();

        for($i=0;$i<=$no_of_days+1;$i++){
            $day_count = date('Y-m-d', strtotime($from_date. " + $i days"));
            if(isset($report[$day_count])){
                $line_char_data[$i]['session'] = $report[$day_count]['sessions'];
            } else {
                $line_char_data[$i]['session'] = 0;               
            }
            $line_char_data[$i]['date'] = date('Y-m-d', strtotime($from_date. " + $i days"));
        }

        $info['browser_daily_session_data'] = $line_char_data;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));



        $where_version = array();
        $where_version['where'] = array(
            'browser_name' => $browser_name,
            "campaign_id"=>$domain_id
            );
        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","browser_version","browser_name");
        $browser_versions = $this->basic->get_data($table,$where_version,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='browser_version');

        $browser_version_str = "<table class='table table-hover'>
                                    <tr style='background:#0073B7;color:white'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("Browser")."</th>
                                        <th>".$this->lang->line("Version")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";        
        $i = 0;
        foreach($browser_versions as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $browser_version_str .= "<tr><td>".$i."</td><td>".$value['browser_name']."</td><td>".$value['browser_version']."</td><td>".$new_users."</td></tr>";

        }
        $browser_version_str .= "</table>";

        $info['browser_version'] = $browser_version_str;

        echo json_encode($info);
    }



    public function ajax_get_os_report_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","os");
        $os_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='os');

        $os_report_str = "<table class='table table-hover'>
                                    <tr style='background:#00AAA0;color:white'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("OS")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";        
        $i = 0;
        foreach($os_report as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $os_report_str .= "<tr class='os_name' data='".$value['os']."'><td>".$i."</td><td>".$value['os']."</td><td>".$new_users."</td></tr>";

        }
        $os_report_str .= "</table>";
        $info['os_report_name'] = $os_report_str;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        echo json_encode($info);

    }




    public function ajax_get_device_report_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","device");
        $device_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='device');

        $device_report_str = "<table class='table table-hover'>
                                    <tr style='background:#FF7A5A;color:white'>
                                        <th>".$this->lang->line("SL")."</th>
                                        <th>".$this->lang->line("Device")."</th>
                                        <th>".$this->lang->line("Click")."</th>
                                    </tr>
                                ";        
        $i = 0;
        foreach($device_report as $value){
            $new_users = array();
            $sessions = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);

            $sessions = explode(',', $value['sessions']);
            $sessions = array_filter($sessions);
            $sessions = array_values($sessions);
            $sessions = array_unique($sessions);
            $sessions = count($sessions);

            $device_report_str .= "<tr class='device_name' data='".$value['device']."'><td>".$i."</td><td>".$value['device']."</td><td>".$new_users."</td></tr>";

        }
        $device_report_str .= "</table>";

        $info['device_report_name'] = $device_report_str;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        echo json_encode($info);
    }


    public function ajax_get_raw_data_data()
    {
        $domain_id = $this->input->post('domain_id', TRUE);
        $date_range = $this->input->post('date_range', TRUE);

        $from_and_to_date = array();
        if ($date_range != '') {
            $from_and_to_date = explode(" - ", $date_range);
        }

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        if (!empty($from_and_to_date)) {
            $from_date = date("Y-m-d",strtotime($from_and_to_date[0]));
            $to_date = date("Y-m-d",strtotime($from_and_to_date[1]));
        }

        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = "imgclick_traffic";

        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date,
            "campaign_id"=>$domain_id
            );

        $device_report = $this->basic->get_data($table,$where,$select='',$join='',$limit='',$start=NULL,$order_by='date_time desc');

        $device_report_str = '<script>
                    $j(document).ready(function() {
                        $("#campaign_report").DataTable();
                    }); 
                 </script>
                 <table id="campaign_report">
                     <thead>
                         <tr>
                             <th>'.$this->lang->line("Ip").'</th>
                             <th>'.$this->lang->line("Country").'</th>
                             <th>'.$this->lang->line("latitude").'</th>
                             <th>'.$this->lang->line("longitude").'</th>
                             <th>'.$this->lang->line("postal").'</th>
                             <th>'.$this->lang->line("os").'</th>
                             <th>'.$this->lang->line("device").'</th>
                             <th>'.$this->lang->line("browser name").'</th>
                             <th>'.$this->lang->line("browser version").'</th>
                             <th>'.$this->lang->line("clicked at").'</th>
                             <th>'.$this->lang->line("referrer").'</th>
                         </tr>
                     </thead>
                     <tbody>';    
        foreach($device_report as $value){
            $device_report_str .= '<tr>
                            <td>'.$value['ip'].'</td>
                            <td>'.$value['country'].'</td>
                            <td>'.$value['latitude'].'</td>
                            <td>'.$value['longitude'].'</td>
                            <td>'.$value['postal'].'</td>
                            <td>'.$value['os'].'</td>
                            <td>'.$value['device'].'</td>
                            <td>'.$value['browser_name'].'</td>
                            <td>'.$value['browser_version'].'</td>
                            <td>'.$value['date_time'].'</td>
                            <td>'.$value['referrer'].'</td>
                        </tr>';

        }
        $device_report_str .= '</tbody>
                 </table>';

        $info['raw_data_name'] = $device_report_str;
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        echo json_encode($info);
    }







}