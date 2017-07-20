<?php
	// Start session.
	session_start();
	
	// Set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if ( ! isset($_SESSION['formMessage'])) {
		$_SESSION['formMessage'] = 'Fill in the form below to send me an email.';	
	}
	
	if ( ! isset($_SESSION['formFooter'])) {
		$_SESSION['formFooter'] = ' ';
	}
	
	if ( ! isset($_SESSION['form'])) {
		$_SESSION['form'] = array();
	}
	
	function check($field, $type = '', $value = '') {
		$string = "";
		if (isset($_SESSION['form'][$field])) {
			switch($type) {
				case 'checkbox':
					$string = 'checked="checked"';
					break;
				case 'radio':
					if($_SESSION['form'][$field] === $value) {
						$string = 'checked="checked"';
					}
					break;
				case 'select':
					if($_SESSION['form'][$field] === $value) {
						$string = 'selected="selected"';
					}
					break;
				default:
					$string = $_SESSION['form'][$field];
			}
		}
		return $string;
	}
?><!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">

<head>

	<meta charset="utf-8" />

	<!-- Head content such as meta tags and encoding options, etc -->
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="robots" content="index, follow" />
		<meta name="generator" content="RapidWeaver" />
		

	<!-- User defined head content -->
	

	<!-- Meta tags -->
	<!-- These in particular setup the viewport for mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <!-- Browser title -->
	<title>Contact Me | 苹果开发者 yutianjian 的个人网站</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" media="all" href="../rw_common/themes/Voyager/consolidated.css?rwcache=522227416" />
		

<link href='https://fonts.googleapis.com/css?family=Open Sans:400,700' rel='stylesheet' type='text/css'>

  <!-- Main Theme Stylesheet -->
	

  <!-- Loads Font Awesome v4.3.0 CSS from CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<!-- RapidWeaver Color Picker Stylesheet -->
	

  <!-- Theme specific media queries -->
	<!-- <link rel="stylesheet" href="%pathto(css/media_queries.css)%" /> -->

	<!-- User defined styles -->
	

	<!-- Plugin injected code -->
	

</head>

<body>


	<!-- Navigation in Overlay -->
	<div class="navigation_overlay">
		<div class="navigation_inner">

			<div id="navigation_close_button"><i class="fa fa-close fa-2x"></i></div>

			<div class="navigation_alignment">
				<div class="container">
							<div class="navigation_overlay_site_logo"></div>
							<h1 class="navigation_overlay_site_title">苹果开发者 yutianjian 的个人网站</h1>
							<div id="social_badges"></div>
							<!-- <h2 class="navigation_overlay_site_slogan">心似白云常自在，意如流水任东西</h2> -->
							<div id="main_navigation">
								<ul><li><a href="../" rel="">Home</a></li><li><a href="./" rel="" id="current">Contact Me</a></li><li><a href="../markdown/" rel="">About</a></li></ul>
							</div>
				</div> <!-- container -->
			</div> <!-- main_navigation -->
		</div> <!-- navigation inner -->
	</div> <!-- navigation_overlay -->

	<div id="scroll_up_destination"></div>

	<div class="blur_wrapper">

		<!-- Path Theme -->

		<!-- Banner, Banner Overlay and Banner Content -->
		<div id="banner">
			<!-- Branding // Site Title, Logo and Navigation -->
			<div id="sticky_container">
				<div class="navigation_bar container">
					<div class="site_logo"></div> <h1 class="site_title">苹果开发者 yutianjian 的个人网站</h1>
					<div id="navigation_toggle"><i class="fa fa-bars"></i></div>
				</div>
			</div>

			<div id="inner_banner">
				<!-- Site Slogan -->
				<div id="banner_content">
					<h2 id="slogan">心似白云常自在，意如流水任东西</h2>
				</div>
			</div>

			<!-- Breadcrumb Trail -->
			<div class="banner_breadcrumb">
				<div class="container width_adjustment">
					
				</div>
			</div>

		</div>

		<div id="content_container" class="container width_adjustment">
			<div class="row">

			  <div id="content">
					
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form class="rw-contact-form" action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>

					<div class="clearer"></div>
				</div>

			  <aside id="sidebar">
					<h3 id="sidebar_title">yutianjian</h3>
					<span style="font:12px Helvetica, Arial, Verdana, sans-serif; ">Feel free to mail me: yu_tian_jian@sina.cn</span>

					<div id="archives">
						
					</div>
				</aside>

			</div>
		</div>

		<footer>
			<div class="rapidweaver_footer container width_adjustment">
				&copy; 2017 yutianjian <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":yu";var _rwObsfuscatedHref3 = "_ti";var _rwObsfuscatedHref4 = "an_";var _rwObsfuscatedHref5 = "jia";var _rwObsfuscatedHref6 = "n@s";var _rwObsfuscatedHref7 = "ina";var _rwObsfuscatedHref8 = ".cn";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8; document.getElementById("rw_email_contact").href = _rwObsfuscatedHref;</script>
			</div>
		</footer>

	</div>

	<!-- jQuery 1.8 is included in the theme internally -->
  <script src="../rw_common/themes/Voyager/js/jquery.min.js?rwcache=522227416"></script>

	<!-- Base RapidWeaver javascript -->
	<script async type="text/javascript" src="../rw_common/themes/Voyager/javascript.js?rwcache=522227416"></script>

  <!-- Elixir theme specific javascript, along with jQuery Easing and a few other elements -->
  <script src="../rw_common/themes/Voyager/js/elixir.js?rwcache=522227416"></script>

	<!-- Style variations -->
	<script type="text/javascript" src="../rw_common/themes/Voyager/js/sidebar/sidebar_right.js?rwcache=522227416"></script>
		

	<!-- User defined javascript -->
	

</body>

</html>
