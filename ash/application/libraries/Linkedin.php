<?php
include_once('linkedin/function.php');
include_once('linkedin/vendor/autoload.php');

class Linkedin{
				
		public $user_id="";
		public $client_id="";		
		public $client_secret="";

	function __construct(){
	
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->helper('my_helper');
		$this->CI->load->library('session');
		$this->CI->load->model('basic');
		$this->user_id=$this->CI->session->userdata("user_id");

		
		$linkedin_config = $this->CI->basic->get_data("linkedin_config",array('where'=>array('deleted'=>'0')));
		if(isset($linkedin_config[0]))
		{			
			$this->client_id=$linkedin_config[0]["client_id"];
			$this->client_secret=$linkedin_config[0]["client_secret"];
		}		
		
	}


	public function login_button($redirect_uris)
	{
		// $redirect_uris = base_url()."rx_video_autopost/linkedin_login_callback";
        $status=$this->CI->_check_usage($module_id=104,$request=1);
        if($status=="3") 
        $auth_url=base_url('imgclick/linkedin_limit');                
        else
        $auth_url="https://www.linkedin.com/uas/oauth2/authorization?client_id={$this->client_id}&redirect_uri={$redirect_uris}&scope=r_basicprofile%20r_emailaddress%20w_share&response_type=code&state=offline";
        return "<a href='{$auth_url}' class='btn btn-default'><i class='fa fa-plus'></i> ".$this->CI->lang->line("Add New Account")."</a>";
	}


	public function linkedin_info($authentication_code='',$redirect_uris)
	{
		// $redirect_uris = base_url()."rx_video_autopost/linkedin_login_callback";
		$result=get_access_token($authentication_code,$this->client_id,$this->client_secret,$redirect_uris);
		/***Take access token, also there is the expiration duration*****/
		$access_token=$result['access_token'];
		$token_expired=$result['expires_in'];
		
		$data=get_curl("https://api.linkedin.com/v1/people/~?format=json&oauth2_access_token={$access_token}");
		$data['access_token'] = $access_token;

		return $data;
	}



	public function post_to_linkedin($access_token,$message)
	{

		$linkedIn=new Happyr\LinkedIn\LinkedIn($this->client_id, $this->client_secret);

		$linkedIn->setAccessToken($access_token);

		$options = array('json'=>
			array(
				'comment' => $message,
				'visibility' => array(
					'code' => 'anyone'
					)
				)
			);

		$result = $linkedIn->post('v1/people/~/shares', $options);
		return $result;

	}



		
		

}
