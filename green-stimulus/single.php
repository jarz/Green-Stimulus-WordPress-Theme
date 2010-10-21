<?php get_header(); ?>

<div id="content" class="blog-entries group two-col">
	<div id="main-content" class="single-<?php the_ID(); ?>">
		<h1> <?php the_title(); ?> </h1>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	
			<div class="single-content group">				
	
				<?php if($options['numcols'] == 'three-col') { the_post_thumbnail('post-thumb-threecol'); } else { the_post_thumbnail('post-thumb-onetwocol'); } ?>
				
				<div <?php post_class('group') ?>><?php the_content(); ?></div>
				
				<?php edit_post_link( __( '[Edit This Post]'), '<span class="edit-link">', '</span>' ); ?>
				
				<?php wp_link_pages('before=<p class="link-pages group">&after=</p>&next_or_number=number&pagelink=Page %&link_before=<span>&link_after=</span>'); ?>

				<div class="post-meta">
					<p><strong>Categories:</strong> <?php the_category('&nbsp;'); ?> </p>
					<?php the_tags('<p><strong>Tags:</strong>&nbsp;','&nbsp;','</p>'); ?>
					<?php if($options['showDates'] == true) { ?>
					<p class="posted-on">
						Posted on <?php the_date(); ?> at <?php the_time(); ?>.
					</p>
					<?php } ?>
				</div>
			</div><!-- .single-content -->
		
			<div id="comments-area">
				<?php comments_template( '', true ) ?>
			</div>
			
			
			
		<?php endwhile; else : ?>
	
			<div class="single-content">
			
				<h2>Page Not Found</h2>
				
				<p>Looks like the page you're looking for isn't here anymore. Try using the search box below.</p>
				
				<?php get_search_form();  ?>
			
			</div> <!-- .single -->
	
		<?php endif; ?>
		
	
	</div><!-- #main-content -->

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>