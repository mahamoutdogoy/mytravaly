<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->



    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  />

<div class="row">
		
	<div class="col-md-12"  >
		<div style="margin-left:180px">
			<?php include 'propertymenus.php';?>
		</div>
	<div align="center" style="background: #f15025;margin: 0 auto;height: 5%;width:75%;padding: 10px;border-radius: 75px;">

		<label style="font-size: 20px;color: green">
			  

			<input type="radio"  id="radio1" name="t" value="" onclick="window.location='propertydetail.php';"><b><a href="#" style="text-decoration: none;color: white">Create Property</a></b>&emsp;

			<input type="radio"  id="radio2" name="t" value="" onclick="window.location='rooms.php';" ><b><a href="#" style="text-decoration: none;color: white">Create Room</a></b>&emsp;
			
			<input type="radio"  id="radio3" name="t" value="" onclick="window.location='Tariff.php';"><b><a href="#" style="text-decoration: none;color: white">Tariff</a></b>&emsp;

			<input type="radio"  id="radio4" name="t" value="" onclick="window.location='update_tariff.php';" ><b><a href="#" style="text-decoration: none;color: white">Update Tariff</a></b>
		</label>
	</div>
<?php

	header('Content-type: text/html; charset=utf-8');
	setlocale(LC_TIME, 'de_DE.UTF8');
	date_default_timezone_set('Europe/Berlin');

	// CONNECT TO DATABASE
	require_once('config.php');
	require_once('Property_DB.php');
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
	mysqli_set_charset($db, 'utf8');
	mysqli_select_db($db, DB_NAME);

	/* REGIONS */
	$result = mysqli_query($db, 'SELECT * FROM `rooms_tariff` group by p_r_id ');
	$s=array(array());
	$update=array(array());
	$s1=array();
	$s2=array();
	$max_occupancy=array();
	$meal_plan=array();
	$regionNames = array();
	$regionIDs = array();
	$tArray = array();
	$allDays = array();
	$regionMeta = array();
	
	/* DATE PREPARATIONS */
	// http://php.net/manual/en/function.date.php
	$today = date('Y-m-d');
	
	$requYMD = $today; // makes it first of month
	$startpage = true;
	if(isset($_GET['m']))
    {
		$requYMD = preg_replace("/[^0-9\-]/i", '', $_GET['m']).'-01';
		$startpage = false;
	}
	// block hack, required yyyy-mm-dd
	if(strlen($requYMD)!=10)
    {
		exit();
	}
	
	// get current month
	$curMonthTS = strtotime($requYMD); // add 4 hours 
	$monthNr = date('n', $curMonthTS); // numeric representation of current month, without leading zeros
	// echo strftime('%s %H:%M:%S %z %Z %a., %d. %B %Y', $curMonthTS);
	
	// http://stackoverflow.com/questions/13346395/php-array-containing-all-dates-of-the-current-month
	// number of days in the given month
	$num_of_days = date('t', $curMonthTS);
	$x_year = date('Y', $curMonthTS);
	$x_month = date('m', $curMonthTS);
	for($i=1; $i<=$num_of_days; $i++) 
	{
		$dates[]= $x_year."-".$x_month."-".str_pad($i,2,'0', STR_PAD_LEFT);
	}

	
	
	// fill Arrays with data

	while($row = mysqli_fetch_assoc($result))
	{

		$id = $row['p_r_id'];
		// write regionids to each country
		$regionIDs[$row['property_id']][] = $id;
		$regionMeta[$id] = $row['user_id'];
		$regionNames[$id] = $row['room_name'];
		$s[$id][1]=$row['singleprice'];
		$s[$id][2]=$row['doubleprice'];
		$s[$id][3]=$row['tripleprice'];
		$s[$id][4]=$row['person4price'];
		$s[$id][5]=$row['person5price'];
		$s[$id][6]=$row['person6price'];
		$s[$id][7]=$row['person7price'];
		$s[$id][8]=$row['person8price'];
		$s[$id][9]=$row['person9price'];
		$s[$id][10]=$row['person10price'];
		$s[$id][11]=$row['person11price'];
		$s[$id][12]=$row['person12price'];
		$s[$id][13]=$row['person13price'];
		$s[$id][14]=$row['person14price'];
		$s[$id][15]=$row['person15price'];
		$s1[$id]=$row['singleprice'];
		$s2[$id]=$row['doubleprice'];
		$tArray[$id] = '';
		$meal_plan[$id]=$row['meal_plan'];
		// create all days in month as array entries
		$d = 1; // id starts with 1, we dont have an id==0
		while($d <= $num_of_days) {
			$allDays[$id][$d] = ' ';
			$d++;
		}
		$result2=mysqli_query($db,"select * from rooms_detail where property_id='$row[property_id]' and room_id='$row[room_id]'");
		while($row2=mysqli_fetch_array($result2))
		{
			$max_occupancy[$id]=$row2['max_occupancy'];
			//echo $max_occupancy[$id];
		}


		$resultx=mysqli_query($db,"select * from rooms_offers where p_r_id='$row[p_r_id]'");
				while ($rowx= mysqli_fetch_assoc($resultx)) {
					$update[$id][1]=$rowx['singleprice'];
					$update[$id][2]=$rowx['doubleprice'];
					$update[$id][3]=$rowx['tripleprice'];
					$update[$id][4]=$rowx['person4price'];
					$update[$id][5]=$rowx['person5price'];
					$update[$id][6]=$rowx['person6price'];
					$update[$id][7]=$rowx['person7price'];
					$update[$id][8]=$rowx['person8price'];
					$update[$id][9]=$rowx['person9price'];
					$update[$id][10]=$rowx['person10price'];
					$update[$id][11]=$rowx['person11price'];
					$update[$id][12]=$rowx['person12price'];
					$update[$id][13]=$rowx['person13price'];
					$update[$id][14]=$rowx['person14price'];
					$update[$id][15]=$rowx['person15price'];
					
				}


	}
	
	
	// get all holiday periods by checking if month appears in startdate or enddate
	$result = mysqli_query($db, 'SELECT p_r_id,start_date,end_date,user_id FROM `rooms_offers` 
							WHERE YEAR(`start_date`) = YEAR("'.$requYMD.'")
								AND MONTH(`start_date`) = MONTH("'.$requYMD.'")
								OR 
								YEAR(`end_date`) = YEAR("'.$requYMD.'")
								AND MONTH(`end_date`) = MONTH("'.$requYMD.'")
							ORDER BY `start_date`');

	while($row = mysqli_fetch_assoc($result)) 
    {
		// first entry without leading comma
		if($tArray[$row['p_r_id']]=='') {
			$tArray[$row['p_r_id']] .= $row['start_date'].','.$row['end_date'].','.$row['user_id'];
		}
		else {
			$tArray[$row['p_r_id']] .= ','.$row['start_date'].','.$row['end_date'].','.$row['user_id'];
		}
	}

	// extra query for regions with holidays over 2 months, e.g. 31.07.2014 - 10.09.2014
	$resultXX = mysqli_query($db, 'SELECT p_r_id,start_date,end_date,user_id FROM `rooms_offers` 
							WHERE YEAR(`start_date`) = YEAR("'.$requYMD.'")
								AND MONTH(`start_date`) = MONTH("'.date('Y-m-d', strtotime($requYMD.' - 1 month')).'")
								AND 
								YEAR(`end_date`) = YEAR("'.$requYMD.'")
								AND MONTH(`end_date`) = MONTH("'.date('Y-m-d', strtotime($requYMD.' + 1 month')).'")
							ORDER BY `start_date`');
	while($row = mysqli_fetch_assoc($resultXX)) {
		// set holiday of region to full month setting first to end of month
		$tArray[$row['id']] = $requYMD.','.substr($requYMD,0,8).$num_of_days.','.$row['meta'];
	}
	
	/* OUTPUT function */
	function getAllHolidays($countryCode,$x,$b) 
    {	
    	global $update;
    	global $s;
    	global $s1;
    	global $s2;
		global $dates;
		global $regionNames;
		global $meal_plan;
		global $max_occupancy;
		global $regionIDs; // IDs of all regions
		global $tArray; // contains all holiday periods for each region
		global $allDays;
		global $regionMeta;
		global $today;
		global $requYMD;
		global $curMonthTS;
		global $monthNr;
		global $num_of_days;
		$allMetas = array();
		
		$output = '
	<table id="table_'.$countryCode.'" class="bordered table table2" >
	<tr>
		<th style="text-align:left !important;background:#FFD !important;">
		<span style="display:none;">Holidays in </span>'.strftime('%B %Y', $curMonthTS).'
		</th>
	';
		
		// all number days of current month
		foreach($dates as $day) {
			// set id for today to color the column, but only if showing this month
			$cssToday = '';
			if($day == $today && substr($today,5,2)==$monthNr) {
				$cssToday = ' class="today" title="Der heutige Tag!"';
			}
			// format 2013-10-01 to 01 and remove if necessary the 0 by ltrim
			$output .= '<th'.$cssToday.'>'.ltrim( substr($day,8,2) , '0').'</th>'; // alternative: output $day and let JS convert the day to weekday
		}
	$regionTerm = ($countryCode=='ch') ? 'Kantone' : 'Bundesländer';
	$output .= '
	</tr>
	
	<tr class="weekdays"><td><span style="display:none;">'.$regionTerm.'</span></td>';
		$wdaysMonth = array();
		// week days
		$i = 1;
		foreach($dates as $day) {
			// echo '<td>'.date('D', strtotime($day)).'</td>';
			$weekdayName = strftime('%a', strtotime($day));
			$wkendcss = '';
			$todayWDcss = '';
			//if($weekdayName=='Sa' || $weekdayName=='So'){
			if($day == $today) {
				$todayWDcss = 'class="activeday"';
			}
			else if($weekdayName=='So'){
				$wkendcss = 'class="wkend"';
			}
			// write day date in array field
			$wdaysMonth[$i++] = strftime('%A %e. %B %Y', strtotime($day));
			$output .= '<td '.$todayWDcss.$wkendcss.' title="'.strftime( '%A %e. %B %Y', strtotime($day) ).'">'.$weekdayName.'</td>';
		}
		
	$hasData = false;
	$output .= '
	</tr>
	';
	

		// go over all regions and display holidays
	$j=4;
		
		foreach($regionIDs[$countryCode] as $id) 
        {
        	$v=1;
        	$output .= '<tbody><tr class="parent"> <td><i class="fa fa-chevron-down"></i><input class="fa fa-chevron-down" type="button" onclick="myFunction(this)" id="btnhide" value="Tariff" data-trid="tr'.$id.'"> '.$regionNames[$id]."-".$meal_plan[$id].'</a></td></tr>';
        	while($max_occupancy[$id]>0)
		{
			// 3 items in a row belong together: startdate, enddate, meta
			$regionHolidays = explode(',',$tArray[$id]); 
			// print_r($regionHolidays);
			
			$output .= '<tr class="cchild" style="background:white;color:blue" > <td > '.$regionNames[$id]."-".$meal_plan[$id]."-p".$v.'</a></td>';
			
			// start and end date is one loop
			$loops = count($regionHolidays);

			$i = 0;
			$entiremonthFree = false;
			/* print_r($regionHolidays);
			echo $loops; */
		if($loops > 1)
		{
			while($i < $loops) {
				/* write holiday days into month for region */
				// compare month, e.g. if 09-25 to 10-01 or 05-20 to 05-25
				$startdate_year = substr($regionHolidays[$i],0,4);
				$startdate_month = substr($regionHolidays[$i],5,2);
				$startdate_day = substr($regionHolidays[$i],8,2);
				$enddate_year = substr($regionHolidays[$i+1],0,4);
				$enddate_month = substr($regionHolidays[$i+1],5,2);
				$enddate_day = substr($regionHolidays[$i+1],8,2);
				
				$day_start = 1;
				$day_end = $num_of_days; // 31;
				
				while($day_start<=$num_of_days) 
                {
                	
                	//$s='s'.$v;
                	
					$allDays[$id][$day_start] = $s[$id][$v];
					
					$day_start++;
				}
				$hasData = true;

				// end month outside current month, e.g. 2013-10* to 2013-11
				if( ($startdate_year == $enddate_year && $monthNr < $enddate_month) )
				{
					// last of months
					$day_end = $num_of_days;
					// extra check for period that goes over 2 months, e.g. 31.07.2014 - 13.09.2014
					// our month to be filled is not the start or the end month but between
					if($enddate_month-$startdate_month>1 && $monthNr!=$enddate_month && $monthNr!=$startdate_month)
					{
						// remember that next $month is free completely
						$entiremonthFree = true;
						$output .= '###';
					}
				}
				// end month outside current month, e.g. 2013-12* to 2014-01
				else if( ($startdate_year < $enddate_year && $monthNr > $enddate_month) )
                {
					// last of months
					$day_end = $num_of_days;
				}
				else 
                {
					// set end date of given month, remove leading zero
					$day_end = ltrim( substr($regionHolidays[$i+1],8,2), '0');
				}
				
				// start month outside current month, e.g. 2013-10 to 2013-11*
				if( ($startdate_year == $enddate_year && $monthNr > $startdate_month) )
                {
					// first of month
					$day_start = 1;
				}
				// start month outside current month, e.g. 2013-12 to 2014-01*
				else if( ($startdate_year < $enddate_year && $monthNr < $startdate_month) )
                {
					// first of months
					$day_start = 1;
				}
				else 
                {
					// date of start month, remove leading zero
					$day_start = ltrim( substr($regionHolidays[$i],8,2), '0');
					//echo $day_start;
				}
				
				if($entiremonthFree) {
					$day_end = $num_of_days;
					$day_start = 1;
				}
				
				// write holidays into array
				
				
				while($day_start<=$day_end && $update[$id][$v]!=0) 
                {
					$allDays[$id][$day_start] = $update[$id][$v];
					// write holiday meta into array
					$allMetas[$id][$day_start] = $regionHolidays[$i+2]; 
					$day_start++;
					
				}
			
				
				// jump to next data items
				$i+=3;
				$hasData = true;
			}
		}
		else
		{
				$day_start=1;
				while($day_start<=$num_of_days) 
                {
					$allDays[$id][$day_start] = $s[$id][$v];
					
					$day_start++;
				}
				$hasData = true;
		}
		
		
			$k = 0;
			foreach($allDays[$id] as $day) 
            {
				/*$k++;
				if($day==$update[$id][$v]) 
                {

					$output .= '<td class="free" style="font-size:10px" >'.$day.'</td>';
				}
				
				else */
                //{
					$output .= '<td style="font-size:10px">'.$day.'</td>';
				//}

				
			}
			$output .= '</tr>
			';
			$max_occupancy[$id]--;
			$v++;
		}
		
		
	
		}
		$output .= '</tbody></table>';
		
		if(!$hasData) {
			$output = '<p>Oh no, no data for this period.</p>';
		}
		return $output;
	}



	
	// $mnthyear = strftime('%b %G', $curMonthTS);
	$mnthyear = strftime('%b %Y', $curMonthTS);
	

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="author" content="Not me" />
	<meta name="robots" content="index,follow" />
	
	<title>Rooms Dashboard</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400" type="text/css" />
	<link rel="stylesheet" href="styles.css" type="text/css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/js/jquery/3.2.1/jquery.min.js"><\/script>')</script>
	
	<script type="text/javascript" src="script.js"></script>


<style type="text/css">
	 #progressbar {
      background-color: #22588c ;
      border-radius: 13px; /* (height of inner div) / 2 + padding */
      padding: 3px;
    }
    
    #progressbar > div {
       background-color: #FFB000;
        /* Adjust with JavaScript */
       height: 20px;
       border-radius: 10px;
    }

