<?php
require_once('twitter/TwitterAPIExchange.php');
include_once('twitter/Codebird.php');

class Twitter{
				
		public $user_id=""; 
		public $consumer_key="";		
		public $consumer_secret="";
		
		public $cb;

	function __construct(){
	
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->helper('my_helper');
		$this->CI->load->library('session');
		$this->CI->load->model('basic');
		$this->user_id=$this->CI->session->userdata("user_id");

		
		$twitter_config = $this->CI->basic->get_data("twitter_config",array('where'=>array('deleted'=>'0')));
		if(isset($twitter_config[0]))
		{			
			$this->consumer_key=$twitter_config[0]["consumer_key"];
			$this->consumer_secret=$twitter_config[0]["consumer_secret"];
		}

		// $this->consumer_key = 'uqeh9SkYWgfpKAh00IM27MLBu';
		// $this->consumer_secret = '6TrYY1zU8u16vjVZrYGTa2cLaEkZufA2Vi44zW5bh2p1kTqUgg';

		
		
	}


	public function twitter_login($redirect_rul)
	{	
		\Codebird\Codebird::setConsumerKey($this->consumer_key, $this->consumer_secret);
		$cb = \Codebird\Codebird::getInstance();

  		// get the request token
		$reply = $cb->oauth_requestToken([
			'oauth_callback' => $redirect_rul
			]);

		$this->CI->session->set_userdata('oauth_token',$reply->oauth_token);
		$this->CI->session->set_userdata('oauth_token_secret',$reply->oauth_token_secret);
		$this->CI->session->set_userdata('oauth_verify',true);


		$cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
		$auth_url = $cb->oauth_authorize();
		header('Location: ' . $auth_url);

	}


	public function twitter_login_info($oauth_verifier)
	{
		\Codebird\Codebird::setConsumerKey($this->consumer_key, $this->consumer_secret);
		$cb = \Codebird\Codebird::getInstance();

		$oauth_token = $this->CI->session->userdata('oauth_token');
		$oauth_token_secret = $this->CI->session->userdata('oauth_token_secret');
		// verify the token
		$cb->setToken($oauth_token, $oauth_token_secret);

	  	// get the access token
		$reply = $cb->oauth_accessToken([
			'oauth_verifier' => $oauth_verifier
			]);


	  	// store the token (which is different from the request token!)
		$this->CI->session->set_userdata('final_auth_token',$reply->oauth_token);
		$this->CI->session->set_userdata('final_oauth_token_secret',$reply->oauth_token_secret);
		$this->CI->session->set_userdata('twitter_screen_name',$reply->screen_name);
		$this->CI->session->set_userdata('twitter_user_id',$reply->user_id);
	}



	public function post_to_twitter($oauth_token,$oauth_token_secret,$message)
	{
		$auth_token = $oauth_token;
		$oauth_token_secret = $oauth_token_secret;

		\Codebird\Codebird::setConsumerKey($this->consumer_key, $this->consumer_secret);
		$cb = \Codebird\Codebird::getInstance();

		// assign access token on each page load
		$cb->setToken($auth_token, $oauth_token_secret);

		$settings = array(
			'oauth_access_token' => $auth_token,
			'oauth_access_token_secret' => $oauth_token_secret,
			'consumer_key' => $this->consumer_key,
			'consumer_secret' => $this->consumer_secret
			);
		$twitter = new TwitterAPIExchange($settings);

		$url = 'https://api.twitter.com/1.1/statuses/update.json'; 
		$requestMethod = 'POST';
		$postfields = array(
			'status' => $message ); 
		$response= $twitter->buildOauth($url, $requestMethod)
		->setPostfields($postfields)
		->performRequest();

		return $response;

	}



		
		

}
