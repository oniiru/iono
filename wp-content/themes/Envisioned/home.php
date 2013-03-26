<?php get_header(); ?>

<?php if ( get_option('envisioned_blog_style') == 'false' ) { ?>
	<?php if ( get_option('envisioned_display_blurbs') == 'on' ){ ?>
		<div id="services">
			<div class="container clearfix">
				<?php for ($i=1; $i <= 3; $i++) { ?>
					<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('envisioned_home_page_'.$i)))); while (have_posts()) : the_post(); ?>
						<?php 
							global $more; $more = 0;
						?>
						<div class="service<?php if ( $i == 3 ) echo ' last'; ?>">
							<?php
								$et_service_image = get_post_meta($post->ID,'Icon',true) ? get_post_meta($post->ID,'Icon',true) : '';
								$et_service_link = get_post_meta($post->ID,'etlink',true) ? get_post_meta($post->ID,'etlink',true) : get_permalink();
							?>
							<?php if ($et_service_image <> '') { ?>
								<img src="<?php echo $et_service_image; ?>" alt="<?php the_title(); ?>" class="icon" />
							<?php } ?>
							<h3 class="title"><?php the_title(); ?></h3>
							<?php the_content(''); ?>
							
							<a href="<?php echo $et_service_link; ?>" class="readmore"><span><?php _e('Read More','Envisioned'); ?></span></a>
						</div> <!-- end .service -->
					<?php endwhile; wp_reset_query(); ?>
				<?php } ?>
			</div> <!-- end .container -->
		</div> <!-- end #services -->
	<?php } ?>

	<?php if ( get_option('envisioned_quote') == 'on' ) { ?>
		<div id="quote">
			<div id="quote-inner">
				<div class="container">
					<span id="quote-icon"></span>
					<p><?php echo get_option('envisioned_quote_text'); ?></p>
					<a href="<?php echo get_option('envisioned_quote_url'); ?>" class="additional-info"><span><?php _e('Additional Info','Envisioned'); ?></span></a>
				</div> <!-- end .container -->
			</div> <!-- end #quote-inner -->
		</div> <!-- end #quote -->
	<?php } ?>

	<?php if ( get_option('envisioned_display_media') == 'on' ){ ?>
		<div id="home-gallery">
			<div class="container clearfix">
				<?php 
					$args=array(
						'showposts' => get_option('envisioned_posts_media'),
						'category__not_in' => get_option('envisioned_exlcats_media')
					);
					query_posts($args);
					$media_current_post = 1;
				?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php 
						$width = 140;
						$height = 94;
						$titletext = get_the_title();
						$thumbnail = get_thumbnail($width,$height,'project-image',$titletext,$titletext,true,'Media');
						$thumb = $thumbnail["thumb"];
						$et_medialink = get_post_meta($post->ID,'et_medialink',true) ? get_post_meta($post->ID,'et_medialink',true) : '';
						$et_videolink = get_post_meta($post->ID,'et_videolink',true) ? get_post_meta($post->ID,'et_videolink',true) : '';
					?>
					<div class="project<?php if ( $media_current_post % 5 == 0 ) echo ' last'; ?>">
						<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'project-image'); ?>
						<span class="project-overlay"></span>
						<?php if ( $et_medialink <> '' ) { ?>
							<a href="<?php echo $et_medialink; ?>" class="zoom-icon">
						<?php } elseif ( $et_videolink <> '' ) { ?>
							<a href="<?php echo $et_videolink; ?>" rel="prettyPhoto[media]" class="et-video zoom-icon" title="<?php echo $titletext; ?>">
						<?php } else { ?>
							<a href="<?php echo $thumbnail["fullpath"]; ?>" class="zoom-icon" rel="prettyPhoto[media]" title="<?php echo $titletext; ?>">
						<?php } ?><?php _e('Zoom In','Envisioned'); ?>
							</a>
							<a href="<?php the_permalink(); ?>" class="more-icon"><?php _e('Read more','Envisioned'); ?></a>
					</div> 	<!-- end .project -->
				<?php $media_current_post++;
				endwhile; ?>
				<?php endif; wp_reset_query(); ?>				
			</div> <!-- end .container -->
		</div> <!-- end #home-gallery -->	
	<?php } ?>
<?php } else { ?>
	<div class="container">
		<?php #include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
		<div id="content-area" class="clearfix">	
			<div id="left-area">
				<?php 
					$args=array(
						'showposts'=>get_option('envisioned_homepage_posts'),
						'paged'=>$paged,
						'category__not_in' => get_option('envisioned_exlcats_recent'),
					);
					if (get_option('envisioned_duplicate') == 'false') $args['post__not_in'] = $ids;
					query_posts($args);
				?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
				<?php endwhile; ?>
					<div class="clear"></div>			
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
					else { ?>
						 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
					<?php } ?>
				<?php else : ?>
					<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
				<?php endif; wp_reset_query(); ?>
			</div> 	<!-- end #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- end #content-area -->	
	</div> <!-- end .container -->

<?php } ?>

<?php get_footer(); ?>