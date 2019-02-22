<?php 
 /* 
    Plugin Name: Social Post Custom Domain
    Description: For posting, use your custom domain link
    Author: 
    Version: 1.0 
    Author URI: 
*/  	
	
register_activation_hook(__FILE__,'activation_settings');
register_deactivation_hook(__FILE__,'deactivation_settings');
register_uninstall_hook(__FILE__,'deactivation_settings');

function activation_settings(){
	create_custom_page('customdomaincontroller');
}

function create_custom_page($page_name) {
  $pageExists = false;
  $pages = get_pages();     
  foreach ($pages as $page) { 
    if ($page->post_name == $page_name) {
      $pageExists = true;
      break;
    }
  }
  if (!$pageExists) {
    wp_insert_post ([
        'post_type' =>'page',        
        'post_name' => $page_name,
        'post_status' => 'publish',
		    'post_title'=>'Social Post Custom Domain',
    ]);
  }
}

function deactivation_settings(){
	delete_soclicks_custom_page("customdomaincontroller");
}

function delete_soclicks_custom_page($page_name){
	 $pages = get_pages();     
	 
  foreach ($pages as $page) { 
    if ($page->post_name == $page_name) {
		$post_id= $page->ID;
		wp_delete_post( $post_id,1);
      break;
    }
  }
}

add_filter( 'page_template', 'catch_mypath' );
function catch_mypath( $page_template ) {
    if ( is_page( 'customdomaincontroller' ) ) {
        $page_template = __DIR__.'/my-api.php';
    }
    return $page_template;
}



add_action('admin_menu','sociclics_amin_menu');
function sociclics_amin_menu(){
	add_menu_page('Social Post Custom Domain','Custom Domain','manage_options',__FILE__,'get_custom_link',plugins_url('/images/menu.jpg',__FILE__));	
}


function get_custom_link(){
	 $pages = get_pages();     
  	foreach ($pages as $page) { 
    if ($page->post_name == "customdomaincontroller") {
		$page_url = $page->guid;
    	  break;
    }
  }
  echo '<br><br><div style="margin:0 auto; padding: 20px; border:1px solid #ccc;width:90%;text-align: center;background:#e5e9ec;font-family: Arial;">
 <h3 style="color:orange">Please copy the follwing url and paste inside the app to use it as custom domain controller:</h3>
 <p><textarea style="width:60%;height:50px">'.$page_url.'</textarea></p>
</div>';

}

// End Plugin Activation


//Start Catching URL











/*add_action( 'init', 'wpse9870_init_external' );
function wpse9870_init_external()
{
    global $wp_rewrite;
    $plugin_url = plugins_url( 'my-api.php', __FILE__ );
    $plugin_url = substr( $plugin_url, strlen( home_url() ) + 1 );
    // The pattern is prefixed with '^'
    // The substitution is prefixed with the "home root", at least a '/'
    // This is equivalent to appending it to `non_wp_rules`
    $wp_rewrite->add_external_rule( 'my-api.php$', $plugin_url );
}
*/




	
	
	