</style>
</head>

<body class="holidaysm">

	<div id="nav">
		
		<div id="fastaccess">
		<?php
			// LIST Nav Buttons first or last 6 months of year - according to recent date year
			$requYear = substr($requYMD,0,4);
			$requMonth = substr($requYMD,5,2);
			$monthr = $requMonth<7 ? 1 : 7;
			$timestamp = $requYear.'-'.$monthr;
			
			$monthOut = array();
			$c = 0;
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +1 month')); // next month
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +1 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +2 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +2 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +3 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +3 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +4 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +4 month'));
			$monthOut[$c][0] = date('Y-m', strtotime($timestamp.' +5 month'));
			$monthOut[$c++][1] = strftime('%b %Y', strtotime($timestamp.' +5 month'));
			$c_out = 0;
			
		?>
			<a class="navpre" title="previous month" href="?m=<?php echo date('Y-m', strtotime($requYMD.' -1 month')); ?>">&laquo;</a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			<a <?php echo (substr($requYMD,0,7)==$monthOut[$c_out][0])? 'class="oranged" ' : '' ?>href="?m=<?php echo $monthOut[$c_out][0]; ?>"><?php echo $monthOut[$c_out++][1]; ?></a> 
			
			<a class="navfwd" title="next month" href="?m=<?php echo date('Y-m', strtotime($requYMD.' +1 month')); ?>">&raquo;</a> 
			
			<a id="datepickbtn">Calender <input id="datepicker" name="request" type="text" value="<?php echo substr($requYMD,0,7); ?>" /></a>
			
			<?php

				$res=mysqli_query($con,"select property_score from property_score");
				$res1=mysqli_fetch_array($res);
				$case=$res1[0];
				switch ($case) {
				    case 1:
				        	 echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 10%;">10%</div>
    						</div>';
				        break;
				    case 2:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 20%;">&emsp;20%</div>
    						</div>';
				        break;
				    case 3:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 30%;">&emsp;30%</div>
    						</div>';
				        break;
				    case 4:
				        	echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 40%;">&emsp;40%</div>
    						</div>';
				        break;
				    case 5:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 50%;">&emsp;50%</div>
    						</div>';
				        break;
				    case 6:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 60%;">&emsp;60%</div>
    						</div>';
				        break;
				    
				    case 7:
				        	echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 70%;">&emsp;70%</div>
    						</div>';
				        break;
				    case 8:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 80%;">&emsp;80%</div>
    						</div>';
				        break;
				    case 9:
				        echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px">
     	 					<div style="width: 90%;">&emsp;90%</div>
    						</div>';
				        break;
				   	default:
					   	echo '<b>Property Score</b>&emsp;<div id="progressbar" style="display: inline-block;width: 450px;height:20px">&emsp;0%
	     	 					<div style="width: 0%;"></div>
	    						</div>';
				} 

			?>
			

		</div>
		
		<br />
		

		<div id="calholdr">
			<div class="calendar"><?php echo substr($today,8,2); ?><em><?php echo strftime('%b %Y', strtotime($today)); ?></em></div>
			<div id="clock"></div>
		</div>
		
	</div>
		<div id="main">
	<?php
	$query=mysqli_query($db,"select * from rooms_tariff group by property_id");
	$o=10;
