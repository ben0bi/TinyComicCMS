<!DOCTYPE html>
<html>
<head>
	<?php
		require(__DIR__."/php/comiccms.php");
		ComicCMS::includeCSS('');
	?>
</head>
<body>
<div id="wrapper">
	<div id="pagetitle">
		<a href="index.php" style="border:0;"><img id="pagetitle_image" src="images/pagetitle.png" /></a>
	</div>

	<div id="pagecontent">
		<div class="title"><?php echo($word_title_archives); ?></div>
		<div id="archivecontent"> <!-- for AJAX rebuild of the archives -->
			<?php ComicCMS::showArchives('', 0); ?>
		</div>
	</div>
</div>
<?php ComicCMS::includeJSScripts(''); ?>
<br />

<div class="adminlinkdiv">
<a href="_admin/index.php" id="adminlink">Admin</a>
</div>

<script>
var adminOrigPos=-999;

$( document ).ready(function()
{	
	adminOrigPos=parseFloat($('#adminlink').position().top);
	console.log("Admin link original y position: "+adminOrigPos);
	ComicCMS.adjustPageHeight();
	
	$(window).resize(function() {location.reload();});
	
	$(document).scroll(function()
	{
		var st=$(document).scrollTop();
		st=st+adminOrigPos;
		$("#adminlink").css('top',st);
	});
});
</script>

</body>
</html>
