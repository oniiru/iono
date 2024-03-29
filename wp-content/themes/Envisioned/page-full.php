<?php 
/* 
Template Name: Full Width Page
*/
?>

<?php the_post(); ?>
<?php get_header(); ?>

<div class="container fullwidth">
	<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
	<div id="content-area" class="clearfix">	
		<div id="left-area">
			<div class="entry post clearfix">								
				<?php if (get_option('envisioned_page_thumbnails') == 'on') { ?>
					<?php 
						$thumb = '';
						$width = 213;
						$height = 213;
						$classtext = 'post-thumb';
						$titletext = get_the_title();
						$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
						$thumb = $thumbnail["thumb"];
					?>
					
					<?php if($thumb <> '') { ?>
						<div class="post-thumbnail">
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
							<span class="post-overlay"></span>
						</div> 	<!-- end .post-thumbnail -->
					<?php } ?>
				<?php } ?>
				
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Envisioned').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link(__('Edit this page','Envisioned')); ?>			
			</div> <!-- end .entry -->
						
			<?php if (get_option('envisioned_show_pagescomments') == 'on') comments_template('', true); ?>
		</div> 	<!-- end #left-area -->
		
	</div> <!-- end #content-area -->	
</div> <!-- end .container -->
		
<?php get_footer(); ?>