<?php

include_once('pinterest_vendor/autoload.php');

use DirkGroenen\Pinterest\Pinterest;



class Pinterests {

				

		public $user_id=""; 

		public $app_id="";		

		public $app_secret="";

		public $pinterest="";

		



	function __construct(){

		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->helper('my_helper');
		$this->CI->load->library('session');
		$this->CI->load->model('basic');
		$this->user_id=$this->CI->session->userdata("user_id");
		

		$pinterest_config = $this->CI->basic->get_data("pinterest_config",array('where'=>array('id'=>$this->CI->session->userdata('pinterest_config_table_id'))));

		if(isset($pinterest_config[0]))
		{			
			$this->app_id=$pinterest_config[0]["app_id"];
			$this->app_secret=$pinterest_config[0]["app_secret"];
		}	

		if (session_status() == PHP_SESSION_NONE) 
		{
		    session_start();
		}

		$this->pinterest = new Pinterest($this->app_id, $this->app_secret);

	}



	public function app_initialize($pinterest_config_table_id)
	{	  
	    $pinterest_config = $this->CI->basic->get_data("pinterest_config",array('where'=>array('id'=>$pinterest_config_table_id)));

		if(isset($pinterest_config[0]))
		{			
			$this->app_id=$pinterest_config[0]["app_id"];
			$this->app_secret=$pinterest_config[0]["app_secret"];
		}	

		if (session_status() == PHP_SESSION_NONE) 
		{
		    session_start();
		}

		$this->pinterest = new Pinterest($this->app_id, $this->app_secret);
	}





	public function login_button($redirect_uris)

	{

		$status=$this->CI->_check_usage($module_id=105,$request=1);

        if($status=="3") 

        $loginurl=base_url('imgclick/pinterest_limit');                

        else

		$loginurl = $this->pinterest->auth->getLoginUrl($redirect_uris, array('read_public','write_public','read_relationships','write_relationships'));



        return "<a href='{$loginurl}' class='btn btn-danger'><i class='fa fa-pinterest-square'></i> ".$this->CI->lang->line("Click here to login with Pinterest")."</a>";

	}



	public function get_userinfo($code)

	{

		$token = $this->pinterest->auth->getOAuthToken($_GET["code"]);

    	$this->pinterest->auth->setOAuthToken($token->access_token);



    	$userInfo = $this->pinterest->users->me(array('fields' => 'username'));

    	$userInfoArray = $this->accessProtected($userInfo,"attributes");

		$userName = $userInfoArray['username'];



		$this->CI->session->set_userdata('pinterest_username',$userName);

		$this->CI->session->set_userdata('pinterest_access_token',$token->access_token);



		/* ----- Start Board Name Url----- */



		$getMyBoards = $this->pinterest->users->getMeBoards();





		$reflector = new ReflectionObject($getMyBoards);

		$nodes = $reflector->getProperty('response');

		$nodes->setAccessible(true);

		$sortResponse = $nodes->getValue($getMyBoards);



		$reflector1 = new ReflectionObject($sortResponse);

		$bordResponse = $reflector1->getProperty('response');

		$bordResponse->setAccessible(true);

		$detailsRespose = $bordResponse->getValue($sortResponse);

		$bordInfo = $detailsRespose['data'];



		$arrayLen = count($bordInfo);

		$finalBoardName = array();



		for ($i=0; $i < $arrayLen; $i++) { 

			$bordUrlWithSlash = $bordInfo[$i]['url'];

			$bordUrl = rtrim($bordUrlWithSlash, "/");

			$bordNameArray = explode("/", $bordUrl);

			$bordName = end($bordNameArray);

			$finalBoardName[] = $bordName;

			unset($bordUrlWithSlash, $bordUrl, $bordNameArray, $bordName);

		}



		return $finalBoardName;

	}



	public function accessProtected($userName, $attributes){

  		$reflection = new ReflectionClass($userName);

  		$property = $reflection->getProperty($attributes);

  		$property->setAccessible(true);

  		return $property->getValue($userName);

	}



	public function post_to_pinterest($username,$bordname,$video_id,$access_token,$description)

	{

    	$this->pinterest->auth->setOAuthToken($access_token);



		$post = $this->pinterest->pins->create(array(

	     	"note"          => $description,

			//"image_url"		=> "https://img.youtube.com/vi/t5jQRzVvSuM/0.jpg",

	     	"image_url"		=> "https://img.youtube.com/vi/".$video_id."/0.jpg",

	     	//"board"         => $userName."/".$finalBoardName[0]

	     	"board"         => $username."/".$bordname

		 ));

		$url = $this->accessProtected($post,'attributes');

		return $url;

	}

	

	

	public function post_link_to_pinterest($username,$bordname,$link,$image_url,$access_token,$description)

	{

    	$this->pinterest->auth->setOAuthToken($access_token);



		$post = $this->pinterest->pins->create(array(

	     	"note"          => $description,

			"link"    => $link,

     		"image_url"  => $image_url,

	     	"board"         => $username."/".$bordname

		 ));

		 

		$url = $this->accessProtected($post,'attributes');

		

		return $url;

	}

	





}