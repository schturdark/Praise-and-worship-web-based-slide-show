<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>[Enter the browser title here]</title>
		<!-- metadata -->
		<meta name="generator" content="S5" />
		<meta name="version" content="S5 1.1" />
		<meta name="presdate" content="20050128" />
		<meta name="author" content="Eric A. Meyer" />
		<meta name="company" content="Complex Spiral Consulting" />
		<!-- configuration parameters -->
		<meta name="defaultView" content="slideshow" />
		<meta name="controlVis" content="hidden" />
		<!-- style sheet links -->
		<link rel="stylesheet" href="ui/default/slides.css" type="text/css" media="projection" id="slideProj" />
		<link rel="stylesheet" href="ui/default/outline.css" type="text/css" media="screen" id="outlineStyle" />
		<link rel="stylesheet" href="ui/default/print.css" type="text/css" media="print" id="slidePrint" />
		<link rel="stylesheet" href="ui/default/opera.css" type="text/css" media="projection" id="operaFix" />
		<!-- embedded styles -->
		<style type="text/css" media="all">
		.imgcon {width: 525px; margin: 0 auto; padding: 0; text-align: center;}
		#anim {width: 270px; height: 320px; position: relative; margin-top: 0.5em;}
		#anim img {position: absolute; top: 42px; left: 24px;}
		img#me01 {top: 0; left: 0;}
		img#me02 {left: 23px;}
		img#me04 {top: 44px;}
		img#me05 {top: 43px;left: 36px;}
		
		body, div#header, div#footer, #slide0 h1, .slide h1 {
			background: #000000 none repeat scroll 0 0;
			color: #FFFFFF;
			text-align: center;
		}
		
		div#footer {
			text-align: left;
		}
		
		.slide h1 {
			left: 0;
			padding: 0;
			width: 100%;
			margin: 0 auto;
		}
		
		#controls #navLinks a {
		 	background-color: #000000;
		}
		</style>
		<!-- S5 JS -->
		<script src="ui/default/slides.js" type="text/javascript"></script>
	</head>
	<body>

		<div class="layout">
			<div id="controls"><!-- DO NOT EDIT --></div>
			<div id="currentSlide"><!-- DO NOT EDIT --></div>
			<div id="header"></div>
			<div id="footer">
				<h1>[Enter the footer title here]</h1>
				<h2>Your computer &#8226; Today's date</h2>
			</div>
		</div>

		<div class="presentation">
		
			<div class="slide">
				<h1>[Enter your title here]</h1>
				<h3>[Enter the subtitle here]</h3>				
				<div class="handout"></div>
			</div>

			<?php $handle = opendir('.');?>
			<?php $selected = $_REQUEST['songs'];?>
			<?php $songs = explode(',',$selected);?>
			<?php foreach ($songs as $song):?>
			
			<?php $file = $song.'.txt';?>
			<?php $lines = file($file);?>
	    		
			<div class="slide">
				<h1><?php echo str_replace('-',' ',$song);?></h1>
				<div class="slidecontent">
				<?php foreach ($lines as $line_num => $line):?>
					<?php if(trim(strip_tags($line)) == ''):?>
						<?php $beforeisemptyline = TRUE;?>
					<?php else:?>
				
				<?php if($beforeisemptyline):?>				
				</div>				
			</div>
			
			<div class="slide">
				<div class="slidecontent">
				<h1><?php echo str_replace('-',' ',$song);?></h1>		
				<?php endif;?>
				<?php $beforeisemptyline = FALSE;?>
				<p><?php echo htmlspecialchars($line);?></p>		
				<?php endif;?>
				<?php endforeach;?>			
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</body>
</html>
