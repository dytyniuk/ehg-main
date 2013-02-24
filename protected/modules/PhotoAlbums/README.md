PhotoAlbums
===========

PhotoAlbums

- table_name and entity_id field - for bunding album to different tables
- Using imgAreaSelect

1. Move jscript to root of your project

1. Move css to root of your project


2. from liight box images -> to images

3. Add to main config
		
		'modules'=>array(
			...
			'PhotoAlbums',
			...
		),


4. Add to main config 

		'import'=>array(
			...
			'application.modules.PhotoAlbums.models.*',
			'application.modules.PhotoAlbums.components.*',
		),		


5. Load the files in the <head> section of your HTML document.

		<head>
		  ...
		  <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
		  <script type="text/javascript" src="jscripts/jquery.min.js"></script>
		  <script type="text/javascript" src="jscripts/jquery.imgareaselect.pack.js"></script>
		  ...
		</head>

Then, to enable selection on an image, wrap it in a jQuery object and call the imgAreaSelect() method:

		<script type="text/javascript">
		$(document).ready(function () {
		    $('img#photo').imgAreaSelect({
		        handles: true,
		        onSelectEnd: someFunction
		    });
		});
		</script>

ToDO
- add drag&drop loader
- translate into english 
- add access check 
