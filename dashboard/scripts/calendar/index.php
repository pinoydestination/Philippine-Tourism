<?php
include("../../wp-load.php");
include("../dashboard.class.php");
$dashboard = new Dashboard($wpdb,$table_prefix);

$currentYear = date("Y");
$currentMonth = date("m");
$currentDate = date("j");

$totalDaysInMonth = date("t");

$todayIs = date("m-d-Y");

$one = $currentMonth."/01/".$currentYear;

$startDay = date("N", strtotime($one))+1;

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
<html>
	<head>
		<title>Event Calendar</title>
		<style>
			body{
				font-size:12px;
				font-family:"Arial Narrow", Arial, Helvetica, sans-serif;
			}
			table{
				width:1000px;
				margin:0 auto;
				padding:1px;
				/*border:1px solid silver;*/
				border-spacing: 0;
			}
			table thead{
				background: #93cede; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzkzY2VkZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQxJSIgc3RvcC1jb2xvcj0iIzc1YmRkMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM0OWE1YmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  #93cede 0%, #75bdd1 41%, #49a5bf 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#93cede), color-stop(41%,#75bdd1), color-stop(100%,#49a5bf)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #93cede 0%,#75bdd1 41%,#49a5bf 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #93cede 0%,#75bdd1 41%,#49a5bf 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #93cede 0%,#75bdd1 41%,#49a5bf 100%); /* IE10+ */
background: linear-gradient(to bottom,  #93cede 0%,#75bdd1 41%,#49a5bf 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#49a5bf',GradientType=0 ); /* IE6-8 */

			}
			table thead th{
				padding:10px;
				font-weight: bold;
				font-family:"Arial Narrow", Arial, Helvetica, sans-serif;
				width:117px;
				color:#fff;
				text-shadow:0 2px 0px rgba(0,0,0,.2);
			}
			table tbody tr td{
				color:#65797d;
				border:1px dotted silver;
				padding:30px 10px;
				background: #ffffff; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlNWU1ZTUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ffffff 0%,#e5e5e5 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-8 */
text-shadow:0 1px 0px #fff;
font-size:20px;
			}
			table tbody tr td:hover{
				background: #fcfff4; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZjZmZmNCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQwJSIgc3RvcC1jb2xvcj0iI2RmZTVkNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNiM2JlYWQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  #fcfff4 0%, #dfe5d7 40%, #b3bead 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fcfff4), color-stop(40%,#dfe5d7), color-stop(100%,#b3bead)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%); /* IE10+ */
background: linear-gradient(to bottom,  #fcfff4 0%,#dfe5d7 40%,#b3bead 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 ); /* IE6-8 */
			text-shadow:0 1px 0px #fff;
			
			}
			
			.eventmenu{
				font-size:11px;
				padding:4px;
				background:#FF6666;
				border-radius:3px;
				display:none;
				box-shadow:0 1px 0px rgba(255,255,255,0.5);
				margin-left:10%;
			}
			.eventmenu:hover{
				background:#F02F17;
			}
			.eventmenu a{
				text-decoration:none;
				color:#fff;
				text-shadow:0 1px 0px rgba(0,0,0,.5);
				padding:4px;
				cursor:pointer;
				
			}
			table tbody tr td:hover > span.eventmenu{
				display:inline;
			}
			h1{
				margin:0;
				padding:0;
			}
			
			.overlaybg{
				
				/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPHJhZGlhbEdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iNzUlIj4KICAgIDxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMCIvPgogICAgPHN0b3Agb2Zmc2V0PSI1NiUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSI5OSUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvcmFkaWFsR3JhZGllbnQ+CiAgPHJlY3QgeD0iLTUwIiB5PSItNTAiIHdpZHRoPSIxMDEiIGhlaWdodD0iMTAxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
background: -moz-radial-gradient(center, ellipse cover,  rgba(255,255,255,0) 0%, rgba(255,255,255,1) 56%, rgba(255,255,255,1) 99%); /* FF3.6+ */
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(255,255,255,0)), color-stop(56%,rgba(255,255,255,1)), color-stop(99%,rgba(255,255,255,1))); /* Chrome,Safari4+ */
background: -webkit-radial-gradient(center, ellipse cover,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 56%,rgba(255,255,255,1) 99%); /* Chrome10+,Safari5.1+ */
background: -o-radial-gradient(center, ellipse cover,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 56%,rgba(255,255,255,1) 99%); /* Opera 12+ */
background: -ms-radial-gradient(center, ellipse cover,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 56%,rgba(255,255,255,1) 99%); /* IE10+ */
background: radial-gradient(ellipse at center,  rgba(255,255,255,0) 0%,rgba(255,255,255,1) 56%,rgba(255,255,255,1) 99%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=1 ); /* IE6-8 fallback on horizontal gradient */

				
				
			display:none;	
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
			}
		</style>
		
		<style>
			.overlay{
				display:none;
				position:fixed;
				top:20%;
				left:20%;
				background:#fff;
				width:500px;
				height:300px;
				border:1px solid silver;
				border-radius:5px;
				padding:10px;
				box-shadow:0px 10px 90px rgba(0,0,0,.9);
				
				
				background: #f7fbfc; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2Y3ZmJmYyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQwJSIgc3RvcC1jb2xvcj0iI2Q5ZWRmMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNhZGQ5ZTQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  #f7fbfc 0%, #d9edf2 40%, #add9e4 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f7fbfc), color-stop(40%,#d9edf2), color-stop(100%,#add9e4)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%); /* IE10+ */
background: linear-gradient(to bottom,  #f7fbfc 0%,#d9edf2 40%,#add9e4 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7fbfc', endColorstr='#add9e4',GradientType=0 ); /* IE6-8 */

				
text-shadow:0 1px 0px #fff;
			}
			a.save, input.save{
				background: #c9de96; /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2M5ZGU5NiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjIlIiBzdG9wLWNvbG9yPSIjOThiYzgwIiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iOCUiIHN0b3AtY29sb3I9IiM4YWI2NmIiIHN0b3Atb3BhY2l0eT0iMSIvPgogICAgPHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjMzk4MjM1IiBzdG9wLW9wYWNpdHk9IjEiLz4KICA8L2xpbmVhckdyYWRpZW50PgogIDxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
background: -moz-linear-gradient(top,  #c9de96 0%, #98bc80 2%, #8ab66b 8%, #398235 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#c9de96), color-stop(2%,#98bc80), color-stop(8%,#8ab66b), color-stop(100%,#398235)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #c9de96 0%,#98bc80 2%,#8ab66b 8%,#398235 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #c9de96 0%,#98bc80 2%,#8ab66b 8%,#398235 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #c9de96 0%,#98bc80 2%,#8ab66b 8%,#398235 100%); /* IE10+ */
background: linear-gradient(to bottom,  #c9de96 0%,#98bc80 2%,#8ab66b 8%,#398235 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c9de96', endColorstr='#398235',GradientType=0 ); /* IE6-8 */

padding:10px 30px;
display:inline-block;
border:1px solid #98bc80;
		text-decoration:none;
		font-weight:bold;
		color:#fff;
		text-shadow:1px 1px 0px rgba(0,0,0,.5);
		border-radius:3px;
		margin-right:3px;
			}
			.overlay h1{
				color:#626464;
				text-shadow:0px 1px 0px #fff;
				display:block;
			}
			.menulocation{
				padding:10px 0px;
				bottom: 0px;
				position:absolute;
				border-top:1px dotted #fff;
				width:96%;
			}
			.formbody {
				padding:10px 0px;
			}
			.formbody input[type=text]{
				width:500px;
				padding:10px;
				border-radius:3px;
				border:1px solid #8fb2b9;
				border-bottom:3px solid #8fb2b9;
			}
			
			.formbody textarea{
				width:500px;
				padding:10px;
				border-radius:3px;
				border:1px solid #8fb2b9;
				border-bottom:3px solid #8fb2b9;
				margin-top:5px;
				height:110px;
			}
			.overlay h1 span{
				color:red;
			}
			.ajaxloader{
				width:126px;
				background:rgba(0,0,0,.5);
				border-radius:3px;
				height:22px;
				padding:5px;
				position:fixed;
				box-shadow:0 0 40px #000;
				border:1px solid rgba(0,0,0,.6);
				display:none;
			}
			span#processmessage{
				padding:5px;
				border-radius:3px;
				background:#F36650;
				font-size:11px;
				color:#fff;
				text-shadow:1px 1px 0px rgba(0,0,0,.5);
				float:right;
				display:none;
				box-shadow:1px 1px 0px #fff;
			}
			a.dateClass{
				text-decoration:none;
				box-shadow:1px 1px 0px rgba(255,255,255,0.5);
				color:gray;
				font-weight:bold;
				font-size:18px;
				text-shadow:1px 1px 0px rgba(0,0,0,.1);
				padding:5px 10px;
				border:1px solid silver;
				background:#fff;
				border-radius:5px;
				border-bottom:3px solid silver;
			}
		</style>
		<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
		<script>
			$(document).ready(function(){				
				
				function rePaint(){
					var windowWidth = ($(window).width())/2;
					var windowHeight = $(window).height()/2;
					
					var overlayWidth = $("#overlay").width()/2;
					var overlayHeight = $("#overlay").height()/2;
					
					
					var loadingWidth = $(".ajaxloader").width()/2;
					var loadingHeight = $(".ajaxloader").width()/2;
					
					var overAll = windowWidth-overlayWidth;
					var overallTop = windowHeight-overlayHeight;
					
					var finalLoadingLeft = windowWidth-loadingWidth;
					var finalLoadingTop = windowHeight-loadingHeight;
					
					$("#overlay").css("left",overAll);
					$("#overlay").css("top",overallTop);
					
					$(".ajaxloader").css('left', finalLoadingLeft);
					$(".ajaxloader").css('top', finalLoadingTop);
				}
				
				rePaint();
				
				$(window).resize(function(){
					rePaint();
				});
				
				$("a.addevent").click(function(){
					
					data1 = $(this).attr("rel");
					data = data1.split("|");
					
					
					$("#overlay").hide();
					$("#dateofEvent").html(data[0]);
					$("#eventDate").val(data1);
					
					$("#overlay").fadeIn("fast");
					$(".overlaybg").fadeIn('slow');
					return false;
				});
				$("a#cancel").live('click', function(){
					$("#overlay").fadeOut("fast");
					$(".overlaybg").fadeOut('slow');
					$("#processmessage").fadeOut();
				});
				
				$("form#addeventform").live('submit',function(){
					var formData = $("form#addeventform").serialize();
					
					$.ajax({
						url: $("form#addeventform").attr('action'),
						data: formData,
						type: $("form#addeventform").attr('method'),
						statusCode:{
							404: function(){
								$(".ajaxloader").hide();
								$("#processmessage").html("File Not Found!");
								$("#processmessage").fadeIn();
							}
						},
						beforeSend: function(){
							$(".ajaxloader").show();
							$("#processmessage").fadeOut();
						},
						success: function(data){
							console.log(data);
							$(".ajaxloader").hide();
							$("#overlay").fadeOut("fast");
							$(".overlaybg").fadeOut('slow');
							$("#processmessage").fadeOut();
						}
					});
					
					return false;
				})
				
			});
		</script>
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
			<h1><?php echo monthToday($currentMonth); ?></h1>
		</p>
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
					$y=1;
					$start = 1;
					$x = 1-$startDay+1;
					for($x=$x;$x<=$totalDaysInMonth;$x++){
						
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
										echo $x;
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