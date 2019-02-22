<?php 
$campaign_id=isset($campaign_data[0]['id']) ? $campaign_data[0]['id'] : 0;
$title=isset($campaign_data[0]['title']) ? $campaign_data[0]['title'] : "";
$image=isset($campaign_data[0]['image']) ? $campaign_data[0]['image'] : "";
$description=isset($campaign_data[0]['description']) ? $campaign_data[0]['description'] : "";
$link=isset($campaign_data[0]['link']) ? $campaign_data[0]['link'] : "";
$post_link=isset($campaign_data[0]['post_link']) ? $campaign_data[0]['post_link'] : "";
$tracking_code=isset($campaign_data[0]['tracking_code']) ? $campaign_data[0]['tracking_code'] : "";
$tracking_enabled=isset($campaign_data[0]['tracking_enabled']) ? $campaign_data[0]['tracking_enabled'] : "0";
?>
<html>

	<head>

		<title><?php echo $title;?></title>
		<meta name="description" content="<?php echo $description;?>">
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">   
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

	</head>

	<body>	
	</body>


</html>

<?php 
if($tracking_enabled=='1') 
{
	?>
	<script type="text/javascript">

		var server_link="<?php echo base_url("tr/traffic_tracking");?>";
		var browser_js_link="<?php echo base_url("js/useragent.js");?>";

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
