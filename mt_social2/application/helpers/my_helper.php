<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Path Helpers
 *
 * @package      CodeIgniter
 * @subpackage   Helpers
 * @category     Helpers
 * @author       Al-amin Jwel
 * @link         www.al-amin.me
 */



//=====================converts a number to word====================== 
//====================================================================
if ( ! function_exists('numtowords'))

{ function numtowords($number) {
   
    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'numtowords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . numtowords(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . numtowords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = numtowords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= numtowords($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
   return  $string;
  }
}
//=====================converts a number to word====================== 
//====================================================================





//=====================converts a number to phrase====================== 
//======================================================================
if ( ! function_exists('numtophrase'))
{   
  function numtophrase($num) {
   
   if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
  }
}

//=====================converts a number to phrase====================== 
//======================================================================


//=========================== age calculator ===========================
//======================================================================

// if ( ! function_exists('calculate_date_differece'))
// {   
//   function calculate_date_differece($end,$start,$out_in_array=false){ 
//     $intervalo = date_diff(date_create($start), date_create($end)); 
//     $out = $intervalo->format("<b>%Y</b>&nbsp Years &nbsp<b>%M</b>&nbsp Months &nbsp<b>%d</b> &nbspDays"); 
//     if(!$out_in_array) 
//       return $out; 
//     $a_out = array(); 
//     array_walk(explode(',',$out), 
//       function($val,$key) use(&$a_out){ 
//         $v=explode(':',$val); 
//         $a_out[$v[0]] = $v[1]; 
//       }); 
//     return $a_out; 
//   }
// }

if ( ! function_exists('calculate_date_differece'))
{   
  function calculate_date_differece($end,$start)
  {
  $diff = abs(strtotime($end) - strtotime($start)); 
  $years = floor($diff / (365*60*60*24)); 
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
  return $years." Years ".$months." Months ".$days. " Days";
  }
}

//=========================== end of age calculator ====================
//======================================================================

//=====================converts a phrase to number====================== 
//======================================================================
if ( ! function_exists('phrasetonumber'))
{   
  function phrasetonumber($phrase) {   
   if(strlen($phrase)==4)
   return substr($phrase,0,2);
   else
   return substr($phrase,0,1);
  }
}
//=====================converts a phrase to number====================== 



//======================get data=================================
//===============================================================
if ( ! function_exists('get_data_helper'))
{   
  function get_data_helper($table,$where='',$select='',$join='',$limit='',$start='',$order_by='',$group_by='',$num_rows=1,$single_value=1) 
  {
       $ci = &get_instance();
       $ci->load->model('basic');  
       $results=$ci->basic->get_data($table,$where,$select,$join,$limit,$start,$order_by,$group_by,$num_rows);
     
       if($single_value==1) return $results[0];
       else return $results;

  }
}


/*date Time Formating*/
 if ( ! function_exists('date_time_formating'))
{   
  function date_time_formating($date) 
  {
       return date('d/m/Y h:i:s a',strtotime($date));
  }
 }



/**Date Time formating**/
 if ( ! function_exists('date_formating'))
{   
  function date_formating($date) 
  {
       return date('d/m/Y',strtotime($date));
  }
 }



if ( ! function_exists('convert_to_grid_data'))
{   
  function convert_to_grid_data($total_info,$total_result=10) 
  {
       $result["total"] = $total_result;
		$items = array();
		
		foreach($total_info as $index=>$info){
			if($index!=='extra_index'){
				$info_obj=(object)$info;
				array_push($items, $info_obj);
			}
			
		}
		$result["rows"] = $items;
		return json_encode($result);
  }
}


if ( ! function_exists('calcutate_age'))
{ 
  function calcutate_age($dob)
  {

      $dob = date("Y-m-d",strtotime($dob));

      $dobObject = new DateTime($dob);
      $nowObject = new DateTime();

      $diff = $dobObject->diff($nowObject);

      return $diff->y;

  }
}

/**This function to take the original site url . Because we are using subdomain for same site.So for facebook page like we need to do a universal url**/

if ( ! function_exists('get_current_url_without_subdomain'))
{ 
  function get_current_url_without_subdomain()
  {
  		$CI =& get_instance();
		
		$url=current_url();
		$info = parse_url($url);
		$url_without_subdomain=$CI->config->item('fb_like_doamin').$info['path'];
		return $url_without_subdomain;
  }
}

//======================used for counting a field================
//===============================================================



if ( ! function_exists('random_value_from_array'))
{ 
 	 function random_value_from_array($array, $default=null)
		{
		    $k = mt_rand(0, count($array) - 1);
		    return isset($array[$k])? $array[$k]: $default;
		}
}



if ( ! function_exists('addHttp'))
{ 
function addHttp( $url ){
	
	    if ( !preg_match("~^(?:f|ht)tps?://~i", $url) )
	    {
	        $url = "http://" . $url;
	    }
	
	    return $url;
	}
}


if ( ! function_exists('get_domain_only'))
{ 
	function get_domain_only($url) {
		$url=str_replace("www.","",$url);
		$url=str_replace("WWW.","",$url);
		
	    if (!preg_match("@^https?://@i", $url) && !preg_match("@^ftps?://@i", $url)) {
	        $url = "http://" . $url;
	    }
		
		
	  	$parsed=@parse_url($url);
		
		return $parsed['host'];
	  
	}
}


if ( ! function_exists('is_web_page'))
{ 
	function is_web_page($domain)
        {
            $ext=explode(".", $domain);
            $extension=array_pop($ext);
            $allowed_extension=array("html","htm","php","asp","jsp","py");
            
            if (in_array($extension, $allowed_extension)) {
                return 1;
            } else {
                return 0;
            }
        }
}



