	<div id="footer" class="group">
		<div class="copyright">
			<strong>&copy; <?php echo date("Y"); ?> <?php $options = get_option('stimulus_theme_options');echo $options['businessname']; ?></strong><br />
			<?php $options = get_option('stimulus_theme_options');echo $options['addressline1']; ?><br />
			<?php $options = get_option('stimulus_theme_options');echo $options['addressline2']; ?><br />
			<?php $options = get_option('stimulus_theme_options');echo $options['phonenumber']; ?>
		</div>
		<div id="footer-widgets" class="widget-area group">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets')) : ?>
			<?php endif; ?>
		</div>

	</div>
	<?php if(is_home()) { ?>
	<span class="powered-by-salesforce">
		This theme is brought to you by <a href="http://www.salesforce.com" target="_blank">Salesforce CRM</a>.
	</span>
	<?php } else { ?>    
   <span class="powered-by-salesforce">
		<?php bloginfo('description'); ?>
	</span>
	<?php } ?>
	<span class="social-footer group">
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
				<?php if( $options['foursquare'] != '' ): ?>
				<a href="http://foursquare.com/<?php echo $options['foursquare']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/foursquare.png" alt="Foursquare" /></a>
				<?php endif; ?>
				<?php if( $options['youtube'] != '' ): ?>
					<a href="http://youtube.com/<?php echo $options['youtube']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/youtube.png" alt="YouTube" /></a>
				<?php endif; ?>
					<a href="<?php bloginfo_rss('rss2_url') ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/rss.png" alt="RSS" /></a>
	</span>
</div> <!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>