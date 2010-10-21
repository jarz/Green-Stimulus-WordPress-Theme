<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	
	<?php $options = get_option('stimulus_theme_options'); ?>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<link href="<?php echo THEME_CSS; ?>/globals.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php echo THEME_TEMPLATES; ?>/<?php if( $options['templatestyle'] != null ) { echo $options['templatestyle']; } else { echo 'green'; } ?>/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php echo THEME_CSS; ?>/<?php if( $options['typography'] != null ) { echo $options['typography']; } else { echo 'typography3'; } ?>.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php bloginfo('stylesheet_directory') ?>/style.css" rel="stylesheet" type="text/css" media="screen" />

	<!--[if IE 7]><link href="<?php echo THEME_CSS; ?>/ie8.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
	<!--[if IE 7]><link href="<?php echo THEME_CSS; ?>/ie7.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
	<!--[if lte IE 6]>
		<link href="<?php echo THEME_CSS; ?>/ie6.css" rel="stylesheet" type="text/css" media="screen" />
	<![endif]--> 
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if($options['customcss'] == true) { ?>  
	<link href="<?php echo THEME_URI; ?>/custom.css" rel="stylesheet" type="text/css" media="screen" />	
	<?php } ?>	

	
<?php

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
?>

</head>
<body <?php body_class(); ?>>

<div id="header" class="group">

	<div class="container group">
		
			<?php if ($options['logoaddress'] != null) { ?>
				<a href="<?php bloginfo('url'); ?>" class="logo"><img src = "<?php echo $options['logoaddress']; ?>" alt="<?php if($options['businessname'] != null) echo $options['businessname']; else echo bloginfo('name'); ?>" /></a>
			<?php } else { ?>
					<div class="logo-text">
						<?php if(is_home()) { ?>
						<h1 class = "logo">
							<a href="<?php bloginfo('url'); ?>" class="logo"><?php if($options['businessname'] != null) echo $options['businessname']; else echo bloginfo('name'); ?></a>
						</h1>
						<?php } else { ?>
						<div class="logo-text">

							<h1 class="logo">
								<a href="<?php bloginfo('url'); ?>" class="logo"><?php if($options['businessname'] != null) echo $options['businessname']; else echo bloginfo('name'); ?></a>
							</h1>
							
						</div>
						<?php } ?>
					</div>
			
			<?php } ?>
	
		
		<?php get_search_form(); ?>
		<!-- ! Main Nav -->
		<div id="main-nav">
			<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'stimulus_mainnav' ) ); ?>
		</div>

	</div><!-- .container -->
		
</div>


<div id="wrapper">

	<?php if(is_front_page()) { ?>	
	
	<div id="slideshow" class="group">
		
		
		<?php 
		$loop = new WP_Query(array('post_type' => 'slider' ));  
		
		  if(!$loop->have_posts())
			{   
				?>   
				<div class="slide group">
					<img src = "<?php bloginfo('template_directory'); ?>/assets/images/configure.png" />
				</div>
				<?php
				
			}

		while ( $loop->have_posts() ) : $loop->the_post(); 
			$rotatorLink = get_post_meta( get_the_ID(), 'stimulus_rotatorlink', true );     
			$rotatorNewWindow = get_post_meta( get_the_ID(), 'stimulus_new_window', true );   
			$rotatorMedia = get_post_meta( get_the_ID(), 'stimulus_mediacontent', true );
		?>
		
		
		<div class="slide group <?php if($rotatorMedia != null) echo 'video'; ?>" >
			<a href="<?php echo $rotatorLink; ?>" <?php if($rotatorNewWindow == 'on') echo 'target = "_blank"'; ?> class="slide-caption">
				<strong><?php the_title(); ?></strong>
				<span class="sub"><?php echo get_the_content(); ?></span>
			</a>                                  
			
			     <?php if( $rotatorMedia != null) { ?>
					<a href="#" class="play-video">Play Video &rarr;</a> 
				<?php } ?>
			
			  <a href="<?php echo $rotatorLink; ?>" <?php if($rotatorNewWindow == 'on') echo 'target = "_blank"'; ?>><?php the_post_thumbnail( 'special' ); ?></a>
			
			<?php if( $rotatorMedia != null) { ?>
				<div class="video-embed group"> 
					<?php echo $rotatorMedia; ?>
				 <br /> 
					<a class="close" href="#">Close</a> 
				</div>
			<?php } ?>
		</div>
				
		<?php endwhile; ?>
		
	
	</div>
	<div id="slide-nav"></div>	
	
	<div id="intro-text" class="group">
		<p><?php $options = get_option('stimulus_theme_options'); echo $options['introtextarea']; ?></p>
	</div>
	
	<div id="social" class="group">
		
		<?php if ( $options['twitter'] )
			{ ?>

			<p class="tweet">
				<?php 
				$feed = "http://search.twitter.com/search.atom?q=from:" . $options['twitter'] . "&rpp=1";

				function parse_feed($feed) {
				    $stepOne = explode("<content type=\"html\">", $feed);
				    $stepTwo = explode("</content>", $stepOne[1]);
				    $tweet = $stepTwo[0];
					$tweet = htmlspecialchars_decode($tweet,ENT_QUOTES);
				    return $tweet;
				}

				$twitterFeed = file_get_contents($feed);
				echo(parse_feed($twitterFeed));?>
			</p>

			<p class="tweet-meta">Updated by <a href="http://twitter.com/<?php echo $options['twitter']; ?>" target = "_blank">@<?php echo $options['twitter']; ?></a></p>
			
			<?php } else { ?>
				
				<p class="tweet-meta">Display your latest tweet by adding your Twitter username in the Stimulus Theme options panel.</p>
				
			<?php }  ?>
			
		<div class="social group">
			<strong>Follow us</strong>
					<?php if( $options['facebook'] != '' ): ?>
						<a href="http://facebook.com/<?php echo $options['facebook']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/facebook.png" alt="Facebook" /></a>
					<?php endif; ?>
					<?php if( $options['twitter'] != '' ): ?>
						<a href="http://twitter.com/<?php echo $options['twitter']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/twitter.png" alt="Twiter" /></a>
					<?php endif; ?>
					<?php if( $options['flickr'] != '' ): ?>
						<a href="http://flickr.com/<?php echo $options['flickr']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/flickr.png" alt="Flickr" /></a>
					<?php endif; ?>
					<?php if( $options['youtube'] != '' ): ?>
						<a href="http://youtube.com/<?php echo $options['youtube']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/youtube.png" alt="YouTube" /></a>
					<?php endif; ?>
						<a href="/rss" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/rss.png" alt="RSS" /></a>
		</div>
	</div>
	
	
	<div id="homepage-widgets" class="widget-area group">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Widgets')) : ?>
		<?php endif; ?>
	</div>

	<?php } ?>