if (! function_exists('array_column')) {
    function array_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( ! isset($value[$columnKey])) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            }
            else {
                if ( ! isset($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
}





// CSS Minifier => http://ideone.com/Q5USEF + improvement(s)
  function minify_css_helper($input) {
      if(trim($input) === "") return $input;
      // Force white-space(s) in `calc()`
      if(strpos($input, 'calc(') !== false) {
          $input = preg_replace_callback('#(?<=[\s:])calc\(\s*(.*?)\s*\)#', function($matches) {
              return 'calc(' . preg_replace('#\s+#', "\x1A", $matches[1]) . ')';
          }, $input);
      }
      return preg_replace(
          array(
              // Remove comment(s)
              '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
              // Remove unused white-space(s)
              '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
              // Replace `0(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)` with `0`
              '#(?<=[\s:])(0)(cm|em|ex|in|mm|pc|pt|px|vh|vw|%)#si',
              // Replace `:0 0 0 0` with `:0`
              '#:(0\s+0|0\s+0\s+0\s+0)(?=[;\}]|\!important)#i',
              // Replace `background-position:0` with `background-position:0 0`
              '#(background-position):0(?=[;\}])#si',
              // Replace `0.6` with `.6`, but only when preceded by a white-space or `=`, `:`, `,`, `(`, `-`
              '#(?<=[\s=:,\(\-]|&\#32;)0+\.(\d+)#s',
              // Minify string value
              '#(\/\*(?>.*?\*\/))|(?<!content\:)([\'"])([a-z_][-\w]*?)\2(?=[\s\{\}\];,])#si',
              '#(\/\*(?>.*?\*\/))|(\burl\()([\'"])([^\s]+?)\3(\))#si',
              // Minify HEX color code
              '#(?<=[\s=:,\(]\#)([a-f0-6]+)\1([a-f0-6]+)\2([a-f0-6]+)\3#i',
              // Replace `(border|outline):none` with `(border|outline):0`
              '#(?<=[\{;])(border|outline):none(?=[;\}\!])#',
              // Remove empty selector(s)
              '#(\/\*(?>.*?\*\/))|(^|[\{\}])(?:[^\s\{\}]+)\{\}#s',
              '#\x1A#'
          ),
          array(
              '$1',
              '$1$2$3$4$5$6$7',
              '$1',
              ':0',
              '$1:0 0',
              '.$1',
              '$1$3',
              '$1$2$4$5',
              '$1$2$3',
              '$1:0',
              '$1$2',
              ' '
          ),
      $input);
  }


if(!function_exists('hash_equals'))
{
    function hash_equals($str1, $str2)
    {
        if(strlen($str1) != strlen($str2))
        {
            return false;
        }
        else
        {
            $res = $str1 ^ $str2;
            $ret = 0;
            for($i = strlen($res) - 1; $i >= 0; $i--)
            {
                $ret |= ord($res[$i]);
            }
            return !$ret;
        }
    }
}


function convert_to_ascii($url)
  {
    $parts = parse_url($url);
    if (!isset($parts['host']))
      return $url; // missing http? makes parse_url fails
   
    if (mb_detect_encoding($parts['host']) != 'ASCII'  && function_exists("idn_to_ascii") ){
      $parts['host'] = idn_to_ascii($parts['host']);
      return $parts['scheme']."://".$parts['host'];
    }
    return $url;
  }

if ( ! function_exists('array_add'))
{ 

  function array_add($array1,$array2){
      $array_1=$array1;
      $array_2=$array2;
      $arra1_count=count($array_1);
      foreach($array_2 as $val){
        $array_1[$arra1_count]=$val;
        $arra1_count++;
      }
      return $array_1;
  }

}


function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
}


function SecToHHmmSSms( $input=0 )
{
  $input=$input*1000;

  $uSec = $input % 1000;
  $uSec=str_pad($uSec,3,"0",STR_PAD_LEFT);
  $input = floor($input / 1000);

  $seconds = $input % 60;
  $seconds=str_pad($seconds,2,"0",STR_PAD_LEFT);
  $input = floor($input / 60);

  $minutes = $input % 60;
  $minutes=str_pad($minutes,2,"0",STR_PAD_LEFT);

  $input = floor($input / 60); 
  $input = str_pad($input,2,"0",STR_PAD_LEFT);

  $out= "{$input}:{$minutes}:{$seconds},{$uSec}";
  return $out;
}



function custom_number_format($n, $precision = 2) {
    if ($n < 1000)
    {
        // Anything less than a thousand
        $n_format = number_format($n);
    }
    else if ($n < 1000000)
    {
        // Anything less than a million
        $n_format = number_format($n / 1000, $precision) . 'K';
    } 
    else if ($n < 1000000000)
    {
        // Anything less than a billion
        $n_format = number_format($n / 1000000, $precision) . 'M';
    } 
    else if ($n < 1000000000000)
    {        
        // Anything less than a trillion
        $n_format = number_format($n / 1000000000, $precision) . 'B';
    }
    else
    {
        // At least a trillion
        $n_format = number_format($n / 1000000000000, $precision) . 'T';
    }    

    return $n_format;
}


   function aasort(&$array, $key) // sort  2d array by inner index ASC
    {

        $sorter=array();

        $ret=array();

        reset($array);

        foreach ($array as $ii => $va)
        {
            $sorter[$ii]=$va[$key];
        }

        asort($sorter,SORT_NUMERIC);
        foreach ($sorter as $ii => $va)
        {
            $ret[$ii]=$array[$ii];
        }

        $array=$ret;
    }

