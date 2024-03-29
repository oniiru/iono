<div id="featured">
	<div class="container">
		<?php	
			$ids = array();
			$i=1;
						
			$featured_cat = get_option('envisioned_feat_cat');
			$featured_num = get_option('envisioned_featured_num');
			$width = 500;
			$height = 335;
			
			if (get_option('envisioned_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
			else {
				global $pages_number;
				
				if (get_option('envisioned_feat_pages') <> '') $featured_num = count(get_option('envisioned_feat_pages'));
				else $featured_num = $pages_number;
				
				query_posts(array
								('post_type' => 'page',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'post__in' => get_option('envisioned_feat_pages'),
								'showposts' => $featured_num)
							);
			}
			
			while (have_posts()) : the_post();
				$et_link = get_post_meta($post->ID,'Link',true) ? get_post_meta($post->ID,'Link',true) : get_permalink();
		?>
				<div class="slide<?php if ( $i == 1 ) echo ' active'; ?>">
					<?php
						$post_title = get_the_title();
						$thumbnail = get_thumbnail($width,$height,'thumb',$post_title,$post_title,true,'Featured');
						$thumb = $thumbnail["thumb"];
						
						print_thumbnail($thumb, $thumbnail["use_timthumb"], $post_title, $width, $height);
					?>
					<div class="description"><h2><?php truncate_title(68); ?></h2></div>
					
					<div class="additional">
						<a class="prevslide" href="#"><?php _e('Previous','Envisioned'); ?></a>
						<a class="nextslide" href="#"><?php _e('Next','Envisioned'); ?></a>
						<a class="featured-zoom" href="<?php if (get_post_meta($post->ID,'et_videolink',true)) echo get_post_meta($post->ID,'et_videolink',true); else echo $thumbnail["fullpath"]; ?>" rel="prettyPhoto[featured]" title="<?php the_title(); ?>"><?php _e('Zoom In','Envisioned'); ?></a>
						<a class="featured-more" href="<?php echo $et_link; ?>"><?php _e('Read More','Envisioned'); ?></a>
					</div> <!-- end .additional -->
				</div> <!-- end .slide -->
		<?php
				$ids[]= $post->ID; $i++;
			endwhile; wp_reset_query();	
		?>
	</div> <!-- end .container -->
	
	<div id="slider-left-overlay"></div>
	<div id="slider-right-overlay"></div>
</div> <!-- end #featured -->