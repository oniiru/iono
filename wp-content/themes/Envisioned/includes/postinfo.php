<?php if (!is_single() && get_option('envisioned_postinfo1') <> '') { ?>
	<p class="meta-info"><?php _e('Posted','Envisioned'); ?> <?php if (in_array('author', get_option('envisioned_postinfo1'))) { ?> <?php _e('by','Envisioned'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('envisioned_postinfo1'))) { ?> <?php _e('on','Envisioned'); ?> <?php the_time(get_option('envisioned_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('envisioned_postinfo1'))) { ?> <?php _e('in','Envisioned'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('envisioned_postinfo1'))) { ?> | <?php comments_popup_link(__('0 comments','Envisioned'), __('1 comment','Envisioned'), '% '.__('comments','Envisioned')); ?><?php }; ?></p>
<?php } elseif (is_single() && get_option('envisioned_postinfo2') <> '') { ?>
	<p class="meta-info">
		<?php _e('Posted','Envisioned'); ?> <?php if (in_array('author', get_option('envisioned_postinfo2'))) { ?> <?php _e('by','Envisioned'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('envisioned_postinfo2'))) { ?> <?php _e('on','Envisioned'); ?> <?php the_time(get_option('envisioned_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('envisioned_postinfo2'))) { ?> <?php _e('in','Envisioned'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('envisioned_postinfo2'))) { ?> | <?php comments_popup_link(__('0 comments','Envisioned'), __('1 comment','Envisioned'), '% '.__('comments','Envisioned')); ?><?php }; ?>
	</p>
<?php }; ?>