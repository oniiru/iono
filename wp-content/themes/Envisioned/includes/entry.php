<div class="post entry clearfix">
	<?php 
		$thumb = '';
		$width = 212;
		$height = 213;
		$classtext = 'post-thumb';
		$titletext = get_the_title();
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
		$thumb = $thumbnail["thumb"];
	?>
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
	
	<?php if($thumb <> '' && get_option('envisioned_thumbnails_index') == 'on') { ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
				<span class="post-overlay"></span>
			</a>	
		</div> 	<!-- end .post-thumbnail -->
	<?php } ?>
	<?php if (get_option('envisioned_blog_style') == 'on') the_content(''); else { ?>
		<p><?php truncate_post(600); ?></p>
	<?php }; ?>
	<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('Read More','Envisioned'); ?></span></a>
</div> 	<!-- end .post-->