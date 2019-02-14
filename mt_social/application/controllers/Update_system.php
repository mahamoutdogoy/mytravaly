<?php
require_once("Home.php"); // including home controller

/**
* @category controller
* class Admin
*/

class Update_system extends Home
{
      
	public $user_id;    

	
	public function __construct()
	{
	    parent::__construct();
	    if ($this->session->userdata('logged_in') != 1)
	    redirect('home/login_page', 'location');        
	    if ($this->session->userdata('user_type') != 'Admin')
	    redirect('home/login_page', 'location');	    
	}

	public function index()
	{
		$this->update_list();
	}

	public function update_list()
	{
		$product_id = $this->app_product_id;
		$current_version = $this->db->where('current', '1')->get('version')->row(); // fbinboxer project ids

		if(isset($current_version)) :			
			$product_version = $current_version->version;
		else :
			$product_version =1.0;
		endif;

		$data = array('product' => $product_id, 'version' => $product_version);

		$string = '';
		foreach($data as $index => $value)
		{
			$string .= "$index=$value&";
		}

		$string = trim($string, '&');

		$ch = curl_init('http://xeroneit.net/development/version_control/project_versions_api/return_check_updates/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);

		$res = curl_getinfo($ch);
		if($res['http_code'] != 200)
		{
			echo "<h2 style='color: red'>Connection failed to establish, cURL is not working! Visit item description page in codecanyon, see change log and update manually.</h2>";
			exit();
		}

		curl_close($ch);

		// Add On Information
		$add_ons = $this->basic->get_data('add_ons');
		$add_on_update_versions = array();

		if(count($add_ons))
		{
			foreach($add_ons as $add_on)
			{
				$add_on_project_id = $add_on['project_id'];
				$add_on_version = $add_on['version'];
				$add_on_data = array('product' => $add_on_project_id, 'version' => $add_on_version);
				$add_on_string = http_build_query($add_on_data);

				$ch = curl_init('http://xeroneit.net/development/version_control/project_versions_api/return_check_updates/');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $add_on_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$add_on_response = curl_exec($ch);
				curl_close($ch);

				$add_on_update_versions[$add_on['id']] = json_decode($add_on_response);
			}
		}

		$data['current_version'] = $product_version;
		$data['update_versions'] = json_decode($response);
		$data['body']='admin/update_system/index';
		$data['page_title']=$this->lang->line("update system");

		$data['add_ons'] = $add_ons;
		$data['add_on_update_versions'] = $add_on_update_versions;

		$this->_viewcontroller($data);
	}

	public function initialize_update()
	{
		if(!$this->input->is_ajax_request())
	    exit();		

		if(!function_exists('mkdir'))
		{
			$response=array('status'=>'0','message'=>'mkdir() function is not working! See log and update manually.');
			echo json_encode($response);
			exit();
		}

		if(!class_exists('ZipArchive'))
		{
			if(!isset($response))
			{
				$response=array('status'=>'0','message'=>'ZipArchive is not working! See log and update manually.');
				echo json_encode($response);
				exit();
			}
		}

		$update_version_id = $this->input->post('update_version_id');
		$version = $this->input->post('version');
		$files = $this->input->post('files');
		$sql = $this->input->post('sql');
		$files_replaces = $files;

	  	try 
	  	{
			if(count($files_replaces) > 0) :
		  		foreach($files_replaces as $file) :
		  			$url = $file[0];
		  			$replace = $file[1];
		  			$file_name = explode('-', $url);
		  			$file_name = end($file_name);

		  			$is_delete = $file[2];
		  			if($is_delete == '1')
		  			{
		  				if(is_file($replace))
		  				{
		  					unlink($replace);
		  				}
		  				else
		  				{
		  					$delete_folder_path = $replace;
		  					$last_folder = explode('.', $file_name);
		  					$last_folder = $last_folder[0];
		  					$delete_folder_path = $delete_folder_path . $last_folder;
		  					// last positin: only folder name don't need /
		  					$this->delete_directory($delete_folder_path);
		  				}
		  			}

		  			$ch = curl_init();
		  			curl_setopt($ch, CURLOPT_URL, $url);
		  			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  			$return = curl_exec($ch);
		  			curl_close($ch);
		  			if (!file_exists('download/'.$version)) {
		  			    mkdir('download/'.$version, 0755, true);
		  			}
		  			$destination = 'download/'.$version.'/'.$file_name;
		  			$file = fopen($destination, 'w');
		  			fputs($file, $return);
		  			fclose($file);

		  			if(strpos($file_name, '.zip') != false) :
		  				$folder_path = $replace;

		  				if (!file_exists($folder_path)) {
		  				    mkdir($folder_path, 0755, true);
		  				}

		  				$zip = new ZipArchive;
		  				$res = $zip->open($destination);
		  				if ($res === TRUE) :
			  				$zip->extractTo($replace);
			  				$zip->close();
		  				endif;
		  			else :
		  				$current = file_get_contents($destination, true);
		  				$last_pos = strrpos($replace, '/');
		  				$folder_path = substr($replace, 0, $last_pos);

		  				if (!file_exists($folder_path)) {
		  				    mkdir($folder_path, 0755, true);
		  				}

	  					$replace_file = fopen($replace, 'w');	
	  					fputs($replace_file, $current);
	  					fclose($replace_file);	  				
		  			endif;
		  		endforeach;	  		
		  	endif;

		  	if(is_array($sql)) :
		  		$sql_cmd_array = $sql;
		  		foreach($sql_cmd_array as $single_cmd) :
		  				$semicolon = ';';
		  				$ex_sql = $single_cmd . $semicolon;

		  				if(strlen($ex_sql) > 1) :
		  					$this->db->query($ex_sql);
		  				endif;
		  		endforeach;
		  	endif;

		  	$this->delete_directory('download/'.$version);

		  	// SQL for update. All version will be current 0 except installed version 1
		  	// $this->db->update('version', array('current' => '0'));
		  	// $this->db->insert('version', array('version' => $version, 'current' => '1', 'date' => date('Y-m-d H:i:s')));

		  	// writing application/config/my_config
		  	$app_my_config_data = "<?php ";
		  	$app_my_config_data.= "\n\$config['default_page_url'] = '".$this->config->item('default_page_url')."';\n";
		  	$app_my_config_data.= "\$config['product_name'] = '".$this->config->item('product_name')."';\n";
		  	$app_my_config_data.= "\$config['product_short_name'] = '".$this->config->item('product_short_name')."' ;\n";
		  	$app_my_config_data.= "\$config['product_version'] = '".$version."';\n";
		  	$app_my_config_data.= "\$config['institute_address1'] = '".$this->config->item('institute_address1')."' ;\n";
		  	$app_my_config_data.= "\$config['institute_address2'] = '".$this->config->item('institute_address2')."' ;\n";
		  	$app_my_config_data.= "\$config['institute_email'] = '".$this->config->item('institute_email')."' ;\n";
		  	$app_my_config_data.= "\$config['institute_mobile'] = '".$this->config->item('institute_mobile')."' ;\n";
		  	$app_my_config_data.= "\$config['developed_by'] = '".$this->config->item('developed_by')."';\n";
		  	$app_my_config_data.= "\$config['developed_by_href'] = '".$this->config->item('developed_by_href')."';\n";
		  	$app_my_config_data.= "\$config['developed_by_title'] = '".$this->config->item('developed_by_title')."';\n";
		  	$app_my_config_data.= "\$config['developed_by_prefix'] = '".$this->config->item('developed_by_prefix')."' ;\n";
		  	$app_my_config_data.= "\$config['support_email'] = '".$this->config->item('support_email')."' ;\n";
		  	$app_my_config_data.= "\$config['support_mobile'] = '".$this->config->item('support_mobile')."' ;\n";
		  	$app_my_config_data.= "\$config['time_zone'] = '".$this->config->item('time_zone')."' ;\n";
		  	$app_my_config_data.= "\$config['language'] = '".$this->config->item('language')."' ;\n";
		  	$app_my_config_data.= "\$config['sess_use_database'] = FALSE;\n";
		  	$app_my_config_data.= "\$config['sess_table_name'] = 'ci_sessions';\n";
		  	
		  	$app_my_config_data.= "\$config['theme'] = '".$this->config->item('theme')."' ;\n";	
		  	if($this->config->item('display_landing_page')==0)	  	
		  	$app_my_config_data.= "\$config['display_landing_page'] = 0 ;\n";
		  	else
		  	$app_my_config_data.= "\$config['display_landing_page'] = 1 ;\n";
		  	$app_my_config_data.= "\$config['check_post_count_limit'] = ".$this->config->item('check_post_count_limit')." ;\n";
		  	if($this->config->item('use_app_domain_as_action_controller_link')==TRUE)
		  	$app_my_config_data.= "\$config['use_app_domain_as_action_controller_link'] = TRUE ;\n";
		  	else $app_my_config_data.= "\$config['use_app_domain_as_action_controller_link'] = FALSE ;\n";
		  	
		  	file_put_contents(APPPATH.'config/my_config.php', $app_my_config_data, LOCK_EX);

		  	$response=array('status'=>'1','message'=>$this->lang->line('app has been updated successfully.'));
	  		
	  	} 

	  	catch(Exception $e)
        {
            $error= $e->getMessage();
            if(!isset($response))
            {
            	$response=array('status'=>'0','message'=>$error);
            }            
        }

        echo json_encode($response);

	}


	public function addon_initialize_update()
	{
		if(!$this->input->is_ajax_request())
	    exit();		

		if(!function_exists('mkdir'))
		{
			$response=array('status'=>'0','message'=>'mkdir() function is not working!');
			echo json_encode($response);
			exit();
		}

		if(!class_exists('ZipArchive'))
		{
			if(!isset($response))
			{
				$response=array('status'=>'0','message'=>'ZipArchive is not working');
				echo json_encode($response);
				exit();
			}
		}

		$update_version_id = $this->input->post('update_version_id');
		$version = $this->input->post('version');
		$folder = $this->input->post('folder');
		$files = $this->input->post('files');
		$sql = $this->input->post('sql');
		$files_replaces = $files;

	  	try 
	  	{
			if(count($files_replaces) > 0) :				
		  		foreach($files_replaces as $file) :
		  			$url = $file[0];
		  			$replace = $file[1];
		  			$file_name = explode('-', $url);
		  			$file_name = end($file_name);

		  			$is_delete = $file[2];
		  			if($is_delete == '1')
		  			{
		  				if(is_file($replace))
		  				{
		  					unlink($replace);
		  				}
		  				else
		  				{
		  					$delete_folder_path = $replace;
		  					$last_folder = explode('.', $file_name);
		  					$last_folder = $last_folder[0];
		  					$delete_folder_path = $delete_folder_path . $last_folder;
		  					// last positin: only folder name don't need /
		  					$this->delete_directory($delete_folder_path);
		  				}
		  			}
		  			
		  			$ch = curl_init();
		  			curl_setopt($ch, CURLOPT_URL, $url);
		  			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  			$return = curl_exec($ch);
		  			curl_close($ch);
		  			
		  			if (!file_exists('download/'.$folder.$version)) {
		  			    mkdir('download/'.$folder.$version, 0755, true);
		  			}
		  			$destination = 'download/'.$folder.$version.'/'.$file_name;
		  			$file = fopen($destination, 'w');
		  			fputs($file, $return);
		  			fclose($file);

		  			if(strpos($file_name, '.zip') != false) :
		  				$folder_path = $replace;

		  				if (!file_exists($folder_path)) {
		  				    mkdir($folder_path, 0755, true);
		  				}

		  				$zip = new ZipArchive;
		  				$res = $zip->open($destination);
		  				if ($res === TRUE) :
			  				$zip->extractTo($replace);
			  				$zip->close();
		  				endif;
		  			else :
		  				$current = file_get_contents($destination, true);
		  				$last_pos = strrpos($replace, '/');
		  				$folder_path = substr($replace, 0, $last_pos);

		  				if (!file_exists($folder_path)) {
		  				    mkdir($folder_path, 0755, true);
		  				}

		  				$replace_file = fopen($replace, 'w');	
		  				fputs($replace_file, $current);
		  				fclose($replace_file);
		  			endif;
		  		endforeach;
		  	endif;

		  	if(is_array($sql)) :
		  		$sql_cmd_array = $sql;
		  		foreach($sql_cmd_array as $single_cmd) :
		  				$semicolon = ';';
		  				$ex_sql = $single_cmd . $semicolon;

		  				if(strlen($ex_sql) > 1) :
		  					$this->db->query($ex_sql);
		  				endif;
		  		endforeach;
		  	endif;

		  	$this->delete_directory('download/'.$folder.$version);

		  	// SQL for updating add version update date
		  	// $this->db->where('unique_name', $folder)->update('add_ons', array('version' => $version, 'update_at' => date('Y-m-d H:i:s')));

		  	$response=array('status'=>'1','message'=>$this->lang->line('The Add On has been updated successfully.'));
	  		
	  	} 

	  	catch(Exception $e)
        {
            $error= $e->getMessage();
            if(!isset($response))
            {
            	$response=array('status'=>'0','message'=>$error);
            }
        }

        echo json_encode($response);

	}
}    