<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.ui.js"></script>
	<script type="text/javascript" src="jquery.asm.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			$("select[multiple]").asmSelect({
				addItemTarget: 'bottom',
				animate: true,
				highlight: true,
				sortable: true
			});			
		});
		
		function getSelected() {
			var selected = $('#songs').val();
			$('#result').empty().append('<a target="_blank" href="slide.php?songs='+selected+'">Launch slide show: '+selected+'</a>')
		}

	</script>

	<link rel="stylesheet" type="text/css" href="jquery.css">
	<link rel="stylesheet" type="text/css" href="example.css">
</head>
<body>
<select id="songs" name="songs" multiple="multiple" title="Please select a song">
<?php
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
        	$details = explode('.', $file);
        	
        	//look for txt files only
        	if($details[1] == 'txt') {
        		$song_title = ucwords(str_replace('-',' ',$details[0]));
        		echo "<option value='$details[0]'>$song_title</option>\n";
        		
        	}
        }
    }
    closedir($handle);
}?>
</select>
<div style="margin:1em 0;"><a href="#" onclick="getSelected();">Generate slides</a> after you have made changes.<div>
<div style="margin:1em 0;" id="result"></div>
</body>	
</html>