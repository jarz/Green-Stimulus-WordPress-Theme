<?php
	add_action('init', 'create_slider');
	function create_slider() {
    	$slider_args = array(
        	'label' => __('Turnkey Slider'),
			
        	'singular_label' => __('slider'),
        	'public' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
				'menu_icon' => get_stylesheet_directory_uri() . '/assets/images/slider.png',
        	'supports' => array('thumbnail', 'title', 'editor', 'page-attributes')
        );
    	register_post_type('slider',$slider_args);
	}	

	add_action("admin_init", "add_slider");
	add_action('save_post', 'update_rotatorbutton');
	add_action('save_post', 'update_rotatorlink');
	add_action('save_post', 'update_rotatormediacontent');
	add_action('save_post', 'update_rotator_new_window');
	
	function add_slider(){
		add_meta_box("rotatorButton_details", "Add a text button ", "rotatorButton_options", "slider", "normal", "low");
		add_meta_box("rotatorlink_details", "Add a link to this rotator slide ", "rotatorlink_options", "slider", "normal", "low");
		add_meta_box("rotatormediacontent_details", "Optional: Add a video to play when this rotator slide is clicked", "rotatormediacontent_options", "slider", "normal", "low");
	}
	
	function rotatorButton_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$turnkey_rotatorbutton = $custom["turnkey_rotatorbutton"][0];
	?>
	<div id="portfolio-options">
		<input name="turnkey_rotatorbutton" size="55" value="<?php echo $turnkey_rotatorbutton; ?>" /> <br />
        <p><em>Ex: Learn more</em></p>
	</div><!--end portfolio-options-->   
	<?php
	}
	
	function rotatorlink_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$turnkey_rotatorlink = $custom["turnkey_rotatorlink"][0];
		$turnkey_new_window = $custom["turnkey_new_window"][0];  
	?>
	<div id="portfolio-options">
		<input name="turnkey_rotatorlink" size="100" value="<?php echo $turnkey_rotatorlink; ?>" /> <input type = "checkbox" <?php if($turnkey_new_window == 'on') echo 'checked'; ?> name = "turnkey_new_window"> Open link in new window  <br />
        <p><em>Ex: http://www.domain.com/pagename or /about. If you are linking to an external site, you must include http://</em></p>
	</div><!--end portfolio-options-->   
	<?php
	}
	
	function rotatormediacontent_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$turnkey_mediacontent = $custom["turnkey_mediacontent"][0];
	?>
	<div id="portfolio-options">
		<textarea name="turnkey_mediacontent" style = "width: 100%; height: 100px"><?php echo $turnkey_mediacontent; ?></textarea> <br />
        <p><em>Paste an embed code from YouTube, Vimeo, or video player of your choice</em></p>
	</div><!--end portfolio-options-->   
	<?php
	}
	     
	function update_rotator_new_window(){
		global $post;
		update_post_meta($post->ID, "turnkey_new_window", $_POST["turnkey_new_window"]);
	}
	
	function update_rotatorbutton(){
		global $post;
		update_post_meta($post->ID, "turnkey_rotatorbutton", $_POST["turnkey_rotatorbutton"]);
	}
	
	function update_rotatorlink(){
		global $post;
		update_post_meta($post->ID, "turnkey_rotatorlink", $_POST["turnkey_rotatorlink"]);
	}
	
	function update_rotatormediacontent(){
		global $post;
		update_post_meta($post->ID, "turnkey_mediacontent", $_POST["turnkey_mediacontent"]);
	}
?>