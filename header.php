<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		
		<?php wp_head(); ?>
		<!--[if IE]>
    		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href='http://fonts.googleapis.com/css?family=Merriweather:400,900,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/print.css" type="text/css" media="print" />
	
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9059383-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

	
	</head>
<body <?php body_class(); ?>>
<div class="container">
	<header>
		<div id="banner" class="clearfix">
			<div class="brand">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			
			<!--<div class="search alignright">
				<?php get_search_form(); ?>
			</div>-->
		</div>
		<nav role="navigation">
			<?php 
			    wp_nav_menu( array(
			        'menu'       => 'header-menu',
			        'depth'      => 2,
			        'container'  => false,
			        'menu_class' => 'nav inline',
			        'fallback_cb' => 'wp_page_menu',
			        //Process nav menu using our custom nav walker
			        'walker' => new wp_bootstrap_navwalker())
			    );
			?>
		</nav><!-- /nav -->
	</header>
</div>
<div class="sep fork"></div>
<div id="content-container" class="container">
