<?php
include("../../wp-load.php");
include("../dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix);

if(isset($_GET["action"]) && $_GET['action'] == "change"){
	$currentYear  = $_GET['year'];
	$currentMonth = $_GET['month'];
	$currentDate  = 1;
	
	$convertedDate    = $currentYear."-".$currentMonth. "-" .$currentDate;
	$totalDaysInMonth = date("t", strtotime($convertedDate));
	
	$startDay = date("N", strtotime($convertedDate));
	
}else{
	$currentYear = date("Y");
	$currentMonth = date("m");
	$currentDate = date("j");
	
	$totalDaysInMonth = date("t");

	$todayIs = date("m-d-Y");
	
	$one = $currentMonth."/01/".$currentYear;
	
	$startDay = date("N", strtotime($one));
}




function monthToday($int){
	switch($int){
		case "1":
			return "January";
			break;
		
		case "2":
			return "February";
			break;
		
		case "3":
			return "March";
			break;
		
		case "4":
			return "April";
			break;
		
		case "5":
			return "May";
			break;
		
		case "6":
			return "June";
			break;
		
		case "7":
			return "July";
			break;
		
		case "8":
			return "August";
			break;
		
		case "9":
			return "September";
			break;
		
		case "10":
			return "October";
			break;
		
		case "11":
			return "November";
			break;
		
		case "12":
			return "December";
			break;
			
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" > 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<title>Event Calendar</title>
		<link type="text/css" media="all" rel="stylesheet" href="style.css" />
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<script src="script.js"></script>
	</head>
	<body>
		<div class="overlaybg">
			
		</div>
		<div id="overlay" class="overlay">
			<h1>Add Event: <span id="dateofEvent">August 21, 2012</span></h1>
			<form id="addeventform" name="addeventform" method="post" action="addevent.php">
				<div class="formbody">
					
					<input type="hidden" name="eventDate" value="" id="eventDate" />
					<input type="text" name="eventTitle" placeholder="Event Title" />
					<textarea name="eventDesc"></textarea>
					<input type="text" name="eventTag" placeholder="Tags: separated by comma ex. Bacolod, Masskara Festival" style="margin-top:5px;" />
				</div>
				<div class="menulocation">
					<input type="submit" class="save" value="Save" /><a class="save" id="cancel" href="javascript:void(0);">Cancel</a><span id="processmessage">File Not Found!</span>
				</div>
			</form>
		</div>
		
		<div class="ajaxloader">
			<img src="../images/ajax-loader.gif" alt="loading" border="0" />
		</div>
		
		<div style="width:1000px; margin:0 auto; font-size:30px; color:#75bdd1;">
		<p>
			<h1 style="float:left;" id="monthName"><?php echo monthToday($currentMonth) . " ". $currentYear ; ?></h1>
			<a  style="float:left;" href="" class="changeMonth" title="Change Month">Change Month</a>
			<a  style="float:left;" href="" class="changeYear" title="Change Month">Change Year</a>
			<br clear="all" />
		</p>
		<div class="monthSelection">
			<ul>
				<?php 
				for($m=1;$m<=12;$m++){
					$sampleDate = "2012-".$m."-1"; 
					$theMonth = date("F", strtotime($sampleDate));
				?>
				<li><a class="monthbutton" id="mo-<?php echo $m; ?>" href="?action=change&month-int=<?php echo strtotime($sampleDate); ?>&month=<?php echo $m; ?>&year=<?php echo $currentYear; ?>"><?php echo $theMonth; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		
		
		<div class="yearSelection">
			<ul>
				<?php 
				for($y=date("Y")-1;$y<=date("Y")+5;$y++){
					$sampleDate = $y."-1-".$currentMonth; 
					$theMonth = date("F", strtotime($sampleDate));
				?>
				<li><a class="yearbutton" id="mo-<?php echo $y; ?>" href="?action=change&month-int=<?php echo strtotime($sampleDate); ?>&month=<?php echo $currentMonth; ?>&year=<?php echo $y; ?>"><?php echo $y; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		
		</div>
		<table rows="7" cols="4" border="0">
			<thead>
				<tr>
					<th>Sunday</th>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
				</td>
			</thead>
			<tbody>
				<?php
					$y = 1;
					$start = 1;
					$x = $startDay-$startDay-$startDay+1;
					if($x == -6){
						$x=1;
					}
					
					for($x = $x;$x <= $totalDaysInMonth;$x++){
						
						if($y==1){
							echo "<tr>";
						}
						?>
						<td>
							<?php
								if($x<=0){
									echo "&nbsp;";
								}else{
									$tmpCurrent = $currentYear."-".$currentMonth."-".$x;
									$tmpTime = strtotime($tmpCurrent);
									
									$ifData = $dashboard->hasEvent($tmpTime);
									
									if(isset($ifData[0]->id)){
										echo "<a class='dateClass' href='viewEvents.php?time=".$tmpTime."'>".$x."</a>";	
									}else{
										echo "<span class='cal-".$x."'>".$x."</span>";
									}
									?>
									<span class="eventmenu">
										<a class="addevent" rel="<?php echo date("M j, Y", strtotime($tmpCurrent)); ?>|<?php echo $tmpCurrent; ?>|<?php echo $tmpTime; ?>"  href="addevent.php?date=<?php echo $tmpCurrent . "&timestamp=".$tmpTime; ?>">Add Event</a>
									</span>
									<?php
								}
							?>
						</td>
						<?php
						if($y==7){
							echo "</tr>";
							$y=0;
						}
						$y++;
						$start++;
					}
				?>
				
			</tbody>
		</table>
	</body>
</html>