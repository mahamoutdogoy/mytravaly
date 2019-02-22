<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$folder_name = "Uploaded_".$_SESSION["folder_name"];

/** Full path to the folder that images will be used as library and upload. Include trailing slash */
define('FOLDER_PATH', 'uploads/');

/** Full URL to the folder that images will be used as library and upload. Include trailing slash and protocol (i.e. http://) */
define('FOLDER_URL', 'http://jwel-pc/webadmin/filemanager/uploads/');
define('URL_TO_FILE_MANAGER', 'http://jwel-pc/webadmin/filemanager/');

/** Define Category Folders, User Folder, Recent Image No */
$categories = array('background', 'image', 'music','video','thumbnail');

$allowed_types = [];
$allowed_types['background'] = 'png';
$allowed_types['image'] = 'png';
$allowed_types['music'] = 'mp3';
$allowed_types['video'] = 'mp4,wmv,avi,flv,mkv,MP4,WMV,AVI,FLV,MKV';
$allowed_types['thumbnail'] = 'png,jpg,jpeg,JPG,PNG,JPEG';

define('USER_FOLDER', $folder_name);
define('RECENT_IMAGE_NO', 20);

/** The extensions for to use in validation */
if(isset($allowed_types[$_SESSION['active_folder']])) :
	define('ALLOWED_IMG_EXTENSIONS', $allowed_types[$_SESSION['active_folder']]);
else :
	define('ALLOWED_IMG_EXTENSIONS', 'gif,jpg,jpeg,png,jpe,mp3');
endif;

if(strpos(ALLOWED_IMG_EXTENSIONS, 'mp3') !== FALSE) {
	define('PREVIEW_SOURCE', URL_TO_FILE_MANAGER . 'bootstrap/img/file-icons/file_extension_mp3.png');
}
else if(strpos(ALLOWED_IMG_EXTENSIONS, 'mp4') !== FALSE || strpos(ALLOWED_IMG_EXTENSIONS, 'wmv') !== FALSE || strpos(ALLOWED_IMG_EXTENSIONS, 'avi') !== FALSE || strpos(ALLOWED_IMG_EXTENSIONS, 'flv') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'mkv') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'MP4') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'WMV') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'AVI') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'FLV') !== FALSE ||strpos(ALLOWED_IMG_EXTENSIONS, 'MKV') !== FALSE){
	define('PREVIEW_SOURCE', URL_TO_FILE_MANAGER . 'bootstrap/img/file-icons/video.png');
}
else 
	define('PREVIEW_SOURCE', 'http://placehold.it/640x480');

/** Should the files be renamed to a random name when uploading */
define('RENAME_UPLOADED_FILES', false);

/** Number of folders/images to display per page */
define('ROWS_PER_PAGE', 20);


/** Should Images be resized on upload. You will then need to set at least one of the dimensions sizes below */
define('RESIZE_ON_UPLOAD', false);

/** If resizing, width */
define('RESIZE_WIDTH', 300);
/** If resizing, height */
define('RESIZE_HEIGHT', 300);


/** Should a thumbnail be created? */
define('THUMBNAIL_ON_UPLOAD', false);

/** If thumbnailing, thumbnail postfix */
define('THUMBNAIL_POSTFIX', '_thumb');
/** If thumbnailing, maximum width */
define('THUMBNAIL_WIDTH', 100);
/** If thumbnailing, maximum height */
define('THUMBNAIL_HEIGHT', 100);
/** If thumbnailing, hide thumbnails in listings */
define('THUMBNAIL_HIDE', true);



/**  Use these 9 functions to check cookies and sessions for permission. 
Simply write your code and return true or false */


/** If you would like each user to have their own folder and only upload 
 * to that folder and get images from there, you can use this funtion to 
 * set the folder name base on user ids or usernames. NB: make sure it return 
 * a valid folder name. */

// We use it for specific category - background, image, music
function CurrentUserFolder(){
	return $_SESSION['active_folder'];
}

function CreateUserFolderIfNotExist()
{
	foreach($GLOBALS['categories'] as $category) :

		if(file_exists(FOLDER_PATH . $category . '/' . USER_FOLDER) == FALSE) :
			mkdir(FOLDER_PATH . $category . '/' . USER_FOLDER, 0777, true);
		endif;	

	endforeach;	

	return true;
}

function CanAcessLibrary(){
	return true;
}

function CanAcessUploadForm(){
	return true;
}

function CanAcessAllRecent(){
	return true;
}

function CanCreateFolders(){
	return false;
}

function CanDeleteFiles(){
	return true;
}

function CanDeleteFolder(){
	return false;
}

function CanRenameFiles(){
	return true;
}

function CanRenameFolder(){
	return true;
}


define("ENCRYPTION_KEY", "!@#$%^&*");