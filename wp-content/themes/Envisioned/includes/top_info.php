<div id="category-name">
	<?php 
		$et_tagline = '';
		if( is_tag() ) {
			$et_page_title = __('Posts Tagged &quot;','Envisioned') . single_tag_title('',false) . '&quot;';
		} elseif (is_day()) {
			$et_page_title = __('Posts made in','Envisioned') . ' ' . get_the_time('F jS, Y');
		} elseif (is_month()) {
			$et_page_title = __('Posts made in','Envisioned') . ' ' . get_the_time('F, Y');
		} elseif (is_year()) {
			$et_page_title = __('Posts made in','Envisioned') . ' ' . get_the_time('Y');
		} elseif (is_search()) {
			$et_page_title = __('Search results for','Envisioned') . ' ' . get_search_query();
		} elseif (is_category()) {
			$et_page_title = single_cat_title('',false);
			$et_tagline = category_description();
		} elseif (is_author()) {
			global $wp_query;
			$curauth = $wp_query->get_queried_object();
			$et_page_title = __('Posts by ','Envisioned') . $curauth->nickname;
		} elseif ( is_single() || is_page() ) {
			$et_page_title = get_the_title();
			if ( is_page() ) $et_tagline = get_post_meta($post->ID,'Description',true) ? get_post_meta($post->ID,'Description',true) : '';
		}
	?>
	<h1 class="category-title"><?php echo $et_page_title; ?></h1>
</div> <!-- end #category-name -->