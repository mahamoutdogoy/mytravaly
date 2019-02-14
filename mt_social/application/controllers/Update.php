<?php

class Update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();     
        set_time_limit(0);
        $this->load->helpers(array('my_helper'));
        $this->load->database();
        $this->load->model('basic');
        $query = 'SET SESSION group_concat_max_len=9990000000000000000';
        $this->db->query($query);
        $q= "SET SESSION wait_timeout=50000";
        $this->db->query($q);
        $query="SET SESSION sql_mode = ''";
        $this->db->query($query);
        if(function_exists('ini_set')){
          ini_set('memory_limit', '-1');
        }
    }


    public function index()
    {
        $this->v_1_2to1_3();
    }


    public function v_1_2to1_3()
    {
       $lines="TRUNCATE TABLE pinterest_config;
            TRUNCATE TABLE rx_pinterest_autopost;
            TRUNCATE TABLE rx_pinterest_info;

            ALTER TABLE `pinterest_config` ADD `app_name` VARCHAR(255) NOT NULL AFTER `app_secret`, ADD `user_name` VARCHAR(255) NOT NULL AFTER `app_name`, ADD `code` VARCHAR(255) NOT NULL AFTER `user_name`";
       $lines=explode(";", $lines);
        $count=0;
        foreach ($lines as $line) 
        {
            $count++;      
            $this->db->query($line);
        }
       echo $count." queries executed. ";

      echo $this->config->item('product_short_name')." has been updated successfully to version 1.3";
    }





    function delete_update()
    {
        unlink(APPPATH."controllers/update.php");
    }
 


}
