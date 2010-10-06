<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.ui.js"></script>
	<script type="text/javascript" src="jquery.asm.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			continueManageSlides();
			
			$("select[multiple]").asmSelect({
				addItemTarget: 'bottom',
				animate: true,
				highlight: true,
				sortable: true
			});			
		});
		
		function getSelected() {
			var selected = $('#songs').val();
			var title = $('#title').val();
			var subtitle = $('#subtitle').val();
			
			if(selected) {
				$('#result').empty().append('<a target="_blank" href="slide.php?title='+encodeURIComponent(title)+'&subtitle='+encodeURIComponent(subtitle)+'&songs='+encodeURIComponent(selected)+'">Launch slide show: '+selected+'</a>');
				saveState();
			} else {
				$('#result').empty();
				clearState();
			}			
		}
		
		function supportsLocalStorage() {
			return ('localStorage' in window) && window['localStorage'] !== null;
		}
		
		function saveState() {
			if (!supportsLocalStorage()) { 
				return false; 
			}
			
			localStorage["slides.resume"] = 'true';			
			localStorage["slides.selected"] = $('#songs').val();
			localStorage["slides.title"] = $('#title').val();
			localStorage["slides.subtitle"] = $('#subtitle').val();
		}
		
		function clearState() {
			if (!supportsLocalStorage()) { 
				return false; 
			}
			
			localStorage.removeItem("slides.resume");			
			localStorage.removeItem("slides.selected");			
			localStorage.removeItem("slides.subtitle");			
			localStorage.removeItem("slides.title");			
		}
		
		function continueManageSlides() {
			if (!supportsLocalStorage()) { return false; }
			
			var resume = (localStorage["slides.resume"] == "true");			
			if(!resume) {return false;}
			
			var title = localStorage['slides.title'];
			if(title) {
				$('#title').val(title);
			}
			
			var subtitle = localStorage['slides.subtitle'];
			if(subtitle) {
				$('#subtitle').val(subtitle);
			}
			
			var selected = localStorage['slides.selected'];
			if(selected) {
				var songs = selected.split(',');
				$.each(songs, function(intIndex, objValue) {
					$('#songs').children('[value='+objValue+']').attr('selected','selected');
				});
			}
			
			$('#result').empty().append('<a target="_blank" href="slide.php?title='+encodeURIComponent(title)+'&subtitle='+encodeURIComponent(subtitle)+'&songs='+encodeURIComponent(selected)+'">Launch slide show: '+selected+'</a>')
		}

	</script>

	<link rel="stylesheet" type="text/css" href="jquery.css">
	<link rel="stylesheet" type="text/css" href="example.css">
</head>
<body>
<label for="title">Title</label>
<input id="title" name="title" type="text" placeholder="Enter the title of the slideshow here" />

<label for="subtitle">Subtitle</label>
<input id="subtitle" name="subtitle" type="text" placeholder="Enter the subtitle of the slideshow here" />

<label for="songs">Songs</label>
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