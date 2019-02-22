<?php
require_once("Home.php"); // including home controller

/**
* class config
* @category controller
*/
class Dashboard extends Home
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

        $this->important_feature();
        
        $this->user_id=$this->session->userdata('user_id');

        $this->member_validity();
    }

    /**
    * load index method. redirect to config
    * @access public
    * @return void
    */
    public function index()
    {
        $this->admin_dashboard();
    }


    public function admin_dashboard()
    {
        $data['body'] = "dashboard/admin_dashboard";
        $data['page_title'] = $this->lang->line('dashboard');

        $to_date = date("Y-m-d");
        $from_date = date("Y-m-d",strtotime("$to_date-30 days"));

        $cam_data=$this->basic->get_data("imgclick_campaign",array("where"=>array("date_format(created_at,'%Y-%m-%d') >=" => $from_date,"date_format(created_at,'%Y-%m-%d') <=" => $to_date,"user_id"=>$this->user_id)));
       
        $total_post_count=0;  
        $total_campaign_count=0;  
        $pending_campaign_count=0;  
        $completed_campaign_count=0;  
        $fb_post_count=0;  
        $tw_post_count=0;  
        $pt_post_count=0;  
        $ln_post_count=0;  
        $tm_post_count=0;  
        $campaign_id_array=array();
        $latest_campaign=$cam_data;
        usort($latest_campaign, function($a, $b) {
            return $b['id'] - $a['id'];
        });
        $data["latest_campaign"]=$latest_campaign;
        foreach ($cam_data as $key => $value) 
        {
            $campaign_id_array[]=$value["id"];
            $total_post_count+=$value["total_post_count"];
            $total_campaign_count++;
            if($value["posting_status"]=='0') $pending_campaign_count++;
            
            if($value["posting_status"]=='2') 
            {
                $completed_campaign_count++;

                $post_report=json_decode($value["post_report"],true);
                
                if(isset($post_report["Facebook"]))
                $fb_post_count+=count($post_report["Facebook"]);

                if(isset($post_report["Twitter"]))
                $tw_post_count+=count($post_report["Twitter"]);

                if(isset($post_report["Pinterest"]))
                $pt_post_count+=count($post_report["Pinterest"]);

                if(isset($post_report["Linkedin"]))
                $ln_post_count+=count($post_report["Linkedin"]);

                if(isset($post_report["Tumblr"]))
                $tm_post_count+=count($post_report["Tumblr"]);
            }

        }
        if(empty($campaign_id_array)) $campaign_id_array=array(0); // otherwise where in will return error if empty array

       
        $to_date = $to_date." 23:59:59";
        $from_date = $from_date." 00:00:00";
        $table = 'imgclick_traffic';
        
        // code for line chart
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);
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
        $info['day_wise_click_report'] = json_encode($line_char_data);      
        $info['from_date'] = date("d-M-y",strtotime($from_date));
        $info['to_date'] = date("d-M-y",strtotime($to_date));

        
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);

        $select=array("date_format(date_time,'%Y-%m-%d') as date_test","GROUP_CONCAT(referrer SEPARATOR ',') as referrer");

        $traffic_source_info = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start='',$order_by='',$group_by='date_test');
        $social_network_array = array('facebook','twitter','linkedin','pinterest','tumblr','unknown');
        $dates_with_data=array_column($traffic_source_info,'date_test');
        $traffic_source_info_assoc=array_column($traffic_source_info,'referrer','date_test');

        $dDiff = strtotime($to_date) - strtotime($from_date);
        $no_of_days = floor($dDiff/(60*60*24));
        $day_wise_click_comparison_report = array();
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

            $day_wise_click_comparison_report[]=array("date"=>$one_date,"facebook"=>$fb_occurance,"twitter"=>$tw_occurance,"linkedin"=>$ln_occurance,"pinterest"=>$pt_occurance,"tumblr"=>$tm_occurance,"unknown"=>$un_occurance);        
        } 
        $info['day_wise_click_comparison_report'] = json_encode($day_wise_click_comparison_report);

        // ===========Click/Social Media===============
        $bar_chart_data = array
        (
            array('source_name' => 'Facebook', 'value' => $fb_occurance_count),
            array('source_name' => 'Twitter', 'value' => $tw_occurance_count),
            array('source_name' => 'Linkedin', 'value' => $ln_occurance_count),
            array('source_name' => 'Pinterest', 'value' => $pt_occurance_count),
            array('source_name' => 'Tumblr', 'value' => $tm_occurance_count)
        );
        $info['bar_chart_data']=json_encode($bar_chart_data);

        //==========Post/Social Media================
        $bar_chart_data2 = array
        (
            array('source_name' => 'Facebook', 'value' => $fb_post_count),
            array('source_name' => 'Twitter', 'value' => $tw_post_count),
            array('source_name' => 'Linkedin', 'value' => $ln_post_count),
            array('source_name' => 'Pinterest', 'value' => $pt_post_count),
            array('source_name' => 'Tumblr', 'value' => $tm_post_count)
        );
        $info['bar_chart_data2']=json_encode($bar_chart_data2);
    

        $grand_total=$fb_occurance_count+$tw_occurance_count+$ln_occurance_count+$pt_occurance_count+$tm_occurance_count+$un_occurance_count;          
        $avg_click_per_day=0;
        if($grand_total!=0)
        {
            $avg_click_per_day=$grand_total/30;
            $avg_click_per_day=number_format((float)$avg_click_per_day, 2, '.', '');
        }
        $info["total_post_count"]=$total_post_count;
        $info["total_click_count"]=$grand_total;
        $info["avg_click_per_day"]=$avg_click_per_day;
        $info["total_campaign_count"]=$total_campaign_count;
        $info["pending_campaign_count"]=$pending_campaign_count;
        $info["completed_campaign_count"]=$completed_campaign_count;

       
        $color_array = array("#FF8B6B","#D75EF2","#78ED78","#D31319","#798C0E","#FC749F","#D3C421","#1DAF92","#5832BA","#FC5B20","#EDED28","#E27263","#E5C77B","#B7F93B","#A81538", "#087F24","#9040CE","#872904","#DD5D18","#FBFF0F");
        $color_array2=array_reverse($color_array);
        $color_array3 = array("#78ED78","#D31319","#1DAF92","#5832BA","#FC5B20","#798C0E","#FC749F","#D3C421","#EDED28","#E27263","#E5C77B","#B7F93B","#A81538", "#087F24","#9040CE","#872904","#DD5D18","#FBFF0F","#FF8B6B","#D75EF2");
               
        
        // ============================== OS REPORT=================================
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","os");
        $os_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='os asc',$group_by='os');    
        $i = 0;
        $os_report_data=array();
        $os_report_data_ul="";
        foreach($os_report as $value)
        {
            $new_users = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);
            $os_report_data[]=array('value'=>$new_users,'color'=>$color_array[$i],'highlight'=>$color_array[$i],'direct_link'=>$value['os'],'label'=>$value['os']);
            $os_report_data_ul.="<div class='col-xs-12 col-md-6 text-center'><i class='fa fa-circle-o' style='color:".$color_array[$i]."'></i> ".$value['os']." : ".$new_users."</div>";
        }
        $info['os_report_data'] = json_encode($os_report_data);
        $info['os_report_data_ul'] = $os_report_data_ul;
        // ============================== OS REPORT=================================


        // ============================== BROWSER REPORT=================================
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","browser_name");
        $browser_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='browser_name asc',$group_by='browser_name');  
        $i = 0;
        $browser_report_data=array();
        $browser_report_data_ul="";
        foreach($browser_report as $value)
        {
            $new_users = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);
            $browser_report_data[]=array('value'=>$new_users,'color'=>$color_array2[$i],'highlight'=>$color_array2[$i],'direct_link'=>$value['browser_name'],'label'=>$value['browser_name']);
            $browser_report_data_ul.="<div class='col-xs-12 col-md-6 text-center'><i class='fa fa-circle-o' style='color:".$color_array2[$i]."'></i> ".$value['browser_name']." : ".$new_users."</div>";
        }
        $info['browser_report_data'] = json_encode($browser_report_data);
        $info['browser_report_data_ul'] = $browser_report_data_ul;
        // ============================== BROWSER REPORT=================================


        // ============================== DEVICE REPORT=================================
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","device");
        $device_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='device asc',$group_by='device');
        $i = 0;
        $device_report_data=array();
        $device_report_data_ul="";
        foreach($device_report as $value)
        {
            $new_users = array();
            $i++;
            $new_users = explode(',', $value['new_user']);
            $new_users = array_filter($new_users);
            $new_users = array_values($new_users);
            $new_users = count($new_users);
            $device_report_data[]=array('value'=>$new_users,'color'=>$color_array3[$i],'highlight'=>$color_array3[$i],'direct_link'=>$value['device'],'label'=>$value['device']);
            $device_report_data_ul.="<div class='col-xs-12 col-md-6 text-center'><i class='fa fa-circle-o' style='color:".$color_array3[$i]."'></i> ".$value['device']." : ".$new_users."</div>";
        }
        $info['device_report_data'] = json_encode($device_report_data);
        $info['device_report_data_ul'] = $device_report_data_ul;
        // ============================== DEVICE REPORT=================================

   
        // ============================== COUNTRY REPORT=================================
        $where = array();
        $where['where'] = array(
            "date_time >=" => $from_date,
            "date_time <=" => $to_date
            );
        $where['where_in'] = array("campaign_id" => $campaign_id_array);
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

        $info['country_graph_data'] = json_encode($country_report);

        $select = array("GROUP_CONCAT(id SEPARATOR ',') as sessions","GROUP_CONCAT(id SEPARATOR ',') as new_user","country");
        $browser_report = $this->basic->get_data($table,$where,$select,$join='',$limit='',$start=NULL,$order_by='',$group_by='country');

        $country_report_str = "<table class='table table-hover'>
                                    <tr style='background:#3498DB;color:#fff'>
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
            $country_report_str .= "<tr class='country_wise_name' data='".$value['country']."'><td>".$i."</td><td>".'<img style="height: 15px; width: 20px; margin-top: -3px;" src="'.$image_link.'" alt=" "> &nbsp;'.$value['country']."</td><td>".$new_users."</td></tr>";

        }
        $country_report_str .= "</table>";
        $info['country_wise_table_data'] = $country_report_str;        
        // ============================== COUNTRY REPORT=================================


        $data["info"]=$info;
        $this->_viewcontroller($data);
    }

 





}
