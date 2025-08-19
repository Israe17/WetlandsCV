<?php 
get_header();

global $post;
setup_postdata($post);

$theme_options = cozycorner_get_theme_options();

$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */

$show_blog_thumbnail = $theme_options['ts_blog_details_thumbnail'];
if( ( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ) && !has_post_thumbnail() ){
	$show_blog_thumbnail = 0;
}

$blog_thumb_size = 'full';

$extra_classes = array();

$page_column_class = cozycorner_page_layout_columns_class($theme_options['ts_blog_details_layout'], $theme_options['ts_blog_details_left_sidebar'], $theme_options['ts_blog_details_right_sidebar']);

$show_breadcrumb = apply_filters('cozycorner_show_breadcrumb_on_single_post', true);
$show_page_title = false;

cozycorner_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
if( $show_breadcrumb || $show_page_title ){
	$extra_classes[] = 'show_breadcrumb_'.$theme_options['ts_breadcrumb_layout'];
}

if( $theme_options['ts_blog_details_thumbnail_pos'] && $theme_options['ts_blog_details_thumbnail_pos'] == 'right' ){
	$extra_classes[] = 'thumbnail-right';
}
?>
<div id="content" class="page-container container-post <?php echo esc_attr(implode(' ', $extra_classes)) ?> <?php echo esc_attr($page_column_class['main_class']); ?>">
	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<div id="left-sidebar" class="ts-sidebar">
			<aside>
				<?php dynamic_sidebar( $theme_options['ts_blog_details_left_sidebar'] ); ?>
			</aside>
		</div>
	<?php endif; ?>	
	<!-- end left sidebar -->

	<!-- main-content -->
	<div id="main-content">		
		<article class="single single-post <?php echo esc_attr($post_format); ?> <?php echo !$show_blog_thumbnail?'no-featured-image':''; ?>">
			<div class="post-content-wrapper">
				<?php if( $show_blog_thumbnail ): ?>
					<div class="entry-format">
						<!-- Blog Thumbnail -->
						<?php if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){ ?>
							<figure class="<?php echo ('gallery' == $post_format)?'gallery loading items thumbnail':'thumbnail' ?>">
								<?php 
								
								if( $post_format == 'gallery' ){
									$gallery = get_post_meta($post->ID, 'ts_gallery', true);
									$gallery_ids = explode(',', $gallery);
									if( is_array($gallery_ids) ){
										array_unshift($gallery_ids, get_post_thumbnail_id());
									}
									foreach( $gallery_ids as $gallery_id ){
										echo wp_get_attachment_image( $gallery_id, $blog_thumb_size, 0, array('class' => 'thumbnail-blog') );
									}
								}
							
								if( ($post_format === false || $post_format == 'standard') && !is_singular('ts_feature') ){
									the_post_thumbnail($blog_thumb_size, array('class' => 'thumbnail-blog'));
								}
								
								?>
							</figure>
						<?php 
						}
						
						if( $post_format == 'video' ){
							$video_url = get_post_meta($post->ID, 'ts_video_url', true);
							if( $video_url != '' ){
								echo do_shortcode('[ts_video src="'.esc_url($video_url).'"]');
							}
						}
						
						if( $post_format == 'audio' ){
							$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
							if( strlen($audio_url) > 4 ){
								$file_format = substr($audio_url, -3, 3);
								if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
									echo do_shortcode('[audio '.$file_format.'="'.esc_url($audio_url).'"]');
								}
								else{
									echo do_shortcode('[ts_soundcloud url="'.esc_url($audio_url).'" width="100%" height="166"]');
								}
							}
						}
						?>
					</div>
				<?php endif; ?>
				
				<div class="entry-header">
					<?php if( $theme_options['ts_blog_details_categories'] || $theme_options['ts_blog_details_date'] || $theme_options['ts_blog_details_author'] || $theme_options['ts_blog_details_comment'] ) : ?>
					<!-- Blog Meta -->
					<div class="entry-meta-top">
						<?php 
						$categories_list = get_the_category_list(' ');
						if( !$categories_list ){
							$theme_options['ts_blog_details_categories'] = false;
						}
						?>
						<?php if( $theme_options['ts_blog_details_categories'] ): ?>
						<div class="cats-link">
							<?php echo trim($categories_list); ?>
						</div>
						<?php endif; ?>
						
						<?php if( $theme_options['ts_blog_details_date'] ) : ?>
						<span class="date-time">
							<?php echo get_the_time( get_option('date_format') ); ?>
						</span>
						<?php endif; ?>
						
						<?php if( $theme_options['ts_blog_details_author'] ): ?>
						<span class="vcard author">
							<?php the_author_posts_link(); ?>
						</span>
						<?php endif; ?>
						
						<?php if( $theme_options['ts_blog_details_comment'] ): ?>
						<span class="comment-count">
							<?php
							$comment_count = cozycorner_get_post_comment_count();
							echo sprintf( _n('%d Comment', '%d Comments', $comment_count, 'cozycorner'), $comment_count );
							?>
						</span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					
					
					<?php if( $theme_options['ts_blog_details_title'] ): ?>
					<header><h3 class="entry-title"><?php the_title(); ?></h3></header>
					<?php endif; ?>
				</div>	
				
				<div class="post-content">

					<div class="entry-content">
						<!-- Blog Content -->
						<?php if( $theme_options['ts_blog_details_content'] ): ?>
						<div class="content-wrapper">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
						<?php endif; ?>
					</div>
					
					<?php 
					$tags_list = get_the_tag_list('', '');
					if( !$tags_list ){
						$theme_options['ts_blog_details_tags'] = false;
					}
					?>
					<?php if( $theme_options['ts_blog_details_tags'] || ( function_exists('ts_template_social_sharing') && $theme_options['ts_blog_details_sharing'] ) ): ?>
					<div class="single-post-meta">
						<?php if( function_exists('ts_template_social_sharing') && $theme_options['ts_blog_details_sharing'] ): ?>
							<!-- Blog Sharing -->
							<div class="social-sharing"><?php ts_template_social_sharing(); ?></div>
						<?php endif; ?>
						<?php if( $theme_options['ts_blog_details_tags'] ): ?>
							<!-- Blog Tags -->
							<div class="tags-link"><span><?php esc_html_e('Tags', 'cozycorner'); ?></span><?php echo trim($tags_list); ?></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					
					<!-- Blog Author -->
					<?php if( $theme_options['ts_blog_details_author_box'] && get_the_author_meta('description') ): ?>
						<div class="entry-author">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 150, 'mystery' ); ?>
							<div class="author-meta">
								<span class="author"><?php the_author_posts_link();?></span>
								<span class="role"><?php echo cozycorner_get_user_role( get_the_author_meta('ID') ); ?></span>
								<div class="description"><?php the_author_meta( 'description' ); ?></div>
							</div>
						</div>
					<?php endif; ?>	
				</div>
			</div>

			<?php
			if( $theme_options['ts_blog_details_related_posts'] ){
			?>
			<div class="single-related-wrapper">
				<!-- Related Posts-->
				<?php get_template_part('templates/related-posts'); ?>
			</div>
			<?php } ?>

			<!-- Comment Form -->
			<?php
			if( $theme_options['ts_blog_details_comment_form'] && ( comments_open() || get_comments_number() ) ){
				comments_template( '', true );
			}
			?>
			
		</article>
	</div><!-- end main-content -->
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<div id="right-sidebar" class="ts-sidebar">
			<aside>
				<?php dynamic_sidebar( $theme_options['ts_blog_details_right_sidebar'] ); ?>
			</aside>
		</div>
	<?php endif; ?>
	<!-- end right sidebar -->	

</div>
<?php get_footer(); ?>