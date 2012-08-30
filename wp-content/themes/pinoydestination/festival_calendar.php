<?php
$events = getEvents(1);
foreach($events as $event){
	$month = date("F",$event->eventDateInt);
	$day = date("d",$event->eventDateInt);
?>
<span class="myriad_pro_bold_condensed sidebarheader">Philippine Festival</span>
<div class="calendar">
	<div class="calendarbg">
		<span class="month myriad_pro_bold_condensed"><?php echo $month; ?></span>
		<span class="date myriad_pro_bold_condensed"><?php echo $day; ?></span>
	</div>
	<div class="calendardetails">
		<strong class="calendartitle"><?php echo $event->titleOfActivity; ?></strong>
		<?php echo $event->activityTags; ?>
		<div class="desc">
			<?php echo stripcslashes($event->descriptionOfActivity); ?>
		</div>
		<?php /*
		<p class="readmore">
			<a href="/calendar-of-events">Show Event Calendar</a>
		</p>
		*/ ?>
	</div>
	<br clear="all" />
</div>
<?php } ?>
<div class="sidebarshadow">&nbsp;</div>