<!DOCTYPE html>
<html>
<head>
	<?php
		require(__DIR__."/php/comiccms.php");

		ComicCMS::includeCSS('');

		// get page command and/or id
		$page="latest";
		if(isset($_GET['page']))
			$page=$_GET['page'];

		// get id from "adress bar"
		$pageid=-1;
		if(isset($_GET['id']))
		{
			$pageid=$_GET['id'];
			// reset page to show that one and not the latest one.
			if($page=="latest") $page="next";
		}

		// get real page id
		$pageid=ComicCMS::getRealPageID($page, $pageid);
	?>
</head>
<body>
<div id="wrapper">
	<div id="pagetitle">
		<img id="pagetitle_image" src="images/pagetitle.png" /><br />
	</div>

	<div id="pagecontent">
		<?php ComicCMS::showPage($pageid); ?>
	</div>
</div>

<!-- Scripts -->
<?php ComicCMS::includeJSScripts(''); ?>

<script>

$( document ).ready(function()
{
	document.onkeydown=ComicCMS.checkKeys;
	ComicCMS.initializeTouch();
	
	ComicCMS.adjustPageHeight();
	
	ComicCMS.showTitle();
});
</script>

</body>
</html>
