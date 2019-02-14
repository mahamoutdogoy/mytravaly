<?php
session_start();
require_once('config.php');
require_once('functions.php');

$output = array();

$output["success"] = 1;

$recent_images = recentImageArray();

if(isset($recent_images) AND count($recent_images) > 0){
	$html = '';
	foreach($recent_images as $s){
		$me = false;
		$exists = is_url_exist($s);
		$url_host = parse_url($s, PHP_URL_HOST);
		if($url_host == $_SERVER['HTTP_HOST']){
			$me = true;
		}
		
		if($exists == false){
			continue;
		}
		
		$extension = GetExtension($s);
		$path_array = explode('/',$s);
		$file_name = end($path_array);		
		
		if($me){
            if(!is_image_extenstion($extension)){
				$html .= '<div class="item-b"><a data-icon="'.get_file_icon_path($extension).'" href="" class="pdf-thumbs" title="' .$s . '" rel="' .$s . '"><img src="' . get_file_icon_path($extension) . '" class="img-thumbnail" width="130" height="90"></a><div class="clearfix"></div><p class="caption">'. $file_name .'</p></div>';
			}else{
				$html .= '<div class="item-b"><a href="" class="img-thumbs" title="' .$s . '" rel="' .$s . '"><img src="timthumb.php?src=' . encrypt($s, ENCRYPTION_KEY) . '&w=130&h=90" class="img-thumbnail" width="130" height="90"></a><div class="clearfix"></div><p class="caption">'. $file_name .'</p></div>';
			}
		}elseif($exists){
			$html .= '<div class="item-b"><a href="" class="img-thumbs" title="' .$s . '" rel="' .$s . '"><img src="' . $s . '" class="img-thumbnail" width="130" height="90"></a><div class="clearfix"></div><p class="caption">'. $file_name .'</p></div>';
		}
	}
	if($html != ''){
		$output["html"] = $html;
	}else{
		$output["success"] = 0;
	}
}else{
	$output["success"] = 0;
}

header("Content-type: text/plain;");
echo json_encode($output);
exit();