while ($row=mysqli_fetch_array($query) ){
	/*$query1=mysqli_query($db,"select * from rooms_tariff where property_id='$row[property_id]'")or die(mysqli_error($db));
	while ($row1=mysqli_fetch_array($query1) ){*/
	echo '<div class="tabcont t_'.$row['property_id'].'">';
		$pid=$row['property_id'];
		$query3=mysqli_query($db,"select * from propertydetails where property_id='$pid'");
		$row3=mysqli_fetch_array($query3);
		echo '<h1> '.$row3['property_name'].' </h1>';
		$o=$o+1;
	echo getAllHolidays($row['property_id'],$o,$row['singleprice']);
//}
	echo "</div>";	

}


	?>
		
	</div>
	
	
	
</body>
</html>
</div>	
</div>


<!-- <script type="text/javascript">
	var visible="block";
	function myFunction(btn) {

		//$('.trhide').attr('display','none');

		var trid=btn.getAttribute('data-trid');

	 var x=document.getElementsByClassName(trid);
	 for (var i = 0; i < x.length; i++) {
	 		
		  x[i].style.display = "block";
		} 
	 

  /*if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }*/
} 
</script> -->

<style type="text/css">
  
 .parent ~ .cchild {
  display: none;
}
.open .parent ~ .cchild {
  display: table-row;
}
.parent {
  cursor: pointer;
}
tbody {
  color: #212121;
}
.open {
  background-color: #e6e6e6;
}

.open .cchild {
  background-color: red;
  color: white;
}
.parent > *:last-child {
  width: 30px;
}
.parent i {
  transform: rotate(0deg);
  transition: transform .3s cubic-bezier(.4,0,.2,1);
  margin: -.5rem;
  padding: .5rem;
 
}
.open .parent i {
  transform: rotate(180deg)
}
</style>

<script>
  $('.table2').on('click', 'tr.parent .fa-chevron-down', function(){
  $(this).closest('tbody').toggleClass('open');
});
</script>
