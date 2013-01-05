<!DOCTYPE html>
<html lang="en">
	<head>	
		<link rel="stylesheet" href="css/style.css" />
		<style type="text/css"></style>
		<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function () {	
			$('ul#nav>li').hover(
				function () {
					console.log($('ul', this).html());
					$('ul', this).slideDown(150);
				}, 
				function () {
					$('ul', this).slideUp(150);
					console.log($('ul', this).html());
				}
			);
		});
	</script>
</head>