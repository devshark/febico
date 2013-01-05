<!DOCTYPE html>
<html lang="en">
	<head>	
		<link rel="stylesheet" href="css/style.css" />
		<style type="text/css"></style>
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function () {	
			$('ul#nav li').hover(
				function () {
					$('ul', this).stop().slideDown(150);
				}, 
				function () {
					$('ul', this).stop().slideUp(150);
				}
			);
		});
	</script>
</head>