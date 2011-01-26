<?php

define('THEME_URI', get_stylesheet_directory_uri());
define('THEME_IMAGES', THEME_URI . '/assets/img');
define('THEME_CSS', THEME_URI . '/assets/css');
define('THEME_JS', THEME_URI . '/assets/js');
define('THEME_TEMPLATES', THEME_URI . '/assets/templates');
$GLOBALS['content_width'] = 900;

add_theme_support('automatic-feed-links');


require_once ( 'functions/theme-options.php' );
require_once ( 'functions/stimulus-slider.php' );  
          

/* Define Theme Defaults */
$options = get_option('stimulus_theme_options'); 
if($options['templatestyle'] == null)
	$options['templatestyle'] = 'green';     
if($options['typography'] == null)
	$options['typography'] = 'typography3';

function stimulusSlider() {   
	
	
 		$options = get_option('stimulus_theme_options');  
                
		if($options['sliderTimer'] != null)
			$rotateTimer = $options['sliderTimer'];
		else
			$rotateTimer = 5000;
	
   ?>    
          
	<script type="text/javascript" charset="utf-8">     
	$(document).ready(function() {  
		$('#slideshow').cycle({ fx: 'fade', pager: '#slide-nav', pause: 1, timeout: <?php echo $rotateTimer; ?>});	                      
	});
	</script>

<?php
	}    
	
	add_action('wp_head', 'stimulusSlider');
                            

//

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Homepage Widgets',
		'id' => 'homepage_widgets',
		'before_widget' => '<div class="widget group">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Sidebar 1',
		'id' => 'sidebar_1',
		'before_widget' => '<div class="widget group">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Sidebar 2',
		'id' => 'sidebar_2',
		'before_widget' => '<div class="widget group">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name'=> 'Footer Widgets',
		'id' => 'footer-widgets',
		'before_widget' => '<div class="widget group">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}


if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'stimulus_mainnav' => 'Stimulus Main Navigation',
		)
	);
};

add_theme_support( 'post-thumbnails' );

// Define Image Sizes
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post-thumb-threecol', 390, 200, true );
	add_image_size( 'post-thumb-onetwocol', 520, 200, true );
	/* Slider Size */ add_image_size( 'special', 940, 340, true );
}


if ( !is_admin() ) { // instruction to only load if it is not the admin area
   // register your script location, dependencies and version

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js');
	   wp_register_script('cycle',
       get_bloginfo('template_directory') . '/assets/js/cycle.min.js');
   wp_register_script('functions',
       get_bloginfo('template_directory') . '/assets/js/functions.js');    
	 wp_register_script('lightbox',
	     get_bloginfo('template_directory') . '/assets/js/lightbox_me.js');
 
   // enqueue the script
   wp_enqueue_script('jquery');
   wp_enqueue_script('functions');
   wp_enqueue_script('cycle');
	wp_enqueue_script('lightbox'); 

}


?>