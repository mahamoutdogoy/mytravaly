<?php 
$tracking_code=isset($_GET["tc"]) ? $_GET["tc"] : ""; 
$referrer_code=isset($_GET["rc"]) ? $_GET["rc"] : ""; 

$base="http://localhost/mytravaly/ash/";
$server_url=$base."tr/traffic_tracking";
$js_url=$base."js/useragent.js";
$url=$base."tr/external_source/".$tracking_code;

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt"); 	
$content = curl_exec($ch);
$content=json_decode($content,TRUE);

$campaign_id=isset($content["data"]['id']) ? $content["data"]['id'] : 0;
$title=isset($content["data"]['title']) ? $content["data"]['title'] : "";
$image=isset($content["data"]['image']) ? $content["data"]['image'] : "";
$description=isset($content["data"]['description']) ? $content["data"]['description'] : "";
$link=isset($content["data"]['link']) ? $content["data"]['link'] : "";
$post_link=isset($content["data"]['post_link']) ? $content["data"]['post_link'] : "";
$tracking_code=isset($content["data"]['tracking_code']) ? $content["data"]['tracking_code'] : "";
$tracking_enabled=isset($content["data"]['tracking_enabled']) ? $content["data"]['tracking_enabled'] : "0";
$pixel_code=isset($content["data"]['pixel_code']) ? $content["data"]['pixel_code'] : "";
?>
<!DOCTYPE html>
<html>

	<head>

		<title><?php echo $title;?></title>
		<meta name="description" content="<?php echo $description;?>">  
		<!-- for Facebook -->          
		<meta property="og:title" content="<?php echo $title;?>"/>
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo $image;?>"/>
		<meta property="og:image:width" content="924"/>
		<meta property="og:image:height" content="486"/>
		<meta property="og:url" content="<?php echo $post_link;?>"/>
		<meta property="og:description" content="<?php echo $description;?>"/>

		<!-- for Twitter -->          
		<meta name="twitter:card" content="summary_large_image"/>
		<meta name="twitter:title" content="<?php echo $title;?>" />
		<meta name="twitter:description" content="<?php echo $description;?>"/>
		<meta name="twitter:image" content="<?php echo $image;?>" />
		<sociclicks></sociclicks>
		<?php echo $pixel_code;?>
	</head>

	<body>	
	
	</body>


</html>

<?php 
if($tracking_enabled=='1') 
{
	?>
	<script type="text/javascript">

		var server_link="<?php echo $server_url;?>";
		var browser_js_link="<?php echo $js_url;?>";

		function ajax_dolphin(link,data)
		{
			  xhr = new XMLHttpRequest();
			  xhr.open('POST',link,false);
			  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			  xhr.send(data);
		}

		function get_browser_info()
		{
		    var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || []; 
		    if(/trident/i.test(M[1])){
		        tem=/\brv[ :]+(\d+)/g.exec(ua) || []; 
		        return {name:'IE',version:(tem[1]||'')};
		        }   
		    if(M[1]==='Chrome'){
		        tem=ua.match(/\bOPR\/(\d+)/)
		        if(tem!=null)   {return {name:'Opera', version:tem[1]};}
		        }   
		    M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
		    if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
		    return {
		      name: M[0],
		      version: M[1]
		    };
		}	 
		 
		function ajax_call()
		{		
			/**Load browser plugin***/
			var y = document.createElement('script');
			y.src = browser_js_link;
			document.getElementsByTagName("head")[0].appendChild(y);
			
			/**after browser plugin loaded**/
			y.onload=function()
			{		
				var device;
				var mobile_desktop;
				
				device=jscd.os;
				if(jscd.mobile)
				{
					mobile_desktop="Mobile";
				}
				else
				{
					mobile_desktop="Desktop";
				}
				
				var browser_info=get_browser_info();
				var browser_name=browser_info.name;
				var browser_version=browser_info.version;
				var campaign_id="<?php echo $campaign_id?>";				
				var tracking_code = "<?php echo $tracking_code;?>";
				var referrer_code = "<?php echo $referrer_code;?>";
				
				/**Get referer Address**/
				var referrer = document.referrer;			
				/** Get Current url **/
				var current_url = window.location.href;				
				
				
				var data="current_url="+current_url+"&campaign_id="+campaign_id+"&tracking_code="+tracking_code+"&browser_name="+browser_name+"&browser_version="+browser_version+"&device="+device+"&mobile_desktop="+mobile_desktop+"&referrer="+referrer+"&referrer_code="+referrer_code;
				
				if(campaign_id!=0)
				ajax_dolphin(server_link,data);
				
				var redirect_link="<?php echo $link;?>";
				if(redirect_link!="") window.location.href = redirect_link;
			}
		}


		function init()
		{
			ajax_call();
		}

		init();


	</script>
	<?php 
} 
else
{ ?>
	<script type="text/javascript">
		var redirect_link="<?php echo $link;?>";
		if(redirect_link!="") window.location.href = redirect_link;
	</script>
<?php 
} ?>
