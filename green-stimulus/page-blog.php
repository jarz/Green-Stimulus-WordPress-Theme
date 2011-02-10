<?php
/*
Template Name: Blog Template 2
*/
?>

<?php get_header(); ?>
<!-- Start Blog -->

<?php get_header(); $options = get_option('stimulus_theme_options'); ?>


<div id="content" class="group <?php echo $options['numcols']; ?>">
	<div id="main-content" class="single-<?php the_ID(); ?>">
		<h1> <?php the_title(); ?> </h1>					
			  
			   	<!-- Start Post -->		
					<?php
				$temp = $wp_query;
				$limit = get_option('posts_per_page');
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=' . $limit . '&paged=' . $paged);
				$wp_query->is_home = false;
				?>

				<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

				 	  <div class="post group" id="post-<?php the_ID(); ?>">
								<?php if($options['showDates'] == true) { ?>
								<span class="date"><?php the_time('M'); ?><strong><?php the_time('d'); ?></strong></span>
								<?php } ?>
								<div class="post-content">	
									<div class="post-content-container">				
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="post-text">
										<?php if($options['numcols'] != 'three-col') { ?>
											<?php the_post_thumbnail('post-thumb-threecol'); ?>
										<?php } else { ?>
											<?php the_post_thumbnail('post-thumb-onetwocol'); ?>
										<?php } 
										the_excerpt(); ?>
										<?php echo get_the_content(); ?>
										</div><!-- .post-text -->	
									</div><!-- .post-content-container -->	
									<div class="post-meta group">
										<p class="author-cat">
											<strong class="author">Posted by <?php the_author_link(); ?></strong> in <?php the_category(', '); ?>
										</p>
										<p class="comments">
											<a href="<?php comments_link(); ?>"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a>
										</p>
										<p class="keep-reading">
											<a href="<?php the_permalink(); ?>" class="btn">Keep Reading &rarr;</a>
										</p>
									</div><!-- .post-meta -->
								</div><!-- .post-content -->
							</div><!-- .post -->


					<?php endwhile; ?>
					<div id="blog-nav" class="group">
						<span class="prev btn"><?php next_posts_link('&larr; &nbsp; Previous') ?></span> 
						<span class="next btn"><?php next_posts_link('Next &nbsp; &rarr;') ?></span>
					</div>

					<?php endif; ?> 	  
		
		         
        						</div><!-- #main-content -->
                                 
								<?php get_sidebar(); ?>

					</div>
 

<!-- End Blog -->
<?php get_footer(); ?>