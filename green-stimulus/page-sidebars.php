<?php 
/* Template Name: With Sidebars - Include Widget for Menu Navigation */ 
?>

<?php get_header(); ?>

<div id="content" class="blog-entries group <?php $options = get_option('stimulus_theme_options'); echo $options['numcols']; ?>">
	<div id="main-content" class="single-<?php the_ID(); ?>">
		<h1> <?php the_title(); ?> </h1>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
			<div class="single-content">	
						<?php the_content(); ?>
						<?php edit_post_link( __( '[Edit This Page]'), '<span class="edit-link">', '</span>' ); ?>
						
			</div><!-- .single-content -->
		
		<?php endwhile; else : ?>
	
			<div class="single-content">
			
				<h2>Page Not Found</h2>
				
				<p>Looks like the page you're looking for isn't here anymore. Try using the search box below.</p>
				
				<?php include(TEMPLATEPATH.'/searchform.php'); ?>
			
			</div> <!-- .single -->
	
		<?php endif; ?>
	
	</div><!-- #main-content -->

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>