<?php 
global $post;
$theme_options = cozycorner_get_theme_options();
$blog_thumb_size = $theme_options['ts_blog_thumbnail_size'];
$readmore_icon = $theme_options['ts_blog_read_more_icon'];

$cat_list = get_the_category($post->ID);
$cat_ids = array();
foreach( $cat_list as $cat ){
	$cat_ids[] = $cat->term_id;
}
$cat_ids = implode(',', $cat_ids);
$is_slider = true;
$limit = 5;

$extra_class = array();
$extra_class[] = 'ts-blogs ts-shortcode related-posts columns-3';
$extra_class[] = $theme_options['ts_blog_item_layout'];
$extra_class[] = 'size-' . $theme_options['ts_blog_thumbnail_size'];

if( $readmore_icon ){
	$extra_class[] = 'readmore-icon';
}

if( $theme_options['ts_blog_item_layout'] == 'layout-list' && $theme_options['ts_blog_thumbnail_size'] == 'cozycorner_blog_thumb_small' && $readmore_icon ) {
	$is_slider = false;
	$limit = 3;
}else{
	$extra_class[] = 'ts-slider';
}

if( strlen($cat_ids) > 0 ){
	$args = array(
		'post_type' => $post->post_type
		,'cat' => $cat_ids
		,'post__not_in' => array($post->ID)
		,'posts_per_page'	=> $limit
	);
}
else{
	$args = array(
		'post_type' => $post->post_type
		,'post__not_in' => array($post->ID)
		,'posts_per_page'	=> $limit
	);
}

/* Remove the quote post format */
$args['tax_query'] = array(
	array(
		'taxonomy'	=> 'post_format'
		,'field'	=> 'slug'
		,'terms'    => array( 'post-format-quote' )
		,'operator'	=> 'NOT IN'
	)
);

$related_posts = new WP_Query($args);
	
