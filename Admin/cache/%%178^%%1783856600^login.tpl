a:4:{s:8:"template";a:1:{s:9:"login.tpl";b:1;}s:9:"timestamp";i:1391924255;s:7:"expires";i:1391924255;s:13:"cache_serials";a:0:{}}
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Make IE8 behave like IE7, necessary for charts -->
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		
		<title>:: Mobile Radio ::</title>
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/custom-theme/jquery-ui-1.8.1.custom.css" />
		
		<!-- IE specific CSS stylesheet -->
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
		<![endif]-->
		
		<!-- This stylesheet contains advanced CSS3 features that do not validate yet -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/css3.css" />
		
		<!-- JavaScript -->
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/excanvas.js"></script>
		<script type="text/javascript" src="js/jquery.visualize.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>

	<body>
		<div id="bokeh"><div id="container">
			
			<div id="header">
				<h1 id="logo">Sons Of Anarchy</h1>
			</div><!-- end #header -->
			
			<div id="content">
			
				<h2><img src="images/icons/user_32.png" alt="Login" />Login</h2>
			
				<div id="login">
					
					<div class="content-box">
						<div class="content-box-header">
							<h3>Login</h3>
						</div>
					
						<div class="content-box-content">
						
							<div class="notification information">Just click login to go forward.</div>
						
							<form method="post" action="login.php">
								<p>
									<label>Username</label>
									<input id="username" name="username" type="text" />
								</p>
						
								<p>
									<label>Password</label>
									<input id="password" name="password" type="password" />
								</p>
						
								<input type="submit" value="Login" />
							</form>
						</div>
					</div><!-- end .content-box -->
				</div><!-- end #login -->
											
			</div><!-- end #content -->
			
			<div id="push"></div><!-- push footer down -->
			
		</div></div><!-- end #container -->
		
		<!--<div id="footer">
			Sons Of Anarchy | Designed by <a href="http://isoftsolutions.in">iSoft Solutions</a> 2010
		</div>--><!-- end #footer and #bokeh -->
		
	</body>
</html>