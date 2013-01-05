<html>
<head>

        <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
      <script type="text/javascript">
$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {

			$('ul', this).stop().slideDown(150);

		}, 
		function () {

			$('ul', this).stop().slideUp(150);
		}
	);
	
});
	</script>


	<style type="text/css">

	#nav {

                width: 1200px ;
                margin-left: auto ;
                margin-right: auto
		list-style:none;
	}	

		#nav li {
			float:left; 

			width:174px;
			position:relative;
			background-color:#464C4C;
			z-index:500;
			margin:0 1px;
		}

		#nav li a {
			display:block; 
			padding:8px 5px 0 5px;
			font-weight:100;
			height:23px; 
			text-decoration:none; 
			color:#fff; 
			text-align:center; 
			color:#AFC7C7;
		}

		#nav li a:hover {
			color:#AFB3C7;
		}
	

		#nav ul {
			position:absolute; 
			left:0; 
			display:none; 
			margin:0 0 0 -1px; 
			padding:0; 
			list-style:none;
		}
		
		#nav ul li {
			width:200px;
			float:left; 

		}
		

		#nav ul a {
			display:block;  
			height:15px;
			padding: 8px 5px;
			color:#AFC7C7;
		}
		
		#nav ul a:hover {
			text-decoration:underline;	
		}



	</style>

</head>
<body bgcolor = "#302226">
<div align="justify"><font color="white">ID:</font><input type="text" id="TEXTBOX_ID"><font color="white">Password:</font><input type="text" id="TEXTBOX_ID"></div>
<div id="banner"><center><img name="banner" src="Banner.png" width="1150" height="270" border="0" id="banner2" alt="" /></center></div>

<ul id="nav">
	<li><a href="#">Home</a></li>
	<li><a href="#" class="selected">Events</a></li>
	<li><a href="#">Membership</a>
	<ul>
		<li><a href="#">Membership Procedure</a></li>
		<li><a href="#">Affiliation</a></li>

	</ul>	<div class="clear"></div>
	</li>
	<li><a href="#">Loan</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">About Us</a></li>

</ul>


</body>
<html>
