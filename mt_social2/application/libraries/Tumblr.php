<?php
require_once('tumblroauth/Tumblroauth.php');
require_once('tumblr_vendor/autoload.php');

class Tumblr {
				
		public $user_id=""; 
		public $consumer_key="";		
		public $consumer_secret="";
		

	function __construct(){
	
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->helper('my_helper');
		$this->CI->load->library('session');
		$this->CI->load->model('basic');
		$this->user_id=$this->CI->session->userdata("user_id");

		
		$tumblr_config = $this->CI->basic->get_data("tumblr_config",array('where'=>array('deleted'=>'0')));
		if(isset($tumblr_config[0]))
		{			
			$this->consumer_key=$tumblr_config[0]["consumer_key"];
			$this->consumer_secret=$tumblr_config[0]["consumer_secret"];
		}	
		
		if (session_status() == PHP_SESSION_NONE) 
		{
		    session_start();
		}

	}

	public function login_url($callback_url)
	{
		// $callback_url = base_url()."test/tumblr";
		$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret);
		$request_token = $tum_oauth->getRequestToken($callback_url);

		// Store the request token and Request Token Secret as out callback.php script will need this
		$_SESSION['request_token'] = $token = $request_token['oauth_token'];
		$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];

		$this->CI->session->set_userdata('tumblr_auth_token',$request_token['oauth_token']);
		$this->CI->session->set_userdata('tumblr_auth_token_secret',$request_token['oauth_token_secret']);


		// Check the HTTP Code.  It should be a 200 (OK), if it's anything else then something didn't work.
		switch ($tum_oauth->http_code) {
		  case 200:
		    // Ask Tumblr to give us a special address to their login page
		    $url = $tum_oauth->getAuthorizeURL($token);
			
			// Redirect the user to the login URL given to us by Tumblr
		    header('Location: ' . $url);
			
			// That's it for our side.  The user is sent to a Tumblr Login page and
			// asked to authroize our app.  After that, Tumblr sends the user back to
			// our Callback URL (callback.php) along with some information we need to get
			// an access token.
			
		    break;
		default:
		    // Give an error message
		    echo 'Could not connect to Tumblr. Refresh the page or try again later.';
		}

	}

	public function get_username($auth_token,$auth_token_secret,$auth_varifier)
	{
		// Create instance of TumblrOAuth.
		// It'll need our Consumer Key and Secret as well as our Request Token and Secret
		$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret, $auth_token, $auth_token_secret);

		// Ok, let's get an Access Token. We'll need to pass along our oauth_verifier which was given to us in the URL. 
		$access_token = $tum_oauth->getAccessToken($auth_varifier);

		// Make sure nothing went wrong.
		if (200 == $tum_oauth->http_code) {
		  // good to go
		} else {
		  // die('Unable to authenticate');
		  $response = "Unable to authenticate";
		  return $response;
		}

		$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

		$response['auth_token'] = $access_token['oauth_token'];
		$response['auth_token_secret'] = $access_token['oauth_token_secret'];

		// Make an API call with the TumblrOAuth instance.  There's also a post and delete method too.
		$userinfo = $tum_oauth->get('http://api.tumblr.com/v2/user/info');

		// You don't actuall have to pass a full URL,  TukmblrOAuth will complete the URL for you.
		// This will also work: $userinfo = $tum_oauth->get('user/info');

		// Check for an error.
		if (200 == $tum_oauth->http_code) {
		  // good to go
		} else {
		  // die('Unable to get info');
		  $response['error'] = "Unable to get info";
		  return $response;
		}


		$client = new Tumblr\API\Client($this->consumer_key, $this->consumer_secret);
		$client->setToken($access_token['oauth_token'], $access_token['oauth_token_secret']);



		foreach ($client->getUserInfo()->user->blogs as $blog) {
		  $response['user_name'] = $blog->name;
		}

		return $response;

	}

	// public function create_post($auth_token,$auth_token_secret,$auth_varifier,$username,$link,$title,$message)
	// {
	// 	// Create instance of TumblrOAuth.
	// 	// It'll need our Consumer Key and Secret as well as our Request Token and Secret
	// 	$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret, $auth_token, $auth_token_secret);

	// 	// // Ok, let's get an Access Token. We'll need to pass along our oauth_verifier which was given to us in the URL. 
	// 	$access_token = $tum_oauth->getAccessToken($auth_varifier);
		
	// 	$client = new Tumblr\API\Client($this->consumer_key, $this->consumer_secret);
	// 	$client->setToken($access_token['oauth_token'], $access_token['oauth_token_secret']);


	// 	$embed = '<iframe width="854" height="480" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';
	// 	$arrMessage = array(
	// 	              'type' => 'video', 
	// 	              'embed' => $embed,
	// 	              'title' => $title,
	// 	              'description' => $message
	// 	              );

	// 	$post_info = $client->createPost($username, $arrMessage);

	// 	return $post_info;

	// }

	public function create_post($auth_token,$auth_token_secret,$auth_varifier,$username,$link,$title,$message)
	{
		//posting URI - http://www.tumblr.com/docs/en/api/v2#posting
		$post_URI = 'http://api.tumblr.com/v2/blog/'.$username.'/post';

		$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret, $auth_token, $auth_token_secret);

		// Make an API call with the TumblrOAuth instance. For text Post, pass parameters of type, title, and body
		$embed = '<iframe width="854" height="480" src="'.$link.'" frameborder="0" allowfullscreen></iframe>';
		$arrMessage = array(
		              'type' => 'video', 
		              'embed' => $embed,
		              'title' => $title,
		              'caption' => $message
		              );

		$post_info = $tum_oauth->post($post_URI,$arrMessage);

		// Check for an error.
		if (201 == $tum_oauth->http_code) {
			$response['id'] = $post_info->response->id;
		} else {
		  $response['error'] = '1';
		}

		return $response;

	}


	public function create_link_post($auth_token,$auth_token_secret,$auth_varifier,$username,$link,$image_link)
	{
		//posting URI - http://www.tumblr.com/docs/en/api/v2#posting
		$post_URI = 'http://api.tumblr.com/v2/blog/'.$username.'/post';

		$tum_oauth = new TumblrOAuth($this->consumer_key, $this->consumer_secret, $auth_token, $auth_token_secret);

		// Make an API call with the TumblrOAuth instance. For text Post, pass parameters of type, title, and body
		$arrMessage = array(
		             'type' => 'link', 
             		 'url' => $link,
              		 'thumbnail' => $image_link
		              );

		$post_info = $tum_oauth->post($post_URI,$arrMessage);

		// Check for an error.
		if (201 == $tum_oauth->http_code) {
			$response['id'] = $post_info->response->id;
		} else {
		  $response['error'] = '1';
		}

		return $response;

	}


}