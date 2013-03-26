<?php function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	    <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="avatar-container">
				<div class="avatar-box">
					<?php echo get_avatar($comment,$size='56'); ?>
					<span class="avatar-overlay"></span>
				</div> <!-- end .avatar-box -->
				<span class="comment-date"><?php comment_date( get_option( 'envisioned_comment_date_format' ) ); ?></span>
			</div> <!-- end .avatar-container -->
			
			<div class="comment-top">
				<div class="comment-bottom">
					<div class="comment-container">
						<div class="comment-wrap clearfix">
							<div class="comment-meta commentmetadata"><?php printf('<span class="fn">%s</span> says:', get_comment_author_link()) ?> <?php edit_comment_link(__('(Edit)','Envisioned'),'  ','') ?></div>
							
							<?php if ($comment->comment_approved == '0') : ?>
								<em class="moderation"><?php _e('Your comment is awaiting moderation.','Envisioned') ?></em>
								<br />
							<?php endif; ?>
							
							<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
							<div class="reply-container"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','Envisioned'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
						</div> <!-- end .comment-wrap-->
					</div> <!-- end .comment-container-->
				</div> <!-- end .comment-bottom-->
			</div> <!-- end .comment-top-->
			<div class="comment-arrow"></div>
		</div> <!-- end .comment-body-->	
<?php } ?>
<?php function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php } ?>
<?php //modify the comment counts to only reflect the number of comments minus pings
if( phpversion() >= '4.4' ) add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments('post_id=' . $id);
			$comments_by_type = &separate_comments($get_comments);
			return count($comments_by_type['comment']);	
		} else {
            return $count;
        }
}
?>