if( $related_posts->have_posts() ){	
	if( isset($related_posts->post_count) && $related_posts->post_count <= 1 ){
		$is_slider = false;
	}
?>
	<div class="<?php echo esc_attr(implode(' ', $extra_class)); ?> <?php echo esc_attr($is_slider?'loading':''); ?>">
		<header class="theme-title">
			<h3 class="heading-title"><?php esc_html_e('Related blog post', 'cozycorner'); ?></h3>
		</header>
		<div class="content-wrapper">
			<div class="blogs items">
				<?php 
				while( $related_posts->have_posts() ): $related_posts->the_post();
				$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
				if( $is_slider && $post_format == 'gallery' ){ /* Remove Slider in Slider */
					$post_format = false;
				}
				$show_thumbnail = in_array($post_format, array('gallery', 'standard', 'video', 'audio', 'quote', false));
				?>
				<article class="item <?php echo esc_attr($post_format); ?> <?php echo has_post_thumbnail()?'has-post-thumbnail':'';?>">
					<div class="article-content">
						<?php if( $show_thumbnail ): ?>
						<div class="thumbnail-content">
						
							<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){ ?>
								<a class="thumbnail <?php echo esc_attr($post_format); ?> <?php echo ('gallery' == $post_format)?'loading':''; ?>" href="<?php echo ('gallery' == $post_format)?'javascript: void(0)':esc_url(get_permalink()) ?>">
									<figure>
									<?php 
									
									if( $post_format == 'gallery' ){
										$gallery = get_post_meta($post->ID, 'ts_gallery', true);
										$gallery_ids = explode(',', $gallery);
										if( is_array($gallery_ids) && has_post_thumbnail() ){
											array_unshift($gallery_ids, get_post_thumbnail_id());
										}
										foreach( $gallery_ids as $gallery_id ){
											echo wp_get_attachment_image( $gallery_id, $blog_thumb_size );
										}
										if( empty($gallery_ids) ){
											$show_thumbnail = false;
										}
									}
									
									if( $post_format === false || $post_format == 'standard' ){
										if( has_post_thumbnail() ){
											the_post_thumbnail($blog_thumb_size); 
										}
										else{
											$show_thumbnail = false;
										}
									}
											
									?>
									</figure>
								</a>
							<?php 
							}
							
							if( $post_format == 'video' ){
								$video_url = get_post_meta($post->ID, 'ts_video_url', true);
								if( $video_url ){
									echo do_shortcode('[ts_video src="'.$video_url.'"]');
								}
								else{
									$show_thumbnail = false;
								}
							}
							
							if( $post_format == 'audio' ){
								$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
								if( strlen($audio_url) > 4 ){
									$file_format = substr($audio_url, -3, 3);
									if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
										echo do_shortcode('[audio '.$file_format.'="'.$audio_url.'"]');
									}
									else{
										echo do_shortcode('[ts_soundcloud url="'.$audio_url.'" width="100%" height="122"]');
									}
								}
								else{
									$show_thumbnail = false;
								}
							}
							?>
						</div>
						<?php endif; ?>
						
						<div class="entry-content">
							<?php if( $theme_options['ts_blog_date'] || $theme_options['ts_blog_author'] || $theme_options['ts_blog_comment'] || $theme_options['ts_blog_categories'] ): ?>
								<div class="entry-meta-top">
									
									<?php if( $theme_options['ts_blog_date'] ) : ?>
										<span class="date-time"><?php echo get_the_time( get_option('date_format') ); ?></span>
									<?php endif; ?>
									
									<?php if( $theme_options['ts_blog_author'] ):?>
										<span class="vcard author"><?php the_author_posts_link(); ?></span>
									<?php endif; ?>
								
									<?php if( $theme_options['ts_blog_comment'] ): ?>
									<span class="comment-count">
										<?php
										$comment_count = cozycorner_get_post_comment_count();
										echo sprintf( _n('%d comment', '%d comments', $comment_count, 'cozycorner'), $comment_count );
										?>
									</span>
									<?php endif; ?>
									
									<?php if( $theme_options['ts_blog_categories'] ):?>
									<span class="cats-link">
										<?php echo get_the_category_list(', '); ?>
									</span>
									<?php endif; ?>
									
								</div>
							<?php endif; ?>
							<header>
								<h4 class="heading-title entry-title">
									<a class="post-title" href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
								</h4>
							</header>
							
							<?php if( $theme_options['ts_blog_excerpt'] ): ?>
								<!-- Blog Excerpt -->
								<?php
									$max_words = (int)$theme_options['ts_blog_excerpt_max_words']?(int)$theme_options['ts_blog_excerpt_max_words']:140;
									$strip_tags = $theme_options['ts_blog_excerpt_strip_tags']?true:false;
								?>
								<div class="entry-summary">
									<div class="short-content">
									<?php
										if( $max_words != '-1' ){
											cozycorner_the_excerpt_max_words($max_words, $post, $strip_tags, '', true);
										}
										else if( !empty($post->post_excerpt) ){
											the_excerpt();
										}
										else{
											the_content();
										}
									?>
									</div>
									<?php 
									if( $post_format === false || $post_format == 'standard' ){
										wp_link_pages();
									}
									?>
								</div>
							<?php endif; ?>
							
							<?php if( $theme_options['ts_blog_read_more'] && !$readmore_icon ): ?>
								<!-- Blog Read More Button -->
								<div class="readmore">
									<a class="button button-readmore" href="<?php the_permalink(); ?>">
										<span><?php esc_html_e('Read more', 'cozycorner'); ?></span>
										<i class="icon-next"></i>
									</a>
								</div>
							<?php endif; ?>
						</div>
						
						<?php if( $theme_options['ts_blog_read_more'] && $readmore_icon ): ?>
							<!-- Blog Read More Button -->
							<div class="readmore">
								<a class="button button-readmore" href="<?php the_permalink(); ?>">
									<span><?php esc_html_e('Read more', 'cozycorner'); ?></span>
									<i class="icon-next"></i>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	
<?php 
}
wp_reset_postdata();
?>